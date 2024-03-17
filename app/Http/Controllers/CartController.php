<?php

namespace App\Http\Controllers;

use App\Models\san_pham;
use App\Models\bills_ban;

use App\Models\bill_detail_ban;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class cartcontroller extends Controller
{
    public function viewCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);


        // Lấy thông tin sản phẩm trong giỏ hàng
        return view('cart',['cart' => $cart]);

    }
    public function addToCart(Request $request,string $id)
    {

        $p=san_pham::find($id);

        $product = [
            'id' => $id,
            'name' => $p->name,
            'image'=>$p->image,
            'quantity' =>1,
            'price' => $p->unit_price,
        ];

        $cart = $request->session()->get('cart', []); // Lấy giỏ hàng từ session

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$product['id']])) {
            // Nếu tồn tại, cập nhật số lượng
            $cart[$product['id']]['quantity'] += 1;
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
            $cart[$product['id']] = $product;
        }
        $request->session()->put('cart', $cart); // Lưu giỏ hàng mới vào session


        session()->flash('msg', 'Thêm sản phẩm vào giỏ hàng thành công!');
        return redirect()-> route('home.index');
    }

    public function removeItem(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart); // Cập nhật giỏ hàng mới vào session

            // Thông báo thành công
            session()->flash('msg', 'Đã xóa sản phẩm khỏi giỏ hàng !');
            return redirect()-> route('ViewCart');
        }

        // Sản phẩm không tồn tại trong giỏ hàng
        session()->flash('msg', ' Sản phẩm không tồn tại trong giỏ hàng !');
        return redirect()-> route('ViewCart');
    }

    public function IncreaseQuantity(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
            $request->session()->put('cart', $cart); // Cập nhật giỏ hàng mới vào session
            return redirect()-> route('ViewCart');
        }
    }
    public function DecreaseQuantity(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            if($cart[$id]['quantity']>1){
                $cart[$id]['quantity'] -= 1;

            }

            $request->session()->put('cart', $cart); // Cập nhật giỏ hàng mới vào session
            return redirect()-> route('ViewCart');
        }
    }
    public function PlayOrder(Request $request){
        $cart = $request->session()->get('cart', []);

        $order=new bills_ban();
        $order->ten_kh = $request->ten_kh;
        $order->diachi = $request->diachi;
        $order->sodt = $request->sodt;
        $order->email = $request->email;
        $order->payment="thanh toán khi nhận hàng" ;
        $order->save();

        $order_latest = bills_ban::latest()->first();
        $id_latest = $order_latest->id;
        foreach($cart as $item){
            $order_detail=new bill_detail_ban();
            $order_detail->id_bill_ban=$id_latest;
            $order_detail->id_sp=$item['id'];
            $order_detail->sl = $item['quantity'];

            $order_detail->save();
        }

        $request->session()->put('cart', []);
        return redirect()-> route('home.index');


    }
    public function checkout(Request $request){
        $cart = $request->session()->get('cart', []);
        return view('checkout',['cart'=>$cart]);
    }
}

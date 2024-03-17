<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai_sp;
use App\Models\san_pham;
class AdminController extends Controller
{
    public function loaisp_index()
    {
        $db = loai_sp::all();

        return view('admin.loaisp.index',['loaisp'=>$db]);
    }
    public function loaisp_delete($id)
    {
        loai_sp::find($id)->delete();
        return redirect()->route('admin.loaisp.index');
    }
    public function loaisp_show($id)
    {
        $db = loai_sp::find($id);
        return view('admin.loaisp.edit',['loaisp'=>$db]);
    }
    public function loaisp_update($id,Request $res)
    {
        loai_sp::find($id)->update(['id'=>$id,'tenloai'=>$res->tenloai,'Delet'=>$res->Delet]);
        return redirect()->route('admin.loaisp.index');
    }
    public function loaisp_new()
    {
        $db = new loai_sp();
        return view('admin.loaisp.add',['loaisp'=>$db]);
    }
    public function loaisp_store(Request $res)
    {
        loai_sp::create(['tenloai'=>$res->tenloai,'Delet'=>$res->Delet]);
        return redirect()->route('admin.loaisp.index');
    }
    public function sanpham_index()
    {
        $db = san_pham::all();

        return view('admin.sp.index', ['sanphams' => $db]);
    }
    public function sanpham_delete($id)
    {
        san_pham::find($id)->delete();
        return redirect()->route('admin.sp.index');
    }
    public function sanpham_show($id)
    {
        $db = san_pham::find($id);
        return view('admin.sp.edit', ['sanphams' => $db]);
    }
    public function sanpham_update($id, Request $res)
    {
        san_pham::find($id)->update(['id' => $id, 'name' => $res->name, 'id_loai_sp' => $res->id_loai_sp, 'mota_sp' => $res->mota_sp, 'unit_price' => $res->unit_price, 'so_luong' => $res->so_luong, 'image' => $res->image, 'Delet' => $res->Delet]);
        return redirect()->route('admin.sp.index');
    }
    public function sanpham_new()
    {
        $db = new san_pham();
        return view('admin.sp.add', ['sanphams' => $db]);
    }
    public function sanpham_store(Request $res)
    {

        // dd($res);
        san_pham::create(['name' => $res->name, 'id_loai_sp' => $res->id_loai_sp, 'id_ncc' => $res->ncc, 'mota_sp' => $res->mota_sp, 'unit_price' => $res->unit_price, 'so_luong' => $res->sl, 'image' => $res->anh, 'Delet' => $res->Delet]);
        return redirect()->route('admin.sp.index');
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\san_pham;
use App\Models\loai_sp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $ds = san_pham::limit(8)->get();

    return view('index',['sanphams'=>$ds]);
    }

    public function get_products_by_categories($id)
    {
        $ds = san_pham::where("id_loai_sp",$id)->get();


        return view('categories',['sanphams'=>$ds]);
    }
    public function shopdetails($id)
    {
        $sp = san_pham::where("id", $id)->limit(1)->get();
        return view('shopdetails', ['sanphams' => $sp]);
    }
}

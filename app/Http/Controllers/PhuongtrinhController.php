<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhuongtrinhController extends Controller
{
    public function getptb2(){
        return view('giaiptb2');
    }
    public function postptb2(Request $req)
    {
        $kq = "";
        if($req->has('cmd')){
            $a = $req->txta;
            $b = $req->txtb;
            $c = $req->txtc;
            $delta = $b*$b-4*$a*$c;
            if($delta<0){
                $kq = "Phuong trinh chi co nghiem phuc";
            }
            elseif($delta==0){
                $x1 = (-$b)/2/$a;
                $kq = "Phuong trinh co nghiem kep<br>X1 = X2 = $x1";
            }
            else{
                $x1 = (-$b - sqrt($delta))/2/$a;
                $x2 = (-$b + sqrt($delta))/2/$a;

                $kq = "Phuong trinh co 2 nghiem<br>X1 = $x1<br>X2 = $x2";
            }
        }
        return view('giaiptb2',['kq'=>$kq]);
    }
}

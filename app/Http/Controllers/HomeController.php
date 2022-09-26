<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            "kategori" => Kategori::all(),
            "product" => Product::all(),
            "user" => USer::all()
        ];
        return view('home',compact('data'));
    }

    public function homemember(){
        dd('oek');
        return view('member.home');
    }

    public function profile(){

        return view('admin.profile');
    }
}

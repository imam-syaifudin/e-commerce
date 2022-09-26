<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IndexController extends Controller
{
    //
    public function __construct(){
        $this->product = Product::paginate(12);
    }

    public function index(){
        $product = $this->product;
        return view('index',compact('product'));
    }
    public function product(){
        $product = $this->product;
        return view('product',compact('product'));
    }
    public function contact(){

        return view('contact');
    }
    public function about(){

        return view('about');
    }

    public function kategori($slug){
        $kategori = Kategori::where('slug',$slug)->first();

        if ( $kategori == NULL ){
            $pesan = "404";
            Alert::error('Kosong','Maaf kategori tidak ditemukan');
            return view('kategori.list',compact('pesan'));
        }

        $product = Product::where('kategori_id',$kategori->id)->paginate(12);
        return view('kategori.list',compact('product'));
    }
}


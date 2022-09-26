<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::paginate(5);
        return view('admin.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('admin.product.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'price' => 'required',
            'stok' => 'required|numeric',
            'keterangan' => 'required|max:1500'
        ]);

         

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            Alert::error("Error",$errors);
            return redirect('admin/product/create')->withErrors($validator)->withInput($request->all());
        } else {
            Alert::success("Berhasil","Berhasil menambahkan product");
        }

        $product->kategori_id = $request->kategori;
        $product->name = $request->name;
        $product->image = $request->file('image')->store('product-images');
        $product->price = $request->price;
        $product->stok = $request->stok;
        $product->keterangan = $request->keterangan;
        $product->save();

        return redirect('admin/product');

    }

    public function cari(Request $request){

        if ( empty($request->value) ){
            $product = Product::paginate(5);
            return view('admin.product',compact('product'));
        }


        $product = Product::where('name','like','%'.$request->value."%")->paginate(5)->withQueryString();
        $result = Product::where('name','like','%'.$request->value."%")->get();

        return view('admin.product',compact('product','result'));
     }

     public function produkCari(Request $request){
        if ( empty($request->value) ){
            $product = Product::paginate(12);
            return view('admin.product',compact('product'));
        }


        $product = Product::where('name','like','%'.$request->value."%")->paginate(12)->withQueryString();

        if ( $product->count() == 0 ){
            Alert::error('Kosong','pencarian tidak ditemukan');
            $pesan = "404";
            return view('product',compact('product','pesan'));
        }
        
        $result = Product::where('name','like','%'.$request->value."%")->get();

        return view('product',compact('product','result'));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        if ( $product == NULL ){
            Alert::error('Kosong','Produk tidak ditemukan');
            $pesan = "404";
            return view('product.show',compact('pesan') );
        }
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $data = [
            "product" => Product::findOrFail($id),
            "kategori" => Kategori::all()
            
        ];
        return view('admin.product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $validator = [
            'price' => 'required',
            'keterangan' => 'required|max:1500'
        ];

        if ( !$request->name == $product->name ){
            $validator['name'] = 'required|unique:products|max:255';
        } else if ( isset($request->image)){
            $validator['image'] = 'required|image|mimes:jpeg,jpg,png';
        }

        $validatedData = Validator::make($request->all(),$validator);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->all();
            Alert::error("Error",$errors);
            return redirect("admin/product/$product->id/edit")->withErrors($validator)->withInput($request->all());
        } else {
            Alert::success('Success',"Berhasil mengedit data");
        }

        $product->kategori_id = $request->kategori;
        $product->name = $request->name;
        
        if ( empty($request->file() ) ){
            $product->image = $product->image;
        } else {
            Storage::delete($product->image);
            $product->image = $request->file('image')->store('product-images');
        }

        $product->price = $request->price;
        $product->keterangan = $request->keterangan;
        $product->save();
        
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = PRoduct::findOrFail($id);
        $product->delete();

        Storage::delete($product->image);
        Alert::success("Berhasil","Product $product->name Telah Dihapus");

        return redirect('admin/product');
    }
}

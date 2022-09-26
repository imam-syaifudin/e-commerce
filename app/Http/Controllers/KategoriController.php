<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::paginate(5);
        return view('admin.kategori',compact('kategori'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function cari(Request $request){

        if ( empty($request->value) ){
            $kategori = Kategori::paginate(5);
            return view('admin.kategori',compact('kategori'));
        }


        $kategori = Kategori::where('name','like','%'.$request->value."%")->paginate(5)->withQueryString();

        return view('admin.kategori',compact('kategori'));
     }

    public function createSlug($name){
        $name = preg_replace('/\s+/', '-', $name);
        $result = "kategori-";
        $slug = $result .= $name;

        return $slug;
    }
    public function store(Request $request)
    {
        //
        $kategori = new Kategori;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:kategoris|max:255'
        ]);

        
        if ($validator->fails()) {
            $errors = $validator->errors()->messages()["name"];
            Alert::error("Error",$errors);
            return redirect('admin/kategori/create')->withErrors($validator)->withInput($request->all());
        } else {
            Alert::success("Berhasil","Berhasil menambahkan kategori");
        }

        

        $kategori->name = $request->name;
        $kategori->slug = $this->createSlug($request->name);
        $kategori->save();

        return redirect("admin/kategori");
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
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.edit',compact('kategori'));
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
        $kategori = Kategori::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ($kategori->name == $request->name ) ?  'required|max:255' : 'required|unique:kategoris|max:255'
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors()->messages()["name"];
            Alert::error("Error",$errors);
            return redirect("admin/kategori/$id/edit")->withErrors($validator)->withInput($request->all());
        } else {
            Alert::success("Berhasil","Berhasil mengedit kategori");
        }

        

        $kategori->name = $request->name;
        $kategori->slug = $this->createSlug($request->name);
        $kategori->save();

        return redirect("admin/kategori");
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
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Alert::success("Berhasil","Kategori $kategori->name Telah Dihapus");

        return redirect('admin/kategori');

    }
}

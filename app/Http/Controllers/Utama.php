<?php

namespace App\Http\Controllers;
use App\Models\M_Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Utama extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('tbl_barang')->get();

        return view('utama',['barang'=>$barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'file' => 'required|max:2048'
        ]);
        $file = $request->file('file');
        $nama_file = time()."-".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        if($file->move($tujuan_upload,$nama_file)){
            $data = M_Barang::create([
                'nama_produk' =>$request->nama_produk,
                'harga'         => $request->harga,
                'gambar'        => $nama_file
            ]);
            $res['message'] ="Success";
            $res['values']  = $data;
            return response($res);
        }
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
    }
}

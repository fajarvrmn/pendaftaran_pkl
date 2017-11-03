<?php

namespace App\Http\Controllers;
use App\Auth;
use App\Sekolah;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $sekolahs = Sekolah::all();
            return Datatables::of($sekolahs)
            ->addColumn('action',function($sekolah){
                return view('datatable._action',[
                    'model'=>$sekolah,
                    'form_url'=>route('sekolahs.destroy',$sekolah->id),
                    'edit_url'=>route('sekolahs.edit', $sekolah->id),
                    'confirm_message'=>'Yakin Mau Menghapus'. $sekolah->nama_sekolah.'?'
                    ]);

            })->make(true);
        }
        
        $html=$htmlBuilder
        ->addColumn(['data'=>'nama_sekolah','name'=>'nama_sekolah','title'=>'Nama Sekolah'])
        ->addColumn(['data'=>'alamat_sekolah','name'=>'alamat_sekolah','title'=>'Alamat Sekolah'])
        ->addColumn(['data'=>'kontak','name'=>'kontak','title'=>'Kontak'])
        ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
        ->addColumn(['data'=>'data','name'=>'data','title'=>'Data'])
        ->addColumn(['data'=>'awal_pkl','name'=>'awal_pkl','title'=>'Awal PKL'])
        ->addColumn(['data'=>'akhir_pkl','name'=>'akhir_pkl','title'=>'Akhir PKL'])
        ->addColumn(['data'=>'pembimbing','name'=>'pembimbing','title'=>'Pembimbing'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('welcome')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.create');
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
			$sekolah=new sekolah();
            $sekolah->nama_sekolah=$request->nama_sekolah;
            $sekolah->alamat_sekolah=$request->alamat_sekolah;
            $sekolah->kontak=$request->kontak;
            $sekolah->email=$request->email;
            $sekolah->data=$request->data;
            $sekolah->awal_pkl=$request->awal_pkl;
            $sekolah->akhir_pkl=$request->akhir_pkl;
            $sekolah->pembimbing=$request->pembimbing;
            $sekolah->save();
            Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $sekolah->nama_sekolah"]);
            return redirect()->route('sekolah.index');

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $sekolah->nama_sekolah"]);
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
        $author=Author::find($id);
        return view('authors.edit')->with(compact('author'));
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
        $this->validate($request,['name'=>'required|unique:authors,name,'.$id]);
        $author =Author::find($id);
        $author->update($request->only('name'));
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $author->name"]);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(!Author::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Penulis Berhasil Dihapus"]);
    return redirect()->route('authors.index');
    }
}

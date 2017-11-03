<?php

namespace App\Http\Controllers;
use App\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Siswa;
use Session;
use App\Sekolah;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $siswas = Siswa::with('sekolah');
            return Datatables::of($siswas)
            ->addColumn('action',function($siswa){
                return view('datatable._action',[
                    'model'=>$siswa,
                    'form_url'=>route('siswas.destroy',$siswa->id),
                    'edit_url'=>route('siswas.edit', $siswa->id),
                    'confirm_message'=>'Yakin Mau Menghapus'. $siswa->title.'?'
                    ]);

            })->make(true);
        }

        $html=$htmlBuilder
        ->addColumn(['data'=>'nama_siswa','name'=>'nama_siswa','title'=>'Nama Siswa'])
        ->addColumn(['data'=>'tanggal_lahir','name'=>'tanggal_lahir','title'=>'Tanggal Lahir'])
        ->addColumn(['data'=>'tempat_lahir','name'=>'tempat_lahir','title'=>'Tempat Lahir'])
        ->addColumn(['data'=>'keahlian','name'=>'keahlian','title'=>'keahlian'])
        ->addColumn(['data'=>'kontak','name'=>'kontak','title'=>'Kontak person'])
        ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
        ->addColumn(['data'=>'data','name'=>'data','title'=>'Data'])
        ->addColumn(['data'=>'sertifikat','name'=>'sertifikat','title'=>'Sertifikat'])
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
        //
        return view('user.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $siswas=new siswa();
            $siswas->nama_siswa=$request->nama_siswa;
            $siswas->tanggal_lahir=$request->tanggal_lahir;
            $siswas->tempat_lahir=$request->tempat_lahir;
            $siswas->keahlian=$request->keahlian;
            $siswas->kontak=$request->kontak;
            $siswas->sertifikat=$request->sertifikat;
            $siswas->jenis_kelamin=$request->jenis_kelamin;
            $siswas->data=$request->data;
            $siswas->email=$request->email;
            $siswas->sekolah_id=$request->sekolah_id;
            $siswas->save();

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $siswas->nama_siswa"

        ]);
        return redirect()->route('siswa.index');
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
        $book=Book::find($id);
        return view('books.edit')->with(compact('book'));
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
        $this->validate($request,[
            'title' =>'required|unique:books,title',
            'author_id' =>'required|exists:authors,id',
            'amount' =>'required|numeric',
            'cover' =>'image|max:2048'
        ]);
        $book=Book::find($id);
        $book->update($request->all());
        // 
        if($request->hasFile('cover')) {
            //Menagmbil cover dan ektensinya
            $filename=null; 
            $uploaded_cover=$request->file('cover');
            $extension=$uploaded_cover->getClientOriginalExtension();

            //membuat nama file random 
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            //memindahkan ke folder public/img
            $uploaded_cover->move($destinationPath,$filename); 

            //hapuscover lama
            if($book->cover){
                $old_cover=$book->cover;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img' . DIRECTORY_SEPARATOR. $book->cover;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e){
                //file sudah dihapus
            }
            }

            //Cover Baru
            $book->cover=$filename;
            $book->save();
        }

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $book->title"

        ]);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book =Book::find($id);

        //hapus cover lama
        if($book->cover)
        {
            $old_cover=$book->cover;
            $filepath=public_path(). DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $book->cover;

            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e){

            }
        }
        $book->delete();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Buku Berhasil dihapus"
]);
        return redirect()->route('books.index');
    }
}

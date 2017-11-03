<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Siswa extends Model
{
    //
    protected $fillable=['nama_siswa','tanggal_lahir','tempat_lahir','keahlian','kontak','sertifikat','email','data','sekolah_id'];
    

    public function sekolah()
    {
    	return $this->belongsTo('App\Sekolah');
    }
}

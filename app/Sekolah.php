<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Sekolah extends Model
{
   protected $fillable = ['nama_sekolah','alamat_sekolah', 'kontak','email','pembimbing','awal_pkl','akhir_pkl','data'];
    
    public function siswas()
    	{
    		return $this->hasMany('App\Siswa');
    	}
    
    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($sekolah){
    		// Mengecek apakah penulis masih punya buku
    		if ($sekolah->siswas->count()> 0) {
    			// menyiapkan pesan error
    			$html='Sekolah tidak bisa dihapus karena masih ada yang mengikuti PKL :';
    			$html .='<ul>';
    			foreach ($sekolah ->siswas as $siswa) {
    				$html.="<li>$siswa->title</li>";

    			}
    			$html.='</ul>';

    			Session::flash("flash_notification",[
    				"level"=>"danger",
    				"message"=>$html
    				]);
    			return false;
    			
    		}
    	});
    
    }
}

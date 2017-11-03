<div class="form-group{{$errors->has('nama_siswa')?'has-error' :''}}">
{!! Form::label('nama_siswa','Nama Siswa',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('nama_siswa',null,['class'=>'form-control']) !!}
{!! $errors->first('nama_siswa','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('tanggal_lahir')?'has-error' :''}}">
{!! Form::label('tanggal_lahir','Tanggal Lahir',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::date('tanggal_lahir',null,['class'=>'form-control']) !!}
{!! $errors->first('tanggal_lahir','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('tempat_lahir')?'has-error' :''}}">
{!! Form::label('tempat_lahir','Tempat Lahir',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('tempat_lahir',null,['class'=>'form-control']) !!}
{!! $errors->first('tempat_lahir','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('jenis_kelamin')?'has-error' :''}}">
{!! Form::label('jenis_kelamin','Jenis Kelamin',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
<input type="radio" name="jenis_kelamin" value="Laki Laki" checkhed> Laki Laki&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="jenis_kelamin" value="Perempuan" checkhed> Perempuan &nbsp&nbsp&nbsp&nbsp&nbsp
</div>
</div>

<div class="form-group{{$errors->has('keahlian')?'has-error' :''}}">
{!! Form::label('keahlian','Keahlian',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
<input type="radio" name="keahlian" value="Rekayasa Perangkat Lunak" checkhed> Rekayasa Perangkat Lunak&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="keahlian" value="Tekhnik Komputer dan Jaringan" checkhed> Tekhnik Komputer Jaringan &nbsp&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="keahlian" value="Multimedia" checkhed> Multimedia
</div>
</div>

<div class="form-group{{$errors->has('kontak')?'has-error' :''}}">
{!! Form::label('kontak','Kontak',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('kontak',null,['class'=>'form-control']) !!}
{!! $errors->first('kontak','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('sertifikat')?'has-error' :''}}">
{!! Form::label('sertifikat','Sertifikat Sekolah ( .img )',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::file('sertifikat',null,['class'=>'form-control']) !!}
{!! $errors->first('sertifikat','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('data')?'has-error' :''}}">
{!! Form::label('data','Data',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::file('data',null,['class'=>'form-control']) !!}
{!! $errors->first('data','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('email')?'has-error' :''}}">
{!! Form::label('email','Email',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::email('email',null,['class'=>'form-control']) !!}
{!! $errors->first('email','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('sekolah_id')?'has-error' :''}}">
{!! Form::label('sekolah_id','Asal Sekolah',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::select('sekolah_id',[""]+App\Sekolah::pluck('nama_sekolah','id')->all(),null,['class'=>'form-control']) !!}
{!! $errors->first('sekolah_id','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-10">
{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
</div>
</div>
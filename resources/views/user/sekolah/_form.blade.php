<div class="form-group{{$errors->has('nama_sekolah')?'has-error' :''}}">
{!! Form::label('nama_sekolah','Nama Sekolah',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('nama_sekolah',null,['class'=>'form-control']) !!}
{!! $errors->first('nama_sekolah','<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{$errors->has('alamat_sekolah')?'has-error' :''}}">
{!! Form::label('alamat_sekolah','Alamat Sekolah',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('alamat_sekolah',null,['class'=>'form-control']) !!}
{!! $errors->first('alamat_sekolah','<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{$errors->has('kontak')?'has-error' :''}}">
{!! Form::label('kontak','Kontak',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('kontak',null,['class'=>'form-control']) !!}
{!! $errors->first('kontak','<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{$errors->has('email')?'has-error' :''}}">
{!! Form::label('email','Email',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::email('email',null,['class'=>'form-control']) !!}
{!! $errors->first('email','<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{$errors->has('data')?'has-error' :''}}">
{!! Form::label('data','Data',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::file('data',null,['class'=>'ckeditor', 'size'=>'50x20']) !!}
{!! $errors->first('data','<p class="help-block">:message</p>') !!}</div>
</div>


<div class="form-group{{$errors->has('awal_pkl')?'has-error' :''}}">
{!! Form::label('awal_pkl','Awal PKL',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::date('awal_pkl',null,['class'=>'form-control']) !!}
{!! $errors->first('awal_pkl','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('akhir_pkl')?'has-error' :''}}">
{!! Form::label('akhir_pkl','Akhir PKL',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::date('akhir_pkl',null,['class'=>'form-control']) !!}
{!! $errors->first('akhir_pkl','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{$errors->has('pembimbing')?'has-error' :''}}">
{!! Form::label('pembimbing','Nama Pembimbing',['class'=>'col-md-3 control-label']) !!}
<div class="col-md-7">
{!! Form::text('pembimbing',null,['class'=>'form-control']) !!}
{!! $errors->first('pembimbing','<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-12 col-md-offset-10">
{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
</div>
</div>
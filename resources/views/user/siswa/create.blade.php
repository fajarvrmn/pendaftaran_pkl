@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Pendaftaran Siswa</h2>
</div>
<div class="panel-body">
{!! Form::open(['url'=> route('siswa.store'),
'method'=>'post','files'=>'true','class'=>'form-horizontal']) !!}
@include('user.siswa._form')
{!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>

@endsection
@extends('layout.modal')

@section('modal.form_start')
<form action="{{ $action }}" method="post" id="ajaxForm">
    <input type="hidden" name="id" value="{{ $penulis->id }}"/>
    @csrf
@endsection

@section('modal.actions')
    @include('component.submit_button')
@endsection
    
@section('modal.title')
    Penulis Form
@endsection
        
@section('modal.body')

<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ $penulis->nama }}" id="nama" aria-describedby="nama">
</div>

@endsection

@section('modal.form_end')
</form>
@endsection
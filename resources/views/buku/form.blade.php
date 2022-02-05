@extends('layout.modal')

@section('modal.stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/trix/trix.css') }}">
@endsection

@section('modal.javascript')
<script type="text/javascript" src="{{ asset('assets/vendor/trix/trix.js') }}"></script>
@endsection

@section('modal.form_start')
<form action="{{ $action }}" method="post" id="ajaxForm">
    <input type="hidden" name="id" value="{{ $object->id }}"/>
    @csrf
@endsection

@section('modal.actions')
    @include('component.submit_button')
@endsection
    
@section('modal.title')
    Buku Form
@endsection
        
@section('modal.body')

<div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" name="isbn" class="form-control" value="{{ $object->isbn }}" id="isbn" aria-describedby="nama">
</div>
<div class="mb-3">
    <input id="judul" type="hidden" name="judul" value="{{ $object->judul }}">
    <trix-editor input="judul"></trix-editor>
</div>
<div class="mb-3">
    <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $object->deskripsi }}">
    <trix-editor input="deskripsi"></trix-editor>
</div>
<div class="mb-3">
    <label for="tahun" class="form-label">TAHUN</label>
    <input type="number" min="1970" name="tahun" class="form-control" value="{{ $object->tahun }}" id="tahun" aria-describedby="tahun">
</div>
<div class="mb-3">
    <label for="stok" class="form-label">STOK</label>
    <input type="number" min="0" name="stok" class="form-control" value="{{ $object->stok }}" id="stok" aria-describedby="stok">
</div>
<div class="mb-3">
    <label for="penulis_id" class="form-label">PENULIS</label>
    <select class="form-control" name="penulis_id" aria-label="Penulis">
        <option> --- Pilih ---</option>
        @foreach ($penulis as $obj)
        <option value="{{ $obj->id }}" {{ $obj->id == $object->penulis_id ? 'selected':'' }}>{{ $obj->nama }}</option>
        @endforeach
    </select>
</div>

@endsection

@section('modal.form_end')
</form>
@endsection
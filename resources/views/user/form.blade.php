@extends('layout.modal')

@section('modal.form_start')
<form action="{{ $action }}" method="post" id="ajaxForm">
    <input type="hidden" name="id" value="{{ $object->id }}"/>
    @csrf
@endsection

@section('modal.actions')
    @include('component.submit_button')
@endsection
    
@section('modal.title')
    User Form
@endsection
        
@section('modal.body')

<div class="mb-3">
    <label for="name" class="form-label">NAMA</label>
    <input type="text" name="name" class="form-control" value="{{ $object->name }}" aria-describedby="name">
</div>
<div class="mb-3">
    <label for="email" class="form-label">EMAIL</label>
    <input type="email" name="email" class="form-control" value="{{ $object->email }}" aria-describedby="email">
</div>
@if (null == $object->id)
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" aria-describedby="password">
</div>
@endif
<div class="mb-3">
    <label for="role" class="form-label">ROLE</label>
    <select class="form-control" name="role" aria-label="Role">
        <option> --- Pilih ---</option>
        @foreach ($roles as $role)
        <option value="{{ $role }}" {{ $object->role == $role ? 'selected':'' }}>{{ $role }}</option>
        @endforeach
    </select>
</div>

@endsection

@section('modal.form_end')
</form>
@endsection
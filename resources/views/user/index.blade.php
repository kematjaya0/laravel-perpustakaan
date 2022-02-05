@extends('layout.tabulation')

@section('actions')
    <a href="{{ route('user_create') }}" data-toggle="modal" data-target="#modal" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm">
        <i class="fas fa-plus fa-sm"></i> Create
    </a>              
@endsection

@section('title')
    User
@endsection

@section('tabulation.footer')
    {{ $data->links() }}
@endsection

@section('tabulation.body')
<table class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td> 
            <td>{{ $user->role }}</td>
            <td>
                @include('user.delete', ['user' => $user])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
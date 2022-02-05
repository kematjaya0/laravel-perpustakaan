@extends('layout.tabulation')

@section('actions')
    <a href="{{ route('penulis_create') }}" data-toggle="modal" data-target="#modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Create
    </a>              
@endsection

@section('title')
    Penulis
@endsection

@section('tabulation.footer')
    {{ $data->links() }}
@endsection

@section('tabulation.body')
<table class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $penulis)
        <tr>
            <td>{{ $penulis->nama }}</td>
            <td>
                @include('penulis.delete', ['penulis' => $penulis])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layout.tabulation')

@section('actions')
    <a href="{{ route('buku_create') }}" data-toggle="modal" data-target="#modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Create
    </a>              
@endsection

@section('title')
    Buku
@endsection

@section('tabulation.footer')
    {{ $data->links() }}
@endsection

@section('tabulation.body')
<table class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>ISBN</th>
            <th>JUDUL</th>
            <th>TAHUN</th>
            <th>STOK</th>
            <th>PENULIS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $buku)
        <tr>
            <td>{{ $buku->isbn }}</td>
            <td>{{ $buku->judul }}</td> 
            <td>{{ $buku->tahun }}</td>
            <td>{{ $buku->stok }}</td>
            <td>{{ $buku->penulis->nama }}</td>
            <td>
                @include('buku.delete', ['buku' => $buku])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
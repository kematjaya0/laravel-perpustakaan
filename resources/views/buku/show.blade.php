@extends('layout.modal')

@section('modal.title')
    {{ $buku->isbn }}
@endsection
        
@section('modal.body')
<table class="table">
    <tbody>
        <tr>
            <th width="30%">ISBN</th>
            <td>{{ $buku->isbn }}</td>
        </tr>
        <tr>
            <th>JUDUL</th>
            <td>{!! $buku->judul !!}</td>
        </tr>
        <tr>
            <th>TAHUN</th>
            <td>{{ $buku->tahun }}</td>
        </tr>
        <tr>
            <th>STOK</th>
            <td>{{ $buku->stok }}</td>
        </tr> 
        <tr>
            <th>PENULIS</th>
            <td>{{ $buku->penulis->nama }}</td>
        </tr>
        <tr>
            <th>DEKRIPSI</th>
            <td>{!! $buku->deskripsi !!}</td>
        </tr>
        <tr>
            <th>Foto</th>
            <td>
                @if ($buku->image)
                <img src="{{ asset('storage/' . $buku->image) }}" class="img-fluid"/>
                @else
                <img src="https://source.unsplash.com/1200x400?book" class="img-fluid"/>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endsection
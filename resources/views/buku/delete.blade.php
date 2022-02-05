<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buku_remove', $buku->id) }}" method="POST">
    <a href="{{ route('buku_show', ['id' => $buku->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm">
        <i class="fas fa-desktop fa-sm"></i> Lihat
    </a>
    @can('super')
    <a href="{{ route('buku_edit', ['id' => $buku->id]) }}" data-toggle="modal" data-target="#modal" class="d-none d-sm-inline-block btn btn-sm btn-outline-info shadow-sm">
        <i class="fas fa-edit fa-sm"></i> Edit
    </a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">
        <span class="fa fa-trash"></span> Hapus
    </button>
    @endcan
</form>
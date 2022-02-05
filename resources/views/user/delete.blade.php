<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user_remove', $user->id) }}" method="POST">
    <a href="{{ route('user_edit', ['id' => $user->id]) }}" data-toggle="modal" data-target="#modal" class="d-none d-sm-inline-block btn btn-sm btn-outline-info shadow-sm">
        <i class="fas fa-edit fa-sm"></i> Edit
    </a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">
        <span class="fa fa-trash"></span> Hapus
    </button>
</form>
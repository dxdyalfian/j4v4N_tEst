<a href="{{ route('family.edit', encrypt($family->id)) }}">Edit</a> | 
<a href="#"  onclick="if(confirm('Are you sure? Data {{ $family->name }} akan dihapus')) return document.getElementById({{ $family->id }}).submit(); else event.preventDefault();">Hapus</a>
<form action="{{ route('family.destroy', encrypt($family->id)) }}" method="post" class="d-none" id="{{ $family->id }}">
    @csrf
    @method('DELETE')
</form>
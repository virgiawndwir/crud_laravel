<form method="POST" action="{{ route($controller.'.destroy', $data->id) }}" class="form-delete">
    @csrf    
    @method('DELETE')
    <td>
        <a href="{{ route($controller. '.edit', $data->id) }}" class="btn btn-info btn-sm">
            Ubah
        </a>
        <button type="submit" class="btn btn-danger btn-sm btn-sm">
            Hapus
        </button>
    </td>                  
</form>
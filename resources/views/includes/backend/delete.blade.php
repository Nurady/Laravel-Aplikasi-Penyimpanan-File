<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('files.destroy', $file->id ?? '') }}" method="post">
                @csrf
                @method('DELETE')
                <h5 class="text-center">Apakah anda yakin menghapus file?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
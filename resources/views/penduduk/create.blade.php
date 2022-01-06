<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-create">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penduduk.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="Nik">Nik</label>
                        <input type="number" class="form-control" id="Nik" name="nik" value="{{ old('nik') }}" placeholder="Enter Nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="tex" class="form-control" id="nama" placeholder="Enter name" name="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="custom-select form-control-border" id="jk" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" value="{{ old('alamat') }}" rows="3" placeholder="Enter ..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
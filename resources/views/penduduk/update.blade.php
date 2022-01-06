<div class="modal fade" id="update">
    <div class="modal-dialog update">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nik">Nik</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" id="nik" placeholder="Enter Nik" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter name" name="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select form-control-border" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" name="alamat" value="{{ old('alamat') }}" rows="3" placeholder="Enter ..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
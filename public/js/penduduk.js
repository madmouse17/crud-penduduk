$(document).ready(function() {
    var table = $("#penduduk-table").DataTable({
        rowReorder: {
            selector: "td:nth-child(0)",
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: penduduk_route,
        },
        columns: [{
                data: "rownum",
                name: "rownum",
                searchable: false,
            },
            {
                data: "nik",
                name: "nik",
            },
            {
                data: "nama",
                name: "nama",
            },
            {
                data: "jenis_kelamin",
                name: "jenis_kelamin",
            },
            {
                data: "alamat",
                name: "alamat",
            },
            {
                data: "user_input",
                name: "user_input",
            },
            {
                data: "user_update",
                name: "user_update",
            },
            {
                data: "created_at",
                name: "created_at",
            },
            {
                data: "updated_at",
                name: "updated_at",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],

        responsive: true,
        order: [
            [0, "desc"]
        ],
    });
});

$(document).on("click", "#edit", function() {
    var id = $(this).data("id");
    $.get("penduduk/" + id + "/edit", function(data) {
        $("#update").modal("show");
        $("#id").val(data.id);
        $("#nik").val(data.nik);
        $("#name").val(data.nama);
        $("#jenis_kelamin").val(data.jenis_kelamin);
        $("#address").val(data.alamat);
        $("#form-edit").attr("action", "penduduk/" + data.id);
    });
});
$(document).on("click", "#delete", function() {
    var id = $(this).data("id");
    csrf_token = $('meta[name="csrf-token"]').attr("content");
    Swal.fire({
        title: "Anda Yakin Ingin Menghapus?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Batal",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "/penduduk/" + id,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: csrf_token,
                },
                success: function(response) {
                    $("#penduduk-table").DataTable().ajax.reload();
                    swal.fire({
                        type: "warning",
                        title: "Deleted!",
                        text: "Penduduk Delete Succesfully",
                    });
                },
                error: function(xhr) {
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                },
            });
        }
    });
});
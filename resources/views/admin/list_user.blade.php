@extends('template_backend_admin.app')
@section('subjudul','Data User')
@section('content')
<table id="table-user" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Username</th>
      <th class="text-center">Role</th>
      <th class="text-center">Cabang</th>
      <th class="text-center">Status</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
</table>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#table-user').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{url('api_user')}}',
      columns: [
        {
           render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
           },
           className: 'dt-body-center',
        },
        {
           data: 'username',
           className: 'dt-body-center',
        },
        {
          "render": function ( data, type, row ) {
            // console.log(row.role_id)
             if(row.role_id==1)return 'Admin'
             else if(row.role_id==2)return 'Karyawan'
             else return '-'
           },
           className: 'dt-body-center',
        },
        {
           data: 'cabang',
           className: 'dt-body-center'
        },
        {
          "render": function ( data, type, row ) {
            // console.log(row.is_active)
             if(row.is_active==1)return 'aktif'
             else return 'tidak aktif'
           },
           className: 'dt-body-center',
        },
        {
           "render": function ( data, type, row ) {
            console.log(row)
             return `
             <button class="btn btn-info btn-sm btn-reset" data-id="${row.id}">Reset</button>
             <button class="btn btn-dark btn-sm btn-aktivasi" data-id="${row.id}" data-statusAktivasi="${row.is_active}">
             ${
              row.is_active==1 ? 'Disable' : 'Activate'
             }
             </button>
             `
           },
           className: 'dt-body-center',
        }
      ],
    });
    $('body').on('click', '.btn-reset', function() {
        dataId = $(this).attr('data-id');
        console.log(dataId)
        Swal.fire({ 
            title: "Konfirmasi",
            text: "Apakah yakin mereset password akun ini ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Reset Password`,
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "GET", 
                    dataType: 'json',
                    url: `{{ url('/reset_password/${dataId}') }}`,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Harap Tunggu',
                            text: "Upload dokumen sedang diproses",
                            icon: 'info',
                            timer: 4000,
                            didOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal
                                        .getContent()
                                    if (content) {
                                        const b = content
                                            .querySelector(
                                                'b')
                                        if (b) {
                                            b.textContent =
                                                Swal
                                                .getTimerLeft()
                                        }
                                    }
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    },
                    success: function(result) {
                        Swal.fire({
                            title: "Sukses!",
                            text: "Password berhasil direset !",
                            icon: "success",
                            confirmButtonText: `OK`,
                        }).then((ok) => {
                            if (ok.value) {
                                console.log("sukses")
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Error!", xhr + " " + ajaxOptions + " " +
                            thrownError,
                            "error");
                    }
                });
            } else {
                return false;
            }
        });        
    });
    $('body').on('click', '.btn-aktivasi', function() {
        dataId = $(this).attr('data-id');
        dataStatusAktivasi = $(this).attr('data-statusAktivasi');
        console.log(dataId)
        Swal.fire({ 
            title: "Konfirmasi",
            text: "Apakah yakin mengubah status akun ini ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Ubah`,
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "GET", 
                    dataType: 'json',
                    url: `{{ url('/aktivasi') }}`,
                    data: {
                        id:dataId,
                        val:dataStatusAktivasi==1?0:1
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Harap Tunggu',
                            text: "Upload dokumen sedang diproses",
                            icon: 'info',
                            timer: 4000,
                            didOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal
                                        .getContent()
                                    if (content) {
                                        const b = content
                                            .querySelector(
                                                'b')
                                        if (b) {
                                            b.textContent =
                                                Swal
                                                .getTimerLeft()
                                        }
                                    }
                                }, 300)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            },
                        });
                    },
                    success: function(result) {
                        table.ajax.reload()
                        Swal.fire({
                            title: "Sukses!",
                            text: "Status aktivasi berhasil diubah !",
                            icon: "success",
                            confirmButtonText: `OK`,
                        }).then((ok) => {
                            if (ok.value) {
                                console.log("sukses")
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Error!", xhr + " " + ajaxOptions + " " +
                            thrownError,
                            "error");
                    }
                });
            } else {
                return false;
            }
        });        
    });
  
  });
  
</script>
@endsection
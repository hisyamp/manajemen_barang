@extends('template_backend_admin.app')
@section('subjudul','Data Product')
@section('content')
<div class="card p-5 m-3">
            <div class="row g-9 mb-8">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Tanggal</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Tanggal"></i>
                </label>
                <!--end::Label-->
                <input type="date" class="form-control form-control-solid" placeholder="Tanggal" name="tanggal" id="tanggal"/>
                </div>
                <!--end::Col-->
            </div>
</div>

<div class="card p-5 m-3">
    <table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
        <th class="text-center">No</th>
        <th class="text-center">Product</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Action</th>
        </tr>
    </thead>
    </table>
</div>
@endsection
@section('script')
<div class="modal" id="modal-detail" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">

						<!--begin:Form-->
						<form id="form-regist" class="form" action="{{ route('register') }}" method="POST">
						{{ csrf_field() }}

							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<!--begin::Title-->
								<h1 class="mb-3">Detail Pengembalian Barang</h1>
								<!--end::Title-->
								<!--begin::Description-->
								<!-- <div class="text-muted fw-bold fs-5">If you need more info, please check -->
								<!-- <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.</div> -->
								<!--end::Description-->
							</div>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="d-flex flex-column fv-row mb-2">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Nama</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nama Lengkap"></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Lengkap" name="nama" id="nama" readonly="true"/>
							</div>

							<div class="d-flex flex-column fv-row mb-2">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Nama Barang</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nama Barang" readonly="true"></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Barang" name="barang" id="barang" />
							</div>

              <div class="row g-9 mb-8">
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Jumlah</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Jumlah" readonly="true"></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Masukkan Jumlah" name="jumlah" id="jumlah" readonly="true"/>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Satuan</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Satuan"></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Masukkan Satuan" name="satuan" id="satuan" readonly="true"/>
								</div>
								<!--end::Col-->
							</div>
              <div class="row g-9 mb-8">
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Status Approval</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Status Approval"></i>
                  </label>
                  <!--end::Label-->
                  <input type="text" class="form-control form-control-solid" placeholder="Status Approval" name="status" id="status" readonly="true" />
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Tanggal Pengembalian</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Tanggal Pengembalian"></i>
                  </label>
                  <!--end::Label-->
                  <input type="text" class="form-control form-control-solid" placeholder="Tanggal Pengembalian" name="tanggal_pengembalian" id="tanggal_pengembalian" readonly="true"/>
								</div>
								<!--end::Col-->
							</div>

							<div class="d-flex flex-column fv-row mb-2">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Notes</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Notes"></i>
								</label>
								<!--end::Label-->
                                <textarea class="form-control form-control-solid"  id="notes" cols="30" rows="3" readonly="true"></textarea>
							</div>

              <div class="d-flex flex-column  fv-row mb-12">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Notes Approval</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="notes_admin"></i>
								</label>
								<!--end::Label-->
                                <textarea class="form-control form-control-solid"  id="notes-admin" cols="30" rows="3"></textarea>
							</div>


							<!--begin::Actions-->
							<div class="text-center">
                                <span class="btn btn-danger" id="btn-reject">
                                    Tolak
                                </span>
								<span class="btn btn-primary" id="btn-approve">
									Approve
								</span>
							</div>
							<!--end::Actions-->
						</form>
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
    
<script type="text/javascript">
  $(document).ready(function () {
    var dateX = new Date();
    var dd = String(dateX.getDate()).padStart(2, '0');
    var mm = String(dateX.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = dateX.getFullYear();

    dateX = yyyy + '-' + mm + '-' + dd;
    console.log(dateX)
    $('#tanggal').val(dateX)
    var api = '{{url('api_logproduct')}}'
    var table = $('#table').DataTable({
      processing: true,
      serverSide: true,
      ajax: api+'/'+dateX,
      columns: [
        {
           render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
           },
           className: 'dt-body-center',
        },
        {
           data: 'product',
           className: 'dt-body-center',
        },
        {
           data: 'qty',
           className: 'dt-body-center'
        },
        {
           "render": function ( data, type, row ) {
             return `<button class="btn btn-primary btn-sm btn-detail" data-id="${row.id}">Detail</button>
             `
           },
           className: 'dt-body-center',
        }
      ],
    });
    var id_laporan
    $('body').on('click', '.btn-detail', function() {
        var dataid = $(this).data('id')
        id_laporan = dataid
        console.log("id_laporan change to", id_laporan)
        // console.log(`{{url('detailbarang/${dataid}')}}`)
      $("#modal-detail").modal('show')
      $.ajax({
            url: `{{url('detailbarang/${dataid}')}}`,
            type: "GET", 
            success: function(response) {
                    console.log("data detail barang",response)
                    // $('#modal-regis').modal('hide')
                    $('#nama').val(response.data.username)
                    $('#barang').val(response.data.barang)
                    $('#jumlah').val(response.data.jumlah)
                    $('#satuan').val(response.data.satuan)
                    
                    $('#tanggal_pengembalian').val(response.data.tanggal_pengembalian)
                    $('#notes').val(response.data.notes)
                    if(response.data.status =="A") $('#status').val("Menunggu keputusan")
                    else if(response.data.status =="B") $('#status').val("Ditolak")
                    else if(response.data.status =="C") $('#status').val("Disetujui")
                    
            },
            error: function(data) { 
                console.log('Error:', data);
            }
        });
    })
    $('body').on('click', '#btn-reject', function() {
        event.preventDefault();
        dataId = $(this).attr('data-id');
        // console.log(dataId)
        Swal.fire({ 
            title: "Konfirmasi",
            text: "Apakah yakin menolak pengembalian barang ini ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Tolak`,
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST", 
                    url: `{{ url('/actionbarang/${id_laporan}/B') }}`,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Harap Tunggu',
                            text: "Data sedang diproses",
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
                            text: "Pengembalian berhasil ditolak !",
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
    $('body').on('click', '#btn-approve', function() {
        event.preventDefault();
        dataId = $(this).attr('data-id');
        console.log(dataId)
        Swal.fire({ 
            title: "Konfirmasi",
            text: "Apakah yakin menyetujui pengembalian barang ini ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Ubah`,
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: `{{ url('/actionbarang/${id_laporan}/C') }}`,
                    data: {
                        "_token": "{{ csrf_token() }}",
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
    $( "#tanggal" ).on( "change", function() {
        dateX = $(this).val()
        console.log(dateX)
        console.log(api)
        table.ajax.url(api+'/'+dateX)
        table.ajax.reload();
        
    } );
  });
  
</script>
@endsection
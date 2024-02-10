@extends('template_backend_admin.app')
@section('subjudul','List Pengembalian')
@section('content')
<div class="card m-10 p-10">
        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">

        <!--begin:Form-->
        <form id="form-pengembalian" class="form" method="POST">
        {{ csrf_field() }}

            <!--begin::Heading-->
            <div class="mb-13 text-center">
                <!--begin::Title-->
                <h1 class="mb-3">Form Pengembalian Barang</h1>
                <!--end::Title-->
                <!--begin::Description-->
                <!-- <div class="text-muted fw-bold fs-5">If you need more info, please check -->
                <!-- <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.</div> -->
                <!--end::Description-->
            </div>
            <!--end::Heading-->

            
        <div class="row g-9 mb-8">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Produk</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Valuation Type"></i>
                </label>
                <!--end::Label-->
                <select class="form-select form-select-solid drdn" id="product" name="product" data-control="select2" data-hide-search="true" data-placeholder="Produk">
                    <option value="">Produk</option>
                    @foreach($product as $p)
                    <option value="{{$p->id}}">{{$p->product}}</option>
                    @endforeach
                </select>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Tanggal</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Tanggal"></i>
                </label>
                <!--end::Label-->
                <input type="number" class="form-control form-control-solid" placeholder="Jumlah" name="qty" id="qty"/>
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Actions-->
            <div class="text-center">
                <span class="btn btn-info" id="btn-submit">
                    Submit
                </span>
            </div>
            <!--end::Actions-->
        </form>
        <!--end:Form-->
        </div>
        <!--end::Modal body-->
</div>

<div class="card m-10 p-10">
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
<script type="text/javascript">
  $(document).ready(function () {
    var dateX = new Date();
    var dd = String(dateX.getDate()).padStart(2, '0');
    var mm = String(dateX.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = dateX.getFullYear();

    dateX = yyyy + '-' + mm + '-' + dd;
    // console.log(dateX)
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

    $('body').on('click', '#btn-submit', function() {
        event.preventDefault();
        var datapost = $('#form-pengembalian').serialize()
        console.log("datapost",datapost)
        $.ajax({
                    type: "POST",
                    url: `{{ url('/add_productlog') }}`,
                    data: datapost,
                    // beforeSend: function() {
                    //     Swal.fire({
                    //         title: 'Harap Tunggu',
                    //         text: "Upload dokumen sedang diproses",
                    //         icon: 'info',
                    //         timer: 4000,
                    //         didOpen: () => {
                    //             Swal.showLoading()
                    //             timerInterval = setInterval(() => {
                    //                 const content = Swal
                    //                     .getContent()
                    //                 if (content) {
                    //                     const b = content
                    //                         .querySelector(
                    //                             'b')
                    //                     if (b) {
                    //                         b.textContent =
                    //                             Swal
                    //                             .getTimerLeft()
                    //                     }
                    //                 }
                    //             }, 300)
                    //         },
                    //         willClose: () => {
                    //             clearInterval(timerInterval)
                    //         },
                    //     });
                    // },
                    success: function(result) {
                        console.log("suksess",result)
                        table.ajax.reload()
                        Swal.fire({
                            title: "Sukses!",
                            text: "Data berhasil dikirim !",
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
    });
  
  });
  
</script>
@endsection
@extends('template_backend_admin.app')
@section('subjudul','Dashboard')
@section('script_atas')
<script type="text/javascript"></script>
@endsection
@section('content')
<div class="card bg-light shadow-sm m-5">
    <div class="card-header">
        <h3 class="card-title">Dashboard Laporan</h3>
    </div>
    <div class="card card-bordered">
        <div class="card-body">
            <div id="chart" style="height: 350px;"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
        $.ajax({
            url: `{{url('api_dashboard')}}`,
            type: "GET", 
            success: function(response) {
                    // console.log("data api dashboard",response)
                    $('#box-user').html(response.data.dataUser)
                    $('#box-A').html(response.data.dataA)
                    $('#box-B').html(response.data.dataB)
                    $('#box-C').html(response.data.dataC)
                    
                    var options = {
                        series: [{
                        name: 'chart',
                        type: 'column',
                        data: [response.data.dataUser,response.data.dataA,response.data.dataB,response.data.dataC]
                        }, {
                        name: 'jumlah',
                        type: 'line',
                        data: [response.data.dataUser,response.data.dataA,response.data.dataB,response.data.dataC]
                        }],
                        chart: {
                        height: 350,
                        type: 'line',
                        },
                        stroke: {
                        width: [0, 4]
                        },
                        title: {
                        text: 'Grafik Laporan'
                        },
                        dataLabels: {
                        enabled: true,
                        enabledOnSeries: [1]
                        },
                        labels: ['Jumlah user','Menunggu Persetujuan', 'Ditolak', 'Disetujui',],
                        xaxis: {
                        type: ''
                        },
                        yaxis: [{
                        title: {
                            text: 'total pengajuan',
                        },
                        
                        }, {
                        opposite: true,
                        title: {
                            text: '-'
                        }
                        }]
                        };

                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    
            },
            error: function(data) { 
                console.log('Error:', data);
            }
        });
</script>
@endsection
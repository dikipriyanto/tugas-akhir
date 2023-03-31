@extends('bengkel.layouts.app')
@section('content')

<div class="panel">
    <form action="{{route('closeOrder')}}" method="POST">
        @csrf
        <button type="submit">{{$dataBengkel->available == 1 ? "TUTUP" : "BUKA"}}</button>
    </form>
    <div id="chartTransaksi"></div>
</div>

<script>
    var total_pesanan = {!! json_encode($month_total) !!};
    var selesai_pesanan = {!! json_encode($month_selesai) !!};
    var batal_pesanan = {!! json_encode($month_batal) !!};
Highcharts.chart('chartTransaksi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'DIAGRAM BATANG PEMESANAN'
    },
    // subtitle: {
    //     text: 'Source: WorldClimate.com'
    // },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'TOTAL PEMESANAN'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true,
    },
    colors: ['#4572A7', '#1fff00', '#ff0000'],
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Pemesanan',
        data: total_pesanan

    }, {
        name: 'Selesai',
        data: selesai_pesanan

    }, {
        name: 'Batal',
        data: batal_pesanan

    }]
});
</script>


@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- apexcharts -->
{{-- <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

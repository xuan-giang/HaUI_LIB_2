@extends('admin.admin_master')
@section('admin')

    <h2 style="text-align: center;">Theo dõi mượn trả trong theo ngày</h2>
    <div class="container-fluid " >
        <div id="barchart_material" style="width: 80%; height: 600px; margin-left: 20%; "></div>
    </div>

    <script type="text/javascript">

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Ngày', 'Lượt mượn', 'Lượt trả'],

                @php
                    foreach($orders as $order) {
                        echo "['".$order->created_at."', ".$order->amount_borrow.", ".$order->amount_return."],";
                    }
                @endphp
            ]);

            var options = {
                chart: {
                    title: 'Biểu đồ so sánh lượt mượn trả',
                    subtitle: 'Bắt đầu từ: @php echo $orders[0]->created_at @endphp',
                },
                bars: 'vertical'
            };
            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

@endsection

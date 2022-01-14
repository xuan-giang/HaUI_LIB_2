@extends('admin.admin_master')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

@section('admin')
    <div class="content-wrapper">
        <h2 style="text-align: center;">Theo dõi mượn trả trong theo ngày</h2>
        <div class="container-fluid ">
            <form method="post" action="{{ route('statistical.store') }}" >
                @csrf
                <div class="row"><div class="md-form "  style="margin-left: 3%">
                        <label><strong>Xem theo :</strong></label><br><div class="controls">
                            Ngày bắt đầu:
                            <input type="date" name="start_date"
                                   class="form-group mr-5" required>

                            Ngày kết thúc: <input class="form-group mr-5" type="date" name="end_date" required>
                            <input type="submit" class="btn btn-rounded btn-info"
                                   value="Lọc">
                        </div>

                    </div> </div>
            </form>
            <div id="barchart_material" style="width: 88%; height: 500px; margin-left: 3%; "></div>
        </div>
    </div>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Ngày', 'Lượt mượn', 'Lượt trả'],

                @php
                    foreach($orders as $order) {
                        echo "['".$order->created_at->format('d-m-Y')."', ".$order->amount_borrow.", ".$order->amount_return."],";
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

    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
@endsection

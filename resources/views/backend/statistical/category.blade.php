@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <h2 style="text-align: center;">THỐNG KÊ DANH MỤC SÁCH</h2>
                <div class="row" style="margin-left: 3%; margin-right: 3%">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thống kê danh mục</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 500px;">
                                <table id="example2" class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="sorting">ID</th>
                                        <th class="sorting">Tên danh mục</th>
                                        <th class="sorting">Số lượng đầu sách</th>
                                        <th class="sorting">Số lượt mượn</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $category )
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td> {{ $category->name }}</td>
                                            <td> {{ $category->amount }}</td>
                                            <?php
                                            $count_book = DB::table('borrow_details')
                                                ->join('books', 'books.id', '=', 'borrow_details.book_id')
                                                ->where('category_id', $category->id)->count('*');
                                            ?>

                                            <td> {{ $count_book }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <div class="container">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3>Biểu đồ biểu diễn số lượng sách</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="pie-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>

        <div class="container row" style=" margin-top: 16px">
            <h1>Biểu đồ danh mục theo số lượt mượn</h1>
            <div class="form-group" style="margin-left: 3%">
                <label><strong>Xem theo :</strong></label>
                <select id='approved' class="form-control" style="width: 200px">
                    <option value="">Chọn tháng</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-12 ml-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
                        <div class="panel-body">
                            <canvas id="canvas" height="180" width="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var name_category = <?php echo $name_category; ?>;
        var amount_borrow = <?php echo $amount_borrow; ?>;
        var barChartData = {
            labels: name_category,
            datasets: [{
                label: 'Số lượt mượn',
                backgroundColor: "pink",
                data: amount_borrow
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly User Joined'
                    }
                }
            });
        };
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(function() {
            Highcharts.chart('pie-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                hoverOffset: 4,
                series: [{
                    name: 'Categories',
                    colorByPoint: true,
                    data: <?= $data ?>
                }]
            });
        });
    </script>
@endsection

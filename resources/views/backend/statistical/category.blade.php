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
    </div>

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

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <h2>Thông tin bạn đọc</h2>
            </div>
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>

                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>134</td>
                                        <td>Jim Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

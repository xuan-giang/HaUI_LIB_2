@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full" style="margin-left: 5%; margin-right: 20%">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Thêm khoa</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('faculty.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nhập tên khoa <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên khoa trong trường đại học">
                                                    <input type="text" name="amount" class="form-control" value="0" style="display: none">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
@endsection

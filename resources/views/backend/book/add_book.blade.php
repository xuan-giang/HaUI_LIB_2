@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full" style="margin-left: 5%; margin-right: 20%">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Thêm sách mới</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Tên sách <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                   placeholder="Nhập tên sách">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Chọn danh mục <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Chọn danh mục
                                                                </option>
                                                                @foreach($categories as $category)
                                                                    <option
                                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Tác giả </h5>
                                                        <div class="controls">
                                                            <input type="text" name="author" class="form-control"
                                                                   placeholder="Nhập họ tên tác giả">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Nhập số lượng sách <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="amount"
                                                                   class="form-control" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Nhà xuất bản</h5>
                                                        <div class="controls">
                                                            <input type="text" name="publisher" class="form-control"
                                                                   placeholder="Nhập tên nhà xuất bản">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Số trang</h5>
                                                        <div class="controls">
                                                            <input type="text" name="page" class="form-control"
                                                                   placeholder="Nhập số trang">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Giá niêm yết</h5>
                                                        <div class="controls">
                                                            <input type="text" name="price" class="form-control"
                                                                   placeholder="Nhập giá niêm yết sau bìa sách">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Ảnh bìa sách <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                   id="image"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage"
                                                                 src="{{ (!empty($book->image))? url('upload/book_images/'.$book->image):url('upload/no_image.jpg') }}"
                                                                 style="width: 100px; width: 100px; border: 1px solid #000000;">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                       value="Submit">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

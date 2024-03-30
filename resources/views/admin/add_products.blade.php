@extends('admin_home')
@section('main')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sản Phẩm
                </header>
                <div class="panel-body">
                    <?php 
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="position-center">
                    <form role="form" action="{{URL::to('/save-products')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình Ảnh</label>
                            <input type="file" name="product_image" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                            <textarea style="resize: none" rows="5" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô Tả Danh Mục"></textarea>
                        </div>
                        <div id="colorInputs">
                            <div class="form-group value">
                                <label for="exampleInputEmail1">Màu Sắc</label>
                                <input type="text" name="color[]" class="form-control" placeholder="Màu Sắc">
                                <button type="button" class="btn btn-danger removeColorBtn">Xóa</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="addColorBtn">Thêm Màu Sắc</button>
                        <div id="sizeInputs">
                            <div class="form-group value">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" name="size[]" class="form-control" placeholder="Size">
                                <button type="button" class="btn btn-danger removeSizeBtn">Xóa</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="addSizeBtn">Thêm Kích Thước</button>                                                                 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputPassword1" placeholder="Giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh Mục Sản Phẩm</label>
                            <select name="product_cate" class="form-control input-lg m-bot15">
                                <option value = "">--Chọn Danh Mục--</option>
                                @foreach($cate_pro as $key)
                                <option value = "{{($key->category_id)}}">{{($key->category_name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Trạng Thái</label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                <option value = "1">Hiện Thị</option>
                                <option value = "0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_products" class="btn btn-info">Thêm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#addColorBtn').click(function(){
            var newInput = '<div class="form-group value">' +
                                '<label for="exampleInputEmail1">Màu Sắc</label>' +
                                '<input type="text" name="color[]" class="form-control" placeholder="Màu Sắc">' +
                                '<button type="button" class="btn btn-danger removeColorBtn">Xóa</button>' +
                            '</div>';
            $('#colorInputs').append(newInput);
        });

        $(document).on('click', '.removeColorBtn', function(){
            $(this).closest('.value').remove();
        });
        $('#addSizeBtn').click(function(){
            var newInput = '<div class="form-group value">' +
                                '<label for="exampleInputEmail1">Size</label>' +
                                '<input type="text" name="size[]" class="form-control" placeholder="Size">' +
                                '<button type="button" class="btn btn-danger removeSizeBtn">Xóa</button>' +
                            '</div>';
            $('#sizeInputs').append(newInput);
        });

        $(document).on('click', '.removeSizeBtn', function(){
            $(this).closest('.value').remove();
        });
    });
</script>
@endsection
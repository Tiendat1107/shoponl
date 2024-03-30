@extends('admin_home')
@section('main')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa Sản Phẩm
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
                        @foreach($edit_products as $key => $product)
                        <form role="form" action="{{URL::to('/update-products/'. $product->product_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình Ảnh</label>
                                    <input type="file" value="{{$product->product_image}}" name="product_image" id="exampleInputFile">
                                    <img src = "{{URL::to('public/uploads/'.$product->product_image)}}" height = "100" width = "100">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                                    <textarea style="resize: none" rows="5"  name="product_content" class="form-control" id="exampleInputPassword1" >{{$product->product_content}}</textarea>
                                </div>
                                <div id="colorInputs">
                                    <div class="form-group value">
                                        <label for="exampleInputEmail1">Màu Sắc</label>
                                        @foreach($list_color as $value )
                                        <input type="text" name="color[]" value="{{$value->color}}" class="form-control" placeholder="Màu Sắc">
                                        <button type="button" class="btn btn-danger removeColorBtn">Xóa</button>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addColorBtn">Thêm Màu Sắc</button>
                                <div id="sizeInputs">
                                    <div class="form-group value">
                                        <label for="exampleInputEmail1">Size</label>
                                        @foreach($list_size as $value)
                                        <input type="text" name="size[]" value="{{$value->size}}" class="form-control" placeholder="Size">
                                        <button type="button" class="btn btn-danger removeSizeBtn">Xóa</button>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addSizeBtn">Thêm Kích Thước</button>                                                                 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá</label>
                                    <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control" id="exampleInputPassword1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh Mục Sản Phẩm</label>
                                    <select name="product_cate" class="form-control input-lg m-bot15">
                                        @foreach($cate_pro as $key => $id)
                                            @if($id->category_id==$product->category_id)
                                            <option selected value = "{{($id->category_id)}}">{{($id->category_name)}}</option>
                                            @else
                                            <option value = "{{($id->category_id)}}">{{($id->category_name)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            <button type="submit" name="add_products" class="btn btn-info">Thêm</button>
                        </form>
                        </div>
                        @endforeach
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
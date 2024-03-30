@extends('admin_home')
@section('main')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Danh Mục Sản Phẩm
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
                    <form role="form" action="{{URL::to('/save-category-products')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thứ Tự</label>
                            <input type="text" name="category_number" class="form-control" id="exampleInputPassword1" placeholder="Thứ Tự">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Trạng Thái</label>
                            <select name="category_status" class="form-control input-lg m-bot15">
                                <option value = "1">Hiện Thị</option>
                                <option value = "0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_category_products" class="btn btn-info">Thêm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>
@endsection
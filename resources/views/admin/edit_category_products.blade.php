@extends('admin_home')
@section('main')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa Danh Mục Sản Phẩm
                </header>
                <div class="panel-body">
                    <?php 
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    @foreach($edit_category_products as $key)
                    <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-products/'. $key->category_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" value="{{$key->category_name}}" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thứ Tự</label>
                            <input type="text" value="{{$key->category_number}}" name="category_number" class="form-control" id="exampleInputPassword1" placeholder="Thứ Tự">
                        </div>
                        <button type="submit" name="add_category_products" class="btn btn-info">Thêm</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>
    </div>
</div>
@endsection
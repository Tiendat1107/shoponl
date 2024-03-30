@extends('admin_home')
@section('main')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                @php $firstIteration = true; @endphp
            @foreach($list as $attr)
            @if($firstIteration)
            <header class="panel-heading">
                Sản Phẩm: {{ $attr->product_name }}
            </header>
            @php $firstIteration = false; @endphp
            @endif
            @endforeach
            </header>
            <div class="panel-body">
                <?php 
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                @foreach($list as $attr)
                <div class="panel-body">
                    <div class="row">
                    <form role="form" action="{{URL::to('/update-attribute/'.$attr->id_product)}}" method="post">                        
                        {{ csrf_field() }}                       
                        <div class="col-md-2 form-group">
                            <label for="color">Màu: {{ $attr->color }}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="size">Size: {{ $attr->size }}</label>
                        </div>                        
                        <div class="col-md-8 form-group">
                            <label for="exampleInputEmail1">Số Lượng</label>
                            <input type="text" value="{{$attr->quantity}}" name="quantity[]" class="form-control" id="exampleInputEmail1" placeholder="Nhập Số Lượng">
                        </div>
                        <br></br>
                    </div>
                </div>
                @endforeach
                <div class="position-center">
                <button type="submit" name="edit_value_products" class="btn btn-info">Thêm</button>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection 

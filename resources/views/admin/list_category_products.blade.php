@extends('admin_home')
@section('main')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Danh Mục Sản Phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Danh Mục</option>
            <option value="1">Thứ Tự</option>
            <option value="2">Trạng Thái</option>
            <option value="3">Quản Lý</option>
          </select>
          <button class="btn btn-sm btn-default">Lọc</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Tìm</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        @php 
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
        }
        @endphp
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Danh Mục</th>
              <th>Thứ Tự</th>
              <th>Trạng Thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_category_products as $key)    
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$key->category_name}}</td>
              <td><span class="text-ellipsis">{{$key->category_number}}</span></td>
              <td><span class="text-ellipsis">
                @php
                  if($key->category_status==0){
                    echo '<a href="' . URL::to('/unactive-cate-pro/' . $key->category_id) . '"><span class="fa-regular fa-eye-slash"></span></a>'; 
                  }else{
                    echo '<a href ="' . URL::to('/active-cate-pro/' . $key->category_id) . '"><span class = "fa-regular fa-eye"></span></a>';
                  }
                @endphp              
              </span></td>
              <td>
                <a href="{{URL::to('/edit-category-products/'. $key->category_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil square text-success text-active"></i>
                </a>
              </td>
              <td>
                <a onclick="return confirm('Bạn có chắc chắn xóa?')" href="{{URL::to('/remove-category-products/'. $key->category_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm"></small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
</div>
@endsection
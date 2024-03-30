@extends('welcome')
@section('main')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Features Items</h2>
	@foreach ($new_pro as $key=> $pro)
	<a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{URL::to('public/uploads/'.$pro->product_image)}}" alt="" />
						<h2>{{number_format($pro->product_price).' '.'VNĐ'}}</h2>
						<p>{{$pro->product_name}}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
			</div>
		</div>
	</div>
	</a>
	@endforeach
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@foreach ($cate_pro as $key)
				<li class="{{ $loop->first ? 'active' : '' }}"><a href="{{ URL::to('/danh-muc-san-pham/'.$key->category_id) }}" data-toggle="tab">{{ $key->category_name }}</a></li>
			@endforeach
			
		</ul>
	</div>
	
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{('public/view/images/gallery1.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>	
					</div>
				</div>
			</div>	
		</div>
	</div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{('public/view/images/recommend1.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->
@endsection

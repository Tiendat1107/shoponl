@extends('welcome')
@section('main')
	@foreach ($pro_details as $key=> $pro) 
	<div class="product-details">
		<div class="col-sm-5">
			<div class="view-product">
					<img src="{{ URL::to('public/uploads/' . $pro->product_image) }}" alt="" />
				<h3>ZOOM</h3>
			</div>
			<div id="similar-product" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<a href=""><img src="{{asset('public/view/images/similar1.jpg')}}" alt=""></a>
							<a href=""><img src="{{asset('public/view/images/similar2.jpg')}}" alt=""></a>
							<a href=""><img src="{{asset('public/view/images/similar3.jpg')}}" alt=""></a>
						</div>
						<div class="item">
							<a href=""><img src="{{asset('public/view/images/similar1.jpg')}}" alt=""></a>
							<a href=""><img src="{{asset('public/view/images/similar2.jpg')}}" alt=""></a>
							<a href=""><img src="{{asset('public/view/images/similar3.jpg')}}" alt=""></a>
						</div>
						<div class="item">
							<a href=""><img src="{{asset('public/view/images/similar1.jpg')}}" alt=""></a>
							<a href=""><img src="{{asset('public/view/images/similar2.jpg')}}" alt=""></a>
							<a href=""><img src="{{asset('public/view/images/similar3.jpg')}}" alt=""></a>
						</div>
						
					</div>
					<a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					</a>
					<a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
					</a>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="product-information">
				<img src="{{asset('public/view/images/new.jpg')}}" class="newarrival" alt="" />
				<h2>{{$pro->product_name}}</h2>
				<p>Web ID: 1089772</p>
				<h3 class="font-weight-semi-bold mb-4">{{number_format($pro->product_price).' '.'VNĐ'}}</h3>
				<img src="{{asset('public/view/images/rating.png')}}" alt="" />
				
				
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> E-SHOPPER</p>
				<div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        @foreach ($list_size as $key) 
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-{{$key->id}}" name="size">
                            <label class="custom-control-label" for="size-{{$key->id}}">{{$key->size}}</label>
                        </div>
                        @endforeach
                    </form>
                </div>
                
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        @foreach ($list_color as $key)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-{{$key->id}}" name="color">
                            <label class="custom-control-label" for="color-{{$key->id}}">{{$key->color}}</label>
                        </div>
                        @endforeach
                    </form>
                </div>
                
				<a href=""><img src="{{asset('public/view/images/share.png')}}" class="share img-responsive"  alt="" /></a>
				<div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
			</div>
		</div>
	</div>
		<div class="category-tab shop-details-tab"><!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li><a href="#details" id="details" data-toggle="tab">Mô tả sản phẩm</a></li>
					<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
					<li><a href="#tag" data-toggle="tab">Tag</a></li>
					<li class="active"><a href="#reviews" id="reviews" data-toggle="tab">Reviews (5)</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade" id="details" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					
				
				<div class="tab-pane fade" id="companyprofile" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade" id="tag" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/gallery4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade active in" id="reviews" >
					<div class="col-sm-12">
						<ul>
							<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
							<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
							<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						<p><b>Write Your Review</b></p>
						
						<form action="#">
							<span>
								<input type="text" placeholder="Your Name"/>
								<input type="email" placeholder="Email Address"/>
							</span>
							<textarea name="" ></textarea>
							<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
							<button type="button" class="btn btn-default pull-right">
								Submit
							</button>
						</form>
					</div>
				</div>
				
			</div>
		</div><!--/category-tab-->
		
	
	@endforeach 
@endsection
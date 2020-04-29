@extends('layouts.app')

@section('content')


<!-- Product Details Section Begin -->
	<section class="product-details spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product__details__pic">
						<div class="product__details__pic__item">
							<img class="product__details__pic__item--large"
								src="{{ asset('img/product/'.$thumb->name)}}" alt="">
						</div>
						<div class="product__details__pic__slider owl-carousel">
							@foreach($product->images as $image)
							<img data-imgbigurl="{{ asset('img/product/'.$image->name)}}"
								src="{{ asset('img/product/'.$image->name) }}" alt="">
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="product__details__text">
						<h3>{{ $product->name }}</h3>
						<div class="product__details__price">{{ rupiah($product->price)}}</div>
						<p>{{ $product->summary }}</p>
						<a href="#" class="primary-btn" style="text-decoration: none;">Wishlist <span class="icon_heart_alt"></span></a>
						<ul>
							<li><b>Availability</b> <span>{{ $product->status }}</span></li>
							<li><b>Weight</b> <span>{{ $product->weight }} kg</span></li>
							<li><b>Share on</b>
								<div class="share">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="product__details__tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
									aria-selected="true">Description</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								<div class="product__details__tab__desc">
									<h6>Products Infomation</h6>
									<p>{{ $product->description }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Details Section End -->

	<!-- Related Product Section Begin -->
	<section class="related-product">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title related__product__title">
						<h2>Related Product</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				@foreach($relatedProducts as $product)
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="product__item">
						<?php 
							$images = [];
							foreach ($product->images as $image) {
							  array_push($images, $image->name);
							}
							$thumb = reset($images);
						 ?>
						<div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/'.$thumb)}}">
							<ul class="product__item__pic__hover">
								<li><a href="#"><i class="fa fa-heart"></i></a></li>
								<li><a href="#"><i class="fa fa-retweet"></i></a></li>
							</ul>
						</div>
						<div class="product__item__text">
							<h6><a href="{{ route('shop.product.detail', ['id' => $product->id, 'slug' => str_replace(' ', '-', strtolower($product->name))]) }}">{{ $product->name}}</a></h6>
							<h5>{{ rupiah($product->price) }}</h5>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Related Product Section End -->
@endsection
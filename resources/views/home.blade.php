@extends('layouts.app')

@section('content')	

	<!-- Hero Section Begin -->
	<section class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="hero__categories">
						<div class="hero__categories__all">
							<i class="fa fa-bars"></i>
							<span>All Categories</span>
						</div>
						<ul>
							@foreach($categories as $cat)
							@if($cat->parent_id == null)
							<li><a href="{{ route('shop.categories', ['id' => $cat->id, 'slug' => str_replace(' ', '-', strtolower($cat->name))]) }}">{{ $cat->name }}</a></li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					
					<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
						<div class="hero__text">
							<span>FRUIT FRESH</span>
							<h2>Vegetable <br />100% Organic</h2>
							<p>Free Pickup and Delivery Available</p>
							<a href="#" class="primary-btn">SHOP NOW</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Section End -->

	<!-- Categories Section Begin -->
	<section class="categories">
		<div class="container">
			<div class="row">
				<div class="categories__slider owl-carousel">
					@foreach($categories as $cat)
					@if($cat->parent_id == null)
					<div class="col-lg-3">
						<div class="categories__item set-bg" data-setbg="{{ asset('img/categories/'.$cat->image)}}">
							<h5><a href="{{ route('shop.categories', ['id' => $cat->id, 'slug' => str_replace(' ', '-', strtolower($cat->name))]) }}">{{ strtolower($cat->name) }}</a></h5>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- Categories Section End -->

	<!-- Featured Section Begin -->
	<section class="featured spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Featured Product</h2>
					</div>
					<div class="featured__controls">
						<ul>
							<li class="active" data-filter="*">All</li>
							@foreach($featuredProductsCat as $cat)
							<li data-filter=".{{ str_replace(' ', '-', strtolower($cat->name)) }}">{{ $cat->name }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="row featured__filter justify-content-center">
				@foreach($featuredProducts as $featuredProduct)
				<div class="col-lg-3 col-md-4 col-sm-6 mix {{ str_replace(' ', '-', strtolower($featuredProduct->product->category->name)) }}">
					<div class="featured__item">
						<?php 
							$images = [];
							foreach ($featuredProduct->product->images as $image) {
							  array_push($images, $image->name);
							}
							$thumb = reset($images);
						 ?>
						<div class="featured__item__pic set-bg" data-setbg="{{ asset('img/product/'.$thumb)}}">
							<ul class="featured__item__pic__hover">
								<li><a href="#"><i class="fa fa-heart"></i></a></li>
								<li><a href="{{ route('shop.product.detail', ['id' => $featuredProduct->product_id , 'slug' => str_replace(' ', '-', strtolower($featuredProduct->product->name )) ]) }}"><i class="fa fa-search"></i></a></li>
							</ul>
						</div>
						<div class="featured__item__text">
							<h6><a href="{{ route('shop.product.detail', ['id' => $featuredProduct->product_id , 'slug' => str_replace(' ', '-', strtolower($featuredProduct->product->name )) ]) }}">{{ $featuredProduct->product->name }}</a></h6>
							<h5>{{ rupiah($featuredProduct->product->price) }}</h5>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Featured Section End -->

	<!-- Banner Begin -->
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="banner__pic">
						<img src="{{ asset('img/banner/banner-1.jpg')}}" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="banner__pic">
						<img src="{{ asset('img/banner/banner-2.jpg')}}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Banner End -->

	<!-- Latest Product Section Begin -->
	<section class="latest-product spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="latest-product__text">
						<h4>Latest Products</h4>
						<div class="latest-product__slider owl-carousel">
							<?php $i = 1; $l = 1;?>
                @foreach($latestProducts as $latest)
                <?php if ($i == 1) { ?>

                <div class="latest-prdouct__slider__item">
                <?php } 
                  $i++; 
                  $images = [];
                  foreach ($latest->images as $image) {
                    array_push($images, $image->name);
                  }
                  $thumb = reset($images);
                ?>

                  <a href="{{ route('shop.product.detail', ['id' => $latest->id, 'slug' => str_replace(' ', '-', strtolower($latest->name))] ) }}" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{ asset('img/product/'.$thumb)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{ $latest->name}}</h6>
                      <span>{{ rupiah($latest->price) }}</span>
                    </div>
                  </a>
                @if($i > 3 || $l == count($latestProducts))

                </div>
                @endif
                <?php 
                  if ($i > 3) {
                    $i = 1;
                  }
                  $l++;
                 ?>
                @endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="latest-product__text">
						<h4>Top Rated Products</h4>
						<div class="latest-product__slider owl-carousel">
							<?php $i = 1; $l = 1;?>
							@foreach($latestProducts as $latest)
							<?php if ($i == 1) { ?>

							<div class="latest-prdouct__slider__item">
							<?php } 
							  $i++; 
							  $images = [];
							  foreach ($latest->images as $image) {
							    array_push($images, $image->name);
							  }
							  $thumb = reset($images);
							?>

							  <a href="#" class="latest-product__item">
							    <div class="latest-product__item__pic">
							      <img src="{{ asset('img/product/'.$thumb)}}" alt="">
							    </div>
							    <div class="latest-product__item__text">
							      <h6>{{ $latest->name}}</h6>
							      <span>{{ rupiah($latest->price) }}</span>
							    </div>
							  </a>
							@if($i > 3 || $l == count($latestProducts))

							</div>
							@endif
							<?php 
							  if ($i > 3) {
							    $i = 1;
							  }
							  $l++;
							 ?>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="latest-product__text">
						<h4>Review Products</h4>
						<div class="latest-product__slider owl-carousel">
							<?php $i = 1; $l = 1;?>
                @foreach($latestProducts as $latest)
                <?php if ($i == 1) { ?>

                <div class="latest-prdouct__slider__item">
                <?php } 
                  $i++; 
                  $images = [];
                  foreach ($latest->images as $image) {
                    array_push($images, $image->name);
                  }
                  $thumb = reset($images);
                ?>

                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{ asset('img/product/'.$thumb)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{ $latest->name}}</h6>
                      <span>{{ rupiah($latest->price) }}</span>
                    </div>
                  </a>
                @if($i > 3 || $l == count($latestProducts))

                </div>
                @endif
                <?php 
                  if ($i > 3) {
                    $i = 1;
                  }
                  $l++;
                 ?>
                @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Latest Product Section End -->

	<!-- Blog Section Begin -->
	<section class="from-blog spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title from-blog__title">
						<h2>From The Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<img src="{{ asset('img/blog/blog-1.jpg')}}" alt="">
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i> May 4,2019</li>
								<li><i class="fa fa-comment-o"></i> 5</li>
							</ul>
							<h5><a href="#">Cooking tips make cooking simple</a></h5>
							<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<img src="{{ asset('img/blog/blog-2.jpg')}}" alt="">
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i> May 4,2019</li>
								<li><i class="fa fa-comment-o"></i> 5</li>
							</ul>
							<h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
							<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<img src="{{ asset('img/blog/blog-3.jpg')}}" alt="">
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i> May 4,2019</li>
								<li><i class="fa fa-comment-o"></i> 5</li>
							</ul>
							<h5><a href="#">Visit the clean farm in the US</a></h5>
							<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Section End -->
	@endsection
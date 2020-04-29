@extends('layouts.app')

@section('content')
<!-- Hero Section Begin -->
<section class="hero hero-normal">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="hero__categories">
          <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>{{ $category->name }}</span>
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
        <div class="hero__search">
          <div class="hero__search__form">
            <form action="#">
              <input type="text" placeholder="What do yo u need?">
              <button type="submit" class="site-btn">SEARCH</button>
            </form>
          </div>
          <div class="hero__search__phone">
            <div class="hero__search__phone__icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="hero__search__phone__text">
              <h5>+65 11.188.888</h5>
              <span>Call Us</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5">
        <div class="sidebar">
          @if(count($category->child) > 0)
          <div class="sidebar__item">
            <h4>Kategori {{ $category->name }}</h4>
            <ul>
              @foreach($category->child as $subcat)
              <li><a href="{{ route('shop.subcategories', ['id' => $subcat->id, 'slug' => str_replace(' ', '-', strtolower($subcat->name)), 'parent_id' => $category->id ]) }}">{{ $subcat->name }}</a></li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="sidebar__item">
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
        </div>
      </div>
      <div class="col-lg-9 col-md-7">
        <div class="section-title product__discount__title">
          <h2>{{ $category->name }}</h2>
        </div>
        <div class="row">
          @foreach($products as $product)
          <?php 
              $images = [];
              foreach ($product->images as $image) {
                array_push($images, $image->name);
              }
              $thumb = reset($images);
             ?>
          <div class="col-lg-4 col-md-8 col-sm-8" >
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/'.$thumb)}}">
                <ul class="product__item__pic__hover">
                  <li><a href="#"><i class="fa fa-heart"></i></a></li>
                  <li><a href="{{ route('shop.product.detail', ['id' => $product->id, 'slug' => str_replace(' ', '-', strtolower($product->name))] ) }}"><i class="fa fa-search"></i></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="{{ route('shop.product.detail', ['id' => $product->id, 'slug' => str_replace(' ', '-', strtolower($product->name))] ) }}">{{ $product->name }}</a></h6>
                <h5>{{ rupiah($product->price) }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{ $products->links('partials.pagination') }}
      </div>
    </div>
  </div>
</section>
<!-- Product Section End -->

@endsection
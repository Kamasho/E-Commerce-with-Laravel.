@extends('layouts.front')

@section('title')
    welcome Uhakika shopping
@endsection

@section('content')
@include("layouts.inc.slider")
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Feature Products</h2>
                <div class="owl-carousel feature_carousel owl-theme">
                    @foreach ($feature_product as $prod)
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="Product image">
                        <div class="card-body">
                            <h5>{{ $prod->name }}</h5>
                            <span class="float-start">{{ $prod->selling_price }}</span>
                            <span class="float-end"><s>{{ $prod->orginal_price }}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel feature_carousel owl-theme">
                    @foreach ($category_product as $category)
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Product image">
                        <div class="card-body">
                            <h5>{{ $category->name }}</h5>
                            <p>
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $('.feature_carousel').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

    </script>
@endsection

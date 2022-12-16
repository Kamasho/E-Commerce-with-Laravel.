@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>

                @foreach ($product as $prod)
            <div class="item">
                <div class="col-md-3 mb-3">
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
@endsection

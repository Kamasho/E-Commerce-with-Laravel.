@extends('layouts.front')

@section('title', $products->name)

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$products->category->name}} / {{$products->name}} </h6>
    </div>
</div>
<div class="container">
   <div class="card shadow product_data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{ asset('assets/uploads/product/'.$products->image) }}" alt="product image" class="w-100">
            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{$products->name}}
                    @if($products->trending == '1')
                    <label class="float-end badge bg-danger trending_tag" style="font-size: 16px;">Trending</label>
                    @endif
                </h2>
                <hr>
                <label class="me-2">Original Price : <s>Tsh {{$products->orginal_price}}</s></label>
                <label class="me-2">Selling Price : Tsh {{$products->selling_price}}</label>
                <p class="mt-3">
                    {!! $products->small_description !!}
                </p>
                <hr>
                @if($products->quantity > 0)
                    <label class="badge bg-success">In stock</label>
                @else
                    <label class="badge bg-danger">Out of stock</label>
                @endif
                <div class="mt-2">
                    <div class="col-md-2">
                        <input type="hidden" value="{{ $products->id }}" class="product_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control text-center quantity-input" />
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <br/>
                        <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist</button>
                        <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="mt-4">
    <h3>Descriptions</h3>
    <h6>{{$products->description}}</h6>
   </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            //for increment product
            $('.increment-btn').click(function(e){
                e.preventDefault();
                var increment_value = $('.quantity-input').val();
                var value = parseInt(increment_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10){
                    value++;
                    $('.quantity-input').val(value);
                }
            });

            //for decrement product
            $('.decrement-btn').click(function(e){
                e.preventDefault();
                var decrement_value = $('.quantity-input').val();
                var value = parseInt(decrement_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1){
                    value--;
                    $('.quantity-input').val(value);
                }
            });

            //Add to Carts
            $('.addToCartBtn').click(function(e){
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();

                // alert(product_id);
                // alert(product_quantity);
                $.ajaxSetup({
                    header: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/add-to-cart", 
                    data: {
                        'product_id' : product_id,
                        'product_quantity' : product_quantity
                    },
                    success: function(response){
                        alert(response.status);
                    }
                });
            });
        });
    </script>
@endsection
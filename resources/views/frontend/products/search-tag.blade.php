@extends('layouts.app')
@section('title','Search Result')
@section('bodyID','Home-Body')
@section('content')


    <!-- Start page structure -->

    <section id="category-img">
        <div class="container text-center">
            <h2 style="position:relative;z-index:666;padding-top: 50px;color: #fff;font-size: 50px">
                Search Result
            </h2>
        </div>
    </section>


    <div class="container mt-2 pt-2 single-product">

        <div class="row" id="products">

            @if(! empty($productsTag))

                @foreach($productsTag as $sp)
                    <div class="col-md-3 mb-3">
                        <a style="text-decoration: none;" href="{{route('products.single',$sp->id)}}">
                            <div class="single-product text-center">
                                <span class="product-price">{{$sp->product_price}} L.E</span>
                                <div class="product-img">
                                    @if($sp->productImgs()->count() !== 0)
                                        @foreach($sp->productImgs as $image)
                                            @if($loop->last)
                                                <img style="width:100%;height:180px;border-radius: 5px;border:1px solid #f5f5f5" src="{{asset('images/productimgs/'. $image->images)}}" alt=""/>
                                            @endif
                                        @endforeach
                                    @else
                                        <img style="width:100%;height:100%;" src="{{asset('images/shop-placeholder.png')}}" alt=""/>
                                    @endif

                                </div>

                                <div class="product-info">
                                    <span class="product-name d-block">{{ substr($p->product_name, 0,  20) }}</span>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                There is no result
            @endif


        </div>

    </div>






@endsection

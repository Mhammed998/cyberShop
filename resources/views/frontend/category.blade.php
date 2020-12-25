@extends('layouts.app')
@section('title','CyberShop | category-products')
@section('bodyID','home-Body')
@section('content')



    <div class="home-content">

     <section id="category-img">
         <div class="container text-center">
            <h2 style="position:relative;z-index:666;padding-top: 40px;color: #fff;font-size: 40px">
                {{$category->cate_name}}
            </h2>
         </div>
     </section>


        <div class="container">

            <div class="row mt-5 mb-5 main-row">

                <!-- Start Filter section -->

                <div class="col-md-3 mb-5">
                    <div class="card">
                        <div class="card-header pl-2 p-1 text-left">
                            <h5><i class="fa fa-filter" aria-hidden="true"></i> Filters </h5>
                        </div>
                        <div class="card-body">
                            <div class="search">
                                <form action="{{route('products.searchProduct')}}" method="GET" class="form-inline ">
                                    <input  name="product_name" class="form-control" type="search" placeholder="Search By Name" aria-label="Search" autocomplete="off">
                                    <button class="btn btn-outline-success  m-1 btn-sm" type="submit">Search</button>
                                </form>

                            </div>

                            <hr class="pb-2 m-0">

                            <div class="tags">
                                <h6> Category Tags:</h6>
                                @if(! empty($category->products))
                                    @foreach($tags= DB::Table('products')->distinct()->where('category_id','=',$category->id)->get(['tags']) as $ptag)
                                        @foreach($ptag as $tag)
                                            @foreach(explode("," , $tag ) as $t )
                                                <a class="mr-1 mb-1  btn btn-sm btn-outline-primary" style="color:#444;text-decoration: none; " href="#">
                                                    {{$t}}
                                                </a>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @else
                                    There Is No Tag Yet
                                @endif
                            </div>






                        </div>
                    </div>
                </div>
                <!-- End Filter section -->

                <!-- Start Products section -->
                <div class="col-md-9">
                    <div class="row justify-content-center mt-4" id="products">

                        @if($category->products->count() !== 0)
                            @foreach($category->products as $product)

                                <div class="col-md-3 mb-3">
                                    <a style="text-decoration: none;" href="{{route('products.single',$product->id)}}">
                                        <div class="single-product text-center">
                                            <span class="product-price">{{$product->product_price}} L.E</span>
                                            <div class="product-img">
                                                @if($product->productImgs()->count() !== 0)
                                                    @foreach($product->productImgs as $image)
                                                        @if($loop->last)
                                                            <img style="width:100%;height:180px;" src="{{asset('images/productimgs/'. $image->images)}}" alt=""/>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img style="width:100%;height:100%;" src="{{asset('images/shop-placeholder.png')}}" alt=""/>
                                                @endif

                                            </div>
                                            <div class="product-info">
                                                <span class="product-name d-block">{{ substr($product->product_name, 0,  20) }}</span>

                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach

                            <div class="col-md-12 ">

                            </div>

                        @else
                            There is no product yet
                        @endif

                    </div>
                </div>


                <!-- End Products section -->

            </div>

        </div>






    </div>






    @include('parts.footer')
@endsection



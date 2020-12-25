@extends('layouts.app')
@section('title','CyberShop')
@section('bodyID','home-Body')
@section('content')



    <div class="home-content">

    <!--start carousel bootstrap -->


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('images/slide1.jpg')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Hello every body welcome to Cybershop</h5>
                            <p>Navbars are responsive by default, but you can easily modify them to change that. Responsive behavior depends on our Collapse JavaScript plugin.
                                Navbars are hidden by default when printing. Force them to be printed by adding </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('images/slide2.jpg')}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Hello every body welcome to Cybershop</h5>
                            <p>
                                Navbars are responsive by default, but you can easily modify them to change that. Responsive behavior depends on our Collapse JavaScript plugin.
                                Navbars are hidden by default when printing. Force them to be printed by adding
                            </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('images/slide3.jpg')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Hello every body welcome to Cybershop</h5>
                            <p>
                                Navbars are responsive by default, but you can easily modify them to change that. Responsive behavior depends on our Collapse JavaScript plugin.
                                Navbars are hidden by default when printing. Force them to be printed by adding
                            </p>
                        </div>
                    </div>
                </div>



                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

    <!-- end carousel bootstrap -->






    <div class="container">


    <div class="row mt-4 main-row">

        <!-- Start Filter section -->

                <div class="col-md-3">
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
                    <h6> Tags:</h6>
                    @if(! empty($tags))
                        @foreach($tags as $ptag)
                            @foreach($ptag as $tag)
                                @foreach(explode("," , $tag ) as $t )

                        <a class="mr-1 mb-1  btn btn-sm btn-outline-primary" style="color:#444;text-decoration: none; " href="{{route('products.searchByTags',$t)}}">
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
                    <div class="row  mt-4" id="products">

                        @if($products->count() !== 0)
                            @foreach($products as $product)

                            <div class="col-md-3 mb-3">
                                <a style="text-decoration: none;" href="{{route('products.single',$product->id)}}">
                                <div class="single-product text-center">
                                    <span class="product-price">{{$product->product_price}} L.E</span>
                                    <div class="product-img">
                                    @if($product->productImgs()->count() !== 0)
                                    @foreach($product->productImgs as $image)
                                        @if($loop->last)
                                    <img style="width:100%;height:180px;border-radius: 5px;border:1px solid #f5f5f5"
                                         src="{{asset('images/productimgs/'. $image->images)}}" alt=""/>
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
                                {{ $products->links() }}
                            </div>

                        @else
                        There is no product yet
                        @endif

                    </div>
                </div>

        <!-- End Products section -->

        </div>

    </div>


        <section class="mt-5 mb-5 p-2" id="services">
            <div class="container">
                <h3 style="color:#555;text-align: center;"> Our Services</h3>

                <div class="row mt-3 mb-3 p-4">

                    <div class="col-md-3 mb-2">
                        <div style="box-shadow:3px 5px 6px #ccc;padding: 15px 5px;border-radius: 5px;" class="service">
                            <i style="font-size: 50px;color:#FB6109;"  class="fa fa-certificate mb-2"></i>
                            <div class="text-left d-inline-block ml-2">
                                <h5 class="d-inline-block mt-0 bt-0">Work Experience</h5>
                                <p>lorem lorem lorem lorem lorem lorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-2">
                        <div style="box-shadow:3px 5px 6px #ccc;padding: 15px 5px;border-radius: 5px;" class="service">
                            <i style="font-size: 50px;color:#FB6109;"  class="fa fa-bus mb-2"></i>
                            <div class="text-left d-inline-block ml-2">
                            <h5 class="d-inline-block mt-0 bt-0">Fast Delivery</h5>
                                <p>lorem lorem lorem lorem lorem lorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-2">
                        <div style="box-shadow:3px 5px 6px #ccc;padding: 15px 5px;border-radius: 5px;" class="service">
                            <i style="font-size: 50px;color:#FB6109;" class="fa fa-headphones mb-2"></i>
                            <div class="text-left d-inline-block ml-2">
                            <h5 class="d-inline-block mt-0 bt-0">24 Hour Consult</h5>
                                <p>lorem lorem lorem lorem lorem lorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-2">
                        <div style="box-shadow:3px 5px 6px #ccc;padding: 15px 5px;border-radius: 5px;" class="service">
                            <i style="font-size: 50px;color:#FB6109;" class="fa fa-paypal mb-2"></i>
                            <div class="text-left d-inline-block ml-2">
                            <h5 class="d-inline-block mt-0 bt-0">Payment methods</h5>
                                <p>lorem lorem lorem lorem lorem lorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>





    </div>






    @include('parts.footer')
@endsection



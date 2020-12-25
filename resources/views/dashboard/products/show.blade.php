@extends('main.app')
@section('title','Products')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')



    <div class="container product.show justify-content-center">

        <h3 class="mt-3 ml-3">Show single product</h3>

        <div class="card mt-3">
            <h5 class="card-header  text-left">
                Product details

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#editModal">
                   <i class="fa fa-pencil"></i> Edit product
                </button>




            </h5>

            <div class="card-body">


                <div class="row">

                     <div class="col-md-4">
                        <div class="gallery">
                           @if($product->productImgs()->count() !== 0)
                               @foreach($product->productImgs as $image)


                                 <img class="mb-2 mr-2" src="{{asset('images/productimgs/' . $image->images)}}" alt="product-img"
                                      style="height: 100px;width:47%;display: inline-block">


                                 @endforeach
                               @else
                                <img class="mb-2 mr-2" src="https://via.placeholder.com/300/555/fff.png C/O https://placeholder.com/" alt="product-img"
                                     style="height: 100px;width:47%;display: inline-block">
                                <img class="mb-2 mr-2" src="https://via.placeholder.com/300/555/fff.png C/O https://placeholder.com/" alt="product-img"
                                     style="height: 100px;width:47%;display: inline-block">
                                <img class="mb-2 mr-2" src="https://via.placeholder.com/300/555/fff.png C/O https://placeholder.com/" alt="product-img"
                                     style="height: 100px;width:47%;display: inline-block">
                                <img class="mb-2 mr-2" src="https://via.placeholder.com/300/555/fff.png C/O https://placeholder.com/" alt="product-img"
                                     style="height: 100px;width:47%;display: inline-block">
                             @endif
                               <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#exampleModal">
                                   Add Images
                               </button>
                        </div>
                     </div>

                    <div class="col-md-8">
                        <div class="product-info">
                           <h4>{{$product->product_name}}</h4>
                            <p>{!! $product->product_desc  !!}</p>

                            <hr>

                            <h3>Price: {{$product->product_price}} L.E</h3>
                            <h5>Available : <span class="badge badge-dark"> {{$product->quantity}} </span> </h5>

                            <h5>Status: <span class="badge badge-warning"> {{$product->product_status}}</span></h5>
                             <hr>

                            <h5>Tags:</h5>

                            <div class="tags">
                                @if(! empty($product->tags))
                                @foreach(explode(',',$product->tags) as $tag )
                                    <a href="#" class="btn btn-sm btn-success text-white">{{strtolower($tag)}}</a>
                                @endforeach
                                 @endif
                            </div>

                        </div>
                    </div>

                </div>


            </div>

        </div>





        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Images To Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">




                        <form method="post" action="{{route('productimgs.store')}}" enctype="multipart/form-data">
                           @csrf

                            <div class="input-group control-group increment" >
                                <input type="file" name="filename[]" multiple="true" class="form-control">
                            </div>

                            <div class="input-group control-group increment" >
                                <input type="hidden" name="product_id" value="{{$product->id}}" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary" style="margin-top:10px">Add Images</button>

                        </form>



                    </div>
                </div>
            </div>
        </div>


        <!-- Edit Product Modal -->

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="create-product mt-4" action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Product Name:</label>
                                <input class="form-control" type="text" name="product_name"
                                       value="{{$product->product_name}}"
                                       autocomplete="off">
                            </div>


                            <div class="form-group">
                                <input id="x" type="hidden" name="product_desc"
                                       value="{{$product->product_desc}}" >
                                <trix-editor input="x"></trix-editor>
                            </div>

                            <div class="form-group">
                                <label>Product Price:</label>
                                <input class="form-control" type="text" name="product_price"   value="{{$product->product_price}}" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Quantity of product:</label>
                                <input class="form-control" type="text" name="quantity"   value="{{$product->quantity}}" autocomplete="off">
                            </div>





                            <div class="form-group">
                                <label>Category:</label>
                                <select required class="form-control" name="category_id">
                                    @if($categories->count() !== 0)

                                        @foreach($categories->where('parent_id','=',0) as $cate)
                                            <option      @if($cate->id == $product->category_id)
                                                         selected
                                                         @endif value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                            @foreach($categories->where('parent_id','=',$cate->id) as $sub)
                                                <option
                                                    @if($sub->id == $product->category_id)
                                                    selected
                                                    @endif
                                                    value="{{$sub->id}}">---{{$sub->cate_name}}</option>
                                            @endforeach
                                        @endforeach

                                    @else
                                        <option>No Categories Exist</option>
                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Tags:</label>
                                <input value="{{$product->tags}}"  type="text" name="tags" class="form-control" placeholder="Add Some Tags With (,) separate"/>
                            </div>



                            <div class="form-group">
                                <button  class="btn btn-primary" type="submit">SAVE</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>





    </div>





@endsection

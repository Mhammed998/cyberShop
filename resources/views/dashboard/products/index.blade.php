@extends('main.app')
@section('title','Products')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')

    <div class="container products">
        <h3 class="mt-3 ml-3">Manage Products</h3>



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif






        <div class="card mt-3">
            <h5 class="card-header text-left">
                Products

                <form action="{{route('products.search')}}" method="GET" class="form-inline  float-right">
                    <input name="product_name" class="form-control mr-sm-2" type="search" placeholder="Search By Name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target=".bd-example-modal-xl">
                    Create New Product <i class="fa fa-plus"></i>
                </button>

            </h5>
            <div class="card-body">

                @if($products->count() !== 0)

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">category</th>
                        <th scope="col">Approved</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product )
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <th scope="row">{{$product->product_name}}</th>
                                <td height="70" width="200">
                                    <div style="overflow-y: scroll;width:100%;height: 100%;margin: 0;">
                                        {!! $product->product_desc !!}
                                    </div>

                                </td>
                                <td>{{$product->product_price}} L.E</td>
                                <td><span class="badge badge-warning">{{$product->product_status}}</span></td>
                                <td><span class="badge badge-dark text-white">{{$product->quantity}}</span></td>
                                <td>{{$product->category->cate_name}}</td>
                                <td>
                                    @if($product->allow == "yes")
                                     <span class="badge badge-success">published</span>
                                    @else
                                        <span class="badge badge-danger">waiting</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->allow == "no")
                                    <a title="Approve" href="{{route('products.allow',$product->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                   @endif
                                    <a title="Show" href="{{route('products.show',$product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <form class="d-inline-block" action="{{route('products.delete',$product->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button title="Delete" class="btn btn-sm btn-danger" type="submit">
                                            <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                    <tr>
                        <div class="alert alert-danger">There is no product yet</div>
                    </tr>
                @endif

            </div>
        </div>





















        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create A New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                     <div class="row">

                        <div class="col-md-9">
                          <form class="create-product mt-4" action="{{route('products.store')}}" method="POST">
                          @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Product Name:</label>
                                        <input oninput="repeatTypeFunction()" id="pname" class="form-control" type="text" name="product_name" placeholder="Type product name" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                    <input  id="x" type="hidden" name="product_desc" placeholder="Type product description" >
                                    <trix-editor input="x"></trix-editor>
                                  </div>

                                    <div class="form-group">
                                        <label>Product Price:</label>
                                        <input oninput="repeatTypeFunction()" id="pprice" class="form-control" type="text" name="product_price" placeholder="Type product price" autocomplete="off">
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Quantity of product:</label>
                                        <input class="form-control" type="text" name="quantity" placeholder="Type number of product" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Category:</label>
                                          <select required class="form-control" name="category_id">
                                          @if($categories->count() !== 0)
                                              @foreach($categories->where('parent_id','=',0) as $cate)
                                                  <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                                      @foreach($categories->where('parent_id','=',$cate->id) as $sub)
                                                          <option value="{{$sub->id}}">---{{$sub->cate_name}}</option>
                                                      @endforeach
                                              @endforeach

                                                @else
                                                  <option>No Categories Exist</option>
                                            @endif
                                          </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tags:</label>
                                      <input autocomplete="off" type="text" name="tags" class="form-control" placeholder="Add Some Tags With (,) separate"/>
                                    </div>
                                </div>

                            </div>

                              <div class="form-group">
                                <button id="saveButton" class="btn btn-primary">SAVE</button>
                            </div>

                        </form>
                        </div>

                         <div class="col-md-3">
                           <div style="border-left: 1px solid #999999;position: relative;padding: 5px;" class="view-product text-center">
                               <img style="width:265px;" src="{{asset('images/product-ph.jpg')}}" alt="product-img"/>
                       <span id="productPrice" style="color:#fff;position:absolute;top: 10px;right:5px;padding: 3px;background-color: #1d68a7;"></span>
                               <h5 id="productName">

                               </h5>


                           </div>
                         </div>

                     </div>

                    </div>
                </div>
            </div>
        </div>








    </div>



@endsection






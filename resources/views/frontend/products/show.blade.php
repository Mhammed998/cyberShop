@extends('layouts.app')
@section('title','Home-show-product')
@section('bodyID','Home-Body')
@section('content')



<!-- Start page structure -->

<div class="container mt-2 pt-2 " id="single-product">

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

    <h4 class="mb-2">Product details</h4>

    <div class="product mt-3">
        <div class="row ">

            <div class="col-md-4">
                <div class="product-imgs">

                    @if($product->productImgs()->count() !== 0)
                        <div class="small-imgs mr-2">
                            @foreach($product->productImgs as $image)
                                <img onmousemove="preview.src = this.src" id="img{{$image->id}}"
                                     class="mt-2"  src="{{asset('images/productimgs/' . $image->images)}}" alt="product-img">
                               <br>
                            @endforeach
                        </div>
                    @endif

                    @if($product->productImgs()->count() !== 0)
                        <div class="display-img-preview d-inline text-center">
                        @foreach($product->productImgs as $image)

                            @if($loop->first)
                            <img name="preview" id="img-preview" class="mb-5"
                                 src="{{asset('images/productimgs/' . $image->images)}}" alt="product-img">
                            @endif
                        @endforeach
                        </div>
                    @endif

                </div>
            </div>


            <div class="col-md-8 mt-2">
                <div class="product-details justify-content-start">
                      <h3 class="mb-0">{{$product->product_name}}</h3>  <span>{{$product->created_at->format('d/m/Y')}}</span>
                    <h3 style="color:#8B0000;">{{$product->product_price}} L.E</h3>
                    <div class="mb-3" style="width:50%;text-transform: lowercase;">
                        {!!  $product->product_desc !!}
                    </div>
                    <hr class="p-0 mb-4">
                    <h6 class="mb-2">Quantity: <span class=" text-danger">{{$product->quantity}} </span>   </h6>
                    <h5 class="mb-2">Category:
                       <a href="{{route('category.products',$product->category->id)}}" class="text-success"> {{$product->category->cate_name}} </a>
                    </h5>
                    <h5>
                        Tags:
                    @if(! empty($product->tags))
                            @foreach(explode(',',$product->tags) as $tag )
                                  <a href="#" class="text-primary"> {{strtolower($tag)}} | </a>
                            @endforeach
                        @endif
                    </h5>


                </div>

                <button type="button" class=" btn btn-sm btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Order now</button>


            </div>


        </div>
    </div>



<div class="modal fade  bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="row order-form" method="post" action="{{route('order.store')}}">
         @csrf
          <div class="col-md-6">

            <input name="userid" type="hidden" value="{{Auth::id()}}">

               <div class="form-group">
                 <label> Name:</label>
                 <input name="username" type="text" class="form-control">
                </div>

            <div class="form-group">
             <label>  Phone:</label>
             <input name="phone" type="text" class="form-control" required>
            </div>

            <div class="form-group">
             <label>  Address:</label>
              <textarea class="form-control" name="address" rows="3" required></textarea>
            </div>

          </div>

           <div class="col-md-6">

               <div class="form-group">
                 <label> Product name:</label>
                 <input name="product" onkeydown="return false" type="text" class="form-control" value="{{$product->product_name}}">
                </div>

               <div class="form-group">
                 <label> Amount:</label>
                 <select name="amount" id="amount" class="form-control">
                    @for($i=1;$i<= $product->quantity ; $i++ )
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                 </select>
                </div>

            <div class="form-group">
             <label>  Total cost:</label>
             <input id="cost" name="cost"  type="text" class="form-control" value="{{$product->product_price}}">
            </div>

            <div class="form-group">

             <button class="btn btn-primary" type="submit">Confirm Order</button>
            </div>

           </div>

        </form>

      </div>
    </div>
  </div>
</div>

</div>





@endsection



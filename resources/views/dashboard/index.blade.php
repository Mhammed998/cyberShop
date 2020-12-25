@extends('main.app')
@section('title','Dashboard')
@section('bodyID','dashboard-Body')
@section('content')


    @include('parts.side-nav')



  <div class="container">

      <h4 class="mb-5 mt-3">Overview</h4>

      <div class="row">

          <div class="col-md-3">
              <div class="stats mb-3">
                  <i class="fa first  fa-users" aria-hidden="true"></i>
                  <div class="detail">
                      <h4>{{$users->count()}}</h4>
                      <h5>Users</h5>
                  </div>
              </div>
          </div>

          <div class="col-md-3">
              <div class="stats  mb-3">
                  <i class="fa second fa-th" aria-hidden="true"></i>
                  <div class="detail">
                      <h4>{{$categories->count()}}</h4>
                      <h5>Categories</h5>
                  </div>
              </div>
          </div>

          <div class="col-md-3">
              <div class="stats mb-3">
                  <i class="fa third  fa-database" aria-hidden="true"></i>
                  <div class="detail">
                      <h4>{{$products->count()}}</h4>
                      <h5>Products</h5>
                  </div>
              </div>
          </div>

          <div class="col-md-3 mb-3">
              <div class="stats  mb-2">
                  <i class="fa fourth fa-shopping-cart" aria-hidden="true"></i>

                  <div class="detail">
                      <h4>{{$orders->count()}}</h4>
                      <h5>Orders</h5>
                  </div>
              </div>
          </div>



      </div>




      <div class="row">


          <div class="col-md-6 mt-4">
              <h5>Latest Users</h5>
              <div class="table-responsive mt-2">
                  <table class="table">
                      <thead class="thead-light">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">Controls</th>


                      </tr>
                      </thead>
                      <tbody>
                      @foreach($SampleUsers as $u)
                          <tr>
                              <th scope="row">{{$u->id}}</th>
                              <td scope="row">{{$u->name}}</td>
                              <td>{{$u->email}}</td>
                              <td><span class="badge badge-dark">{{$u->role}}</span></td>

                              <td>




                                  <form class="d-inline-block" action="{{route('users.delete',$u->id)}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button title="delete" class="btn btn-sm btn-danger" type="submit">
                                          <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                      </button>
                                  </form>


                                  @if($u->status === 'not-approved')
                                      <a title="Approve"  href="{{route('users.approved',$u->id)}}" class="btn btn-success btn-sm">
                                          <i class="fa fa-check" aria-hidden="true"></i>
                                      </a>
                                  @endif

                                  <a title="View"  href="{{route('users.show',$u->id)}}" class="btn btn-primary btn-sm">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                  </a>



                              </td>


                          </tr>
                      @endforeach

                      </tbody>

                  </table>
              </div>
          </div>


          <div class="col-md-6 mt-4">
              <h5>Latest Products</h5>
              <div class="table-responsive mt-2">
                  <table class="table">
                      <thead class="thead-light">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Status</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Controls</th>


                      </tr>
                      </thead>
                      <tbody>
                      @if($SampleProducts->count() !== 0)
                          @foreach($SampleProducts as $product )
                              <tr>
                                  <th scope="row">{{$product->id}}</th>
                                  <th scope="row">{{$product->product_name}}</th>
                                  <td>{{$product->product_price}} L.E</td>
                                  <td><span class="badge badge-warning">{{$product->product_status}}</span></td>
                                  <td><span class="badge badge-dark text-white">{{$product->quantity}}</span></td>

                                  <td>
                                      <a href="{{route('products.show',$product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                      <form class="d-inline-block" action="{{route('products.delete',$product->id)}}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button class="btn btn-sm btn-danger" type="submit">
                                              <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                          @endforeach
                      @else
                          <tr>
                              <div class="alert alert-warning">There is no product yet</div>
                          </tr>
                      @endif

                      </tbody>
                  </table>
              </div>
          </div>


      </div>

      <hr>

      <div class="row">

          <div class="col-md-8 mt-4">
              <h5>Latest Orders</h5>
              <div class="table-responsive mt-2">
                  <table class="table">
                      <thead class="thead-light">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Client</th>
                          <th scope="col">Email</th>
                          <th scope="col">Product</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Cost</th>
                          <th scope="col">Controls</th>


                      </tr>
                      </thead>
                      <tbody>
                      @foreach($SampleOrder as $order)
                          <tr>

                              <th scope="row">{{$order->id}}</th>
                              <td scope="row">{{$order->username}}</td>
                              <td>{{$order->user->email}}</td>
                              <td>{{$order->product}}</td>
                              <td>{{$order->amount}}</td>
                              <td>{{$order->cost}} L.E</td>
                              <td>

                                  <form class="d-inline-block" action="{{route('order.delete',$order->id)}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button title="delete" class="btn btn-sm btn-danger" type="submit">
                                          <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                      </button>
                                  </form>



                                  <a title="View"  href="{{route('users.show',$u->id)}}" class="btn btn-primary btn-sm">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                  </a>



                              </td>


                          </tr>
                      @endforeach

                      </tbody>

                  </table>
              </div>
          </div>



          <div class="col-md-4 mt-4">
              <div class="card">
                  <div class="card-header">
                      product's tags
                  </div>
                  <div class="card-body">
                      @if(! empty($ptags))
                          @foreach($ptags as $ptag)
                              @foreach($ptag as $tag)
                                 @foreach(explode("," , $tag ) as $t )
                                    <span class=" p-2 m-1 badge badge-primary text-white">{{$t}}</span>
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


  </div>


@endsection

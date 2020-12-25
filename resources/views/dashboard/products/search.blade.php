@extends('main.app')
@section('title','Products')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')



    <div class="container search-result justify-content-center">

        <h3 class="mt-3 ml-3">Search Result</h3>

        <div class="card mt-3">
            <h5 class="card-header text-left">
                Users

                <form action="{{route('products.search')}}" method="GET" class="form-inline  float-right">
                    <input name="product_name" class="form-control mr-sm-2" type="search" placeholder="Search By Name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </h5>
            <div class="card-body">

                @if($product->count() !== 0)

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">category</th>
                            <th scope="col">Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($product as $p )
                            <tr>
                                <th scope="row">{{$p->id}}</th>
                                <th scope="row">{{$p->product_name}}</th>
                                <td>{!! $p->product_desc  !!}</td>
                                <td>{{$p->product_price}} L.E</td>
                                <td><span class="badge badge-warning">{{$p->product_status}}</span></td>
                                <td><span class="badge badge-dark text-white">{{$p->amount}}</span></td>
                                <td>{{$p->cate_name}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <form class="d-inline-block" action="{{route('products.delete',$p->id)}}" method="POST">
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
                                <div class="alert alert-danger">There is no product yet</div>
                            </tr>
                        @endif
                        </tbody>
                    </table>


            </div>

        </div>












    </div>




















@endsection

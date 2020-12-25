@extends('main.app')
@section('title','Dashboard | Orders')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')


    <div class="container users justify-content-center">

        <h3 class="mt-4 ml-3">Manage Orders</h3>

        <div class="card mt-3">
            <h5 class="card-header text-left">
               Orders

                <form action="{{route('users.search')}}" method="GET" class="form-inline  float-right">
                    <input name="username" class="form-control mr-sm-2" type="search" placeholder="Search By Name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </h5>
            <div class="card-body">
                @if($orders->count() !== 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment_Status</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->username}}</td>
                            <td>{{$order->user->email}}</td>
                            <td height="70">
                                <div style="overflow-y: scroll;width:100%;height: 100%;margin: 0;">
                                    {{$order->address}}
                                </div>

                            </td>
                            <td>{{$order->product}}</td>
                            <td>{{$order->amount}}</td>
                            <td>{{$order->cost}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->Payment_Status}}</td>
                            <td>{{$order->created_at->format('Y-m-d')}}</td>

                            <td>




                                <form class="d-inline-block" action="{{route('order.delete',$order->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>


                                @if($order->status == 'waiting')
                                    <a title="Approve"  href="" class="btn btn-success btn-sm">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                @endif






                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>
@endif
            </div>

        </div>














    </div>




















@endsection

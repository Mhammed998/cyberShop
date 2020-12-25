@extends('main.app')
@section('title','Users')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')



    <div class="container search-result justify-content-center">

        <h3 class="mt-3 ml-3">Search Result</h3>

        <div class="card mt-3">
            <h5 class="card-header text-left">
                Users

                <form action="{{route('users.search')}}" method="GET" class="form-inline  float-right">
                    <input name="username" class="form-control mr-sm-2" type="search" placeholder="Search By Name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </h5>
            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Join</th>
                        <th scope="col">Transaction</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $u)
                        <tr>
                            <th scope="row">{{$u->id}}</th>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td><span class="badge badge-dark">{{$u->role}}</span>
                            </td>
                            <td>{{$u->created_at->format('Y-m-d')}}</td>

                            <td>




                                <form class="d-inline-block" action="{{route('users.delete',$u->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>


                                @if($u->status === 'not-approved')
                                    <a title="Approve"  href="" class="btn btn-success btn-sm">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                @endif

                                <a title="View"  href="{{route('users.show',$u->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>

                                @if($u->role !== 'super_admin')
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-sm d-inline btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Promote
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($u->role == 'user')
                                                <a href="{{route('users.be-admin',$u->id)}}" class="dropdown-item" href="#">Be Admin</a>
                                            @elseif($u->role == 'admin')
                                                <a href="{{route('users.cancel-admin',$u->id)}}" class="dropdown-item" href="#">Cancel Admin</a>
                                            @endif
                                        </div>
                                    </div>
                                @endif



                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>

        </div>












    </div>




















@endsection

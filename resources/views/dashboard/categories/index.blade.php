@extends('main.app')
@section('title','Categories')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')

    <div class="container categories">

        <h3 class="mt-4 ml-3">Manage Categories</h3>


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
             Categories

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Create Category <i class="fa fa-plus"></i>
                </button>

            </h5>
            <div class="card-body">

                @if($categories->count() !== 0)
              <div class="table-responsive">
                <table class="table">


                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Number of products</th>
                        <th scope="col">Status</th>
                        <th scope="col">Transactions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($allCates->count() !== 0)
                             @foreach($categories as $cate )
                    <tr class="table-active">
                        <th scope="row">{{$cate->id}}</th>
                        <td>{{$cate->cate_name}}</td>
                        <td>{{$cate->cate_desc}}</td>
                        <td>

                                {{$cate->products->count()}}

                        </td>
                        <td>{{$cate->status}}</td>
                        <td>
                            <a href="{{route('categories.show',$cate->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <form class="d-inline-block" action="{{route('categories.delete',$cate->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @foreach($subcates->where('parent_id','=',$cate->id) as $sub)
                        <tr>
                            <th scope="row">{{$sub->id}}</th>
                            <td>-{{$sub->cate_name}}</td>
                            <td>{{$sub->cate_desc}}</td>
                            <td>

                                {{$sub->products->count()}}

                            </td>
                            <td>{{$sub->status}}</td>
                            <td>
                                <a href="{{route('categories.show',$sub->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                <form class="d-inline-block" action="{{route('categories.delete',$sub->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i  class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        @endforeach


                        @endif
                    </tbody>
                </table>
              </div>

                @else
                    <div class="alert alert-warning">There is no category yet</div>
                @endif

            </div>
        </div>

         <!-- start Modal To Create A New Category -->

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create A New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="create-category mt-4"  action="{{route('categories.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Category Name:</label>
                                <input class="form-control" type="text" name="cate_name" placeholder="Type category name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Category Description:</label>
                                <input class="form-control" type="text" name="cate_desc" placeholder="Type category description" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Parent:</label>

                                <select class="form-control" name="parent_id">
                                    <option value="0">None</option>
                                    @foreach($categories as $category)
                                     <option value="{{$category->id}}">{{$category->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button  class="btn btn-primary" type="submit">SAVE</button>
                            </div>

                        </form>


                </div>
            </div>
        </div>


        <!-- End Modal To Create A New Category -->











    </div>




@endsection

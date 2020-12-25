@extends('main.app')
@section('title','Categories')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')

    <h3 class="mt-3 ml-3">{{$category->cate_name}} Section</h3>

    <div class="container">

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













        <!-- start modal to update category data -->


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Edit category
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit {{$category->cate_name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="create-category mt-4" action="{{route('categories.update',$category->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input class="form-control" type="text" name="cate_name"
                                       value="{{$category->cate_name}}"    placeholder="Type category name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Category Description:</label>
                                    <input class="form-control" type="text" name="cate_desc"
                                           value="{{$category->cate_desc}}"  placeholder="Type category description" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" type="submit">Save Updates</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>





        <!-- end modal to update category data -->








    </div>


@endsection

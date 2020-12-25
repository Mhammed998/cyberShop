@extends('main.app')
@section('title','Users')
@section('bodyID','dashboard-Body')
@section('content')

    @include('parts.side-nav')

    <h3 class="mt-3 ml-3">User profile</h3>

    <div class="container profile-user">

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
         <div class="row mt-4">



             <div class="col-md-5">
                 <div class="left  mt-4 p-3">

                     <span class="created bg-info text-white">Joined: {{$user->created_at->format('Y-m-d')}}  </span>



                     <img style="height: 130px;width: 150px;border-radius: 50%;" src="{{asset('images/avatar.png')}}" alt="user-image">

                     <h5>
                         <i class="fa fa-user"></i>
                         {{$user->name}}</h5>
                     <h6>
                         <i class="fa fa-envelope-o"></i>
                         {{$user->email}}</h6>
                     <h6>
                         <i class="fa fa-phone"></i>
                         @if(! empty($user->phone))
                         {{$user->phone}}
                         @else
                         000-000-000 (empty)
                         @endif
                     </h6>


                     <label class="mb-0">About Me:</label>
                     <p style="text-transform:lowercase;">
                        @if(! empty($user->about)){
                             {{$user->about}}
                         }
                            @else
                             write something about you shortly,
                        this is a description section. (empty)

                            @endif
                     </p>

                     <a target="_blank" href="{{$user->facebook}}" class="btn btn-primary mb-2">
                         <i class="fa fa-facebook-square mr-1"></i>Facebook</a>

                 </div>
             </div>

             <div class="col-md-7">
                 <div class="right mt-4">
                     <form method="POST" action="{{route('users.update',$user->id)}}">
                         <div class="row">
                         @csrf

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Username:</label>
                                 <input class="form-control" type="text" name="name" placeholder="Type Your Name"
                                        value="{{$user->name}}"  autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Email:</label>
                                 <input class="form-control" type="email" name="email" placeholder="Type Your E-mail"
                                        value="{{$user->email}}"  autocomplete="off">
                             </div>
                         </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Phone:</label>
                                <input class="form-control" type="text" name="phone" placeholder="Type Your Phone number"
                                       value="{{$user->phone}}"  autocomplete="off">
                            </div>


                            <div class="form-group">
                                <label>Facebook Url:</label>
                                <input class="form-control" type="text" name="facebook" placeholder="Type Your Facebook Url"
                                       value="{{$user->facebook}}"  autocomplete="off">
                            </div>

                        </div>


                        <div class="col-md-12">

                            <div class="form-group">
                                <label>About Me:</label>
                                <textarea  rows="4" class="form-control" name="about" placeholder="Type Something About You">{{$user->about}}</textarea>

                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group ml-3 col-md-4">
                                <button type="submit" class="btn btn-success">Save Updates</button>
                            </div>
                        </div>


                         </div>
                     </form>

                     <span class="updated bg-success text-white">Updated: {{$user->updated_at->format('Y-m-d')}}</span>

                 </div>
             </div>


         </div>











    </div>


    @endsection

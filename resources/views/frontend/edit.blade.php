@extends('layouts.app')
@section('content')
@php
 $user = $data['user'];
@endphp
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card bg-light">
                <article class="card-body mx-auto">
                    <h4 class="card-title mt-3 text-center">Update Account</h4>
                    <p class="text-center">Get started with your free account</p>
                    <form method="POST" action="/frontend/{{$user->id}}">
                        @csrf
                        @method('PUT')
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                         </div>
                        <input name="name" class="form-control" placeholder="Full name" type="text" value="{{$user->name}}">
                    </div> <!-- form-group// -->
                    
                    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                         </div>
                        <input name="email" class="form-control" placeholder="Email address" type="email" value="{{$user->email}}">
                    </div> <!-- form-group// -->                         
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                    </div> <!-- form-group// -->      
                    <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
                </form>
                </article>
                </div> <!-- card.// -->
                
                </div> 
        </div>
    </div>
</div>

@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card bg-light">
                <article class="card-body mx-auto">
                    <h4 class="card-title mt-3 text-center">Add  User Information</h4>
                    <p class="text-center">Get started with your free account</p>
                    <form method="POST" action="/insert-user-info">
                        @csrf

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                         </div>
                        <select name="user_id" id="" class="form-control">
                            @forelse ($data['userList'] as $user)
                              <option value="{{ $user['id'] }}"> {{ $user->name }} </option>
                            @empty
                                <option value="">Not found</option>
                            @endforelse
                        </select>
                    </div> <!-- form-group// -->
                    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                         </div>
                        <input name="address" class="form-control" placeholder="Address" type="text">
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
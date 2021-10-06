@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Home page</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, cumque iusto! Perspiciatis dolorem ad
                debitis dolore temporibus saepe earum perferendis officiis iste autem iusto natus beatae dolorum, eum
                ratione ipsum?</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('successMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('successMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <div class="mt-10 mb-5">
                <a href="frontend/create" class="btn btn-primary">Add New Users</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['userList'] as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item['username']}}</td>
                        <td>{{$item['email']}}</td>
                        <td><a href="/frontend/{{$item->id}}" class="btn btn-secondary">View</a> 
                        <a href="/frontend/{{$item->id}}/edit" class="btn btn-primary">Edit</a> 
                        <a href="/destroy/{{$item->id}}" class="btn btn-danger">Delete</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="col-md-12">
            <div class="pagination">
                {{ $data['userList']->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>lavel</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['user'] as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['level']}}</td>
                        <td>{{$item['status']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
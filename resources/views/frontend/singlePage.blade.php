@extends('layouts.app')
{{ $users->users }}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $users->name }}</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, cumque iusto! Perspiciatis dolorem ad
                debitis dolore temporibus saepe earum perferendis officiis iste autem iusto natus beatae dolorum, eum
                ratione ipsum?</p>
                <ul>
                    {{-- @forelse ($data['info'] as $item)
                        <li>{{ $item['address'] }}</li>
                    @empty
                        <p>Not found</p>
                    @endforelse --}}
                </ul>
                
        </div>
    </div>
</div>
@endsection
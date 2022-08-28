@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-3">
            @foreach ($products as $product)
                <div class="col-md-4 col-sm-10 offset-sm-2 offset-md-0">
                    <div class="card" style="width: 18rem;">
                        <a href=""><img src="{{ $product->imageUrl }}" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->price }}$</p>
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

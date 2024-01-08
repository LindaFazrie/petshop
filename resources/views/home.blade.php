@extends('layouts.app')

@section('content')
        <!-- Welcome Section -->
        <div class="jumbotron text-center welcome-section" style="background-image: url('storage/kucing.jpg'); background-size: cover; color: #ffffff; height: 500px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h1 class="display-4">Welcome to PetShop!</h1>
            <p class="lead">Your Pet's Paradise</p>
            <a href="#" class="btn btn-outline-light btn-lg" style="margin-top: 20px; border-radius: 20px; text-decoration: none;">Read Our Blog</a>
        </div>

        <div class="container mt-4">
        <h1 style="color: #ff7eb9;">Catalog</h1>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                    <div class="card h-100" style="border: 2px solid #ff1493; border-radius: 8px; overflow: hidden; transition: transform 0.2s;">
        @php
            $image = $product->image; // Assuming $product->image is a BLOB column
            $src = 'data:image/png;base64,' . base64_encode($image);
        @endphp

        <img src="{{ $src }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text" style="color: #ff1493;">Price: Rp{{ $product->price }}</p>
                                <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="mt-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-pink">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

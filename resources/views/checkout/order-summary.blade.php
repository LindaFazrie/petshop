<!-- resources/views/checkout/order-summary.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Summary</h1>

        <div class="alert alert-success">
            Order placed successfully!
            <br>
            Transaction ID: {{ $transactionId }}
        </div>

        <!-- Additional information or links can be added here -->

        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
@endsection

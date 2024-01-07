<!-- resources/views/checkout/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Checkout</h1>

        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <!-- Add more columns if needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Display total price -->
            <p>Total Price: Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>

            <!-- Add a form for additional checkout information (e.g., shipping details) -->
            <form action="{{ route('checkout.process') }}" method="post">
                @csrf
                <!-- Add form fields for additional checkout information -->

                <button type="submit" class="btn btn-success">Place Order</button>
            </form>

        @else
            <!-- Display empty cart message -->
            <p>Your cart is empty.</p>
            <!-- Add a link to continue shopping -->
            <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
        @endif
    </div>
@endsection

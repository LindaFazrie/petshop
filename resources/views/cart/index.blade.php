<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: #ff7eb9;">Your Cart</h1>

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
                            <td style="color: #ff1493;">Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>
                                <input
                                    type="number"
                                    min="1"
                                    value="{{ $item['quantity'] }}"
                                    id="quantity_{{ $item['id'] }}"
                                    class="update-quantity"
                                    data-product-id="{{ $item['id'] }}"
                                    data-price="{{ $item['price'] }}"
                                >

                                <button onclick="decreaseQuantity({{ $item['id'] }}, {{ $item['price'] }})">-</button>
                                <button onclick="increaseQuantity({{ $item['id'] }}, {{ $item['price'] }})">+</button>
                            </td>
                            <td>
                                <form action="{{ route('cart.remove', ['productId' => $item['id']]) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Display total price -->
            <p style="color: #ff1493;">Total Price: Rp<span id="totalPrice">{{ number_format($totalPrice, 0, ',', '.') }}</span></p>

            <!-- Add checkout or continue shopping button -->
            <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</a>

        @else
            <p>Your cart is empty.</p>
            <!-- Add a link to continue shopping -->
            <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
        @endif
    </div>

    <script>
        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll('.update-quantity').forEach(function (input) {
                const productId = input.dataset.productId;
                const price = parseFloat(input.dataset.price);
                const quantity = parseInt(input.value);

                total += price * quantity;
            });

            document.getElementById('totalPrice').innerText = total.toFixed(2);
        }

        function decreaseQuantity(productId, price) {
            const quantityInput = document.getElementById('quantity_' + productId);
            let quantity = parseInt(quantityInput.value);

            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
                updateTotalPrice();
            }
        }

        function increaseQuantity(productId, price) {
            const quantityInput = document.getElementById('quantity_' + productId);
            let quantity = parseInt(quantityInput.value);

            quantity++;
            quantityInput.value = quantity;
            updateTotalPrice();
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.update-quantity').forEach(function (input) {
                input.addEventListener('input', updateTotalPrice);
            });
        });
    </script>
@endsection

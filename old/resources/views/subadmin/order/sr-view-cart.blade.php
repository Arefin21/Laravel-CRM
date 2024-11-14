@extends('layouts.subadmin')
@section('title')
    <title>All Product | Nurjahan Bazar</title>
@endsection
@section('main')

    <!-- Start: Search Product Category -->
    <section class="statis text-center content">

        <form id="cartForm" method="POST" action="{{ route('order.store') }}"> <!-- Form for Order Submission -->
            @csrf <!-- CSRF Token for security -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Cart List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" cellspacing="0" width="100%">
                                        <thead class="thead-light text-primary">
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalAmount = 0; // Initialize total amount even if the cart is empty
                                            @endphp

                                            @if(session()->has('cart') && count(session('cart')) > 0)
                                                @foreach(session('cart') as $productId => $product)
                                                    @php
                                                        $totalAmount += $product['total'];
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $product['name'] }}</td>
                                                        <td>{{ $product['price'] }} Tk</td>
                                                        <td>{{ $product['quantity'] }}</td>
                                                        <td>{{ $product['total'] }} Tk</td>
                                                        <td>
                                                            <button class="btn btn-danger delete-product" data-id="{{ $productId }}">X</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <th style="background-color: #5e5b5b; color: #fff;">Sub Total</th>
                                                    <th style="background-color: #5e5b5b; color: #fff;">{{ $totalAmount }} Tk</th>
                                                    <td style="border: none;"></td>
                                                </tr>
                                                <tr>
                                                    <td class="mb-td-none" style="border: none;"></td>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <th style="background-color: #eceeef; color: #222;">Discount</th>
                                                    <th style="background-color: #eceeef; color: #222;">
                                                        <div class="apply-btn">
                                                            <div class="summary-block">
                                                                <div class="sb-promo">
                                                                    <input type="number" name="discount" id="discountInput" placeholder="Enter Discount Amount" min="0" step="0.01" value="0">
                                                                    <span class="btn btn-discount" id="applyDiscount">Apply</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <td class="mb-td-none"  style="border: none;"></td>
                                                    <th style="background-color: #1a237e; color: #fff;">Total</th>
                                                    <th style="background-color: #1a237e; color: #fff" id="totalPrice">{{ $totalAmount }} Tk</th>
                                                    <td style="border: none;"></td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="6">No products in the cart.</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td class="mb-td-none"  style="border: none;"></td>
                                                <td class="mb-td-none"  style="border: none;"></td>
                                                <td class="mb-td-none"  style="border: none;"></td>
                                                <th style="background-color: #eceeef; color: #222;">Select Shop name</th>
                                                <th style="background-color: #eceeef; color: #222;">
                                                    <div class="apply-btn">
                                                        <div class="summary-block">
                                                            <div class="sb-promo">
                                                                @php
                                                                    $userId = \Illuminate\Support\Facades\Auth::user()->id;
                                                                    $srshops = \App\Models\SrShop::where('srId', $userId)->get();
                                                                @endphp
                                                                <select name="ShopName" required>
                                                                    <option value="">Select Shop name</option>
                                                                    @foreach($srshops as $shop)
                                                                        <option value="{{ $shop->id }}">{{ $shop->shopName }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td style="border: none;">
                                                    <div class="continue-shipping-button">
                                                        <a href="{{ route('sr.category') }}">Continue Shopping</a>
                                                    </div>
                                                </td>
                                                <td class="mb-td-none" style="border: none;"></td>
                                                <td class="mb-td-none" style="border: none;"></td>
                                                <td class="mb-td-none" style="border: none;"></td>
                                                <th>
                                                    <button style="width: 100%;" type="submit" class="btn btn-primary text-capitalize"><span>Checkout</span></button>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="totalAmount" value="{{ $totalAmount }}"> <!-- Hidden input for total amount -->

            <!-- Include this script for AJAX delete functionality and discount calculation -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Add event listener to delete buttons
                    document.querySelectorAll('.delete-product').forEach(button => {
                        button.addEventListener('click', function() {
                            const productId = this.getAttribute('data-id'); // Get product ID

                            // Send AJAX request to delete the product
                            fetch(`{{ url('subadmin/remove-from-cart') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ id: productId }) // Send product ID to delete
                            })
                                .then(response => response.json())
                                .then(data => {
                                    // Check for success
                                    if (data.success) {
                                        location.reload(); // Reload the page to see the updated cart
                                    } else {
                                        alert('An error occurred while deleting the product.');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('An error occurred while deleting the product. Please try again.');
                                });
                        });
                    });

                    // Add event listener to apply discount
                    document.getElementById('applyDiscount').addEventListener('click', function() {
                        const discountInput = document.getElementById('discountInput').value;
                        const subTotal = {{ $totalAmount }};

                        let discountAmount = parseFloat(discountInput);
                        discountAmount = isNaN(discountAmount) ? 0 : discountAmount; // Ensure valid number

                        let newTotal = subTotal - discountAmount;
                        newTotal = newTotal < 0 ? 0 : newTotal; // Prevent negative total

                        document.getElementById('totalPrice').innerText = newTotal + ' Tk';
                    });
                });
            </script>
        </form> <!-- End of Form -->

    </section>
@endsection

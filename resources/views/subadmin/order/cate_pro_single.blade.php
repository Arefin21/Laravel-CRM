@extends('layouts.subadmin')
@section('title')
    <title>All Product | Nurjahan Bazar</title>
@endsection
@section('main')

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    <!--Start:  Search Product Category -->
    <section class="statis text-center content">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">SR Cart List</h4>
                        </div>
                        <div class="card-body">

                            <div class="add-to-cart-wrapper">
                                <div class="continue-shipping">
                                    <div class="continue-shipping-button">
                                        <a href="{{ route('sr.category') }}">continue shipping</a>
                                    </div>
                                </div>
                                <div class="continue-cart">
                                    <div class="cart-icon">
                                        <button onclick="viewCart()" type="button" class="btn btn-success my-2 my-sm-0">
                                            <i class="fas fa-shopping-cart total-count">
                                                {{ session()->has('cart') ? count(session('cart')) : 0 }}
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-light text-primary">
                                    <tr>
                                        <th> Sl. </th>
                                        <th> Product Name </th>
                                        <th> Stock </th>
                                        <th> Qunatity </th>
                                        <th> Price </th>
                                        <th> Totl Price </th>
                                        <th> Action </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td> 1 </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            {{ $availableStock = \App\Models\StockIn::where('warehouseId', Auth::user()->warehouse)
                                                ->where('productId', $product->id)
                                                ->sum('quantity') }}
                                        </td>

                                        <td>
                                            <!-- Quantity Input with Dynamic Alert -->
                                            <div class="quantity">
                                                <button class="btn btn-primary" id="minusBtn">-</button>
                                                <input type="number" id="quantityInput" class="form-control" value="1" min="1">
                                                <button class="btn btn-primary" id="plusBtn">+</button>
                                            </div>
                                            <div id="alert" style="display:none; color:red;">
                                                Not enough stock available!
                                            </div>
                                        </td>

                                        <td>{{ $product->price }}</td>

                                        <!-- This will dynamically show the total price -->
                                        <td id="totalPrice">{{ $product->price }}</td>

                                        <td class="td-actions text-center">
                                            <button type="button"
                                                    class="default-btn border-radius-5 add-to-cart"
                                                    data-id="{{ $product->id }}"
                                                    data-name="{{ $product->name }}"
                                                    data-price="{{ $product->price }}"
                                                    data-quantity="1"> <!-- Default quantity to be fetched from input -->
                                                Add to cart
                                            </button>
                                        </td>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                // Get DOM elements
                                                const minusBtn = document.getElementById('minusBtn');
                                                const plusBtn = document.getElementById('plusBtn');
                                                const quantityInput = document.getElementById('quantityInput');
                                                const totalPrice = document.getElementById('totalPrice');
                                                const alertDiv = document.getElementById('alert');
                                                const productPrice = {{ $product->price }}; // Get product price from Blade
                                                const availableStock = {{ $availableStock }}; // Get available stock from Blade

                                                // Update total price based on quantity
                                                function updateTotalPrice() {
                                                    let quantity = parseInt(quantityInput.value) || 0; // Use 0 if input is invalid

                                                    // Check if quantity exceeds available stock
                                                    if (quantity > availableStock) {
                                                        alertDiv.style.display = 'block';  // Show alert if quantity exceeds stock
                                                        quantityInput.value = availableStock; // Reset quantity to available stock
                                                        quantity = availableStock; // Update the quantity after resetting
                                                    } else {
                                                        alertDiv.style.display = 'none'; // Hide alert if within limits
                                                    }

                                                    totalPrice.textContent = (quantity * productPrice).toFixed(2); // Calculate and display total price
                                                }

                                                // Decrease quantity
                                                minusBtn.addEventListener('click', function() {
                                                    let quantity = parseInt(quantityInput.value);
                                                    if (quantity > 1) { // Ensure quantity doesn't go below 1
                                                        quantityInput.value = quantity - 1; // Update input value
                                                        updateTotalPrice(); // Update total price
                                                    }
                                                });

                                                // Increase quantity
                                                plusBtn.addEventListener('click', function() {
                                                    let quantity = parseInt(quantityInput.value);
                                                    if (quantity < availableStock) { // Ensure it doesn't exceed available stock
                                                        quantityInput.value = quantity + 1; // Update input value
                                                    } else {
                                                        alertDiv.style.display = 'block'; // Show alert if trying to exceed available stock
                                                    }
                                                    updateTotalPrice(); // Update total price
                                                });

                                                // Listen for manual input change
                                                quantityInput.addEventListener('input', function() {
                                                    let quantity = parseInt(quantityInput.value);
                                                    if (quantity < 1) { // Ensure input is not less than 1
                                                        quantityInput.value = 1; // Reset to 1 if less than 1
                                                    }
                                                    updateTotalPrice(); // Update total price based on new input
                                                });

                                                // Initialize total price on load
                                                updateTotalPrice();

                                                // Event listener for "Add to Cart" button
                                                const addToCartButtons = document.querySelectorAll('.add-to-cart');

                                                addToCartButtons.forEach(button => {
                                                    button.addEventListener('click', function() {
                                                        const productId = this.getAttribute('data-id');
                                                        const productName = this.getAttribute('data-name');
                                                        const productPrice = parseFloat(this.getAttribute('data-price'));
                                                        const productQuantity = parseInt(document.getElementById('quantityInput').value); // Get quantity from input

                                                        // Calculate total price to send
                                                        const totalPrice = (productPrice * productQuantity).toFixed(2);

                                                        // Send AJAX request to add to cart
                                                        fetch("{{ url('subadmin/add-to-cart') }}", {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            },
                                                            body: JSON.stringify({
                                                                id: productId,
                                                                name: productName,
                                                                price: productPrice,
                                                                quantity: productQuantity,
                                                                total: totalPrice // Send total price
                                                            })
                                                        })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                // SweetAlert2 for success message
                                                                Swal.fire({
                                                                    title: 'Success!',
                                                                    text: 'Added to cart successfully!',
                                                                    icon: 'success',
                                                                    confirmButtonText: 'OK'
                                                                });

                                                                // Update the cart count to reflect the number of distinct products
                                                                const currentCount = document.querySelector('.total-count');
                                                                const distinctCount = data.cart ? Object.keys(data.cart).length : 0; // Assuming the server returns the updated cart
                                                                currentCount.textContent = distinctCount.toString(); // Update the displayed cart count
                                                            })
                                                            .catch(error => {
                                                                console.error('Error:', error);
                                                                alert('An error occurred while adding the product to the cart. Please try again.');
                                                            });
                                                    });
                                                });
                                            });
                                        </script>


                                    </tr>



                                    <script>
                                        function viewCart() {
                                            document.location = '{{ route('cart.view') }}'; // Navigate to the cart page
                                        }
                                    </script>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <style type="text/css">


                :root {
                    --bodyFonts: 'Josefin Sans', sans-serif;
                    --pinkColor: #5557F3;
                    --titleColor: #000000;
                    --bodyColor: #666666;
                    --lightblueColor: #8D99FF;
                    --whiteColor: #ffffff;
                    --fontSize: 16px;
                    --transition: .5s;
                }

                .default-btn {
                    padding: 12px 25px 10px;
                    text-align: center;
                    color: var(--whiteColor) !important;
                    font-size: var(--fontSize);
                    transition: var(--transition);
                    display: inline-block;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                    border-radius: 8px;
                    z-index: 0;
                    background: var(--pinkColor);
                    overflow: hidden;
                    white-space: nowrap;
                    border: 0;
                }
                .default-btn:before {
                    content: '';
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    left: 50%;
                    width: 550px;
                    height: 550px;
                    margin: auto;
                    background: var(--lightblueColor);
                    border-radius: 8px;
                    z-index: -1;
                    transform-origin: top center;
                    transform: translateX(-50%) translateY(-5%) scale(0.4);
                    transition: transform .9s;
                }
                .default-btn:hover {
                    color: var(--whiteColor) !important;
                }
                .default-btn:hover:before {
                    transition: transform 1s;
                    transform: translateX(-45%) translateY(0) scale(1);
                    transform-origin: bottom center;
                }
                .btn-success {
                    background-color: #F96B6A !important;
                    border-color: #F96B6A !important;
                }


            </style>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="copyright float-left">
                                <p>Copyright © 2024 Nurjahan &amp; e-Commerce</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-xs-12">
                        </div>


                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="copyright float-right">
                                <p><a href="https://esoft.com.bd/" target="_blank">Software Developed by </a> e-Soft</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $("#plusBtn").click(function () {--}}
{{--                $("#quantityInput").val(parseInt($("#quantityInput").val()) + 1);--}}
{{--            });--}}

{{--            $("#minusBtn").click(function () {--}}
{{--                var currentValue = parseInt($("#quantityInput").val());--}}
{{--                if (currentValue > 1) {--}}
{{--                    $("#quantityInput").val(currentValue - 1);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}

@endsection
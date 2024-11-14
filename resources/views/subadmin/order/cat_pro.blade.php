@extends('layouts.subadmin')
@section('title')
    <title>All Product | Nurjahan Bazar</title>
@endsection
@section('main')



    <!--Start:  Search Product Category -->
    <section class="statis text-center content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="search">
                        <input class="form-control search-input" id="myInput" type="text" placeholder="Search Product Caregory">
                    </div>
                </div>
            </div>
            <div class="row main">


            @foreach($product as $product)
                @php
                    // Get the stock quantity for the current product
                    $stockQuantity = \App\Models\StockIn::where('warehouseId', Auth::user()->warehouse)
                        ->where('productId', $product->id)
                        ->sum('quantity');
                @endphp

                @if($stockQuantity > 0) <!-- Check if stock quantity is greater than 0 -->
                    <div class="col-md-2 col-6 searchBox">
                        <div class="sr-category-card text-center align-items-center">
                            <a href="{{ route('cat.prod.single', $product->id) }}">
                                <div class="sr-category-product">
                                    <img style="height:120px; width: 120px;" src="{{ asset('uploads/products') }}/{{ $product->photo }}" class="img-fluid cat-image">
                                </div>

                                <div class="sr-category-name">
                                    <h3>{{ $product->name }}</h3>
                                    <h5>{{ \App\Models\Category::where('id', $product->categoryId)->first()->name }}</h5>
                                    <div class="stock-price">
                                        <p>Stock (<span>{{ $stockQuantity }}</span>)</p>
                                        <p>Price <strong>{{ $product->price }}</strong> Tk.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach



            </div>

        </div>
        </div>
    </section>

    <script type="text/javascript">
        // get input field and add 'keyup' event listener
        let searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('keyup', search);

        // get all title
        let titles = document.querySelectorAll('.main .searchBox');
        let searchTerm = '';
        let tit = '';


        function search(e) {
            // get input fieled value and change it to lower case
            searchTerm = e.target.value.toLowerCase();

            titles.forEach((title) => {
                // navigate to p in the title, get its value and change it to lower case
                tit = title.textContent.toLowerCase();
                // it search term not in the title's title hide the title. otherwise, show it.
                tit.includes(searchTerm) ? title.style.display = 'block' : title.style.display = 'none';
            });
        }
    </script>
@endsection
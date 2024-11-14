@extends('layouts.subadmin')
@section('title')
    <title>Shop Add | Nurjahan Bazar</title>
@endsection
@section('main')



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



                @foreach(\App\Models\Category::orderBy('name', 'asc')->get() as $category)
                <div class="col-md-2 col-4 searchBox">
                    <div class="sr-category-card text-center align-items-center">
                        <a href="{{ route('sr.category.product',$category->id) }}">
                            <div class="sr-category-product">
                                <img src="{{ asset('/') }}asset/images/nophoto.jpg" class="img-fluid cat-image">
                            </div>
                            <div class="sr-category-name">
                                <h3>{{ $category->name }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach



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
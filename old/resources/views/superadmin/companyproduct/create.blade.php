@extends('layouts.superadmin')
@section('title')
    <title>Company Produjct | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Comapny Stock</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('companyproduct.store') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="col-lg-12 border p-3 mb-3">
                                @if ($errors->any())
                                    <div class="alert alert-danger">

                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach

                                    </div>
                                @endif
                                <div class="form-row">

                                    <div class="col-md-4 mb-6">
                                        <label for="productName">Product Name</label>
                                        <span class="required-star"></span>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter Product Name">
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="category">Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach(\App\Models\Category::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="price">Price</label>
                                        <span class="required-star"></span>
                                        <input name="price" type="text" class="form-control" required placeholder="Price">
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="unit">Unit Type</label>
                                        <select class="form-control" name="unit" required>
                                            <option value="">Select a Unit Type</option>
                                            @foreach(\App\Models\Unit::all() as $unit)
                                                <option>{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="photo">Product Photo</label>
                                        <div class="custom-file">
                                            <input name="photo" type="file" accept=".jpg, .png" class="custom-file-input">
                                            <label class="custom-file-label">Choose jpg, jpeg, png file</label>
                                        </div>
                                        <small>Resize your photo (width: 180px X height: 250px)</small>
                                    </div>
                                </div>

                                @foreach(\App\Models\Purchasecompany::all() as $warehouse)
                                    <div class="form-row">
                                        <div class="col-md-4 mb-6">
                                            <label for="warehouse">Purchase Company</label>
                                            <select class="form-control" name="warehouseId[]">
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <label for="quantity">Stock</label>
                                            <span class="required-star"></span>
                                            <input type="text" name="quantity[]" class="form-control" value="0" required placeholder="Enter Stock Quantity">

                                        </div>
                                    </div>
                                @endforeach

                            </fieldset>

                            <div class="form-group col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>







        </div>
    </div>

@endsection
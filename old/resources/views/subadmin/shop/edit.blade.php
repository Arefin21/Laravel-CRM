@extends('layouts.subadmin')
@section('title')
    <title>Shop Edit | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Unit</h4>
                    </div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('shop.update', $shop->id) }}">
                        @csrf
                        @method('PUT') <!-- Use PUT for update -->

                            <fieldset class="col-lg-12 border p-3 mb-3">
                                @if ($errors->any())
                                    <div class="alert alert-danger">

                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach

                                    </div>
                                @endif
                                <div class="form-row">

                                    <div class="col-md-6 mb-6">
                                        <label for="productName">Shop Name</label>
                                        <span class="required-star"></span>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter Shop Name" value="{{ $shop->shopName }}">
                                    </div>



                                    <div class="col-md-6 mb-6">
                                        <label for="price">Owner Name</label>
                                        <span class="required-star"></span>
                                        <input name="ownerName" type="text" class="form-control" required placeholder="Owner Name" value="{{ $shop->ownerName }}">
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label for="price">Mobile</label>
                                        <span class="required-star"></span>
                                        <input name="Mobile" type="text" class="form-control" required placeholder="Mobile" value="{{ $shop->Mobile }}">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label for="price">Address</label>
                                        <span class="required-star"></span>
                                        <input name="Address" type="text" class="form-control" required placeholder="Address" value="{{ $shop->Adress }}">
                                    </div>

                                    <input name="srId" type="hidden" class="form-control" required placeholder="Address" value="{{ $userId }}">
                                    <input name="warehouseId" type="hidden" class="form-control" required placeholder="Address" value="{{ $warehouseId }}">



                                </div>



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
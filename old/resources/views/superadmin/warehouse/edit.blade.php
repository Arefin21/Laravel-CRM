@extends('layouts.superadmin')
@section('title')
    <title>Warehouse Add | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Warehouse</h4>
                    </div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('warehouse.update', $warehouse->id) }}">
                        @csrf
                        @method('PUT') <!-- Use PUT or PATCH for updates -->

                            <fieldset class="col-lg-12 border p-3 mb-3">
                                <div class="form-row justify-content-center">
                                    <div class="col-md-4 mb-6">
                                        <label for="validationServer013">Warehouse Name</label>
                                        <span class="bmd-form-group">
                    <!-- Use old() method and warehouse data, with is-invalid class for validation -->
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $warehouse->name) }}" required>
                </span>
                                        <!-- Display validation error message -->
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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
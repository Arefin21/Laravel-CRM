@extends('layouts.superadmin')
@section('title')
    <title>Unit Add | Nurjahan Bazar</title>
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
                        <form role="form" method="POST" action="{{ route('unit.update', $unit->id) }}">
                        @csrf
                        @method('PUT') <!-- Use PUT for update -->

                            <fieldset class="col-lg-12 border p-3 mb-3">
                                <div class="form-row justify-content-center">
                                    <div class="col-md-4 mb-6">
                                        <label for="validationServer013">Unit Name</label>
                                        <span class="requierd-star">*</span>
                                        <span class="bmd-form-group">
                    <!-- Add old() method to retain the value after validation error and apply is-invalid class if there's an error -->
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $unit->name) }}" required>
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
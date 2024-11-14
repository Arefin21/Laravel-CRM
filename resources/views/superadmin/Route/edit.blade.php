@extends('layouts.superadmin')
@section('title')
    <title>Route Edit | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Route</h4>
                    </div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('route.update', $unit->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <fieldset class="col-lg-12 border p-3 mb-3">
                                <div class="form-row">
                                    <div class="col-md-4 mb-6">
                                        <label for="name">Name</label><span class="required-star">*</span>
                                        <span class="bmd-form-group">
                    <input type="text" name="name" id="name" class="form-control" required="" value="{{ $unit->name }}">
                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                </span>
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
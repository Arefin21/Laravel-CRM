@extends('layouts.superadmin')
@section('title')
    <title>Trip Edit | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Trip</h4>
                    </div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('trip.update', $unit->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <fieldset class="col-lg-12 border p-3 mb-3">
                                <div class="form-row">
                                    <div class="col-md-4 mb-6">
                                        <label for="name">Client Name</label><span class="required-star">*</span>
                                        <input type="text" name="name" id="name" class="form-control" required value="{{ $unit->name }}">
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="driver">Driver</label>
                                        <select name="driver" class="form-control" required>
                                            <option value="">Select Driver</option>
                                            @foreach(\App\Models\Driver::all() as $list)
                                                <option value="{{ $list->id }}" {{ $list->id == $unit->driver ? 'selected' : '' }}>
                                                    {{ $list->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="route">Route</label>
                                        <select name="route" class="form-control" required>
                                            <option value="">Select Route</option>
                                            @foreach(\App\Models\Route::all() as $list)
                                                <option value="{{ $list->id }}" {{ $list->id == $unit->route ? 'selected' : '' }}>
                                                    {{ $list->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="description">Details</label><span class="required-star">*</span>
                                        <textarea name="description" id="description" class="form-control" required>{{ $unit->description }}</textarea>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="fare">Fare</label><span class="required-star">*</span>
                                        <input type="text" name="fare" id="fare" class="form-control" value="{{ $unit->fare }}" required>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="daTe">Trip Date</label><span class="required-star">*</span>
                                        <input type="date" name="daTe" id="daTe" class="form-control" value="{{ $unit->daTe }}" required>
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
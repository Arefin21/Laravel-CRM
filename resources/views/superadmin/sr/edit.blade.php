@extends('layouts.superadmin')
@section('title')
    <title>SR Edit | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit SR</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{route('sr.update',$sr->id)}}">
                            @csrf
                                <fieldset class="col-lg-12 border p-3 mb-3">
                                    <!-- <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold ">Personal Information</small></legend>  -->

                                    <div class="form-row">
                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Warehouse</label>
                                            <select class="form-control" id="paymentType" required="" name="warehouse">
                                                <option value="{{ $sr->warehouse }}">{{ $sr->warehouse ? \App\Models\Warehouse::find($sr->warehouse)->name : 'Select a Warehouse' }}</option>
                                                @foreach(\App\Models\Warehouse::pluck('name', 'id') as $id => $name)
                                                    <option value="{{ $id }}" {{ $sr->warehouse == $id ? 'selected' : '' }}>{{ $name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Name</label>
                                            <span class="requierd-star"></span>
                                            <span class="bmd-form-group"><input type="text" class="form-control" required="" name="srName" placeholder="Name" value="{{ $sr->name }}"></span>
                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Mobile Number </label>
                                            <span class="requierd-star"></span>
                                            <span class="bmd-form-group"><input type="text" class="form-control" required="" name="srMobile" placeholder="Mobile Number" value="{{ $sr->mobile }}"></span>
                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">E-mail Address  </label>

                                            <span class="bmd-form-group"><input type="text" class="form-control" required="" name="srEmail" placeholder="E-mail Address" value="{{ $sr->email }}"></span>
                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Address</label>
                                            <span class="bmd-form-group"><input type="text" class="form-control" required="" name="srAddress" placeholder="Address" value="{{ $sr->srAddress }}"></span>
                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">NID Number</label>
                                            <span class="bmd-form-group"><input type="text" class="form-control" required="" name="srNid" placeholder="NID Number" value="{{ $sr->srNid }}"></span>
                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Education</label>
                                            <select class="form-control" id="paymentType" required="" name="srEducation" placeholder="Education">
                                                <option value="{{ $sr->srEducation }}">{{ $sr->srEducation ?: 'Select an Education Type' }}</option>
                                                <option value="SSC">SSC</option>
                                                <option value="HSC">HSC</option>
                                                <option value="Degree">Degree</option>
                                                <option value="Masters">Masters</option>
                                            </select>

                                        </div>

                                        <div class="col-md-4 mb-6">

                                            <label for="comments">
                                                Certificate
                                            </label>
                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__104__BV_file_outer_">
                                                <input type="file" accept=".jpg, .png" class="custom-file-input" id="__BVID__104" name="certificate">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__104">Choose jpg,jpeg,png file</label>
                                            </div>
                                            <small>Resize your photo (width:180px X height:250px)</small>
                                            <div class="invalid-feedback"></div>

                                        </div>

                                        <div class="col-md-4 mb-6">

                                            <label for="comments">
                                                SR Photo
                                            </label>
                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__104__BV_file_outer_">
                                                <input type="file" accept=".jpg, .png" class="custom-file-input" id="__BVID__104" name="image">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__104">Choose jpg,jpeg,png file</label>
                                            </div>
                                            <small>Resize your photo (width:180px X height:250px)</small>
                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Password</label>
                                            <span class="bmd-form-group"><input type="text" class="form-control" name="password" placeholder="******"></span>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-group col-lg-12 text-center"><button name="" type="submit" class="btn btn-primary"><span>Submit</span></button></div>
                            </form>


                    </div>
                </div>
            </div>







        </div>
    </div>

@endsection
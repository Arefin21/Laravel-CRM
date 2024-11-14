@extends('layouts.superadmin')
@section('title')
    <title>Driver Add | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Driver Registration Information</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">

                        <form role="form" method="POST" action="{{ route('driver.store') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="col-lg-12 border p-3 mb-3">
                                <div class="form-row">
                                    <div class="col-md-4 mb-6">
                                        <label for="name">Name</label><span class="required-star">*</span>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="mobile">Mobile Number</label><span class="required-star">*</span>
                                        <input type="text" name="mobile" id="mobile" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="licence">License Number</label><span class="required-star">*</span>
                                        <input type="text" name="licence" id="licence" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="car">Car Number</label><span class="required-star">*</span>
                                        <input type="text" name="car" id="car" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="document">Driver Document</label>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg, .png" name="document" class="custom-file-input" id="document">
                                            <label class="custom-file-label" for="document">Choose jpg, jpeg, png file</label>
                                        </div>
                                        <small>Resize your document (width:180px X height:250px)</small>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="address">Address</label><span class="required-star">*</span>
                                        <input type="text" name="address" id="address" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="nid">NID Number</label><span class="required-star">*</span>
                                        <input type="text" name="nid" id="nid" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-6">
                                        <label for="photo">Driver Photo</label>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg, .png" name="photo" class="custom-file-input" id="photo">
                                            <label class="custom-file-label" for="photo">Choose jpg, jpeg, png file</label>
                                        </div>
                                        <small>Resize your photo (width:180px X height:250px)</small>
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
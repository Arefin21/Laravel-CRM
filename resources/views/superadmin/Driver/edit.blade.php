@extends('layouts.superadmin')
@section('title')
    <title>Driver Edit | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Driver</h4>
                    </div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('driver.update', $unit->id) }}" enctype="multipart/form-data">
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

                                    <div class="col-md-4 mb-6">
                                        <label for="mobile">Mobile Number</label><span class="required-star">*</span>
                                        <span class="bmd-form-group">
                    <input type="text" name="mobile" id="mobile" class="form-control" required="" value="{{ $unit->mobile }}">
                    @error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                </span>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="licence">License Number</label><span class="required-star">*</span>
                                        <span class="bmd-form-group">
                    <input type="text" name="licence" id="licence" class="form-control" required="" value="{{ $unit->licence }}">
                    @error('licence')<small class="text-danger">{{ $message }}</small>@enderror
                </span>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="car">Car Number</label><span class="required-star">*</span>
                                        <span class="bmd-form-group">
                    <input type="text" name="car" id="car" class="form-control" required="" value="{{ $unit->car }}">
                    @error('car')<small class="text-danger">{{ $message }}</small>@enderror
                </span>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="document">Driver Document</label>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg, .png" name="document" class="custom-file-input" id="document">
                                            <label class="custom-file-label" for="document">Choose jpg, jpeg, png file</label>
                                        </div>
                                        @if($unit->document)
                                            <img src="{{ asset('uploads/drivers/' . $unit->document) }}" alt="Document" width="100" class="mt-2">
                                        @endif
                                        <small>Resize your document (width:180px X height:250px)</small>
                                        @error('document')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="address">Address</label><span class="required-star">*</span>
                                        <span class="bmd-form-group">
                    <input type="text" name="address" id="address" class="form-control" required="" value="{{ $unit->address }}">
                    @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                </span>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="nid">NID Number</label><span class="required-star">*</span>
                                        <span class="bmd-form-group">
                    <input type="text" name="nid" id="nid" class="form-control" required="" value="{{ $unit->nid }}">
                    @error('nid')<small class="text-danger">{{ $message }}</small>@enderror
                </span>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <label for="photo">Driver Photo</label>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg, .png" name="photo" class="custom-file-input" id="photo">
                                            <label class="custom-file-label" for="photo">Choose jpg, jpeg, png file</label>
                                        </div>
                                        @if($unit->photo)
                                            <img src="{{ asset('uploads/drivers/' . $unit->photo) }}" alt="Driver Photo" width="100" class="mt-2">
                                        @endif
                                        <small>Resize your photo (width:180px X height:250px)</small>
                                        @error('photo')<small class="text-danger">{{ $message }}</small>@enderror
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
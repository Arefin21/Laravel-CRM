@extends('layouts.subscriber')
@section('title')
    <title>Upload Photos | Subscriber | Women & e-Commerce</title>
@endsection
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Upload Photos</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>

                    <form method="POST" action="{{route('upload-form')}}" enctype="multipart/form-data">
                        {{--<form method="POST" action="">--}}
                        @csrf
                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                        <input name="subscriber_logo" type="hidden" value="{{ $subscriber->logo}}" class="form-control">
                        <input name="subscriber_product1" type="hidden" value="{{ $subscriber->product1}}" class="form-control">
                        <input name="subscriber_product2" type="hidden" value="{{ $subscriber->product2}}" class="form-control">
                        <input name="subscriber_owner" type="hidden" value="{{ $subscriber->owner}}" class="form-control">


                        <div class="card-body">
                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold "> Logo / Photo</small></legend>

                                <div class="form-row">

                                    <div class="col-md-6 mb-6">
                                        <div class="form-group col-10">
                                            <label for="comments">
                                                Company Logo
                                                <span class="requierd-star"></span></label>
                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__104__BV_file_outer_">
                                                <input type="file" name="logo" accept=".jpg, .png" class="custom-file-input" id="__BVID__104">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__104">Choose jpg,jpeg,png file</label>
                                            </div>

                                            @if($subscriber->logo)
                                                <img src="{{ asset('uploads/logo/'.$subscriber->logo) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                            @endif

                                            {{--<img src="{{ asset('uploads/logo/'.$subscriber->logo) }}" class="img-thumbnail" width="100" height="100" />--}}

                                            @error('logo')
                                            <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                            @enderror<br>
                                            <small>Resize your photo (width:300px X height:300px)</small>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <div class="form-group col-10">
                                            <label for="comments">
                                                Owner Photo
                                                <span class="requierd-star"></span></label>
                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__10444__BV_file_outer_">
                                                <input type="file" name="owner" accept=".jpg, .png" class="custom-file-input" id="__BVID__1044">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__1044">Choose jpg,jpeg,png file</label>
                                            </div>

                                            @if($subscriber->logo)
                                                <img src="{{ asset('uploads/owner/'.$subscriber->owner) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                            @endif

                                            {{--<img src="{{ asset('uploads/logo/'.$subscriber->logo) }}" class="img-thumbnail" width="100" height="100" />--}}

                                            @error('logo')
                                            <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                            @enderror<br>
                                            <small>Resize your photo (width:300px X height:300px)</small>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Product Photo </small></legend>

                                <div class="form-row">

                                    <div class="col-md-6 mb-6">
                                        <div class="form-group col-10">
                                            {{--<label for="comments">--}}
                                                {{--Product Category 1--}}
                                            {{--</label>--}}
                                            <div class="select-cusom-margin" style="margin-bottom: 10px;">
                                            <select id="inputState" name="category1" class="form-control">

                                                @if($subscriber->category1 !='')
                                                <option selected>{{$subscriber->category1}}</option>
                                                    @else
                                                    <option selected>Select Category 1</option>
                                                @endif
                                                @foreach(\App\Models\Category::all() as $category)
                                                <option>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__105pro1__BV_file_outer_">
                                                <input type="file" name="product1" accept=".jpg, .png" class="custom-file-input" id="__BVID__105pro1">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__105pro1">Choose jpg, png file</label>
                                            </div>
                                            @if($subscriber->product1)
                                                <img src="{{ asset('uploads/product1/'.$subscriber->product1) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                            @endif
                                            @error('product1')
                                            <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                            @enderror</div><br>
                                            <small>Resize your photo (width:300px X height:300px)</small>
                                            <div class="invalid-feedback"></div>
                                        <div class="col-md-10 mb-12">
                                            <label for="validationServer013">Category 1 Details </label>
                                            <span class="requierd-star"></span>
                                            <span class="bmd-form-group is-filled"><input name="details1" type="text" class="form-control" value="{{$subscriber->details1}}" placeholder="maximum 5 word" autocomplete="fname"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <div class="form-group col-10">
                                            <div class="select-cusom-margin" style="margin-bottom: 10px;">
                                                <select id="inputState" name="category2" class="form-control">

                                                    @if($subscriber->category2 !='')
                                                        <option selected>{{$subscriber->category2}}</option>
                                                    @else
                                                        <option selected>Select Category 2</option>
                                                    @endif
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        <option>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__10522pro1__BV_file_outer_">
                                                <input type="file" name="product2" accept=".jpg, .png" class="custom-file-input" id="__BVID__10522pro1">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__10522pro1">Choose jpg, png file</label>
                                            </div>
                                            @if($subscriber->product2)
                                                <img src="{{ asset('uploads/product2/'.$subscriber->product2) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                            @endif
                                            @error('product1')
                                            <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                            @enderror</div><br>
                                        <small>Resize your photo (width:300px X height:300px)</small>
                                        <div class="invalid-feedback"></div>
                                        <div class="col-md-10 mb-12">
                                            <label for="validationServer013">Category 2 Details </label>
                                            <span class="requierd-star"></span>
                                            <span class="bmd-form-group is-filled"><input name="details2" type="text" class="form-control" value="{{$subscriber->details2}}" placeholder="maximum 5 word" autocomplete="fname"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <div class="form-group col-10">
                                            <div class="select-cusom-margin" style="margin-bottom: 10px;">
                                                <select id="inputState" name="category3" class="form-control">

                                                    @if($subscriber->category3 !='')
                                                        <option selected>{{$subscriber->category3}}</option>
                                                    @else
                                                        <option selected>Select Category 3</option>
                                                    @endif
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        <option>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__10533pro1__BV_file_outer_">
                                                <input type="file" name="product3" accept=".jpg, .png" class="custom-file-input" id="__BVID__10533pro1">
                                                <label data-browse="Browse" class="custom-file-label" for="__BVID__10533pro1">Choose jpg, png file</label>
                                            </div>
                                            @if($subscriber->product3)
                                                <img src="{{ asset('uploads/product3/'.$subscriber->product3) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                            @endif
                                            @error('product1')
                                            <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                            @enderror</div><br>
                                        <small>Resize your photo (width:300px X height:300px)</small>
                                        <div class="invalid-feedback"></div>
                                        <div class="col-md-10 mb-12">
                                            <label for="validationServer013">Category 3 Details </label>
                                            <span class="requierd-star"></span>
                                            <span class="bmd-form-group is-filled"><input name="details3" type="text" class="form-control" value="{{$subscriber->details3}}" placeholder="maximum 5 word" autocomplete="fname"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <div class="form-group col-10">
                                            <div class="select-cusom-margin" style="margin-bottom: 10px;">
                                                <select id="inputState" name="category4" class="form-control">

                                                    @if($subscriber->category4 !='')
                                                        <option selected>{{$subscriber->category4}}</option>
                                                    @else
                                                        <option selected>Select Category 4</option>
                                                    @endif
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        <option>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                                <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__1053344pro1__BV_file_outer_">
                                                    <input type="file" name="product4" accept=".jpg, .png" class="custom-file-input" id="__BVID__1053344pro1">
                                                    <label data-browse="Browse" class="custom-file-label" for="__BVID__1053344pro1">Choose jpg, png file</label>
                                                </div>
                                                @if($subscriber->product4)
                                                    <img src="{{ asset('uploads/product4/'.$subscriber->product4) }}" class="img-thumbnail" width="100" height="100" />
                                                @else
                                                    <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                                @endif
                                                @error('product1')
                                                <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                            @enderror</div><br>
                                        <small>Resize your photo (width:300px X height:300px)</small>
                                        <div class="invalid-feedback"></div>
                                        <div class="col-md-10 mb-12">
                                            <label for="validationServer013">Category 4 Details </label>
                                            <span class="requierd-star"></span>
                                            <span class="bmd-form-group is-filled"><input name="details4" type="text" class="form-control" value="{{$subscriber->details4}}" placeholder="maximum 5 word" autocomplete="fname"></span>
                                        </div>
                                    </div>



                                </div>







                                </div>
                            </fieldset>

                            <div class="form-group col-lg-12 text-center"><button name="" type="submit" class="btn btn-primary"><span>Save</span></button></div>
                        </div>

                    </form>



                </div>
            </div>
        </div>

    </div>
@endsection
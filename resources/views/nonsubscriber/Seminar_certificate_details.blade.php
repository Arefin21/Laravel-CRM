@extends('layouts.nonsubscriber')
@section('title')
    <title>Seminar Certificate | Non Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title"> {{ \App\Models\Seminar::where(['id' => $subscription_fees_submit->seminar_id])->pluck('title')->first() }}</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    @php

                        $name = $subscription_fees_submit->username;
                        $name_len = $name;
                            $image = "storage/framework/views/certificate/seminar/{$seminar_id}/{$certificatename->logo}";

                            $createimage = imagecreatefrompng($image);
                        //this is going to be created once the generate button is clicked
              $output = "storage/framework/views/certificate/seminar/{$seminar_id}/{$subscription_fees_submit->username}.png";

              //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
              $white = imagecolorallocate($createimage, 205, 245, 255);
              $black = imagecolorallocate($createimage, 0, 0, 0);

              //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
              $rotation = 0;

              //we then set the x and y axis to fix the position of our text name
              $origin_x = 280;
              $origin_y=315;

              if($name_len<=7){
                $font_size = 35;
                $origin_y=400;
                $origin_x = 380;
              }
              elseif($name_len<=12){
                $font_size = 25;
                $origin_y=400;
                $origin_x = 345;
              }
              elseif($name_len<=15){
                $origin_y=400;
                $origin_x = 330;
                $font_size = 25;
              }
              elseif($name_len<=20){
                $origin_y=400;
                $origin_x = 310;
                $font_size = 24;
              }
              elseif($name_len<=22){
                $origin_y=400;
                $origin_x = 310;
                $font_size = 24;
              }
              elseif($name_len<=27){
                    $origin_y=400;
                $origin_x = 270;
                $font_size=24;
              }
              elseif($name_len<=33){
                    $origin_y=400;
                $origin_x = 260;
                $font_size=22;
              }
              else {
                $font_size =10;
              }

              $certificate_text = $name;

              //font directory for name
              $drFont = dirname(__FILE__)."/certificate/seminar/developer.ttf";

              //function to display name on certificate picture
              $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);

              imagepng($createimage,$output,3);



                    @endphp
                    {{--<img style="width:100%;height:auto;" src="http://weforumbd.org/public/storage/framework/views/certificate/seminar/<?php echo $seminar_id;?>/<?php echo $subscription_fees_submit->username;?>.png">--}}
                    {{--<br>--}}
                    {{--<a target="_blank" href="http://weforumbd.org/public/storage/framework/views/certificate/seminar/<?php echo $seminar_id;?>/<?php echo $subscription_fees_submit->username;?>.png" class="btn btn-success">Download My Certificate</a>--}}

                    <img style="width:100%;height:auto;" src="{{asset('/')}}storage/framework/views/certificate/seminar/<?php echo $seminar_id;?>/<?php echo $subscription_fees_submit->username;?>.png">
                    <br>
                    <a target="_blank" href="{{asset('/')}}storage/framework/views/certificate/seminar/<?php echo $seminar_id;?>/<?php echo $subscription_fees_submit->username;?>.png" class="btn btn-success">Download My Certificate</a>



                </div>
            </div>
        </div>

    </div>
@endsection
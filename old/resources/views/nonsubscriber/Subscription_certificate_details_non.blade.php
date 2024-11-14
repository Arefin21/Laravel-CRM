@extends('layouts.nonsubscriber')
@section('title')
    <title>Subscription Certificate | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title"> {{ \App\Models\SubscriptionFeess::where(['id'=> $subscription_fees_submit->subscriptionid])->pluck('title')->first() }}</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    @php

                        $name= $subscriber->entrepreneur_name;
                        $number= $subscriber->subscriber_number;


                        $name_len= strlen($name);
                        $number_len= strlen($number);

                            $image= "storage/framework/views/certificate/subscriber/{$seminar_id}/{$certificatename->logo}";

                            $createimage= imagecreatefrompng($image);
                        //this is going to be created once the generate button is clicked
              $output= "storage/framework/views/certificate/subscriber/{$seminar_id}/{$subscription_fees_submit->name}.png";

              //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
             $white= imagecolorallocate($createimage, 205, 245, 255);
              $black= imagecolorallocate($createimage, 0, 0, 0);

              //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
              $rotation= 0;

              //we then set the x and y axis to fix the position of our text name
              $origin_x = 280;
              $origin_y=315;

            if($number_len<=12){
                            $font_number_size= 14;
                            $origin_number_y=282;
                            $origin_number_x= 445;
            }
			elseif($number_len<=13){
                            $font_number_size= 16;
                            $origin_number_y=282;
                            $origin_number_x= 428;
            }

			elseif($number_len<=14){
                            $font_number_size= 16;
                            $origin_number_y=282;
                            $origin_number_x= 428;
            }
			elseif($number_len<=15){
                            $font_number_size= 15;
                            $origin_number_y=282;
                            $origin_number_x= 428;
            }

            elseif($number_len<=16){
                            $font_number_size= 14;
                            $origin_number_y=282;
                            $origin_number_x= 428;
            }

			elseif($number_len<=17){
                            $font_number_size= 13;
                            $origin_number_y=282;
                            $origin_number_x= 428;
            }

			elseif($number_len<=18){
                            $font_number_size= 12;
                            $origin_number_y=282;
                            $origin_number_x= 432;
            }

			elseif($number_len<=18){
                            $font_number_size= 12;
                            $origin_number_y=282;
                            $origin_number_x= 432;
            }

            elseif($number_len<=20){
                            $font_number_size= 11;
                            $origin_number_y=282;
                            $origin_number_x= 432;
            }

			elseif($number_len<=21){
                            $font_number_size= 11;
                            $origin_number_y=282;
                            $origin_number_x= 432;
            }
			elseif($number_len<=22){
                            $font_number_size= 10;
                            $origin_number_y=282;
                            $origin_number_x= 432;
            }
			elseif($number_len<=23){
                            $font_number_size= 9;
                            $origin_number_y=282;
                            $origin_number_x= 434;
            }
			elseif($number_len<=24){
                            $font_number_size= 9;
                            $origin_number_y=282;
                            $origin_number_x= 434;
            }
            elseif($number_len<=25){
                            $font_number_size= 9;
                            $origin_number_y=282;
                            $origin_number_x= 430;
            }

			elseif($number_len<=26){
                            $font_number_size= 8;
                            $origin_number_y=282;
                            $origin_number_x= 434;
            }

			elseif($number_len<=27){
                            $font_number_size= 7;
                            $origin_number_y=282;
                            $origin_number_x= 435;
            }

            elseif($number_len<=30){
                            $font_number_size= 7;
                            $origin_number_y=282;
                            $origin_number_x= 425;
            }

            else{
                            $font_number_size= 10;
                            $origin_number_y=282;
                            $origin_number_x= 430;
            }


              if($name_len<=7){
                $font_size= 35;
                $origin_y=400;
                $origin_x = 380;
              }

			  if($name_len<=8){
                $font_size= 30;
                $origin_y=400;
                $origin_x  = 375;
              }

			  if($name_len<=9){
                $font_size= 30;
                $origin_y=400;
                $origin_x = 360;
              }

			  if($name_len<=10){
                $font_size= 27;
                $origin_y=400;
                $origin_x = 360;
              }

			  if($name_len<=11){
                $font_size= 25;
                $origin_y=400;
                $origin_x = 360;
              }

              elseif($name_len<=12){
                $font_size= 25;
                $origin_y=400;
                $origin_x = 345;
              }

			  elseif($name_len<=13){
                $font_size= 25;
                $origin_y=400;
                $origin_x  = 345;
              }

			  elseif($name_len<=14){
                $font_size= 25;
                $origin_y=400;
                $origin_x = 340;
              }

              elseif($name_len<=15){
                $origin_y=400;
                $origin_x = 325;
                $font_size= 25;
              }
			  elseif($name_len<=16){
                $origin_y=400;
                $origin_x = 325;
                $font_size= 25;
              }
			  elseif($name_len<=17){
                $origin_y=400;
                $origin_x  = 315;
                $font_size= 25;
              }
			  elseif($name_len<=18){
                $origin_y=400;
                $origin_x = 310;
                $font_size= 25;
              }
			  elseif($name_len<=19){
                $origin_y=400;
                $origin_x = 300;
                $font_size= 25;
              }

              elseif($name_len<=20){
                $origin_y=400;
                $origin_x  = 295;
                $font_size= 24;
              }
			  elseif($name_len<=21){
                $origin_y=400;
                $origin_x = 290;
                $font_size= 24;
              }

              elseif($name_len<=22){
                $origin_y=400;
                $origin_x = 270;
                $font_size= 24;
              }
			   elseif($name_len<=23){
                $origin_y=400;
                $origin_x = 265;
                $font_size= 22;
              }

              elseif($name_len<=24){
                    $origin_y=400;
                $origin_x = 267;
                $font_size=21;
              }

			  elseif($name_len<=25){
                    $origin_y=400;
                $origin_x = 270;
                $font_size=20;
              }

			  elseif($name_len<=26){
                    $origin_y=400;
                $origin_x = 270;
                $font_size=20;
              }

			  elseif($name_len<=27){
                    $origin_y=400;
                $origin_x = 272;
                $font_size=19;
              }

			   elseif($name_len<=28){
                    $origin_y=400;
                $origin_x = 275;
                $font_size=18;
              }

			   elseif($name_len<=29){
                    $origin_y=400;
                $origin_x = 275;
                $font_size=17;
              }

			   elseif($name_len<=30){
                    $origin_y=400;
                $origin_x  = 275;
                $font_size=16;
              }

			  elseif($name_len<=31){
                    $origin_y=400;
                $origin_x = 276;
                $font_size=15;
              }
			  elseif($name_len<=32){
                    $origin_y=400;
                $origin_x = 280;
                $font_size=14;
              }
              elseif($name_len<=33){
                    $origin_y=400;
                $origin_x = 280;
                $font_size=14;
              }
              else {
                $font_size=10;
              }

              $certificate_text= $name;
              $number_text= $number;

              //font directory for name
              $drFont= dirname(__FILE__)."/certificate/seminar/developer.ttf";

              //function to display name on certificate picture
              $text1= imagettftext($createimage, $font_size, $rotation, $origin_x ?? ''  , $origin_y, $black, $drFont, $certificate_text);
              $text2= imagettftext($createimage, $font_number_size, $rotation, $origin_number_x, $origin_number_y, $black, $drFont, $number_text);

              imagepng($createimage,$output,3);

                    @endphp
                    <img style="width:100%;height:auto;" src="{{asset('/')}}storage/framework/views/certificate/subscriber/<?php echo $seminar_id;?>/<?php echo $subscription_fees_submit->name;?>.png">
                    <br>
                    <a target="_blank" href="{{asset('/')}}storage/framework/views/certificate/subscriber/<?php echo $seminar_id;?>/<?php echo $subscription_fees_submit->name;?>.png" class="btn btn-success">Download My Certificate</a>

                </div>
            </div>
        </div>

    </div>
@endsection
@extends('layouts.nonsubscriber')
@section('title')
    <title>Money Receipt | Non Subscriber | Women & e-Commerce</title>
@endsection
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@section('main')
    @if (isset($subscription_fees_submit->userid))


        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Money Receipt</h4>
                <!-- <p class="card-category">Complete your profile</p> -->
            </div>


            <div class="container">
                <div class="row">
                    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" style="font-size: 13px; margin-top: 25px;">
                        <div style="padding:10px 15px;">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <address>
                                        <strong>Women & Ecommerce</strong>
                                        <br>
                                        Haji Shahab Uddin Complex, House: 84, New Airport Road, Banani, Dhaka
                                        <br>
                                        <abbr title="Phone">P:</abbr> 01622236630
                                    </address>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                    <p>
                                        <em>Date: {{ Carbon\Carbon::parse($subscription_fees_submit->created_at)->format('Y-m-d') }}</em>
                                    </p>
                                    <p>
                                        <em>Receipt : #SPF{{$subscription_fees_submit->seminar_id}}{{$id}}</em>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <h1>Receipt</h1>
                                </div>
                                </span>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="col-md-7"><em> {{ \App\Models\Seminar::where(['id' => $subscription_fees_submit->seminar_id])->pluck('title')->first() }}</em></h4></td>
                                        <td class="col-md-1" style="text-align: center"> </td>
                                        <td class="col-md-1 text-center"></td>
                                        <td class="col-md-3 text-center">{{$subscription_fees_submit->amount}}TK</td>
                                    </tr>

                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td class="text-right">
                                            <p>
                                                <strong>Subtotal: </strong>
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <p>
                                                <strong>{{$subscription_fees_submit->amount}}TK</strong>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                        <td class="text-center text-danger"><h4><strong>{{$subscription_fees_submit->amount}}TK</strong></h4></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a target="_blank" href="{{ route('seminarreceiptview',$subscription_fees_submit->seminar_id) }}" class="btn btn-success btn-lg btn-block">
                                    Download/Print   <span class="glyphicon glyphicon-chevron-right"></span>
                                </a></td>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


    @endif

@endsection

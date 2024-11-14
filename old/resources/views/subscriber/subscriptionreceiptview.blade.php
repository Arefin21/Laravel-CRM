<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Invoice">
    <meta name="author" content="GeniusOcean">

    <title>Money Receipt</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('assets/print/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/print/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/print/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/print/css/style.css')}}">
    <link href="{{asset('assets/print/css/print.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        @page { size: auto;  margin: 0mm; }
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 287mm;
            }

            html {

            }
            ::-webkit-scrollbar {
                width: 0px;  /* remove scrollbar space */
                background: transparent;  /* optional: just make scrollbar invisible */
            }
    </style>
</head>
<body onload="window.print();">
<div class="invoice-wrap">



    <div id="invoice">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

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
                                    <em>Receipt : #SPF{{$subscription_fees_submit->subscriptionid}}{{$id}}</em>
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
                                    <td class="col-md-7"><em> {{ \App\Models\SubscriptionFeess::where(['id' => $subscription_fees_submit->subscriptionid])->pluck('title')->first() }}</em></h4></td>
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
                            </td>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


</div>
<!-- ./wrapper -->

<script type="text/javascript">
    setTimeout(function () {
        window.close();
    }, 1000);
</script>

</body>
</html>

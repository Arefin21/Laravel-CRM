<!DOCTYPE html>
<html lang="en">

<head class="head-dashboard">
    <title>Nurjahan Corporation </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="{{ asset('/') }}asset/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('/') }}asset/css/styles.css" rel="stylesheet">

    <script>
        // Auto-print when the page loads
        window.addEventListener('load', function () {
            window.print();
        });
        window.addEventListener('afterprint', function () {
            window.history.back();
        });
    </script>
</head>


<body class="">


<div class="wrapper">


    <div class="main-panel">


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="invoiceholder">
                            <div id="invoice" class="effect2">
                                <div id="invoice-top">

                                    <div class="titless">
                                        <h1>ncino # 00{{ $order->id }}</h1>
                                        <p>Issued: {{ $order->created_at->format('F d, Y') }}</p>
                                        {{--                                        <p>Payment Due: {{ $order->created_at->addDays(30)->format('F d, Y') }}</p> <!-- Example for due date -->--}}
                                    </div>
                                    <div class="header-middle">
                                        <div class="logo-soft"></div>
                                        <div class="info" style="text-align:left">
                                            <h2>Nurjahan Corporation</h2>
                                            <h2 style="font-size: 14px;">info@nurjahan.com.bd</h2>
                                            <h2 style="font-size: 14px;">02-41023368 &nbsp; 01726 654557 </h2>
                                            <p style="font-size: 14px;">Dhaka Office: 13c/3c, Babor Road, Mohammadpur, Dhaka-1207</p>
                                            <p style="font-size: 14px;">Manikgonj Office: Khan Market, Bongkhuri BazarM<br> Hatipara, Sadar, Manikganj-1800</p>
                                        </div>
                                    </div>
                                    <div class="header-right">
                                        <div class="info" style="text-align:left">
                                            <h2>{{ \App\Models\SrShop::where('id',$order->shop_id)->first()->shopName }}</h2>
                                            <p style="font-size: 14px;">{{ \App\Models\SrShop::where('id',$order->shop_id)->first()->ownerName }}</p> <!-- Assuming you want to show the authenticated user's name -->
                                            <p style="font-size: 14px;">{{ \App\Models\SrShop::where('id',$order->shop_id)->first()->Mobile }}</p> <!-- User email -->
                                            <p style="font-size: 14px;">{{ \App\Models\SrShop::where('id',$order->shop_id)->first()->Adress }}</p> <!-- Assuming you have a phone field in the user model -->
                                        </div>
                                    </div>
                                </div>

                                <div id="invoice-bot">
                                    <div id="table">
                                        <table>
                                            <tr class="tabletitle">
                                                <td class="item">
                                                    <h2>Serial</h2>
                                                </td>
                                                <td class="item">
                                                    <h2>Product Name</h2>
                                                </td>
                                                <td class="Hours">
                                                    <h2>Quantity</h2>
                                                </td>
                                                <td class="Rate">
                                                    <h2>Price</h2>
                                                </td>

                                                <td class="subtotal">
                                                    <h2>Total Price</h2>
                                                </td>
                                            </tr>

                                            @foreach($items as $index => $item)
                                                @php
                                                    $productName = optional($item->product)->name ?? 'N/A';
                                                @endphp
                                                @if($productName !== 'N/A')
                                                    <tr class="service">
                                                        <td class="tableitem">
                                                            <p class="itemtext">{{ $index + 1 }}</p> <!-- Serial number -->
                                                        </td>
                                                        <td class="tableitem">
                                                            <p class="itemtext">{{ $productName }}</p> <!-- Product name with null check -->
                                                        </td>
                                                        <td class="tableitem">
                                                            <p class="itemtext">{{ $item->quantity }}</p> <!-- Quantity -->
                                                        </td>
                                                        <td class="tableitem">
                                                            <p class="itemtext">{{ number_format($item->price, 2) }} Tk</p> <!-- Price -->
                                                        </td>
                                                        <td class="tableitem">
                                                            <p class="itemtext">{{ number_format($item->total, 2) }} Tk</p> <!-- Total Price -->
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach



                                            <tr class="tabletitle" style="background: #b3afaf;">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="Rate">
                                                    <h2>Sub Total</h2>
                                                </td>
                                                <td class="payment">
                                                    <h2>{{ number_format($order->total_amount, 2) }} Tk</h2> <!-- Total Amount -->
                                                </td>
                                            </tr>

                                            <tr class="tabletitle">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="Rate">
                                                    <h2>Discount</h2>
                                                </td>
                                                <td class="payment">
                                                    <h2>{{ number_format($order->discount, 2) }} Tk</h2> <!-- Discount Amount -->
                                                </td>
                                            </tr>

                                            <tr class="tabletitle" style="background: #012652; color: #fff;">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="Rate">
                                                    <h2 style="color: #fff;">Total</h2>
                                                </td>
                                                <td class="payment">
                                                    <h2 style="color: #fff;">{{ number_format($order->final_total, 2) }} Tk</h2> <!-- Final Total -->
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="container">
                                    <!-- Signature and Condition Section -->
                                    <div class="row" style="margin-top: 20px; padding-bottom: 15px;">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <strong style="font-weight:700">Tearms & Condition:</strong>
                                            <p>By signing below, the client agrees to the terms and conditions of the contract.</p>
                                        </div>
                                    </div>

                                    <!-- Signature Lines -->
                                    <div class="row" style="margin-top: 20px; padding-bottom: 15px;">
                                        <div class="footer-sign">
                                            <div class="Signature-sec">
                                                 <p>_________</p>
                                                <p>Authorized Signature</p>
                                            </div>
                                            <div class="Signature-sec">
                                                <p>_________</p>
                                                <p>Client Signature</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <style type="text/css">
        
            .footer-sign {
                display: flex;
                justify-content: space-around;
                width: 100%;
                text-align: -webkit-center;
            }
            
            
            .h1, .h2, .h3, .h4, body, h1, h2, h3, h4, h5, h6 {
                font-family: Roboto, Helvetica, Arial, sans-serif;
                font-weight: 300;
                line-height: 1.5em;
            }
            .info h1{
                font-size: 1.5em;
                color: #222;
            }
            .titless h1 {
                font-size: 2rem;
                color: #222;
            }
            .titless h2{
                font-size: .9em;
            }


            #table> h2 {
                font-size: 1rem;
                color: #222;
                font-weight: 500;
            }
            .tabletitle h2{
                font-size: 1rem;
                color: #222;
                font-weight: 500;
            }
            .titless> h2 {
                font-size: 1rem;
                color: #222;
                font-weight: 500;
            }
            .info h2 {
                font-size: 1rem;
                font-weight: 500;
            }
            #project> h2{
                font-size: 1rem;
                font-weight: 500;
            }
            .titless h3{
                font-size: 1.2em;
                font-weight: 300;
                line-height: 2em;
            }
            .info h3{
                font-size: 1.2em;
                font-weight: 300;
                line-height: 2em;
            }
            .info p{
                font-size: .7em;
                color: #666;
                line-height: 1.2em;
            }
            #project> p{
                font-size: .7em;
                color: #666;
                line-height: 1.2em;
            }
            .titless> p {
                font-size: 0.8rem;
                color: #666;
                line-height: 1.2em;
            }
            #invoiceholder{
                width:100%;
                hieght: 100%;
                padding-top: 50px;
            }

            #invoice {
                position: relative;
                top: 20px;
                margin: 0 auto;
                width: 900px;
                background: #FFF;
                box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .14);
            }

            [id*='invoice-']{ /* Targets all id with 'col-' */
                border-bottom: 1px solid #EEE;
                padding: 30px;
            }



            #invoice-top {
                min-height: 70px;
                display: flex;
                justify-content: space-between;
            }
            #invoice-mid{min-height: 120px;}
            #invoice-bot{ min-height: 250px;}

            .logo-soft {
                float: left;
                height: 60px;
                /* border-radius: 50%; */
                width: 60px;
                background: url(images/logo.png) no-repeat;
                background-size: 60px 60px;
                margin-right: 10px;
            }
            .clientlogo{
                float: left;
                height: 60px;
                width: 60px;
                background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
                background-size: 60px 60px;
                border-radius: 50px;
            }
            .info{
                display: block;
                float:left;
                margin-left: 0px;
            }
            .titless{
                float: right;
            }
            .titless p{text-align: right;}
            #project{margin-left: 52%;}
            table{
                width: 100%;
                border-collapse: collapse;
            }
            td{
                padding: 5px 0 5px 15px;
                border: 1px solid #EEE;
                text-align: center;
            }
            .tabletitle{
                padding: 5px;
                background: #EEE;
            }
            .service{border: 1px solid #EEE;}
            .item{
                /*    width: 50%;*/
            }
            .itemtext{font-size: .9em;}

            #legalcopy{
                margin-top: 30px;
            }
            form{
                float:right;
                margin-top: 30px;
                text-align: right;
            }


            .effect2
            {
                position: relative;
            }
            .effect2:before, .effect2:after
            {
                z-index: -1;
                position: absolute;
                content: "";
                bottom: 15px;
                left: 10px;
                width: 50%;
                top: 80%;
                max-width:300px;
                background: #777;
                -webkit-box-shadow: 0 15px 10px #777;
                -moz-box-shadow: 0 15px 10px #777;
                box-shadow: 0 15px 10px #777;
                -webkit-transform: rotate(-3deg);
                -moz-transform: rotate(-3deg);
                -o-transform: rotate(-3deg);
                -ms-transform: rotate(-3deg);
                transform: rotate(-3deg);
            }
            .effect2:after
            {
                -webkit-transform: rotate(3deg);
                -moz-transform: rotate(3deg);
                -o-transform: rotate(3deg);
                -ms-transform: rotate(3deg);
                transform: rotate(3deg);
                right: 10px;
                left: auto;
            }



            .legal{
                width:100%;
            }
        </style>


    </div>
</div>


</body>

</html>
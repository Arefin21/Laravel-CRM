@extends('layouts.subscriber')
@section('title')
    <title>Payment History | Subscriber | Seminar| Women & e-Commerce</title>
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
                        <h4 class="card-title">Payment History</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>


                    <div class="card-body">
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                        <div id="invoice">

                            <div class="toolbar hidden-print">
                                <div class="text-right">
                                    <a target="_blank" href="{{ route('subscriptioninvoicepdfview',$subscription_fees_submit->subscriptionid) }}" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Download/Print</a>
                                </div>
                                <hr>
                            </div>
                            <div class="invoice overflow-auto">
                                <div style="min-width: 600px">
                                    <header>
                                        <div class="row">
                                            <div class="col">
                                                <a target="_blank" href="{{asset('/')}}">
                                                    <img src="{{asset('asset/images/logo.png')}}" data-holder-rendered="true" />
                                                </a>
                                            </div>
                                            <div class="col company-details">
                                                <h2 class="name">
                                                    <a target="_blank" href="{{asset('/')}}">
                                                        Women & Ecommerce
                                                    </a>
                                                </h2>
                                                <div> Haji Shahab Uddin Complex, House: 84, New Airport Road, Banani, Dhaka</div>
                                            </div>
                                        </div>
                                    </header>
                                    <main>
                                        <div class="row contacts">
                                            <div class="col invoice-to">
                                                <div class="text-gray-light">INVOICE TO:</div>
                                                <h2 class="to">{{$subscription_fees_submit->name}}</h2>
                                                <div class="email"><a href="mailto:{{$subscription_fees_submit->email}}">{{$subscription_fees_submit->email}}</a></div>
                                            </div>
                                            <div class="col invoice-details">
                                                <h1 class="invoice-id">Invoice:#SPF{{$subscription_fees_submit->subscriptionid}}{{$id}}</h1>
                                                <div class="date">Date of Invoice: {{ Carbon\Carbon::parse($subscription_fees_submit->created_at)->format('Y-m-d') }}</div>
                                            </div>
                                        </div>
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-left">DESCRIPTION</th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                                <th class="text-right">TOTAL</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <td class="no">01</td>
                                                <td class="text-left"><h3>{{ \App\Models\SubscriptionFeess::where(['id' => $subscription_fees_submit->subscriptionid])->pluck('title')->first() }}</td>
                                                <td class="unit"></td>
                                                <td class="qty"></td>
                                                <td class="total">{{$subscription_fees_submit->amount}} TK</td>
                                            </tr>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">SUBTOTAL</td>
                                                <td>{{$subscription_fees_submit->amount}} TK</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">GRAND TOTAL</td>
                                                <td>{{$subscription_fees_submit->amount}} TK</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="thanks">Thank you!</div>
                                        <div class="notices">
                                            <div>NOTICE:</div>
                                            <div class="notice">Invoice was created on a computer and is valid without the signature and seal.</div>
                                        </div>
                                    </main>
                                    <footer>
                                        Invoice was created on a computer and is valid without the signature and seal.
                                    </footer>
                                </div>
                                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                <div></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

@endsection

<script>
    $('#printInvoice').click(function(){
        Popup($('.invoice')[0].outerHTML);
        function Popup(data)
        {
            window.print();
            return true;
        }
    });
</script>

<style>
    #invoice{
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 20px;
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0;
        font-size : 20px;
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6;
        font-size: 20px;
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
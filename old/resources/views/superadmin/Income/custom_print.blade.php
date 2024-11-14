



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


        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="top-logo">
                                <div class="logo-invoice">
                                    <a href="{{ asset('/') }}" class="simple-text logo-normal">
                                        <img src="{{ asset('/') }}asset/images/logo.png">
                                    </a>
                                </div>
                                <style>
                                    .logo-invoice img{
                                        margin: 0 auto;
                                        display: block;
                                        text-align: center;

                                    }
                                </style>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- Today -->
                                    <div class="tab-pane active" id="profile">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-primary">
                                                        <h4 class="card-title">Income </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>



                                                            @forelse($incomes as $key=>$income)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                    <td>{{ $income->title }}</td>
                                                                    <td>{{ $income->amount }} Tk.</td>

                                                                </tr>
                                                            @endforeach

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>{{ $totalIncome }} Tk.</strong></th>
                                                            </tr>
                                                            </thead>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-danger">
                                                        <h4 class="card-title">Expense </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>


                                                            @forelse($expenses  as $income)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                    <td>{{ $income->title }}</td>
                                                                    <td>{{ $income->amount }} Tk.</td>

                                                                </tr>
                                                            @endforeach

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>{{ $totalExpense }} Tk.</strong></th>
                                                            </tr>
                                                            </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card-body table-responsive">
                                                    <div class="transaction-history">
                                                        <h3>Transaction History</h3>
                                                        <p>Date: ({{ $startDate->format('d-m-Y') }}) to ({{ $endDate->format('d-m-Y') }})</p>
                                                        <table class="table tablle-all-transaction">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Income:</td>
                                                                <td>{{ $totalIncome }} Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Expense:</td>
                                                                <td>{{ $totalExpense }} Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td><strong>Total Profit:</strong></td>
                                                                <td><strong>{{ $totalIncome - $totalExpense }} Tk.</strong>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <style type="text/css">
                                        .tab-pane h4 {
                                            padding-bottom: 0px;
                                        }
                                        .nav-tabs .nav-item .nav-link {
                                            text-transform: capitalize;
                                            font-size: 15px;
                                        }
                                    </style>
                                    <!-- Today -->


                                    <div class="tab-pane" id="messages">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-primary">
                                                        <h4 class="card-title">Income </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>12000 Tk.</strong>
                                                                </th>
                                                            </tr>
                                                            </thead>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-danger">
                                                        <h4 class="card-title">Expense </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>12000 Tk.</strong>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card-body table-responsive">
                                                    <div class="transaction-history">
                                                        <h3>Transaction History</h3>
                                                        <p>Date: (30-05-2024) To  (30-06-2024)</p>
                                                        <table class="table tablle-all-transaction">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Income:</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Expense:</td>
                                                                <td>500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td><strong>Total Profit:</strong></td>
                                                                <td><strong>700 Tk.</strong>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="settings">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-primary">
                                                        <h4 class="card-title">Income </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>12000 Tk.</strong>
                                                                </th>
                                                            </tr>
                                                            </thead>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-danger">
                                                        <h4 class="card-title">Expense </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>12000 Tk.</strong>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card-body table-responsive">
                                                    <div class="transaction-history">
                                                        <h3>Transaction History</h3>
                                                        <p>Date: (30-05-2024) To  (30-06-2024)</p>
                                                        <table class="table tablle-all-transaction">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Income:</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Expense:</td>
                                                                <td>500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td><strong>Total Profit:</strong></td>
                                                                <td><strong>1200 Tk.</strong>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="custom">

                                        <div class="date-range">
                                            <label for="startDate">Start Date:</label>
                                            <input type="date" id="startDate" name="startDate">

                                            <label for="endDate">End Date:</label>
                                            <input type="date" id="endDate" name="endDate">

                                            <button onclick="filterTransactions()">Filter</button>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-primary">
                                                        <h4 class="card-title">Income </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>12000 Tk.</strong>
                                                                </th>
                                                            </tr>
                                                            </thead>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-danger">
                                                        <h4 class="card-title">Expense </h4>
                                                    </div>
                                                    <div class="card-body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-warning">
                                                            <tr><th>Sl.</th>
                                                                <th>Date</th>
                                                                <th>Title</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>14-09-2024</td>
                                                                <td>Rice</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <thead class="thead-default" style="background-color: #eceeef;">
                                                            <tr>
                                                                <th colspan="2"></th>
                                                                <th><strong>Total:</strong></th>
                                                                <th><strong>12000 Tk.</strong>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card-body table-responsive">
                                                    <div class="transaction-history">
                                                        <h3>Transaction History</h3>
                                                        <p>Date: (30-05-2024) To  (30-06-2024)</p>
                                                        <table class="table tablle-all-transaction">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Income:</td>
                                                                <td>1500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total Expense:</td>
                                                                <td>500 Tk.</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td><strong>Total Profit:</strong></td>
                                                                <td><strong>1700 Tk.</strong>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>




</body>

</html>





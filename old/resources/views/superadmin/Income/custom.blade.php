@extends('layouts.superadmin')
@section('title')
    <title>Income Add | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs" style="border: none;">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#profile" data-toggle="tab">
                                                Today
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                Weekly
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#settings" data-toggle="tab">
                                                Monthly
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#custom" data-toggle="tab">
                                                Custom
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- Today -->
                                <div class="tab-pane " id="profile">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title">Income </h4>
                                                </div>
                                                <div class="card-body table-responsive">

                                                    <table class="table table-hover">
                                                        <thead class="text-warning">
                                                        <tr>
                                                            <th>Sl.</th>
                                                            <th>Date</th>
                                                            <th>Title</th>
                                                            <th>Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($incomes as $key => $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('income.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalAmount }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>
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
                                                        @foreach($expenses as $key => $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('expense.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalExpenseAmount }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>

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
                                                    <p>Date: {{ \Carbon\Carbon::today()->format('d-m-Y') }}</p>
                                                    <table class="table tablle-all-transaction">
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Total Income:</td>
                                                            <td>{{ $totalAmount }} Tk.</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Total Expense:</td>
                                                            <td>{{ $totalExpenseAmount }} Tk.</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td><strong>Total Profit:</strong></td>
                                                            <td><strong>{{ $totalAmount - $totalExpenseAmount  }} Tk.</strong>
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
                                                        <tr>
                                                            <th>Sl.</th>
                                                            <th>Date</th>
                                                            <th>Title</th>
                                                            <th>Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($incomesW as $key => $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('income.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalAmountW }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>
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
                                                        @foreach($expensesW as $key => $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('expense.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalExpenseAmountW }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>

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
                                                    <p>Date: ({{ $lastWeek->format('d-m-Y') }}) to ({{ $today->format('d-m-Y') }})</p>
                                                    <table class="table tablle-all-transaction">
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Total Income:</td>
                                                            <td>{{ $totalAmountW }} Tk.</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Total Expense:</td>
                                                            <td>{{ $totalExpenseAmountW }} Tk.</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td><strong>Total Profit:</strong></td>
                                                            <td><strong>{{ $totalAmountW - $totalExpenseAmountW  }} Tk.</strong>
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
                                                        <tr>
                                                            <th>Sl.</th>
                                                            <th>Date</th>
                                                            <th>Title</th>
                                                            <th>Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($incomesLast30Days as $key => $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('income.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalIncomeLast30Days }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>
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
                                                        @foreach($expensesLast30Days as $key => $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('expense.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalExpenseLast30Days }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>

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
                                                    <p>Date: ({{ $lastMonthStart->format('d-m-Y') }}) to ({{ $today->format('d-m-Y') }})</p>
                                                    <table class="table tablle-all-transaction">
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Total Income:</td>
                                                            <td>{{ $totalIncomeLast30Days }} Tk.</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Total Expense:</td>
                                                            <td>{{ $totalExpenseLast30Days }} Tk.</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td><strong>Total Profit:</strong></td>
                                                            <td><strong>{{ $totalIncomeLast30Days - $totalExpenseLast30Days  }} Tk.</strong>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane active" id="custom">
                                    <style>
                                        .date-range {
                                            display: flex; /* Change to flexbox */
                                            align-items: center; /* Center items vertically */
                                            gap: 20px; /* Space between elements */
                                            margin-bottom: 20px; /* Space below the date range */
                                        }

                                        .date-range label {
                                            font-weight: bold; /* Make labels bold */
                                        }

                                        .date-range input[type="date"] {
                                            padding: 10px; /* Padding for input fields */
                                            border: 1px solid #ccc; /* Light gray border */
                                            border-radius: 5px; /* Rounded corners */
                                            font-size: 16px; /* Font size */
                                            width: 200px; /* Fixed width for consistency */
                                        }

                                        .date-range button {
                                            padding: 10px 15px; /* Padding for button */
                                            background-color: #007bff; /* Bootstrap primary color */
                                            color: white; /* Text color */
                                            border: none; /* Remove default border */
                                            border-radius: 5px; /* Rounded corners */
                                            cursor: pointer; /* Pointer cursor on hover */
                                        }

                                        .date-range button:hover {
                                            background-color: #0056b3; /* Darker blue on hover */
                                        }

                                    </style>
                                    <form method="GET" action="{{ route('filter.transactions') }}"> <!-- Replace with your actual route -->
                                        <div class="date-range">
                                            <label for="startDate">Start Date:</label>
                                            <input type="date" id="startDate" name="startDate" required>

                                            <label for="endDate">End Date:</label>
                                            <input type="date" id="endDate" name="endDate" required>

                                            <button type="submit" name="Filter" value="1">Filter</button>
                                            <button type="submit" name="Filter" value="2">Print</button>

                                        </div>
                                    </form>



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
                                                        @forelse($incomes as $income)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
                                                                <td>{{ $income->title }}</td>
                                                                <td>{{ $income->amount }} Tk.</td>
                                                                <td>
                                                                    <form action="{{ route('income.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalIncome }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>

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
                                                                <td>
                                                                    <form action="{{ route('expense.destroy', $income->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this income?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <thead class="thead-default" style="background-color: #eceeef;">
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th><strong>Total:</strong></th>
                                                            <th><strong>{{ $totalExpense }} Tk.</strong></th>
                                                        </tr>
                                                        </thead>

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


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
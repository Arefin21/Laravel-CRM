<?php

namespace App\Http\Controllers\Superadmin\IncomeExpense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        $incomes = Income::whereDate('daTe', $today)->get();
        $totalAmount = $incomes->sum('amount');
        $expenses = Expense::whereDate('daTe', $today)->get();
        $totalExpenseAmount = $expenses->sum('amount');

        $lastWeek = Carbon::today()->subDays(6);
        $incomesW = Income::whereBetween('daTe', [$lastWeek, $today])->get();
        $totalAmountW = $incomes->sum('amount');
        $expensesW = Expense::whereBetween('daTe', [$lastWeek, $today])->get();
        $totalExpenseAmountW = $expenses->sum('amount');

// For the last 30 days
        $lastMonthStart = Carbon::today()->subDays(29); // This includes today and goes back 29 days
        $incomesLast30Days = Income::whereBetween('daTe', [$lastMonthStart, $today])->get();
        $totalIncomeLast30Days = $incomesLast30Days->sum('amount');

        $expensesLast30Days = Expense::whereBetween('daTe', [$lastMonthStart, $today])->get();
        $totalExpenseLast30Days = $expensesLast30Days->sum('amount');


        return view('superadmin.Income.IncomeExpense', compact('incomes', 'totalAmount', 'expenses', 'totalExpenseAmount','incomesW', 'totalAmountW', 'expensesW', 'totalExpenseAmountW','lastWeek','today', 'lastMonthStart' , 'incomesLast30Days' ,'expensesLast30Days', 'totalIncomeLast30Days' , 'totalExpenseLast30Days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.Income.create');
    }

    public function filterTransactions(Request $request)
    {
        // Get today's date
        $today = Carbon::today();

        // Get today's incomes and expenses
        $incomesToday = Income::whereDate('daTe', $today)->get();
        $totalAmountToday = $incomesToday->sum('amount');

        $expensesToday = Expense::whereDate('daTe', $today)->get();
        $totalExpenseToday = $expensesToday->sum('amount');

        // Get total amounts for today's incomes and expenses
        $totalAmount = $totalAmountToday; // This is already calculated
        $totalExpenseAmount = $totalExpenseToday; // This is already calculated

        // Get incomes and expenses for the last week
        $lastWeek = Carbon::today()->subDays(6);
        $incomesW = Income::whereBetween('daTe', [$lastWeek, $today])->get();
        $totalAmountW = $incomesW->sum('amount');

        $expensesW = Expense::whereBetween('daTe', [$lastWeek, $today])->get();
        $totalExpenseAmountW = $expensesW->sum('amount');

        // For the last 30 days
        $lastMonthStart = Carbon::today()->subDays(29); // This includes today and goes back 29 days
        $incomesLast30Days = Income::whereBetween('daTe', [$lastMonthStart, $today])->get();
        $totalIncomeLast30Days = $incomesLast30Days->sum('amount');

        $expensesLast30Days = Expense::whereBetween('daTe', [$lastMonthStart, $today])->get();
        $totalExpenseLast30Days = $expensesLast30Days->sum('amount');

        // Filter by custom date range
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Initialize empty collections for custom date range
        $incomes = collect(); // Empty collection for incomes
        $totalIncome = 0;
        $expenses = collect(); // Empty collection for expenses
        $totalExpense = 0;

        // Validate the date inputs
        if ($startDate && $endDate) {
            // Convert date strings to Carbon instances
            $startDate = Carbon::parse($startDate);
            $endDate = Carbon::parse($endDate);

            // Get incomes and expenses within the custom date range
            $incomes = Income::whereBetween('daTe', [$startDate, $endDate])->get();
            $totalIncome = $incomes->sum('amount');

            $expenses = Expense::whereBetween('daTe', [$startDate, $endDate])->get();
            $totalExpense = $expenses->sum('amount');
        }

        if($request->Filter =='1'){
        return view('superadmin.Income.custom', compact(
            'incomesToday',
            'totalAmountToday',
            'expensesToday',
            'totalExpenseToday',
            'lastWeek',
            'incomesW',
            'totalAmountW',
            'expensesW',
            'totalExpenseAmountW',
            'lastMonthStart',
            'incomesLast30Days',
            'totalIncomeLast30Days',
            'expensesLast30Days',
            'totalExpenseLast30Days',
            'startDate',
            'endDate',
            'today',
            'incomes',
            'totalIncome',
            'expenses',
            'totalExpense',
            'totalAmount',
            'totalExpenseAmount'
        ));
        }

        if($request->Filter =='2'){
            return view('superadmin.Income.custom_print', compact(
                'incomesToday',
                'totalAmountToday',
                'expensesToday',
                'totalExpenseToday',
                'lastWeek',
                'incomesW',
                'totalAmountW',
                'expensesW',
                'totalExpenseAmountW',
                'lastMonthStart',
                'incomesLast30Days',
                'totalIncomeLast30Days',
                'expensesLast30Days',
                'totalExpenseLast30Days',
                'startDate',
                'endDate',
                'today',
                'incomes',
                'totalIncome',
                'expenses',
                'totalExpense',
                'totalAmount',
                'totalExpenseAmount'
            ));
        }


    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'daTe' => 'required|daTe',  // Add validation for date if required
            'amount' => 'required|numeric'  // Ensure amount is a numeric field
        ]);

        $income = new Income();
        $income->title = $request->title;
        $income->daTe = $request->daTe;  // Use consistent naming
        $income->amount = $request->amount;
        $income->save();

        // Redirect to a valid route with a success message
        return redirect()->back()->with('successMsg', 'Income Successfully Added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitlist = Income::find($id);
        $unitlist->delete();
        return redirect()->back()->with('dangerMsg','Amount Successfully Deleted');
    }
}

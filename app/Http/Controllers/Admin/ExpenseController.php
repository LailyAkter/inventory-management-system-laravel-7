<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Expense;
use App\Http\Resources\Expense\ExpenseResource;
use App\Http\Resources\Expense\ExpenseCollection;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expenses = Expense::latest()->get();
        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($expenses);
        }else{
            // admin 
            return view('backend.expenses.index',compact('expenses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'expense_item'=>'required',
            "amount"=>'required'
        ]);

        $date = Carbon::now();

        $expense = new Expense;
        $expense->expense_item = $request->expense_item;
        $expense->amount = $request->amount;
        $expense->month = $date->format('F');
        $expense->year = $date->format('Y');
        $expense->date = $date->format('Y-m-d');
        $expense->save();

         // json format
        if($request->expectsJson()){
            return response()->json($expense);
        }

        Toastr::success('Expense Saved Successfully','Success');
        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $expenses = Expense::findOrFail($id);
        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($expenses);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('backend.expenses.edit',compact('expense'));
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
        $expense = Expense::findOrFail($id);

        $data = $request->validate([
            'expense_item'=>'required',
            "amount"=>'required'
        ]);

        $date = Carbon::now();

        $expense->expense_item = $request->expense_item;
        $expense->amount = $request->amount;
        $expense->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($expense);
        }

        Toastr::success('Expense Updated Successfully','Success');

        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        
        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($expense);
        }

        Toastr::error('Expense Deleted Successfully','Success');
        
        return redirect()->route('expense.index');
    }

    public function today_expense()
    {
        $today = date('Y-m-d');
        $expenses = Expense::latest()->where('date', $today)->get();
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' =>ExpenseResource::collection($expenses)
        //         ],201
        //     );
        // }
        return view('backend.expenses.today', compact('expenses'));
    }

    public function month_expense($month = null)
    {
        if ($month == null)
        {
            $month = date('F');
        }
        $expenses = Expense::latest()->where('month', $month)->get();
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' =>ExpenseResource::collection($expenses)
        //         ],201
        //     );
        // }
        return view('backend.expenses.month', compact('expenses', 'month'));
    }

    public function yearly_expense($year = null)
    {
        if ($year == null)
        {
            $year = date('Y');
        }

        $expenses = Expense::latest()->where('year', $year)->get();
        
        $years = Expense::select('year')->distinct()->take(12)->get();
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' =>ExpenseResource::collection($expenses)
        //         ],201
        //     );
        // }
        return view('backend.expenses.year', compact('expenses', 'year', 'years'));
    }
}

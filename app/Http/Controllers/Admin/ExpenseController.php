<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Expense;
use App\Http\Resources\Expense\ExpenseResource;
use App\Http\Resources\Expense\ExpenseCollection;
use Carbon\Carbon;


class ExpenseController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:api')->except('index','show');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expenses = Expense::latest()->get();
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' =>ExpenseResource::collection($expenses)
        //         ],201
        //     );
        // }
        return view('backend.expenses.index',compact('expenses'));
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
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' => new ExpenseResource($expense)
        //         ],201
        //     );
        // }
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
        // $expense = Expense::findOrFail($id);
        //     return response(
        //         [
        //         'data' => new ExpenseResource($expense)
        //         ],201
        //     );
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
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' =>ExpenseResource::collection($expense)
        //         ],201);
        // }
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
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' => new ExpenseResource($expense)
        //         ],201
        //     );
        // }
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
        // if($request->acceptsJson()){
        //     return response(
        //         [
        //         'data' => new ExpenseResource($expense)
        //         ],401
        //     );
        // }
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

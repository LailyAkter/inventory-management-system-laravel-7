@extends('layouts.backend.master')

@section('title', 'Monthly Expenses')

@section('content')
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h2>
                        Monthly Expense
                        <span class='badge bg-blue' style='font-size:20px'>{{ strtoupper($month) }}</span>
                        </h2>
                        <div class='month'>
                            <a href="{{ url('/admin/month_expense', 'january') }}"><span  class='badge bg-blue' style='font-size:20px'>January</span></a>
                            <a href="{{ url('/admin/month_expense', 'february') }}"><span  class='badge bg-pink' style='font-size:20px'>February</span></a>
                            <a href="{{ url('/admin/month_expense', 'march') }}"><span  class='badge bg-red' style='font-size:20px'>March</span></a>
                            <a href="{{ url('/admin/month_expense', 'april') }}"><span  class='badge bg-black' style='font-size:20px'>April</span></a>
                            <a href="{{ url('/admin/month_expense', 'may') }}"><span  class='badge bg-purple' style='font-size:20px'>May</span></a>
                            <a href="{{ url('/admin/month_expense', 'june') }}"><span  class='badge bg-green' style='font-size:20px'>June</span></a>
                            <a href="{{ url('/admin/month_expense', 'july') }}"><span  class='badge bg-orange' style='font-size:20px'>July</span></a>
                            <a href="{{ url('/admin/month_expense', 'august') }}"><span  class='badge bg-blue' style='font-size:20px'>August</span></a>
                            <a href="{{ url('/admin/month_expense', 'september') }}"><span  class='badge bg-pink' style='font-size:20px'>Sepetember</span></a>
                            <a href="{{ url('/admin/month_expense', 'october') }}"><span  class='badge bg-red' style='font-size:20px'>October</span></a>
                            <a href="{{ url('/admin/month_expense', 'november') }}"><span  class='badge bg-black' style='font-size:20px'>November</span></a>
                            <a href="{{ url('/admin/month_expense', 'december') }}"><span  class='badge bg-purple' style='font-size:20px'>December</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header"> 
                                <h3 class="card-title">
                                    Total Expenses : <span class='badge bg-red' style='font-size:18px'>{{ $expenses->sum('amount') }} Taka</span>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Expense Title</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($expenses as $key => $expense)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $expense->expense_item }}</td>
                                            <td>{{ number_format($expense->amount, 2) }}</td>
                                            <td>{{ $expense->created_at->diffForHumans() }}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{route('expense.index')}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Back
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection

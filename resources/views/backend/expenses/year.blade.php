@extends('layouts.backend.master')

@section('title', 'Yearly Expenses')

@section('content')
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h2>
                        Yearly Expense
                            @foreach($years as $year)
                                <a href="{{ url('/admin/yearly_expense'. $year->year) }}" class="btn btn-info">{{ ucfirst($year->year) }}</a>
                            @endforeach

                        </h2>
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
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Expense Title</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($expenses as $key => $expense)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $expense->expense_item }}</td>
                                            <td>{{ number_format($expense->amount, 2) }}</td>
                                            <td>{{ $expense->created_at->format('d.m.Y') }}</td>
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

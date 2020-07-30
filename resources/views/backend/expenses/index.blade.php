@extends('layouts.backend.master')
@section('title','All Expenses')

@section('content')
<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-1">
                <div class="col-sm-6">
                    <a href="{{route('expense.create')}}" class='btn btn-primary' style='font-size:20px;'>
                        <i class="fas fa-plus">
                        <span style='margin-left:5px'>Add Expense</span>
                        </i>
                    </a>
                    <a href="{{url('/admin/today_expense')}}" class='btn btn-danger'>Today Expense</a>
                    <a href="{{URL::to('/admin/month_expense')}}" class='btn btn-info'>Month Expense</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Total Expenses :
                                <span class='badge bg-red' style='font-size:18px'>{{ $expenses->sum('amount') }} Taka</span>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Expense Item</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th width='8%'> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $key=>$expense)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$expense->expense_item}}</td>
                                            <td>{{$expense->amount}}</td>
                                            <td>{{$expense->created_at->format('d.m.Y') }}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="{{route('expense.edit',$expense->id)}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('expense.destroy',$expense->id)}}" method='POST' enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type='submit' class="btn btn-danger btn-sm mt-3">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

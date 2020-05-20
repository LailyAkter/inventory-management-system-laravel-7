@extends('layouts.backend.master')
@section('title','Add Expense')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Expense</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('expense.store')}}" method='post' enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Expense Item</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='expense_item'
                                    placeholder='Expense Item'
                                    value="{{old('expense_item')}}"
                                />
                                @if($errors->has('expense_item'))
                                    <span class='text-danger'>Expense Item is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Amount</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='amount'
                                    placeholder='Amount'
                                    value="{{old('amount')}}"
                                />
                                @if($errors->has('amount'))
                                    <span class='text-danger'>Amount is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Expense</button>
                            <a href="{{route('expense.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

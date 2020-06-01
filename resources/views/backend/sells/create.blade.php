@extends('layouts.backend.master')
@section('title','Add Sell')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Sell</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{route('sell.store')}}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                    <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                    <option>---Select Product----</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}" {{old("product_id") == $product->id ? "selected": ""}}>{{$product->product_name}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('product_id'))
                                    <span class='invalid-feedback'>Product Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Price</label>
                                
                                <input 
                                    type="number" 
                                    id="price" 
                                    class="form-control @error('amount') is-invalid @enderror" 
                                    name='amount'
                                    placeholder='Enter Price'
                                    value=""
                                />
                                @if($errors->has('amount'))
                                    <span class='invalid-feedback'>Price is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control @error('qty') is-invalid @enderror" 
                                    name='qty'
                                    placeholder='Quantity'
                                    value="{{old('qty')}}"
                                />
                                @if($errors->has('qty'))
                                    <span class='invalid-feedback'>Quantity is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Sell Date</label>
                                <input 
                                    type="date" 
                                    id="inputName" 
                                    class="form-control @error('sell_date') is-invalid @enderror" 
                                    name='sell_date'
                                    placeholder='Sell Date'
                                    value="{{old('sell_date')}}"
                                />
                                @if($errors->has('sell_date'))
                                    <span class='invalid-feedback'>Sell Date is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Sell</button>
                            <a href="{{route('sell.index')}}" class='btn btn-danger'>Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var productId = document.getElementById("product_id");
    productId.addEventListener('change',(event)=>{
        var value = event.target.value;
        //ajax
        //get the value
        fetch('http://localhost/inventory-management-system/inventory-server/public/admin/api/getprice?product_id='+value).then(res=>{return res.json()}).then(res=>{
            document.getElementById("price").value=res.price;
        })
        // $.ajax({
        //     type:"get",
        //     url:'http://localhost/inventory-management-system/inventory-server/public/admin/api/getprice?product_id='+value,
        //     success:function(returnData){
        //         document.getElementById("price").value=returnData.price;
        //     }
        // })


    })
</script>
@endsection

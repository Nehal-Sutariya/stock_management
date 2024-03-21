@extends('layout')

@section('title', 'Update Stock')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-lg-8 col-md-10">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('submit_stock_update', ['id' => $stock->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                    
                    <div class="form-group">
                        <label for="stock_name" class="col-form-label text-right">Stock Name</label>
                        <input type="text" class="form-control" id="stock_name" name="stock_name" value="{{ $stock->stock_name }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="col-form-label text-right">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $stock->price }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity" class="col-form-label text-right">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stock->quantity }}">
                    </div>
                    
            
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

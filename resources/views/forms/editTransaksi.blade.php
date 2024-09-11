@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Transaction</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="order_id">Order ID</label>
                            <input type="text" name="order_id" id="order_id" class="form-control" value="{{ $transaction->order_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barang">Barang</label>
                            <input type="text" name="barang" id="barang" class="form-control" value="{{ $transaction->barang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Success" {{ $transaction->status == 'Success' ? 'selected' : '' }}>Success</option>
                                <option value="Pending" {{ $transaction->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Delivered" {{ $transaction->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="Processing" {{ $transaction->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $transaction->jumlah }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
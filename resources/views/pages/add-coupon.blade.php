@extends('layouts.nav-sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Coupon</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('coupon.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input id="description" type="text" class="form-control" name="description" required>
                        </div>

                        <div class="form-group">
                            <label for="code">Code</label>
                            <input id="code" type="text" class="form-control" name="code" required>
                        </div>

                        <div class="form-group">
                            <label for="discount_amount">Discount Amount</label>
                            <input id="discount_amount" type="number" class="form-control" name="discount_amount" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" class="form-control" name="type" required>
                                <option value="0">Fixed</option>
                                <option value="1">Percent</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
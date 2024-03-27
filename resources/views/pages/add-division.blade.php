@extends('layouts.nav-sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Add available Division to ship product: ') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <button type="submit" class="btn btn-primary">{{ __('Add Division') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
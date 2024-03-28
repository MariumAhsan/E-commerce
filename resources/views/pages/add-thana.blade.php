@extends('layouts.nav-sidebar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('thana.store')}}" >
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Thana Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="district_id">{{ __('District') }}</label>
                            <select id="district_id" class="form-control @error('district_id') is-invalid @enderror" name="district_id" required>
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{  $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="division_id">{{ __('Division') }}</label>
                            <select id="division_id" class="form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}">{{  $division->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Add Thana') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5>Add Member Status</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('status.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="StatusCode">Status Code: <span class="required">*</span></label>
                    <input type="text" name="StatusCode" id="StatusCode" class="form-control @error('StatusCode') is-invalid @enderror" value="{{ old('StatusCode') }}" placeholder="Enter Status Code">
                    @error('StatusCode')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="StatusName">Status Name: <span class="required">*</span></label>
                    <input type="text" name="StatusName" id="StatusName" class="form-control @error('StatusName') is-invalid @enderror" value="{{ old('StatusName') }}" placeholder="Enter Status Name">
                    @error('StatusName')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input type="submit" value="Save" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

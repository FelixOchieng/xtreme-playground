@extends('layouts.app')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5>Edit Member Status</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('status.update', sprintf('%03d', $status->StatusCode)) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="StatusCode">Status Code: <span class="required">*</span></label>
                    <input type="text" name="StatusCode" id="StatusCode" class="form-control @error('StatusCode') is-invalid @enderror" value="{{ sprintf('%03d', $status->StatusCode) }}" placeholder="Enter Status Code">
                    @error('StatusCode')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="StatusName">Status Name: <span class="required">*</span></label>
                    <input type="text" name="StatusName" id="StatusName" class="form-control @error('StatusName') is-invalid @enderror" value="{{ $status->StatusName }}" placeholder="Enter Status Name">
                    @error('StatusName')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input type="submit" value="Update" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection


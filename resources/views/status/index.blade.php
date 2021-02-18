@extends('layouts.app')
@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ session()->get('success') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between bg-secondary text-white">
            <div class="h5 pd-20 mb-0">
                <h5>Member Status</h5>
            </div>
            <div class="mr-3">
                <a href="{{ route('status.create') }}" class="btn btn-success">
                    <i class="fa fa-plus mr-2"></i>Add New Status
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Status Code</th>
                        <th>Status Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $status)
                        <tr>
                            <td>{{ sprintf('%03d', $status->StatusCode)}}</td>
                            <td>{{ $status->StatusName }}</td>
                            <td>
                                <div class="d-flex ">
                                    <a href="{{ route('status.edit',  sprintf('%03d', $status->StatusCode)) }}"  class="btn btn-primary btn-sm mr-1">
                                        <i class="fas fa-pen mr-2"></i>Edit
                                    </a>
                                    <form action="{{ route('status.destroy', sprintf('%03d', $status->StatusCode))}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                                data-toggle="confirmation" data-title="Are you sure you want to delete status?">
                                            <i class="fas fa-trash-alt mr-2"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
            });
        });
    </script>
@endsection

@extends('admins.layouts.master')

@section('page-title','Users')

@section('page-header', 'Users')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subcription</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                    <td>{!! $user->email ? $user->email : '<span class="badge badge-danger">NO SET</span>' !!}</td>
                                    <td>{!! $user->phone ? $user->phone : '<span class="badge badge-danger">NO SET</span>' !!}</td>
                                    <td>{!! $user->subscribed('default') ? '<span class="badge badge-success">YES</span>': '<span class="badge badge-danger">NO</span>' !!}</td>
                                    <td>{{ $user->active_status ? 'Active' : 'Disabled' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning">Disable</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@push('page-script')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(function () {
      
      $('#plan').DataTable();
    });
</script>
@endpush
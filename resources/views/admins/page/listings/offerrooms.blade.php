@extends('admins.layouts.master')

@section('page-title','Offer Room')

@section('page-header', 'All Listing for Offer Room')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>User</th>
                                <th>Rent</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offerrooms as $offerroom)
                                <tr>
                                    <td>{{ $offerroom->title }}</td>
                                    <td>{{ $offerroom->user->first_name . ' ' . $offerroom->user->last_name }}</td>
                                    <td>{{ (int) $offerroom->monthly_rent }}</td>
                                    <td>{{ $offerroom->status }}</td>
                                    <td>Delete</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $offerrooms->links() }}
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
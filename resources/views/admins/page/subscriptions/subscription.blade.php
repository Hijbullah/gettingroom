@extends('admins.layouts.master')

@section('page-title','Subscriptions')

@section('page-header', 'Subscriptions')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Plan</th>
                                <th>End At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->user->first_name }}</td>
                                    <td>{{ $subscription->stripe_plan }}</td>
                                    <td>{{ $subscription->end_at }}</td>
                                    <td>{{ $subscription->stripe_status }}</td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $subscriptions->links() }}
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
@extends('admins.layouts.master')

@section('page-title','plan')

@section('page-header', 'Plans')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <h4 class="mb-3 text-muted">Add new plan</h4>
            <div class="plan-form">
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter plan name">
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter amount">
                        </div>
                        <div class="col">
                            <label for="amount">Trial Periods</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="currency">Currency</label>
                            <select class="form-control" name="currency" id="currency">
                                <option value="">BDT</option>
                                <option value="">Doller</option>
                                <option value="">Euro</option>

                            </select>
                        </div>
                        <div class="col">
                            <label for="interval">Interval</label>
                            <select class="form-control" name="interval" id="interval">
                                <option value="">Days</option>
                                <option value="">Weeks</option>
                                <option value="">Month</option>
                                <option value="">Yearly</option>
                                <option value="">Custom</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add New Plan</button>
                    </div>



                </form>
            </div>
        </div>

        <div class="col-md-7">
            <h4 class="mb-5 text-muted">All plans</h4>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Interval</th>
                                <th>Trial_period</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hijbu</td>
                                <td>500</td>
                                <td>BDT</td>
                                <td>10</td>
                                <td>3</td>
                            </tr>

                            <tr>
                                <td>Fahim</td>
                                <td>2300</td>
                                <td>BDT</td>
                                <td>10</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Ridoy</td>
                                <td>17800</td>
                                <td>BDT</td>
                                <td>10</td>
                                <td>3</td>
                            </tr>  
                        </tbody>

                    </table>
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
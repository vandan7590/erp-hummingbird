@extends('layouts.master')
@section('custom-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('supplier-manage', ['id' => 'new']) }}" class="btn btn-sm btn-primary"
                    style="float: right">Create New
                    Supplier</a>
                <h5 class="m-0 font-weight-bold text-primary">Manage Suppliers</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Contact</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Contact</th>
                                <th width="280px">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($suppliers as $key => $supplier)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $supplier->sup_name }}</td>
                                    <td>{{ $supplier->sup_name }}</td>
                                    <?php $contact = \App\Models\Contact::where('id', $supplier->contact_id)->first(); ?>
                                    <td>{{ $contact ? ($contact->city ? $contact->city . ', ' : '') . ($contact->country ? $contact->country : '') : '' }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('supplier-manage', $supplier->id) }}">Edit</a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['supplier-destroy', $supplier->id],
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom-js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection

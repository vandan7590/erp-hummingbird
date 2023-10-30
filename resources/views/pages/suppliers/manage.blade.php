@extends('layouts.master')
@section('content')
    <div class="container-xl px-4 mt-n10">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {!! Form::open(['route' => 'supplier-store', 'method' => 'POST']) !!}
        <input type="hidden" name="id" value="{{ $supplier->id ?? 'new' }}">
        <div class="row">
            <div class="col-12">
                <div class="pull-right" style="float: right; margin-bottom: 10px">
                    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    <a class="btn btn-sm btn-secondary" href="{{ route('supplier-index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">{{ $supplier ? 'Manage Supplier' : 'Create New Supplier' }}</div>
                    <div class="card-body">
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Supplier Name:</strong>
                                        {!! Form::text('sup_name', $supplier->sup_name ?? '', [
                                            'placeholder' => 'Supplier Name',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Supplier Code:</strong>
                                        {!! Form::text('sup_code', $supplier->sup_code ?? '', [
                                            'placeholder' => 'Supplier Code',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <button type="button" id="add-button" name="add" class="btn btn-sm btn-primary" style="float: right">
                    <span class="ul-btn__text">Add Contacts</span>
                </button>
            </div>
        </div> --}}
        {!! Form::close() !!}
    </div>
@endsection

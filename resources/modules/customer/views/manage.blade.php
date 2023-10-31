@extends('layouts.master')
@section('custom-css')
@endsection
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
        <form method="POST" action="{{ route('customer-store', $customer->id ?? 'new') }}">
            @csrf
            {{-- {!! Form::model(['method' => 'POST', 'route' => ['customer-store']]) !!} --}}
            <div class="row">
                <div class="col-12">
                    <div class="pull-right" style="float: right; margin-bottom: 10px">
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                        <a class="btn btn-sm btn-secondary" href="{{ route('customer-index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">Edit Customer</div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            {!! Form::text('cust_name', $customer->cust_name ?? '', [
                                                'placeholder' => 'Customer Name',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <strong>Code:</strong>
                                            {!! Form::text('cust_code', $customer->cust_code ?? '', [
                                                'placeholder' => 'Customer Code',
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
            {{-- {!! Form::close() !!} --}}
        </form>
    </div>
@endsection

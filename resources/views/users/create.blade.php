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

        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-12">
                <div class="pull-right" style="float: right; margin-bottom: 10px">
                    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    <a class="btn btn-sm btn-secondary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Create New User</div>
                    <div class="card-body">
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

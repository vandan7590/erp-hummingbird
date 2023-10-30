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
        @if (session('error'))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li>{{ session('error') }}</li>
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {!! Form::model($user, ['method' => 'POST', 'route' => ['change-password', $user->id]]) !!}
        <div class="row">
            <div class="col-12">
                <div class="pull-right" style="float: right; margin-bottom: 10px">
                    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    <a class="btn btn-sm btn-secondary" href="{{ route('users.edit', $user->id) }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <div class="form-group">
                                    <strong>Current Password:</strong>
                                    {!! Form::password('current_password', ['placeholder' => 'Current Password', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <strong>New Password:</strong>
                                    {!! Form::password('password', ['placeholder' => 'New Password', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <strong>Confirm Password:</strong>
                                    {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
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

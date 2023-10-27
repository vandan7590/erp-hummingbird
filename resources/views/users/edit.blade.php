@extends('layouts.master')
@section('custom-css')
    <style>
        .radio-button-group input[type="radio"] {
            transform: scale(-1.5);
            /* Increase the size of the radio buttons */
        }

        .radio-button-group label {
            font-weight: bolder;
            font-size: 1rem;
            color: #858796;
            /* Adjust the label font size */
            margin-left: 5px;
            margin-right: 10px;
            /* Add some space between the radio button and the label */
        }
    </style>
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
        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
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
                    <div class="card-header">Edit User</div>
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
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="radio-button-group">
                                        {!! Form::radio('enabled', 1, $user->enabled, ['id' => 'enabled-yes']) !!}
                                        <label for="enabled-yes">Enabled</label> &nbsp;

                                        {!! Form::radio('enabled', 0, !$user->enabled, ['id' => 'enabled-no']) !!}
                                        <label for="enabled-no">Disabled</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <a href="{{ route('change-password-view', $user->id) }}"
                                            class="btn btn-sm btn-primary"> Change Password
                                        </a>
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

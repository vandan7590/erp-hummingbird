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
        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
        <div class="row">
            <div class="col-12">
                <div class="pull-right" style="float: right; margin-bottom: 10px">
                    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    <a class="btn btn-sm btn-secondary" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Edit Role</div>
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
                                        <strong>Permission:</strong>
                                        <br />
                                        @foreach ($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                {{ $value->description }}</label>
                                            <br />
                                        @endforeach
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

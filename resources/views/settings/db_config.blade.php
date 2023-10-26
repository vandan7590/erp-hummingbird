@extends('layouts.master')
@section('content')
    <div class="container-xl px-4 mt-n10">
        <form method="POST" action="{{ route('setting-db-update-send') }}" class="mt-5">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="pull-right" style="float: right; margin-bottom: 10px">
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col ">
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">DB CONNECTION</span>
                        <input type="text" class="form-control" id="basic-url" name="--ff[DB_CONNECTION]"
                            value="{{ $envData['DB_CONNECTION'] }}">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">DB HOST</span>
                        <input type="text" class="form-control" id="basic-url" name="--ff[DB_HOST]"
                            value="{{ $envData['DB_HOST'] }}">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">DB PORT</span>
                        <input type="text" class="form-control" id="basic-url" name="--ff[DB_PORT]"
                            value="{{ $envData['DB_PORT'] }}">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">DB DATABASE</span>
                        <input type="text" class="form-control" id="basic-url" name="--ff[DB_DATABASE]"
                            value="{{ $envData['DB_DATABASE'] }}">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">DB USERNAME</span>
                        <input type="text" class="form-control" id="basic-url" name="--ff[DB_USERNAME]"
                            value="{{ $envData['DB_USERNAME'] }}">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">DB PASSWORD</span>
                        <input type="text" class="form-control" id="basic-url" name="--ff[DB_PASSWORD]"
                            value="{{ $envData['DB_PASSWORD'] }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

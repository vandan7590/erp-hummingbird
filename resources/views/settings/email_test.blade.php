@extends('layouts.master')
@section('content')
    <div class="container-xl px-4 mt-n10">
        <form method="POST" action="{{ route('setting-send-email') }}" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="pull-right" style="float: right; margin-bottom: 10px">
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">To</span>
                        <input type="text" class="form-control" id="basic-url" name="email">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">Subject</span>
                        <input type="text" class="form-control" id="basic-url" name="subject">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" style="width: 200px" id="basic-addon3">Message</span>
                        <textarea class="form-control" id="basic-url" name="message" rows="4"></textarea>
                    </div>
                    <div class="input-group mb-2">
                        {{-- <span class="input-group-text" style="width: 200px" id="basic-addon3">Attachment</span> --}}
                        <input class="form-control" name="attachment" type="file" id="formFile">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.master')
@section('custom-css')
    <style>
        #faviconPreviewImage,
        #loginPreviewImage {
            width: 100px;
            height: 70px;
        }

        #existingFaviconPreviewImage,
        #existingLoginPreviewImage {
            width: 100px;
            height: 70px;
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
        <form action="{{ route('setting-site-info-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="site_id" value="{{ $siteInfo->id ?? '' }}">
            <div class="row">
                <div class="col-12">
                    <div class="pull-right" style="float: right; margin-bottom: 10px">
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">Site Info Settings</div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="faviconId"
                                                    value="{{ $siteInfo->id ?? 0 }}" />
                                                <strong>Favicon Icon:</strong>
                                                <input type="file" class="form-control" name="favicon_icon"
                                                    accept="image/*" id="faviconUploadFile">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="faviconImagePreview" style="display: none;">
                                                <img id="faviconPreviewImage" src="#" alt="Uploaded Image">
                                            </div>
                                            @if (isset($siteInfo->favicon_icon))
                                                <div id="existingFaviconImagePreview" style="display: none;">
                                                    <img id="existingFaviconPreviewImage"
                                                        src="{{ asset('site_info/' . $siteInfo->favicon_icon) }}"
                                                        alt="Existing Image">
                                                </div>
                                            @else
                                                <div id="existingFaviconImagePreview" style="display: none;">
                                                    <img id="existingFaviconPreviewImage" src="{{ asset('img/Logo.png') }}"
                                                        alt="Existing Image">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="loginImageId"
                                                    value="{{ $siteInfo->id ?? 0 }}" />
                                                <strong>Login Image:</strong>
                                                <input type="file" class="form-control" name="login_image"
                                                    accept="image/*" id="loginUploadFile">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="loginImagePreview" style="display: none;">
                                                <img id="loginPreviewImage" src="#" alt="Uploaded Image">
                                            </div>
                                            @if (isset($siteInfo->login_image))
                                                <div id="existingLoginImagePreview" style="display: none;">
                                                    <img id="existingLoginPreviewImage"
                                                        src="{{ asset('site_info/' . $siteInfo->login_image) }}"
                                                        alt="Existing Image">
                                                </div>
                                            @else
                                                <div id="existingLoginImagePreview">
                                                    <img id="existingLoginPreviewImage" src="{{ asset('img/Logo.png') }}"
                                                        alt="Existing Image">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <strong>Site Name:</strong>
                                            <input type="text" class="form-control" name="site_name"
                                                value="{{ $siteInfo->site_name ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <strong>Site Description:</strong>
                                            <textarea class="form-control" name="site_desc">{{ $siteInfo->site_desc ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <strong>Site Meta Tags:</strong>
                                            <input type="text" class="form-control" name="site_meta_tags"
                                                value="{{ $siteInfo->site_meta_tags ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('bottom-js')
    <script>
        $(document).ready(function() {
            var fav_id$ = $(".faviconId").val();
            if (fav_id$) {
                $('#existingFaviconImagePreview').show();
            }
            $('#faviconUploadFile').change(function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#faviconPreviewImage').attr('src', e.target.result);
                        $('#faviconImagePreview').show();
                        $('#existingFaviconImagePreview').hide();
                    };
                    reader.readAsDataURL(file);
                }
            });

            var login_id$ = $(".loginImageId").val();
            if (login_id$) {
                $('#existingLoginImagePreview').show();
            }
            $('#loginUploadFile').change(function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#loginPreviewImage').attr('src', e.target.result);
                        $('#loginImagePreview').show();
                        $('#existingLoginImagePreview').hide();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection

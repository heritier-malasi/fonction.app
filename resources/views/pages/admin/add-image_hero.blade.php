@extends('layouts.template.admin.appadmin')
@section('title')
Add hero-image
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif

                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Add Hero Image
                                <a href="{{ route('hero.index') }}" class="btn btn-danger float-right">BACK</a>

                            </h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Text Hero image Course</label>
                                    <textarea class="form-control" name="text" id="" cols="5" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Hero Image</label>
                                    <input type="file" name="profile_image" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

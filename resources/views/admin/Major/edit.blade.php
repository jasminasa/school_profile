@extends('admin.layout')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Major Edit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/major">Back</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Edit
                            </div>
                            <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <form action="{{ route('major.update',$major->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror placeholder="Title" value="{{$major->title}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <input id="desc" type="hidden" name="desc" class="form-control" value="{{$major->desc}}">
                                <trix-editor input="desc"></trix-editor>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Overview</strong>
                                <input id="overviews" type="hidden" name="overview" class="form-control" value="{{$major->overview}}">
                                <trix-editor input="overviews"></trix-editor>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Competention</strong>
                                <input id="Competentions" type="hidden" name="Competention" class="form-control" value="{{$major->Competention}}">
                                <trix-editor input="Competentions"></trix-editor>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Certification</strong>
                                <input id="Certifications" type="hidden" name="Certification" class="form-control" value="{{$major->Certification}}">
                                <trix-editor input="Certifications"></trix-editor>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Student</strong>
                                <input type="text" name="student" class="form-control" @error('student') is-invalid @enderror placeholder="Student" value="{{$major->student}}">
                                @error('student')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Success Student</strong>
                                <input type="text" name="successstudent" class="form-control" @error('successstudent') is-invalid @enderror placeholder="Success Student" value="{{$major->successstudent}}">
                                @error('successstudent')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Educator</strong>
                                <input type="text" name="educator" class="form-control" @error('educator') is-invalid @enderror placeholder="Educator" value="{{$major->educator}}">
                                @error('educator')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image</strong>
                                <input type="hidden" name="oldImage" value="{{ $major->image }}">
                                @if ($major->image)
                                    <img src="{{ asset('storage/' . $major->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3">
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" @error('image') is-invalid @enderror name="image" id="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                
                </form>
              

</div>
</div>


@endsection
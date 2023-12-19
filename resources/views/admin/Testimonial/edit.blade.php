@extends('admin.layout')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Testimonial Edit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/testimonial">Back</a></li>
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
                
                            <form action="{{ route('testimonial.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror placeholder="Name" value="{{$testimonial->name}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Agency</strong>
                                <input type="text" name="agency" class="form-control" @error('agency') is-invalid @enderror placeholder="Agency" value="{{$testimonial->agency}}">
                                @error('agency')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                <strong>Coment</strong>
                                <input id="contents" type="hidden" name="content" class="form-control" value="{{$testimonial->content}}">
                                <trix-editor input="contents"></trix-editor>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image</strong>
                                <input type="hidden" name="oldImage" value="{{ $testimonial->image }}">
                                @if ($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
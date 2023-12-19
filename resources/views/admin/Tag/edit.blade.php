@extends('admin.layout')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Tag Edit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/tag">Back</a></li>
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
<form action="{{ route('tag.update',$tag->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tag</strong>
                <input type="text" name="tag" class="form-control" @error('tag') is-invalid @enderror placeholder="Tag" value="{{$tag->tag}}">
                @error('tag')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

</div>
</div>


@endsection
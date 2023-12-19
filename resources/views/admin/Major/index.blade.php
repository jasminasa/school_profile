@extends('admin.layout')


@section('content')

        <div class="container-fluid px-4">
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Data Major
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Major</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Create</button>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Major Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($major as $m)
                                        <tr>
                                            <td>{{ $m->title }}</td>
                                            <td><?= $m->desc ?></td>
                                            <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $m->image) }}" alt="No Image" class="img-fluid mt-3">
                                                </div>
                                            </td>

                                            <td>
                                                <form action="{{ route('major.destroy',$m->id) }}" method="POST">

                                                    <a class="btn btn-primary" href="{{ route('major.edit',$m->id) }}">Edit</a>
                                
                                                    @csrf
                                                    @method('DELETE')
                                
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <br>
                                <div class="container-fluid px-4">
                                    <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Data Major
                                                </div>
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
                                                <form action="{{ route('major.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Major Title</strong>
                                                        <input type="text" name="title" class="form-control" placeholder="Major Title">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <strong>Description</strong>
                                                        <input id="desc" type="hidden" name="desc" class="form-control" value="{{ old('desc') }}">
                                                        <trix-editor input="desc"></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <strong>Overview</strong>
                                                        <input id="overviews" type="hidden" name="overview" class="form-control" value="{{ old('overview') }}">
                                                        <trix-editor input="overviews"></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <strong>Competention</strong>
                                                        <input id="Competentions" type="hidden" name="Competention" class="form-control" value="{{ old('Competention') }}">
                                                        <trix-editor input="Competentions"></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <strong>Certification</strong>
                                                        <input id="Certifications" type="hidden" name="Certification" class="form-control" value="{{ old('Certification') }}">
                                                        <trix-editor input="Certifications"></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Student</strong>
                                                        <input type="text" name="student" class="form-control" placeholder="Student">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Success Student</strong>
                                                        <input type="text" name="successstudent" class="form-control" placeholder="Success Student">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Educator</strong>
                                                        <input type="text" name="educator" class="form-control" placeholder="Educator">
                                                    </div>
                                                </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Image</strong>
                                                    <img class="img-preview img-fluid mb-3 col-sm-5">
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
                        </div>
                    </div>

{!! $major->links() !!}
@endsection
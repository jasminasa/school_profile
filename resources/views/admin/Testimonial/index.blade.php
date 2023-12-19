@extends('admin.layout')


@section('content')

        <div class="container-fluid px-4">
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Data Testimonial
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Testimonial</button>
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
                                                <th>Name</th>
                                                <th>Agency</th>
                                                <th>Comment</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($testimonial as $t)
                                        <tr>
                                            <td>{{ $t->name }}</td>
                                            <td>{{ $t->agency }}</td>
                                            <td class="text-wrap"><?php echo $t->content ?></td>
                                            <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $t->image) }}" alt="No Image" class="img-fluid mt-3">
                                                </div>
                                            </td>

                                            <td>
                                                <form action="{{ route('testimonial.destroy',$t->id) }}" method="POST">

                                                    <a class="btn btn-primary" href="{{ route('testimonial.edit',$t->id) }}">Edit</a>
                                
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
                                                    Data Testimonial
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
                                        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name</strong>
                                                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror placeholder="Name" value="{{ old('name') }}">
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
                                                    <input type="text" name="agency" class="form-control" @error('agency') is-invalid @enderror placeholder="Agency" value="{{ old('agency') }}">
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
                                                    <input id="contents" type="hidden" name="content" class="form-control" value="{{ old('content') }}">
                                                    <trix-editor input="contents"></trix-editor>
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

{!! $testimonial->links() !!}
@endsection
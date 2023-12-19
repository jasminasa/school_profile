@extends('admin.layout')


@section('content')

        <div class="container-fluid px-4">
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Data Tutor
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Tutor</button>
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
                                        <th>Tutor Name</th>
                                        <th>Image</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Tutor Name</th>
                                        <th>Image</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($tutor as $s)
                                            <tr>
                                                <td>{{ $s->name }}</td>
                                                <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $s->image) }}" alt="No Image" class="img-fluid mt-3">
                                                </div>
                                                </td>
                                                <td><?= $s->Department ?></td>
                                                <td>
                                                    <form action="{{ route('tutor.destroy',$s->id) }}" method="POST">
           
                                                        <a class="btn btn-primary" href="{{ route('tutor.edit',$s->id) }}">Edit</a>
                                        
                                                        @csrf
                                                        @method('DELETE')
                                            
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
                                                    Data Tutor
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
                                                <form action="{{ route('tutor.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Tutor Name</strong>
                                                                <input type="text" name="name" class="form-control" placeholder="Tutor Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <strong>Department</strong>
                                                                <input id="contents" type="hidden" name="Department" class="form-control" value="{{ old('Department') }}">
                                                                <trix-editor input="contents"></trix-editor>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Description</strong>
                                                                <input id="description" type="hidden" name="description" class="form-control" value="{{ old('description')}}">
                                                                <trix-editor input="description"></trix-editor>
                                                            <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <strong>Image</strong>
                                                                <input type="file" name="image" class="form-control" placeholder="Image">
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
                        </div>
                    </div>

{!! $tutor->links() !!}
@endsection
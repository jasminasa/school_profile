@extends('admin.layout')


@section('content')

        <div class="container-fluid px-4">
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Data Blog
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Blog</button>
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
                                        <th>Blog Title</th>
                                        <th>Writer</th>
                                        <th>Image</th>
                                        <th>Image2</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Blog Title</th>
                                        <th>Writer</th>
                                        <th>Image</th>
                                        <th>Image2</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($blog as $b)
                                            <tr>
                                                <td>{{ $b->title }}</td>
                                                <td>{{ $b->writer }}</td>
                                                <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $b->image) }}" alt="No Image" class="img-fluid mt-3">
                                                </div>
                                                </td>
                                                <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $b->image2) }}" alt="No Image" class="img-fluid mt-3">
                                                </div>
                                                </td>
                                                <td>{{ $b->category }}</td>
                                                <td>
                                                    <form action="{{ route('blog.destroy',$b->id) }}" method="POST">
           
                                                        <a class="btn btn-primary" href="{{ route('blog.edit',$b->id) }}">Edit</a>
                                        
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
                                                    Data Blog
                                                </div>
                                                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Blog Title</strong>
                                                                <input type="text" name="title" class="form-control" placeholder="Blog Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Blog Writer</strong>
                                                                <input type="text" name="writer" class="form-control" placeholder="Blog Writer">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <strong>Content</strong>
                                                                <input id="contents" type="hidden" name="content" class="form-control" value="{{ old('content') }}">
                                                                <trix-editor input="contents"></trix-editor>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <strong>Image</strong>
                                                                <input type="file" name="image" class="form-control" placeholder="Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <strong>Image2</strong>
                                                                <input type="file" name="image2" class="form-control" placeholder="Image2">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                            <div class="form-group">
                                                            <strong>Category</strong>
                                                                <select class="form-control" name="category">
                                                                    @foreach($category as $c)
                                                                        <option value="{{$c->category}}">{{$c->category}}</option>
                                                                    @endforeach
                                                                </select>
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

{!! $blog->links() !!}
@endsection
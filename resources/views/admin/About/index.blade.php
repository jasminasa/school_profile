@extends('admin.layout')

@section('content')
            <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                About Us Configuration
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">About Us</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Edit</button>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Description</th>
                                            <th>Sejarah</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Description</th>
                                            <th>Sejarah</th>
                                            <th>Content</th>
                                        </tr>
                                    </tfoot>
                                    @foreach ($about as $a)
                                    <tbody>
                                        <tr>
                                            <td>{{ $a->title }}</td>
                                            <td>
                                            <div style="width: 100px;">
                                                <img src="{{ asset('storage/' . $a->image) }}" alt="No Image" class="img-fluid mt-3">
                                            </div>
                                            </td>
                                            <td>{{ $a->visi }}</td>
                                            <td><?php echo substr($a->misi, 0, 100); ?></td>
                                            <td><?php echo substr($a->content, 0, 100); ?></td>
                                            <td><?php echo substr($a->history, 0, 100); ?></td>
                                            <td><?php echo substr($a->description, 0, 100); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="row">
                            <br>  
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
<div class="container-fluid px-4">
    <div class="card mb-4">
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
    <form action="{{ route('about.update',1) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror placeholder="Title" value="{{$about[0]->title}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image</strong>
                                <input type="hidden" name="oldImage" value="{{ $about[0]->image }}">
                                @if ($about[0]->image)
                                    <img src="{{ asset('storage/' . $about[0]->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Content</strong>
                              <textarea name="content" id="contents" >{{$about[0]->content}}</textarea>
                                <script>
                                    CKEDITOR.replace('contents');
                                </script>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <input id="description" type="hidden" name="description" class="form-control" value="{{$about[0]->description}}">
                                <trix-editor input="description"></trix-editor>
                            <br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Visi</strong>
                                <input type="text" name="visi" class="form-control" placeholder="visi" value="{{$about[0]->visi}}">
                                <br><br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Misi</strong>
                                <input id="misi" type="hidden" name="misi" class="form-control" value="{{$about[0]->misi}}">
                                <trix-editor input="misi"></trix-editor>
                            <br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sejarah</strong>
                                <input id="history" type="hidden" name="history" class="form-control" value="{{$about[0]->history}}">
                                <trix-editor input="history"></trix-editor>
                            <br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                
                </form>
                </div>
        </div>
</div></div>
    </div>
    <br>  
   
        </div>
                            
     </div>
</div>
</div>
                    


    {!! $about->links() !!}

   

@endsection
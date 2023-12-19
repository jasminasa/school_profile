@extends('admin.layout')

@section('content')
            <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Configuration
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
                                    <th>Favicon</th>
                                    <th>Logo</th>
                                    <th>Metadata</th>
                                    <th>Map</th>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Pinterest</th>
                                    <th>Youtube</th>
                                    <th>Twitter</th>
                                    </tr>
                                    </thead>
                                    @foreach ($config as $c)
                                    <tbody>
                                    <tr>
                                        <td>{{ $c->title }}</td>
                                        <td>
                                            <div style="width: 100px;">
                                                <img src="{{ asset('storage/' . $c->favicon) }}" alt="No favicon" class="img-fluid mt-3">
                                            </div>
                                        </td>
                                        <td>
                                        <div style="width: 100px;">
                                            <img src="{{ asset('storage/' . $c->logo) }}" alt="No favicon" class="img-fluid mt-3">
                                        </div>
                                        </td>
                                        <td><?php echo $c->metadata ?></td>
                                        <td>{{ $c->map }}</td>
                                        <td>{{ $c->fb }}</td>
                                        <td>{{ $c->ig }}</td>
                                        <td>{{ $c->yt }}</td>
                                        <td>{{ $c->pin }}</td>
                                        <td>{{ $c->twit }}</td>
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
                                    <form action="{{ route('config.update',1) }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror placeholder="Title" value="{{$config[0]->title}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>favicon</strong>
                                <input type="hidden" name="oldImage" value="{{ $config[0]->favicon }}">
                                @if ($config[0]->favicon)
                                    <img src="{{ asset('storage/' . $config[0]->favicon) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3">
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" @error('favicon') is-invalid @enderror name="favicon" id="favicon" onchange="previewImage()">
                                    @error('favicon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Metadata</strong>
                                <input id="metadatas" type="hidden" name="metadata" class="form-control" value="{{$config[0]->metadata}}">
                                <trix-editor input="metadatas"></trix-editor>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Logo</strong>
                                <input type="hidden" name="oldFooterImage" value="{{ $config[0]->logo }}">
                                @if ($config[0]->logo)
                                    <img src="{{ asset('storage/' . $config[0]->logo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3">
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" @error('logo') is-invalid @enderror name="logo" id="logo" onchange="previewImage()">
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Map</strong>
                                <input type="text" name="map" class="form-control" @error('map') is-invalid @enderror placeholder="map" value="{{$config[0]->map}}">
                                @error('map')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Facebook</strong>
                                <input type="text" name="fb" class="form-control" @error('fb') is-invalid @enderror placeholder="fb" value="{{$config[0]->fb}}">
                                @error('fb')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Instagram</strong>
                                <input type="text" name="ig" class="form-control" @error('ig') is-invalid @enderror placeholder="ig" value="{{$config[0]->ig}}">
                                @error('ig')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Youtube</strong>
                                <input type="text" name="yt" class="form-control" @error('yt') is-invalid @enderror placeholder="yt" value="{{$config[0]->yt}}">
                                @error('yt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Pinterest</strong>
                                <input type="text" name="pin" class="form-control" @error('pin') is-invalid @enderror placeholder="pin" value="{{$config[0]->pin}}">
                                @error('pin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Twitter</strong>
                                <input type="text" name="twit" class="form-control" @error('twit') is-invalid @enderror placeholder="Footer Content" value="{{$config[0]->twit}}">
                                @error('twit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                    


    {!! $config->links() !!}

   

@endsection
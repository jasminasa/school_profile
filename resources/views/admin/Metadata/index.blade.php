@extends('admin.layout')

@section('content')
            <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Metadata Configuration
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Metadata Us</button>
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
                                            <th>Meta Keyword</th>
                                            <th>Meta Search </th>
                                            <th>Meta Description</th>
                                            <th>Meta Author</th>
                                            <th>Meta Website</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Meta Keyword</th>
                                            <th>Meta Search </th>
                                            <th>Meta Description</th>
                                            <th>Meta Author</th>
                                            <th>Meta Website</th>
                                        </tr>
                                    </tfoot>
                                    @foreach ($metadata as $m)
                                    <tbody>
                                        <tr>
                                            <td>{{ $m->metakeyword }}</td>
                                            <td>{{ $m->metasearch }}</td>
                                            <td>{{ $m->metadesc }}</td>
                                            <td>{{ $m->metaauthor }}</td>
                                            <td>{{ $m->metawebsite }}</td>
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
    <form action="{{ route('metadata.update',1) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Meta Keyword</strong><br>
                                <textarea style="width: 100%" name="metakeyword" id="metakeyword" cols="30" rows="5">{{$metadata[0]->metakeyword}}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Meta Search</strong>
                                <textarea style="width: 100%"name="metasearch" id="metasearch" cols="30" rows="5">{{$metadata[0]->metasearch}}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Meta Description</strong>
                                <textarea style="width: 100%" name="metadesc" id="metadesc" cols="30" rows="5">{{$metadata[0]->metadesc}}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Meta Author</strong>
                                <textarea style="width: 100%" name="metaauthor" id="metadesc" cols="30" rows="5">{{$metadata[0]->metaauthor}}</textarea>
                            <br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Meta Website</strong>
                            <textarea style="width: 100%" name="metawebsite" id="metadesc" cols="30" rows="5">{{$metadata[0]->metawebsite}}</textarea>
                            <br>
                            </div>
                        </div>
                       
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
                    


    {!! $metadata->links() !!}

   

@endsection
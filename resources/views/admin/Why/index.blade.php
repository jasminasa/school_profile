@extends('admin.layout')

@section('content')
            <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Why Us Configuration
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Why Us</button>
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
                                            <th>Year</th>
                                            <th>Educator</th>
                                            <th>Student</th>
                                            <th>Success Student</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Year</th>
                                            <th>Educator</th>
                                            <th>Student</th>
                                            <th>Success Student</th>
                                            <th>Description</th>
                                        </tr>
                                    </tfoot>
                                    @foreach ($why as $a)
                                    <tbody>
                                        <tr>
                                            <td>{{ $a->title }}</td>
                                            <td>{{ $a->year }}</td>
                                            <td>{{ $a->educator }}</td>
                                            <td>{{ $a->student }}</td>
                                            <td>{{ $a->successstudent }}</td>
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
    <form action="{{ route('why.update',1) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror placeholder="Title" value="{{$why[0]->title}}">
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
                                <strong>Year</strong>
                                <input type="number" name="year" class="form-control" @error('year') is-invalid @enderror placeholder="Year" value="{{$why[0]->year}}">
                                @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Educator</strong>
                                <input type="number" name="educator" class="form-control" @error('educator') is-invalid @enderror placeholder="Educator" value="{{$why[0]->educator}}">
                                @error('educator')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Student</strong>
                                <input type="number" name="student" class="form-control" @error('student') is-invalid @enderror placeholder="Student" value="{{$why[0]->student}}">
                                @error('student')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Success Student</strong>
                                <input type="number" name="successstudent" class="form-control" @error('successstudent') is-invalid @enderror placeholder="Success Student" value="{{$why[0]->successstudent}}">
                                @error('successstudent')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <input id="desc" type="hidden" name="description" class="form-control" value="{{$why[0]->description}}">
                                <trix-editor input="desc"></trix-editor>
                                <br><br>
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
                    


    {!! $why->links() !!}

   

@endsection
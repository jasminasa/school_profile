@extends('admin.layout')


@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
                Account Configuration
        </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Akun</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Create</button>
            </li>
        </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <!-- Main content -->
            <section class="content">
            <div class="container-fluid" >
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                    {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $a)
                            <tr>
                            <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $a->id }}" /></td> -->
                            <td>{{ $a->username }}</td>
                            <td>{{ $a->role }}</td>

                            <td><form action="{{ route('akun.destroy',$a->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('akun.edit',$a->id) }}">Edit</a>
                
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
                            </form></td>

                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
{!! $akun->links() !!}
    </section>
  </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <section class="create">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="pull-right">
                    {{-- <a class="btn btn-danger" href="{{ route('akun.index') }}"> Back</a> --}}
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
                </div>
                <!-- /.card-header -->
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
                    <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Username</strong>
                                    <input type="text" name="username" class="form-control" @error('username') is-invalid @enderror placeholder="Username" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Role</strong>
                                    <select class="form-control" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                    </select>                      
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror placeholder="Password" value="{{ old('password') }}">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    
                    </form>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </section>
  </div>
</div>

{!! $akun->links() !!}
@endsection
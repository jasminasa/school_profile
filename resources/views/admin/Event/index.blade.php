@extends('admin.layout')


@section('content')

        <div class="container-fluid px-4">
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Data Event
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Event</button>
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
                                        <th>Event Title</th>
                                        <th>Theme</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Event Title</th>
                                        <th>Theme</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($event as $e)
                                            <tr>
                                                <td>{{ $e->title }}</td>
                                                <td>{{ $e->theme }}</td>
                                                <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $e->image) }}" alt="No Image" class="img-fluid mt-3">
                                                </div>
                                                </td>
                                                <td>
                                                @if(date('Y-m-d') < $e['startdate']) Coming Soon 
                                                @elseif(date('Y-m-d') >= $e['startdate'] && date('Y-m-d') < $e['enddate']) Event On Going 
                                                @elseif(date('Y-m-d')>= $e['enddate']) Event Ended
                                                @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('event.destroy',$e->id) }}" method="POST">
           
                                                        <a class="btn btn-primary" href="{{ route('event.edit',$e->id) }}">Edit</a>
                                        
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
                                                    Data Event
                                                </div>
                                                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Event Title</strong>
                                                                <input type="text" name="title" class="form-control" placeholder="Event Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <strong>Description</strong>
                                                                <input id="desc" type="hidden" name="description" class="form-control" value="{{ old('description') }}">
                                                                <trix-editor input="desc"></trix-editor>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Start Date</strong>
                                                                <input placeholder="yyyy/mm/dd" type="date" name="startdate" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>End Date</strong>
                                                                <input placeholder="yyyy/mm/dd" type="date" name="enddate" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Start Time</strong>
                                                                <input type="time" name="starttime" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>End Time</strong>
                                                                <input type="time" name="endtime" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Theme</strong>
                                                                <input type="text" name="theme" class="form-control" placeholder="Theme">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Location</strong>
                                                                <input type="text" name="location" class="form-control" placeholder="Location">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Map</strong>
                                                                <input type="text" name="map" class="form-control" placeholder="Map">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <strong>Image</strong>
                                                                <input type="file" name="image" class="form-control" placeholder="Image">
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

{!! $event->links() !!}
@endsection
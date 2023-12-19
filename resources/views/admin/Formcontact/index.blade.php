@extends('admin.layout')

@section('content')
            <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Contact Us Configuration
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Formcontact Us</button>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Email</th>
                                            <th>Massage</th>
                                            <th>Action</th>
                                            </tr>
                                            </thead>           
                                            <tbody>
                                            @foreach ($formcontact as $f)
                                            <tr>
                                                <td>{{ $f->firstname }} {{$f->lastname}}</td>
                                                <td>{{ $f->subject }}</td>
                                                <td>{{ $f->email }}</td>
                                                <td><?php echo $f->massage ?></td>
                                                <td>
                                                    <form action="{{ route('formcontact.destroy',$f->id) }}" method="POST">
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
</div>
                    


    {!! $formcontact->links() !!}

   

@endsection
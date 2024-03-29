<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Admin</title>
        <link href="../../assets/admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    @if ($message = Session::get('success'))
                                          <div class="alert alert-success mt-2">
                                            <p>{{ $message }}</p>
                                          </div>
                                        @endif
                                        @if (session()->has('loginError'))
                                          <div class="alert alert-danger mt-2">
                                            <p>{{ session('loginError') }}</p>
                                          </div>
                                        @endif
                                        <form action="{{ route('authentication') }}" method="post">
                                        @csrf
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" name="username" placeholder="name@example.com" value="{{ old('username') }}">
                                                <label for="floatingInput">Username</label>
                                            </div>
                                            <div class="form-floating">
                                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                                              <label for="floatingPassword">Password</label>
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block mt-4" style="widht:100%"type="submit">Login</button>
                                           </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/admin/js/scripts.js"></script>
    </body>
</html>
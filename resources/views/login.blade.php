<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in - PPDB Admin Dashboard</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="shortcut icon" href="images/logoo.png" type="image/x-icon" />
</head>

<body>
  <div class="container mt-4">
    <div class="row d-flex mt-2">
      <div class="col-md-4 col-sm-12 mx-auto justify-content-center align-items-center">
        <div class="card pt-4 mt-5">
          <div class="card-body">
            <div class="text-center mb-3">
              <img src="image/undraw_Joyride_re_968t.png" height="140" class="mb-4" />
              <h3>Sign In</h3>
              <p>Silakan masuk untuk melanjutkan Penerimaan Karyawan</p>
            </div>
            <form action="{{ route('login.process') }}" method="post">
              @csrf
              <div class="form-group position-relative has-icon-left mt-4">
                <label for="email">Email</label>
                <div class="position-relative">
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                  <div class="form-control-icon ml-5">
                    <i class="fas fa-envelope text-light"></i>
                  </div>
                  {{-- @error('email')
                  <div class="position-absolute mb-5 invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror --}}
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mt-4">
                <div class="clearfix">
                  <label for="password">Password</label>
                </div>
                <div class="position-relative">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                    required>
                  <div class="form-control-icon">
                    <i id="eye" class="fa fa-eye text-light"></i>
                  </div>
                </div>
              </div>
              <div class="clearfix mt-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/app.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
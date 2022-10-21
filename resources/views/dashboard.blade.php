<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <table class="table table-bordered mt-5 text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>Calon Karyawan</th>
          <th>Pengalaman Kerja</th>
          <th>Pendidikan</th>
          <th>Umur</th>
          <th>Status</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($employees as $employee)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $employee->name }}</td>
          <td>{{ $employee->pengalaman_kerja }}</td>
          <td>{{ $employee->pendidikan }}</td>
          <td>{{ $employee->umur }}</td>
          <td>{{ $employee->status }}</td>
          <td>{{ $employee->alamat }}</td>
        </tr>
        @empty
        <tr colspan="7">Data Not Available</tr>
        @endforelse
        <tr>
          <td colspan="2" class="text-center">R(ij)</td>
          <td class="text-center">Max( {{ $maxPengalaman }} )</td>
          <td class="text-center">Max( {{ $maxPendidikan }} )</td>
          <td class="text-center">Max( {{ $maxUmur }} )</td>
          <td class="text-center">min( {{ $minStatus }} )</td>
          <td class="text-center">min( {{ $minAlamat }} )</td>
        </tr>
      </tbody>
    </table>
    <div class="mt-5">
      <p>Bobot dari tiap Kriteria</p>
    </div>
    <table class="table table-bordered border-primary">
      <thead class="text-center">
        <th>Kriteria</th>
        <th>Bobot</th>
      </thead>
      <tbody class="text-center">
        <tr>
          <td>Pengalaman Kerja</td>
          <td>0.3</td>
        </tr>
        <tr>
          <td>Pendidikan</td>
          <td>0.2</td>
        </tr>
        <tr>
          <td>Umur</td>
          <td>0.2</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>0.15</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>0.15</td>
        </tr>
        <tr class="text-bold">
          <td>Total</td>
          <td>1</td>
        </tr>
      </tbody>
    </table>

    <div class="mt-5">
      <p>Normalisasi Matriks</p>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Calon Karyawan</th>
          <th>Pengalaman Kerja</th>
          <th>Pendidikan</th>
          <th>Umur</th>
          <th>Status</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $employee->name }}</td>
          <td>{{ ($employee->pengalaman_kerja)/$maxPengalaman }}</td>
          <td>{{ ($employee->pendidikan)/$maxPendidikan }}</td>
          <td>{{ ($employee->umur / $maxUmur) }}</td>
          <td>{{ $minStatus / $employee->status }}</td>
          <td>{{ $minAlamat/$employee->alamat }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-5">
      Perhitungan Hasil
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Calon Karyawan</th>
          <th>Hasil</th>
        </tr>
      </thead>
      @foreach ($employees as $employee)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $employee->name }}</td>
        <td>
          {{ (($employee->pengalaman_kerja/$maxPengalaman) * $bobot['pengalaman_kerja']) +
          (($employee->pendidikan/$maxPendidikan) * $bobot['pendidikan']) +
          (($employee->umur/$maxUmur) * $bobot['umur']) +
          (($minStatus/$employee->status) * $bobot['status']) +
          (($minAlamat/$employee->alamat) * $bobot['alamat']) }}
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>

</html>
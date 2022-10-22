<div>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h3><strong>Penerimaan Karyawan</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>All Karyawan</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
                            data-target="#addKaryawanModal">Tambah Data Karyawan</button>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

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
                                        <th>Aksi</th>
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
                                        <td style="text-align: center;">
                                            <button class="btn btn-sm btn-primary"
                                                wire:click="edit({{ $employee->id }})">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="delete({{ $employee->id }})">Delete</button>
                                        </td>
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
                                        <td>{{ $bobot['pengalaman_kerja'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td>
                                        <td>{{ $bobot['pendidikan'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Umur</td>
                                        <td>{{ $bobot['umur'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $bobot['status'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $bobot['alamat'] }}</td>
                                    </tr>
                                    <tr class="text-bold">
                                        <td>Total</td>
                                        <td>{{ $totalBobot }}</td>
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
                                    @foreach ($normalisasi as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['pengalaman_kerja'] }}</td>
                                        <td>{{ $data['pendidikan'] }}</td>
                                        <td>{{ $data['umur'] }}</td>
                                        <td>{{ $data['status'] }}</td>
                                        <td>{{ $data['alamat'] }}</td>
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
                                        <th>Rangking</th>
                                        <th>Calon Karyawan</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                @foreach ($rangkingHasil as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>
                                        {{ $item['hasil'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="mt-5">
                                <p>Hasil Akhir</p>
                                @foreach ($kandidat as $item)

                                <p>Kandidat terbaik : {{ $item['nama'] }} dengan nilai {{ $item['hasil'] }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    @include('livewire.layouts.modal-tambah')

    @include('livewire.layouts.modal-edit')

    @include('livewire.layouts.modal-delete')

</div>

@push('scripts')
<script>
    window.addEventListener('close-modal', event =>{
            $('#addKaryawanModal').modal('hide');
            $('#editKaryawanModal').modal('hide');
            $('#deleteKaryawanModal').modal('hide');
        });
        window.addEventListener('show-edit-modal', event =>{
            $('#editKaryawanModal').modal('show');
        });
        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteKaryawanModal').modal('show');
        });
</script>
@endpush
<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $maxPengalaman = Employee::max('pengalaman_kerja');
        $maxPendidikan = Employee::max('pendidikan');
        $maxUmur = Employee::max('umur');
        $minStatus = Employee::min('status');
        $minAlamat = Employee::min('alamat');
        $bobot = [
            'pengalaman_kerja' => 0.3,
            'pendidikan' => 0.2,
            'umur' => 0.2,
            'status' => 0.15,
            'alamat' => 0.15,
        ];
        $totalBobot = array_sum($bobot);
        $normalisasi = [];
        foreach ($employees as $employee) {
            $normalisasi[] = [
                'nama' => $employee->name,
                'pengalaman_kerja' => $employee->pengalaman_kerja / $maxPengalaman,
                'pendidikan' => $employee->pendidikan / $maxPendidikan,
                'umur' => $employee->umur / $maxUmur,
                'status' => $minStatus / $employee->status,
                'alamat' => $minAlamat / $employee->alamat ,
            ];
        }
        $hasil = [];
        foreach ($normalisasi as $key => $value) {
            $hasil[] = [
                'nama' => $value['nama'],
                'hasil' => $value['pengalaman_kerja'] * $bobot['pengalaman_kerja'] +
                    $value['pendidikan'] * $bobot['pendidikan'] +
                    $value['umur'] * $bobot['umur'] +
                    $value['status'] * $bobot['status'] +
                    $value['alamat'] * $bobot['alamat'],
            ];
        }
        $rangkingHasil = collect($hasil)->sortByDesc('hasil')->toArray();
        $kandidat = array_slice($rangkingHasil, 0, 1);
        // dd($kandidat);
        return view('dashboard', compact('employees', 'maxPengalaman', 'maxPendidikan', 'maxUmur', 'minStatus', 'minAlamat', 'bobot', 'normalisasi', 'hasil', 'rangkingHasil', 'totalBobot', 'kandidat'));
    }
}

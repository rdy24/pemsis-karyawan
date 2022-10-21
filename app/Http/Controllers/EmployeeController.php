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
        return view('dashboard', compact('employees', 'maxPengalaman', 'maxPendidikan', 'maxUmur', 'minStatus', 'minAlamat', 'bobot'));
    }
}

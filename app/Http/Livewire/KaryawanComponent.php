<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class KaryawanComponent extends Component
{
    public $name, $pengalaman_kerja, $pendidikan, $umur, $status, $alamat, $edit_id, $delete_id;

    public function render()
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

        return view('livewire.karyawan-component', compact('employees', 'kandidat', 'bobot', 'totalBobot', 'normalisasi', 'hasil', 'rangkingHasil', 'maxPengalaman', 'maxPendidikan', 'maxUmur', 'minStatus', 'minAlamat'))->layout('livewire.layouts.base');

    }



    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'pengalaman_kerja' => 'required|numeric|max:1',
            'pendidikan' => 'required|numeric|max:1',
            'umur' => 'required|numeric|max:1',
            'status' => 'required|numeric|max:1',
            'alamat' => 'required|numeric|max:1',
        ]);
    }



    public function store()
    {
        $this->validate([
            'name' => 'required',
            'pengalaman_kerja' => 'required|numeric|max:1',
            'pendidikan' => 'required|numeric|max:1',
            'umur' => 'required|numeric|max:1',
            'status' => 'required|numeric|max:1',
            'alamat' => 'required|numeric|max:1',
        ]);

        Employee::create([
            'name' => $this->name,
            'pengalaman_kerja' => $this->pengalaman_kerja,
            'pendidikan' => $this->pendidikan,
            'umur' => $this->umur,
            'status' => $this->status,
            'alamat' => $this->alamat,
        ]);


        session()->flash('message', 'New Karyawan Added Successfully.');


        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function resetInputs()
    {
        $this->name = '';
        $this->pengalaman_kerja = '';
        $this->pendidikan = '';
        $this->umur = '';
        $this->status = '';
        $this->alamat = '';
    }


    public function close()
    {
        $this->resetInputs();
    }


    public function edit($id)
    {
        $karyawan = Employee::findOrFail($id);
        $this->edit_id = $karyawan->id;
        $this->name = $karyawan->name;
        $this->pengalaman_kerja = $karyawan->pengalaman_kerja;
        $this->pendidikan = $karyawan->pendidikan;
        $this->umur = $karyawan->umur;
        $this->status = $karyawan->status;
        $this->alamat = $karyawan->alamat;


        $this->dispatchBrowserEvent('show-edit-modal');
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'pengalaman_kerja' => 'required|numeric|max:1',
            'pendidikan' => 'required|numeric|max:1',
            'umur' => 'required|numeric|max:1',
            'status' => 'required|numeric|max:1',
            'alamat' => 'required|numeric|max:1',
        ]);

        $karyawan = Employee::find($this->edit_id);
        $karyawan->update([
            'name' => $this->name,
            'pengalaman_kerja' => $this->pengalaman_kerja,
            'pendidikan' => $this->pendidikan,
            'umur' => $this->umur,
            'status' => $this->status,
            'alamat' => $this->alamat,
        ]);
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message', 'Karyawan Updated Successfully.');
    }   


    //Delete Confirmation
    public function delete($id)
    {
        $this->delete_id = $id; 


        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }


    public function destroy()
    {
        $karyawan = Employee::find($this->delete_id);
        $karyawan->delete();


        session()->flash('message', 'Karyawan has been deleted successfully');


        $this->dispatchBrowserEvent('close-modal');


        $this->delete_id = '';
    }


    public function cancel()
    {
        $this->delete_id = '';
    }

}

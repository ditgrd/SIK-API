<?php

namespace App\Livewire;

use App\Models\APIProject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormTambah extends Component
{
    use LivewireAlert;

    public $toggle = false;

    #[Validate]
    public $nama_project;

    public function rules()
    {
        return [
            'nama_project' => ['required', Rule::unique('api_projects', 'nama_project')]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function toggleTrigger() {
        $this->toggle = !$this->toggle;
    }

    public function simpan()
    {
        try {
            $this->validate();

            APIProject::create([
                'nama_project' => $this->nama_project,
                'client_id' => Hash::make(now().sha1(time()).'SICOOPER_CLIENT_ID'),
                'client_secret' => Hash::make(now().sha1(time()).'SICOOPER_CLIENT_SECRET')
            ]);

            $this->alert('success', 'Berhasil menyimpan API Project', [
                'toast' => false,
                'position' => 'center center'
            ]);

            return $this->dispatch('reloadDatatable');
        } catch (\Throwable $th) {
            $this->alert('error', 'Opss terjadi error', [
                'toast' => false,
                'position' => 'center center'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.form-tambah');
    }
}

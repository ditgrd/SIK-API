<?php

namespace App\Livewire;

use App\Models\APIProject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class APIProjectDelete extends Component
{
    use LivewireAlert;

    public $id;

    protected $listeners = [
        'confirmed'
    ];

    public function mount($id) {
        $this->id = $id;
    }

    public function delete() {
        $this->alert('question', 'Yakin mau delete?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya',
            'onConfirmed' => 'confirmed',
            'showCancelButton' => true,
            'cancelButtonText' => 'Batalkan',
            'toast' => false,
            'position' => 'center center'
        ]);
    }

    public function confirmed() {
        $data = APIProject::find($this->id);

        if (isset($data)) {
            $data->delete();

            $this->alert('success', 'Berhasil mendelete', [
                'toast' => false,
                'position' => 'center center'
            ]);

            return $this->dispatch('reloadDatatable');
        }

        return $this->alert('error', 'Data tidak', [
            'toast' => false,
            'position' => 'center center'
        ]);
    }

    public function render()
    {
        return view('livewire.a-p-i-project-delete');
    }
}

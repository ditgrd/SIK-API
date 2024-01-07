<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:form-tambah />
                    <br>
                    {{ $dataTable->table(['class' => 'table-fixed break-all']) }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            Livewire.on('reloadDatatable', postId => {
                window.LaravelDataTables["apiproject-table"].ajax.reload();
            })
        });
    </script>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>

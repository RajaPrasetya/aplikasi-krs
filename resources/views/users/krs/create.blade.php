<x-mahasiswa-layout>
    <x-slot:header>
        {{ __('Add KRS') }}
    </x-slot:header>
    <div class="pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

                <h1 class="font-bold text-gray-600 text-xl pb-3">Kartu Rencana Study</h1>
                <form action="{{ route('users.krs.store') }}" method="POST">
                    @csrf

                    <x-table>
                        <x-slot:head>
                            @if($matakuliahs)
                            <tr>
                                <th class="border border-slate-600 text-center" colspan="5">
                                    <div class="flex justify-end items-center mr-12">
                                        <div class="flex justify-end items-center">
                                            <input type="checkbox" class="checkbox checkbox-info mr-2" id="select-all" />
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @endif
                            <tr>
                                <th class="border border-slate-600 text-center">Kode MK</th>
                                <th class="border border-slate-600 text-center">Nama Mata Kuliah</th>
                                <th class="border border-slate-600 text-center">Semester</th>
                                <th class="border border-slate-600 text-center">SKS</th>
                                <th class="border border-slate-600 text-center">Action</th>
                            </tr>
                        </x-slot:head>
                        @csrf
                        @forelse ($matakuliahs as $mk)
                        <tr class="border border-slate-600 text-center">
                            <td class="border border-slate-600 text-center">{{ str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT) }}</td>
                            <td class="border border-slate-600 text-center">{{ $mk->nama_mk }}</td>
                            <td class="border border-slate-600 text-center">{{ $mk->semester }}</td>
                            <td class="border border-slate-600 text-center">{{ $mk->sks }}</td>
                            <td class="border border-slate-600 text-center">
                                <input type="checkbox" class="checkbox checkbox-info mr-2" name="kode_mk[]" value="{{ $mk->kode_mk }}" @if(in_array($mk->kode_mk, $selectmatakuliahs)) checked disabled @endif>
                            </td>
                        </tr>
                        @empty
                        <tr class="border border-slate-600">
                            <td colspan="5" class="text-center">No data available</td>
                        </tr>
                        @endforelse
                    </x-table>
                    <x-primary-button class="mt-4" id="submit-button" disabled>
                        {{ __('submit') }}
                    </x-primary-button>
                </form>
                <div class="mt-4 flex justify-center">
                    {{ $matakuliahs->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="kode_mk[]"]');
            const submitButton = document.getElementById('submit-button');
            const selectAll = document.getElementById('select-all');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', toggleSubmitButton);
            });

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    if (!checkbox.disabled) {
                        checkbox.checked = selectAll.checked;
                    }
                });
                toggleSubmitButton();
            });

            function toggleSubmitButton() {
                submitButton.disabled = !Array.from(checkboxes).some(checkbox => checkbox.checked && !checkbox.disabled);
            }
        });
    </script>
</x-mahasiswa-layout>
<x-mahasiswa-layout>
    <x-slot:header>
        {{ __('Mahasiswa Dashboard') }}
    </x-slot:header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

                <h1 class="font-bold text-gray-600 text-xl pb-3">Kartu Rencana Study</h1>
                <x-table>


                    <x-slot:head>
                        <tr>
                            <th class="border border-slate-600 text-center"></th>
                            <th class="border border-slate-600 text-center"></th>
                            <th class="border border-slate-600 text-center"></th>
                            <th class="border border-slate-600 text-center"></th>
                            <th class="border border-slate-600 text-center"><input type="checkbox" class="checkbox checkbox-info" id="select-all" /></th>
                        </tr>
                        <tr>

                            <th class="border border-slate-600 text-center">Kode MK</th>
                            <th class="border border-slate-600 text-center">Nama Mata Kuliah</th>
                            <th class="border border-slate-600 text-center">Semester</th>
                            <th class="border border-slate-600 text-center">SKS</th>
                            <th class="border border-slate-600 text-center">Action</th>
                    </x-slot:head>
                    </tr>
                    @forelse ($matakuliahs as $mk)
                    <tr class="border border-slate-600 text-center">
                        <td class="border border-slate-600 text-center">{{ str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT) }}</td>
                        <td class="border border-slate-600 text-center">{{ $mk->nama_mk }}</td>
                        <td class="border border-slate-600 text-center">{{ $mk->semester }}</td>
                        <td class="border border-slate-600 text-center">{{ $mk->sks }}</td>
                        <td class="border border-slate-600 text-center">

                            <input type="checkbox" class="checkbox checkbox-info" id="checkbox" />
                        </td>
                    </tr>
                    @empty
                    <tr class="border border-slate-600">
                        <td colspan="5" class="text-center">No data available</td>
                    </tr>
                    @endforelse
                </x-table>
                <div class="flex justify-start py-4 ">
                    <a href="#" class="btn btn-sm btn-primary px-10 duration-500  hover:bg-blue-950 hover:text-gray-600">Submit</a>
                </div>
                <div class="mt-4 flex justify-center">
                    {{ $matakuliahs->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('select-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.checkbox');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script>
</x-mahasiswa-layout>
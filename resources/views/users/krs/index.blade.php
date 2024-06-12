<x-mahasiswa-layout>
    <x-slot:header>
        {{ __('Daftar Mahasiswa') }}
    </x-slot:header>
    <div class="flex justify-end pb-4">
        <a href="{{ route('user.krs.create') }}" class="btn btn-sm btn-primary">Add</a>
    </div>
    <x-table>
        <x-slot:head>
            <th class="border border-slate-600 text-center">Kode Matkul</th>
            <th class="border border-slate-600 text-center">Nama Matkul</th>
            <th class="border border-slate-600 text-center">SKS</th>
            <th class="border border-slate-600 text-center">Nilai</th>
            <th class="border border-slate-600 text-center">Action</th>
        </x-slot:head>
        <tr class="border border-slate-600">
            <td colspan="5" class="text-center">No data available</td>
        </tr>

    </x-table>
    <div class="mt-4 flex justify-center">
    </div>
</x-mahasiswa-layout>
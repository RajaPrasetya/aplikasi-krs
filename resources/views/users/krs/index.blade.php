<x-mahasiswa-layout>
    <x-slot:header>
        {{ __('Daftar Mahasiswa') }}
    </x-slot:header>
    <div class="flex justify-end pb-4">
        <a href="{{ route('users.krs.create') }}" class="btn btn-sm btn-primary">Add</a>
    </div>
    <x-table>
        <x-slot:head>
            <th class="border border-slate-600 text-center">Kode Matkul</th>
            <th class="border border-slate-600 text-center">Nama Matkul</th>
            <th class="border border-slate-600 text-center">Semester</th>
            <th class="border border-slate-600 text-center">SKS</th>
        </x-slot:head>
        @forelse ($matakuliahs as $mk)
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center">{{ str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT) }}</td>
                <td class="border border-slate-600 text-center">{{ $mk->nama_mk }}</td>
                <td class="border border-slate-600 text-center">{{ $mk->semester }}</td>
                <td class="border border-slate-600 text-center">{{ $mk->sks }}</td>
            </tr>
        @empty
            <tr class="border border-slate-600">
                <td colspan="5" class="text-center">No data available</td>
            </tr>
        @endforelse
        <x-slot:footer>
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center text-black text-sm">Total SKS</td>
                <td colspan="3" class="border border-slate-600 text-center font-bold text-black text-sm">
                    {{ $matakuliahs->sum('sks') }}
                </td>
            </tr>
        </x-slot:footer>
    </x-table>


</x-mahasiswa-layout>

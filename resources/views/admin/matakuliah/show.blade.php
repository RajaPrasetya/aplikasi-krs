<x-admin-layout>
    <x-slot:header>
        {{ __('List Mahasiswa Di Mata Kuliah ') . $mk->nama_mk }}
    </x-slot:header>
    <x-table>
        <x-slot:head>
            <th class="border border-slate-600 text-center">NIM</th>
            <th class="border border-slate-600 text-center">Nama</th>
            <th class="border border-slate-600 text-center">Nilai</th>
            <th class="border border-slate-600 text-center">Action</th>
        </x-slot:head>
        @forelse ($mahasiswas as $mhs)
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center">{{ $mhs->NIM }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->name }}</td>
                <td class="border border-slate-600 text-center">
                    {{ $mhs->pivot->nilai == null ? 'Nilai Belum Diinput' : $mhs->pivot->nilai }}</td>
                <td class="border border-slate-600 text-center">
                    <a href="{{ route('admin.matakuliah.editNilai', ['matakuliah' => str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT), 'nim' => $mhs->NIM]) }}"
                        class="btn btn-sm btn-accent">Edit</a>
                </td>
            </tr>
        @empty
            <tr class="border border-slate-600">
                <td colspan="5" class="text-center">No data available</td>
            </tr>
        @endforelse
    </x-table>
</x-admin-layout>

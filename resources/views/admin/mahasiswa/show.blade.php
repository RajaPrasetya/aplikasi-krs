<x-admin-layout>
    <x-slot:header>
        {{ __('KRS Mahasiswa') }}
    </x-slot:header>
    <x-table>
        <x-slot:head>
            <th class="border border-slate-600 text-center">Kode Matkul</th>
            <th class="border border-slate-600 text-center">Nama Matkul</th>
            <th class="border border-slate-600 text-center">Semester</th>
            <th class="border border-slate-600 text-center">SKS</th>
            <th class="border border-slate-600 text-center">Nilai</th>
            {{-- <th class="border border-slate-600 text-center">Action</th> --}}
        </x-slot:head>
        @forelse ($krs as $k)
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center">{{ str_pad($k->kode_mk, 6, '0', STR_PAD_LEFT) }}</td>
                <td class="border border-slate-600 text-center">{{ $k->nama_mk }}</td>
                <td class="border border-slate-600 text-center">{{ $k->semester }}</td>
                <td class="border border-slate-600 text-center">{{ $k->sks }}</td>
                <td class="border border-slate-600 text-center">
                    {{ $k->nilai == null ? 'nilai belum diinput' : $k->nilai }}</td>
                {{-- <td class="border border-slate-600 text-center">
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <form action="#" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-error" type="submit">Delete</button>
                    </form>
                </td> --}}
            </tr>
        @empty
            <tr class="border border-slate-600">
                <td colspan="5" class="text-center">No data available</td>
            </tr>
        @endforelse

    </x-table>
</x-admin-layout>

<x-admin-layout>
    <x-slot:header>
        {{ __('Daftar Mata Kuliah') }}
    </x-slot:header>
    <div class="flex justify-end pb-4">
        <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-sm btn-primary">Add</a>
    </div>
    <x-table>
        <x-slot:head>
            <th class="border border-slate-600 text-center">Kode MK</th>
            <th class="border border-slate-600 text-center">Nama Mata Kuliah</th>
            <th class="border border-slate-600 text-center">Semester</th>
            <th class="border border-slate-600 text-center">SKS</th>
            <th class="border border-slate-600 text-center">Action</th>
        </x-slot:head>
        @forelse ($matakuliahs as $mk)
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center">{{ str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT) }}</td>
                <td class="border border-slate-600 text-center">{{ $mk->nama_mk }}</td>
                <td class="border border-slate-600 text-center">{{ $mk->semester }}</td>
                <td class="border border-slate-600 text-center">{{ $mk->sks }}</td>
                <td class="border border-slate-600 text-center">
                    <a href="{{ route('admin.matakuliah.edit', $matakuliah = str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT)) }}"
                        class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.matakuliah.destroy', $matakuliah = $mk->kode_mk) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-error" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr class="border border-slate-600">
                <td colspan="5" class="text-center">No data available</td>
            </tr>
        @endforelse
    </x-table>
    <div class="mt-4 flex justify-center">
        {{ $matakuliahs->links('vendor.pagination.custom') }}
    </div>
</x-admin-layout>

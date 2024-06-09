<x-admin-layout>
    <x-slot:header>
        {{ __('Daftar Mahasiswa') }}
    </x-slot:header>
    <div class="flex justify-end pb-4">
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-sm btn-primary">Add</a>
    </div>
    <x-table>
        <x-slot:head>
            <th class="border border-slate-600 text-center">NIM</th>
            <th class="border border-slate-600 text-center">Nama</th>
            <th class="border border-slate-600 text-center">Email</th>
            <th class="border border-slate-600 text-center">Alamat</th>
            <th class="border border-slate-600 text-center">Action</th>
        </x-slot:head>
        @forelse ($mahasiswas as $mhs)
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center">{{ $mhs->NIM }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->name }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->email }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->address }}</td>
                <td class="border border-slate-600 text-center">
                    <a href="{{ route('admin.mahasiswa.edit', $mahasiswa = $mhs->NIM) }}"
                        class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.mahasiswa.destroy', $mahasiswa = $mhs->NIM) }}" method="POST"
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
        {{ $mahasiswas->links('vendor.pagination.custom') }}
    </div>
</x-admin-layout>

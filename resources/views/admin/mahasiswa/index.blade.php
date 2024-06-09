{{ $mahasiswa->links() }}

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
        @forelse ($mahasiswa as $mhs)
            <tr class="border border-slate-600 text-center">
                <td class="border border-slate-600 text-center">{{ $mhs->NIM }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->name }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->email }}</td>
                <td class="border border-slate-600 text-center">{{ $mhs->address }}</td>
                <td class="border border-slate-600 text-center">
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <form action="" method="POST" class="inline">
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
</x-admin-layout>

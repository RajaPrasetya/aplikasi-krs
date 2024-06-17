<x-admin-layout>
    <x-slot:header>
        {{ __('Edit Nilai Matakuliah ') . $mk->nama_mk . ' ' . $mahasiswa->name }}
    </x-slot:header>
    <form
        action="{{ route('admin.matakuliah.updateNilai', ['matakuliah' => str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT), 'nim' => $mahasiswa->NIM]) }}"
        method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 gap-6">
                <label for="NIM" class="block">
                    <span class="text-gray-700">Nama</span>
                    <input type="text" name="NIM" id="NIM" value="{{ $mahasiswa->name }}"
                        class="form-input mt-1 block w-full" readonly />
                </label>
                <div class="grid grid-cols-1 gap-6">
                    <label for="nilai" class="block">
                        <span class="text-gray-700">Nilai</span>
                        <input type="text" name="nilai" id="nilai" value="{{ $mahasiswa->pivot->nilai }}"
                            class="form-input mt-1 block w-full" />
                    </label>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-accent">Update</button>
                </div>
            </div>
</x-admin-layout>

<x-admin-layout>
    <x-slot:header>
        {{ __('Edit Mata Kuliah') }}
    </x-slot:header>
    <form action="{{ route('admin.matakuliah.update', $matakuliah = str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT)) }}"
        method="POST">
        @csrf
        @method('PUT')
        {{-- Kode MK --}}
        <div>
            <x-input-label for="kode_mk" :value="__('Kode MK')" />
            <x-text-input id="kode_mk" class="block mt-1 w-full" type="text" name="kode_mk" :value="old('kode_mk', str_pad($mk->kode_mk, 6, '0', STR_PAD_LEFT))" required
                autofocus autocomplete="kode_mk" />
            <x-input-error :messages="$errors->get('kode_mk')" class="mt-2" />
        </div>
        {{-- Nama MK --}}
        <div class="mt-4">
            <x-input-label for="nama_mk" :value="__('Nama MK')" />
            <x-text-input id="nama_mk" class="block mt-1 w-full" type="text" name="nama_mk" :value="old('nama_mk', $mk->nama_mk)"
                required autocomplete="nama_mk" />
            <x-input-error :messages="$errors->get('nama_mk')" class="mt-2" />
        </div>
        {{-- SKS --}}
        <div class="mt-4">
            <x-input-label for="sks" :value="__('SKS')" />
            <x-text-input id="sks" class="block mt-1 w-full" type="number" name="sks" :value="old('sks', $mk->sks)"
                required autocomplete="sks" />
            <x-input-error :messages="$errors->get('sks')" class="mt-2" />
        </div>
        {{-- Semester --}}
        <div class="mt-4">
            <x-input-label for="semester" :value="__('Semester')" />
            <x-text-input id="semester" class="block mt-1 w-full" type="number" name="semester" :value="old('semester', $mk->semester)"
                required autocomplete="semester" />
            <x-input-error :messages="$errors->get('semester')" class="mt-2" />
        </div>
        {{-- Button --}}
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Edit') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>

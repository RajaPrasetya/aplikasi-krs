<x-admin-layout>
    <x-slot:header>
        {{ __('Create Mata Kuliah') }}
    </x-slot:header>
    <form action="{{ route('admin.matakuliah.store') }}" method="POST">
        @csrf
        {{-- Kode MK --}}
        <div>
            <x-input-label for="kode_mk" :value="__('Kode Mata Kuliah')" />
            <x-text-input id="kode_mk" class="block mt-1 w-full" type="text" name="kode_mk" :value="old('kode_mk')" required
                autofocus autocomplete="kode_mk" />
            <x-input-error :messages="$errors->get('kode_mk')" class="mt-2" />
        </div>
        {{-- Nama MK --}}
        <div class="mt-4">
            <x-input-label for="nama_mk" :value="__('Nama Mata Kuliah')" />
            <x-text-input id="nama_mk" class="block mt-1 w-full" type="text" name="nama_mk" :value="old('nama_mk')"
                required autofocus autocomplete="nama_mk" />
            <x-input-error :messages="$errors->get('nama_mk')" class="mt-2" />
        </div>
        {{-- Semester --}}
        <div class="mt-4">
            <x-input-label for="semester" :value="__('Semester')" />
            <x-text-input id="semester" class="block mt-1 w-full" type="text" name="semester" :value="old('semester')"
                required autofocus autocomplete="semester" />
            <x-input-error :messages="$errors->get('semester')" class="mt-2" />
        </div>
        {{-- SKS --}}
        <div class="mt-4">
            <x-input-label for="sks" :value="__('SKS')" />
            <x-text-input id="sks" class="block mt-1 w-full" type="number" name="sks" :value="old('sks')"
                required autofocus autocomplete="sks" />
            <x-input-error :messages="$errors->get('sks')" class="mt-2" />
        </div>
        {{-- Button --}}
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>

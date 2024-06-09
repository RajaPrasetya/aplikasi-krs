<x-admin-layout>
    <x-slot:header>
        {{ __('Edit Mahasiswa') }}
    </x-slot:header>
    <form action="{{ route('admin.mahasiswa.update', $user = $mahasiswa->NIM) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- NIM --}}
        <div>
            <x-input-label for="NIM" :value="__('NIM')" />
            <x-text-input id="NIM" class="block mt-1 w-full" type="text" name="NIM" :value="old('NIM', $mahasiswa->NIM)" required
                autofocus autocomplete="NIM" />
            <x-input-error :messages="$errors->get('NIM')" class="mt-2" />
        </div>
        {{-- Name --}}
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $mahasiswa->name)"
                required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        {{-- Email Address --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $mahasiswa->email)"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Edit') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>

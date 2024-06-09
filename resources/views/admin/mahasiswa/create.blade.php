<x-admin-layout>
    <x-slot:header>
        {{ __('Create Mahasiswa') }}
    </x-slot:header>
    <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
        @csrf
        {{-- NIM --}}
        <div>
            <x-input-label for="NIM" :value="__('NIM')" />
            <x-text-input id="NIM" class="block mt-1 w-full" type="text" name="NIM" :value="old('NIM')" required
                autofocus autocomplete="NIM" />
            <x-input-error :messages="$errors->get('NIM')" class="mt-2" />
        </div>
        {{-- Name --}}
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        {{-- Email Address --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>

<x-mahasiswa-layout>
    <x-slot:header>
        {{ __('Mahasiswa Dashboard') }}
    </x-slot:header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-2xl text-white p-6 ">
                    {{__('Selamat Datang, ')}}
                    <span class="font-bold underline">{{$user->name}}</span>
                </div>
            </div>
        </div>
    </div>
</x-mahasiswa-layout>
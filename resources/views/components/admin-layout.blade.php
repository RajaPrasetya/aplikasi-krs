<x-app-layout href="{{ route('admin.dashboard') }}">
    <x-slot name="sidebar">
        <li>
            <details open>
                <summary>Data Master</summary>
                <ul>
                    <li><a href="{{ route('admin.mahasiswa.index') }}">Mahasiswa</a></li>
                    <li><a>Mata Kuliah</a></li>
                </ul>
            </details>
        </li>
        <li><a>Item 3</a></li>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    {{ $slot }}


</x-app-layout>

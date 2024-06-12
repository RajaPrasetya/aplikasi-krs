<x-app-layout href="{{ route('mahasiswa.dashboard') }}">
    <x-slot name="sidebar">
        <li>
            <details open>
                <summary>Data Mahasiswa</summary>

                <ul>
                    <li><a href="{{ route('users.krs.index') }}">KRS</a></li>
                    <li><a href="#">KHS</a></li>
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
<div>
    <table class="table border-collapse border border-slate-600">
        <!-- head -->
        <thead>
            <x-table-head>
                {{ $head }}
            </x-table-head>
        </thead>
        <tbody>
            <!-- row -->
            {{ $slot }}
        </tbody>
        <tfoot>
            {{ $footer ?? '' }}
        </tfoot>
    </table>
</div>

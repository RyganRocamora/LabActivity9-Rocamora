@props(['title'])

<div class="bg-white rounded-lg shadow overflow-hidden my-6 border">
    <div class="bg-emerald-800 text-white px-5 py-3 font-semibold text-lg">
        {{ $title }}
    </div>
    <div class="p-5">
        {{ $slot }}
    </div>
</div>
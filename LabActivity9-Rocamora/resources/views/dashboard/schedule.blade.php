@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">{{ $title }}</h2>

    <x-panel title="All Master Schedules">
        <ul class="divide-y">
            @forelse ($schedules as $schedule)
                <li class="py-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-gray-800">{{ $schedule->patient_name }}</p>
                        <p class="text-sm text-gray-500">{{ $schedule->vaccine }} - {{ $schedule->dose }} ({{ $schedule->purok }})</p>
                    </div>
                    <span class="text-sm font-semibold text-emerald-700">{{ $schedule->scheduled_at->format('M d, Y') }}</span>
                </li>
            @empty
                <li class="py-3 text-gray-500">No schedules found.</li>
            @endforelse
        </ul>
    </x-panel>
@endsection
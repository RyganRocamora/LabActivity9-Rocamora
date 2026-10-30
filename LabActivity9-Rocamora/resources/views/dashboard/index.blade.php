@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">{{ $title }}</h2>

    @if ($alerts->count() > 0)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
            <p class="font-bold">Attention Needed!</p>
            <p>There are {{ $alerts->count() }} overdue vaccination schedules that require immediate follow-up.</p>
        </div>
    @elseif ($schedules->count() === 0)
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded">
            <p>No vaccination data available in the system.</p>
        </div>
    @else
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            <p class="font-semibold">All clear! All active schedules are up to date.</p>
        </div>
    @endif

    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-4 mb-6">
        @foreach ($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    <x-panel title="Vaccination Schedule Overview">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">#</th>
                    <th class="p-3">Patient Name</th>
                    <th class="p-3">Purok</th>
                    <th class="p-3">Vaccine</th>
                    <th class="p-3">Scheduled Date</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schedules as $schedule)
                    <tr class="border-b {{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="p-3 font-semibold text-gray-500">{{ $loop->iteration }}</td>
                        <td class="p-3 font-medium">{{ $schedule->patient_name }}</td>
                        <td class="p-3">{{ $schedule->purok }}</td>
                        <td class="p-3">{{ $schedule->vaccine }} ({{ $schedule->dose }})</td>
                        <td class="p-3">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full text-xs font-bold 
                                {{ $schedule->status === 'Done' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $schedule->status === 'Scheduled' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $schedule->status === 'Overdue' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $schedule->status }}
                            </span>
                            @unless ($schedule->status === 'Overdue')
                                <span class="text-xs text-gray-400 ml-1">(On Track)</span>
                            @endunless
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">No schedules yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-panel>
@endsection
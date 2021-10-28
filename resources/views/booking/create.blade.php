<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Table')." ". $table_id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Table No.</th>
                            <th class="px-4 py-3">Start Time</th>
                            <th class="px-4 py-3">End Time</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($bookings as $book)
                                <tr class="text-gray-700">
                                <td class="px-4 py-3 border">{{ $book->tableBooked->name }}</td>
                                <td class="px-4 py-3 font-semibold border text-ms">{{ $book->start_time }}</td>
                                <td class="px-4 py-3 font-semibold border text-ms">{{ $book->end_time }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-3 text-center">{{ __('No Table Booked') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('booking.store') }}" method="post">
                        @csrf
                        @include('booking._form', ['buttonText' => __('Book Table')])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

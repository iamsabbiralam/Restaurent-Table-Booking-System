<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Table') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Table</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                        </thead>
                        @forelse($tables as $table)
                        <tbody class="bg-white">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">{{ $table->id }}</td>
                            <td class="px-4 py-3 font-semibold border text-ms">{{ $table->name }}</td>
                            <td class="px-4 py-3 font-semibold border text-ms">
                            @php
                                $book = DB::table('bookings')->where('table_id', $table->id)->first();
                            @endphp
                            @if($book)
                                <button class="px-4 py-2 bg-green-600">
                                    Booked
                                </button>
                            @else
                                <button class="px-4 py-2 bg-green-600">
                                    <a href="{{ route('booking.create', [ 'id' => $table->id ]) }}">
                                        Booking Now
                                    </a>
                                </button>
                            @endif
                            </td>
                        </tr>
                        </tbody>
                        @empty
                        <tr>                                    
                            <td colspan="4" class="px-4 py-3 text-center">{{ __('No Table Found') }}</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    setTimeout(function(){
        location.reload();
    },15000);
</script>
</x-app-layout>

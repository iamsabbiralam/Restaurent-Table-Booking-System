<div class="mb-4">
    <label class="block" for="task">Start Time</label>
    <input class="focus" type="time" name="start_time" id="start_time" value="{{ old('start_time') }}">
    <p class="text-red-600">{{ $errors->first('start_time') }}</p>
</div>
<div class="mb-4">
    <label class="block" for="task">End Time</label>
    <input class="focus" type="time" name="end_time" id="end_time" value="{{ old('end_time') }}">
    <p class="text-red-600">{{ $errors->first('end_time') }}</p>
</div>
<input type="hidden" name="table_id" value="{{ $table_id }}">
<button class="px-4 py-2 bg-green-600" type="submit">{{ $buttonText }}</button>

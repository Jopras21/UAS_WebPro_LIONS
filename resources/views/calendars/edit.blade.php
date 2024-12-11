<h1>Edit Event</h1>

<form action="/calendars/{{$event->id}}" method="post">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required /><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" rows="4" required>{{ old('description', $event->description) }}</textarea><br>

    <label for="start">Start Date:</label>
    <input type="datetime-local" name="start" id="start"
        value="{{ old('start', \Carbon\Carbon::parse($event->start)->format('Y-m-d\TH:i')) }}" required /><br>

    <label for="end">End Date:</label>
    <input type="datetime-local" name="end" id="end"
        value="{{ old('end', \Carbon\Carbon::parse($event->end)->format('Y-m-d\TH:i')) }}" required /><br>

    <button type="submit">Update</button>

    <form action="/calendars/{{$event->id}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
    </form>
</form>
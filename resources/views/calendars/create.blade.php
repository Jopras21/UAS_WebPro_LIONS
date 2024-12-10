<h1>Add New Events</h1>

@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="/calendars" method="post">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required /><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" rows="4" required></textarea><br>

    <label for="start">Start Date:</label>
    <input type="datetime-local" name="start" id="start" required /><br>

    <label for="end">End Date:</label>
    <input type="datetime-local" name="end" id="end" required /><br>

    <button type="submit">Submit</button>
</form>

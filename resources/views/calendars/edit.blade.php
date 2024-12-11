<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e4e4e3; /* Light background */
            color: #1e1a1f; /* Dark text color */
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #3c5097; /* Title color */
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #1e1a1f; /* Label color */
            font-size: 18px;
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
            font-size: 18px;
        }

        input[type="text"]:focus,
        input[type="datetime-local"]:focus,
        textarea:focus {
            border-color: #3c5097; /* Focus border color */
            outline: none;
            box-shadow: 0 0 10px rgba(60, 80, 151, 0.5);
        }

        button {
            background-color: #3c5097; /* Button background color */
            color: white; /* Button text color */
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            font-size: 18px;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #293f71; /* Button hover color */
        }

        .delete-button {
            background-color: #d9534f; /* Delete button color */
        }

        .delete-button:hover {
            background-color: #c9302c; /* Delete button hover color */
        }

        .error-list {
            color: red; /* Error message color */
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Edit Event</h1>

    @if($errors)
        <div class="error-list">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form action="/calendars/{{$event->id}}" method="post">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required />

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required>{{ old('description', $event->description) }}</textarea>

            <label for="start">Start Date:</label>
            <input type="datetime-local" name="start" id="start"
                value="{{ old('start', \Carbon\Carbon::parse($event->start)->format('Y-m-d\TH:i')) }}" required />

            <label for="end">End Date:</label>
            <input type="datetime-local" name="end" id="end"
                value="{{ old('end', \Carbon\Carbon::parse($event->end)->format('Y-m-d\TH:i')) }}" required />

            <button type="submit">Update</button>
        </form>

        <form action="/calendars/{{$event->id}}" method="post" style="margin-top: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
        </form>
    </div>
</body>

</html>

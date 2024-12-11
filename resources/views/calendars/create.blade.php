<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e4e4e3;
            color: #1e1a1f;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #293f71;
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #293f71;
            font-size: 18px;
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 18px;
        }

        input[type="text"]:focus,
        input[type="datetime-local"]:focus,
        textarea:focus {
            border-color: #293f71;
            outline: none;
            box-shadow: 0 0 10px rgba(41, 63, 113, 0.5);
        }

        button {
            background-color: #293f71;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 15px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
            font-size: 18px;
            width: 100%;
            margin-top: 20px;
        }

        button:hover {
            background-color: #1e1a1f;
            transform: translateY(-2px);
        }

        .error-list {
            color: red;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Add New Events</h1>

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
        <form action="/calendars" method="post">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required />

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required></textarea>

            <label for="start">Start Date:</label>
            <input type="datetime-local" name="start" id="start" required />

            <label for="end">End Date:</label>
            <input type="datetime-local" name="end" id="end" required />

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h2>Add Task</h2>
            <a href="{{ route('to-do.home') }} "> Back </a>
        </div>
        <form action="{{ route('store') }}" method="post">
            @csrf
            @method('POST')

            <div class="card">
                <table>
                    <tr>
                        <th>Task Name</th>
                        <td><input type="text" name="name" id="name" value="{{ old('name') }}" /></td>
                        @error('name')
                            <td>
                                <span class="error">{{ $message }}</span>
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <th>Task Description</th>
                        <td><textarea name="description" id="description" >{{ old('description') }}</textarea></td>
                        @error('description')
                            <td>
                                <span class="error">{{ $message }}</span>
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <td><input type="submit" value="Add task"></td>
                    </tr>
                </table>
            </div>
        </form>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
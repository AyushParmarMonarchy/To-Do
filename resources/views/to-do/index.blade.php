<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.status').dblclick(function(){
                // alert('hello');
                let id = $(this).data('id');
                window.location.href = '/to-do/'+id+'/status';
            });
            $('.home').click(function(){
                window.location.href = '/to-do/home';
            })
        });
    </script>

    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  integrity="sha512-pE1VT5EwIaNx9A0JYgTyWYdaEZ0rZd5t0eHoSPb9Jy1iflqqPBok7PehcGeMVMoLSwUMWYLsyPtnYfOAI5EU3g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

</head>

<body>
    <div class="container">     
        <div class="heading">
            <h1 class="home">To - Do List</h1>
            <div class="filter">
                <a href="{{ route('pending') }}" class="pending">Pending</a> /
                <a href="{{ route('complete') }}" class="complete">Complete</a>
            </div>
            <a href="{{ route('create') }}"> Add Task</a>
        </div>
        @foreach($task as $tasks)
            <div class="card">
                <div class="card-header">
                    <h3>{{ $tasks->name }}</h3>
                    <div class="card-actions">
                        <a href="{{ route('edit',$tasks->id) }}" class="edit">Edit</a>
                        <form action="{{ route('destroy',$tasks->id) }}" method="post">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Are you sure want to Delete ??')">Delete</button>                            
                        </form>
                    </div>
                </div>
                <p> {{ $tasks->description }}</p>
                <p class="status" data-id="{{ $tasks->id }}" >
                   
                    <span style="background-color: {{ $tasks->status == 0 ? '#e17055' : '#00b894' }}">{{ $tasks->status == 0 ? 'Pending' : 'Complete' }}</span>
                   
                </p>

                <h5> Created : {{ $tasks->created_at ->format('d - m - Y') }} <strong>{{ $tasks->created_at ->format('h:i A') }} </strong></h5>
                <h5> Updated :{{ $tasks->updated_at ->format('d - m - Y ') }} <strong>{{ $tasks->updated_at ->format('h:i A') }} </strong></h5>

                
            </div>
        @endforeach
        
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
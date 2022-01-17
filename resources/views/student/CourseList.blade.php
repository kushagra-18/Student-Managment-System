
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
</head>
<body>
<div class="card mb-3">
<!-- <img src="https://cdn.pixabay.com/photo/2015/05/19/14/55/educational-773651_960_720.jpg" class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">List of all courses</h5>
    <p class="card-text">All information about courses</p>
    <table class="table">
  <thead class="thread-lite">
    <tr>
      <th scope="col">Course ID</th>
      <th scope="col">Course Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
                <tr>
                    <td>{{ $course->Cid }}</td>
                    <td>{{ $course->CourseName }}</td>
                    
                    <td>

                        <a href="{{ url('/editC/'.$course->Cid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/deleteC/'.$course->Cid) }}" class="btn btn-sm btn-warning">Delete</a>
                    </td>


                </tr>
            @endforeach
  </tbody>
</table>
{{$courses->links()}}
  </div>
</div>
</body>
</html>
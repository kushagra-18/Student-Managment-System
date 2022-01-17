@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>Document</title>
</head>
<body>


<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">List of all students</h5>
    <p class="card-text">All information about students</p>
    <table class="table">
  <thead class="thread-lite">
    <tr>
      <th scope="col">Roll Number</th>
      <th scope="col">Name </th>
      <th scope="col">Email Address</th>
      <th scope="col">Number</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Class</th>
      <th scope="col">Address</th>
      <th scope="col">Course</th>
      <th scope="col">Mentor Assigned</th>

    </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
                <tr>
                    <td>{{ $student->Sid }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->number }}</td>
                    <td>{{ $student->Birth }}</td>
                    <td>{{ $student->Class }}</td>
                    <td>{{ $student->Address }}</td>
                    <td>{{ $student->Course }}</td>
                    <td>{{ $student->Mentor }}</td>
                    <td>

                        <!-- <a href="{{ url('/edit/'.$student->Sid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/deleteS/'.$student->Sid) }}" class="btn btn-sm btn-warning">Delete</a> -->
                        



                    </td>


                </tr>
            @endforeach
  </tbody>
</table>

  </div>
</div>
</body>
</html>
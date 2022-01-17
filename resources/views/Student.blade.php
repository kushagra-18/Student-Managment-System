
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style3.css" rel="stylesheet">
    

</head>
<stlye>
    
@if($layout=='index')
<div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-8">
                @include("StudentList")
                </section>
            </div>
        </div>
    </div>
@elseif($layout=='create')
    <div id="first">

    <h5 class="card-title">Enter Student's Information</h5>
    <form action="{{ url('/store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div>
            <label>Roll Number</label>
            <input id="fname" name="Sid" type="text" class="form-control"  placeholder="Enter unique Roll Number">
        </div>
        <div>
            <label>Name</label>
            <input id="fname" name="name" type="text" class="form-control"  placeholder="Enter name">
        </div>
        <div>
            <label>Email</label>
            <input id="fname" name="email" type="email" class="form-control"  placeholder="Enter email">
        </div>
        <div>
            <label>Phone Number</label>
            <input id="fname" name="number" type="text" class="form-control"  placeholder="Enter number">
        </div>
        <div>
            <label for="birth">Date of Birth</label>
            <input type="date" id="fname" name="birth">
            </div>
        <div>
            <label>Class</label>
            <input id="fname" name="class" type="text" class="form-control"  placeholder="Enter class">
        </div>
        <div>
            <label>Address</label>
            <input id="fname" name="address" type="text" class="form-control"  placeholder="Enter Address">
        </div>
        
        <div>
            <label>Mentor</label>
            <input id="fname" name="mentor" type="text" class="form-control"  placeholder="Enter mentor Assigned to student">
        </div>
            <Br><br>
            <input id="btnfamily" type="submit" class="btnfamily" value="Submit">
            <input id="btnfamily2" type="reset" class="btnfamily2" value="Reset">

        </form>
    </div>


@endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
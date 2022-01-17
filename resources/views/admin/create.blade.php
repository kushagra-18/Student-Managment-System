<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style3.css" rel="stylesheet">

</head>
<style>
input#fname{
            background-repeat:no-repeat;
            background-position:6px;
            border:1px solid #DADADA;
            margin-top: 3px;
            margin-bottom: 20px;   
            padding-left:10px;
            width:310px;
            height:30px;
            font-size:14px;
            box-shadow:0 0 10px;
            -webkit-box-shadow:0 0 10px;
            /* For I.E */
            -moz-box-shadow:0 0 10px;
            /* For Mozilla Web Browser */
            border-radius:5px;
            -webkit-border-radius:5px;
            /* For I.E */
            -moz-border-radius:5px
            /* For Mozilla Web Browser */
            }
</style>
<body>
  <div id="first">
    <h5 class="card-title">Enter Admins's Information</h5>
    <form method="post" action="{{url('/storeA')}}">

            <label>Admin ID</label>
            <input id="fname" name="adminId" type="text" class="form-control"  placeholder="Enter unique Admin ID">

            <label>Name</label>
            <input id="fname" name="Name" type="text" class="form-control"  placeholder="Enter name">

            <label>Email</label>
            <input id="fname" name="Email" type="text" class="form-control"  placeholder="Enter email">

            <label>Phone Number</label>
            <input id="fname" name="number" type="text" class="form-control"  placeholder="Enter number">

            <label>Address</label>
            <input id="fname" name="Address" type="text" class="form-control"  placeholder="Enter Address">

        <input class="btnfamily" type="submit" class="btn btn-info" value="Submit">
        <input class="btnfamily2" type="reset" class="btn btn-warning" value="Reset">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</div>
</body>
</html>
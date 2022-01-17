<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style3.css')}}">
    <div class="first2">
</head>
<style>
    .btnfamily{
    color: white;
    font-size: x-large;
    font-family: -webkit-pictograph;
    font-weight: bold;
    background-color: black;
    align-items: center;
    margin-left: 19%;
    width: 30%;
}
.btnfamily2{
    color: white;
    font-size: x-large;
    font-family: -webkit-pictograph;
    font-weight: bold;
    background-color: black;
    width: 30%;
    
}
</style>
<h5 class="card-title">Update informations of student</h5>
<form action="{{ url('/updateS/'.$student->Sid) }}" method="post">
<input name="_method" type="hidden" value="POST">

        <label>Email</label>
        <input id="fname" type="text" placeholder="Enter the name" value={{$student->email}} readonly>

        <label>Name</label>
        <input id="fname" name="name" type="text" placeholder="Enter the name" value={{$student->name}} >
    
        <label>number</label>
        <input id="fname" name="number" type="text"  placeholder="Enter the number" value={{$student->number}} >

        <label>Date of Birth</label>
        <input id="fname" name="birth" type="text"  placeholder="Enter date of birth" value={{$student->birth}} >

        <label>class</label>
        <input id="fname" name="class" type="text" placeholder="Enter class" value={{$student->class}} >

        <label>Address</label>
        <input id="fname" name="address" type="text" placeholder="Enter address" value={{$student->address}}>

        <!-- <label>course</label>
        <input id="fname" name="course" type="text"  placeholder="Enter course" value={{$student->course}} > -->

        <label>Mentor</label>
        <input id="fname" name="mentor" type="text" placeholder="Enter mentor" value={{$student->mentor}} >

    <input class="btnfamily" type="submit" class="btn btn-info" value="Update">
    <input class="btnfamily2" type="reset" class="btn btn-warning" value="Reset">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

</form>
</div>
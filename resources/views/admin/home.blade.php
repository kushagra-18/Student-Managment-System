@extends('layouts.app')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Management System</title>
  </head>
<style>
  .image, html{
      /* background-image: url("{{ asset('uploads/back.png') }}") ; */
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
     }
     .navbar-collapse.collapse {
    
    height: auto!important;
    padding-bottom: 0;
    overflow: visible!important;
  h1{
    font-family: ui-monospace;
  }
  .Section2{
    /* background-color: red; */
    font-family:  ui-monospace;
  }
  .navigation{
    /* background-color: #054f76; */
    
    font-family: fangsong;
  }
  </style>
  <body>
    <div class="image">
    <div class="Section2">
    <!-- <h1>Welcome admin</h1>     -->
    <h1>Student Management System</h1>
    
    </div>
    <br><br>
    <div class="navigation">
    @include("navbar")
    </div>
    </div>
</body>
</html>



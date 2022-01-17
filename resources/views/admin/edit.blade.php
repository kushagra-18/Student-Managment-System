@extends('layouts.app')
@section('content')
<form action="{{ url('/updateA') }}" method="post">  
<input name="_method" type="hidden" value="PATCH">
          <div class="form-group">      
              <label for="first_name">Name:</label><br/><br/>  
              <input type="text" class="form-control" name="Name" value={{$admin->Name}}><br/><br/>  
          </div>  
          <div class="form-group">      
              <label for="first_name">Email</label><br/><br/>  
              <input type="text" class="form-control" name="Email" value={{$admin->Email}}><br/><br/>  
          </div>  
          <div class="form-group">      
              <label for="first_name">contact number</label><br/><br/>  
              <input type="number" class="form-control" name="number" value={{$admin->number}}><br/><br/>  
          </div>  
          <div class="form-group">      
              <label for="first_name">Address</label><br/><br/>  
              <input type="text" class="form-control" name="Address" value={{$admin->Address}}><br/><br/>  
          </div>  
         
<br/>  
 
<button type="submit" class="btn-btn" >Update</button>  
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>  
 
 
@endsection
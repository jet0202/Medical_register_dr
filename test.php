<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> 
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Autocomplete Textbox using Bootstrap Typeahead with Ajax PHP</h2>
   <br /><br />
   <label>Search Country</label>
   <input type="text" name="country" id="country" class="form-control input-lg" autocomplete="off" placeholder="Type Country Name" />
  </div>
 </body>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
</html>

<script>
$(document).ready(function(){
 
 $('#country').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetchdr.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>
<script src="autologout.js"></script>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Swapi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

	
</head>
<body>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Height</th>
                <th>hair_color</th>
                <th>skin_color</th>
                <th>gender</th>
        
            </tr>
        </thead>
      
    </table>
</body>
</html>

<script>
  
  $(document).ready(function() {
    $('#example').DataTable( {
    ajax: {
        url: 'https://swapi.co/api/people/',
        dataSrc: 'results'
    },
     columns: [
        { data: 'name' },
        { data: 'height' },
        { data: 'hair_color' },
        { data: 'skin_color' },
        { data: 'gender' }
     
                     ]
              } );
            });
            
            </script> -->




<!DOCTYPE html>
<html>
<head>
     
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
 
  <title>Prueba datatable</title>
   
      <script>
        $(document).ready(function(){
          $.getJSON( "http://jsonplaceholder.typicode.com/posts", function( data ) {
              $('#data-table').DataTable({
                 "data" : data,
                 columns : [
                  {"data" : "userId"},
                  {"data" : "id"},
                  {"data" : "title"},
                  {"data" : "body"}
                 ]
            });
            });
             
             
             
 
        });
 
    </script>
</head>
<body>
 
 <table id="data-table" class="table table-bordered" width="100%">
  <thead>
    <tr>
    <th>userId</th>
    <th>id</th>
    <th>title</th>
    <th>body</th>
    </tr>
  </thead>
 
 
 </table>
  
</body>
 
</html>

<br><br>

<!DOCTYPE html>
<html>
<head>
     
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
 
  <title>Prueba datatable</title>
   
      <script>
        $(document).ready(function(){
          $.getJSON( "http://127.0.0.1:5758", function( data ) {
              $('#data-table').DataTable({
                 "data" : data,
                 columns : [
                  {"data" : "KODE"},
                  {"data" : "NAMA"},
                  {"data" : "KETERANGAN"},
                  {"data" : "HBELI"},
                  {"data" : "HJ1"},
                  {"data" : "HJ2"},
                  {"data" : "HJ3"},
                  {"data" : "HJ4"},
                  {"data" : "QTY"},
                  {"data" : "NAMARAK"},
                  {"data" : "NAMAKATEGORI"}
                 ]
            });
            });
             
             
             
 
        });
 
    </script>
</head>
<body>
 
 <table id="data-table" class="table table-bordered" width="100%">
  <thead>
    <tr>
    <th>KODE</th>
    <th>NAMA</th>
    <th>KETERANGAN</th>
    <th>HBELI</th>
    <th>HJ1</th>
    <th>HJ2</th>
    <th>HJ3</th>
    <th>HJ4</th>
    <th>QTY</th>
    <th>NAMARAK</th>
    <th>NAMAKATEGORY</th>
    </tr>
  </thead>
 
 
 </table>
  
</body>
 
</html>
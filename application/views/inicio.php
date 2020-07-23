

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
  
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Welcome to Sr Pago!</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Welcome to Sr Pago!</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#section2">Age</a></li>
        <li><a href="#section3">Gender</a></li>
        <li><a href="#section3">Geo</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Sr Pago</h4>
        <p>Aqui encontraras la lista de precios de la gasolina en las diferentes localidades.</p>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well bg-primary text-white">
            <h4>Provincia</h4>
            <p><select class="form-control" id="provincia">
            <option selected>Seleccione:</option>
			  <?php
				foreach ($provincia as $p) {
				?>	
			  		<option value="<?= $p->FC_PROVINCIA;?>"><?= $p->FC_PROVINCIA;?></option>
				<?php
				}
				
				?>
			  
			</select></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Poblacion</h4>
            <p><select class="form-control" id="poblacion">
            <option selected>Seleccione:</option>
			  <?php
				foreach ($poblacion as $po) {
				?>	
			  		<option value="<?= $po->FC_POBLACION;?>"><?= $po->FC_POBLACION;?></option>
				<?php
				}
				
				?>
			  
			</select></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Ordenamiento</h4>
            <p><button type="button" class="btn btn-default" id="search">Buscar</button></p> 
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-8">
          <table class="table">
            	
				
				<tr>
				<th>Localidad</th>
				<th>Provincia</th>
				<th>Codigo Postal</th>
				<th>Precio Gasolina 95 E5</th>
				</tr>
					
          
            <?php
            	//print_r($datos);
				foreach ($datos as $dato => $d) {
			?>	
				
				<tr>
				<td><?=$datos[$dato]["Localidad"];?></td>
				<td><?=$datos[$dato]["Provincia"];?></td>
				<td><?=$datos[$dato]["C.P."];?></td>
				<td><?=$datos[$dato]["Precio Gasolina 95 E5"];?></td>
				</tr>
					
			  		
			  		
				<?php
				}
				//echo base_url();
				//echo site_url();
				?>
 
          </table>
        </div>
        
        <div class="col-sm-4">
          <div class="well">
            <p>&nbsp;</p> 
            <p>&nbsp;</p> 
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p> 
          </div>
        </div>
      </div>
      <div class="row">
        
        
      </div>
    </div>
  </div>
</div>  


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
        $("#search").click(function(){
        	var poblacion=$('#poblacion').val();
        	console.log(poblacion);
            $.ajax({
               
                url:"inicio/searchGas",
                type:'POST',
                data:{poblacion:poblacion},
                
                success:function(data){
                    if(data){
                        alert(data);
                    }
                    else{
                        alert("error");
                    }
                }
            });
        });
    });
</script>

</html>

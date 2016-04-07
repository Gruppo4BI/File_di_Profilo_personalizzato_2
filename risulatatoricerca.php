<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd"> 
	<html> 
	  <head> 
	    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
	    <title>Borsa delle idee</title>
	      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	    <style  type="text/css" media="screen"> 
	#lui  
{
    text-decoration: none; 
    
    letter-spacing:3px;
    text-align: center;
    font-size: 20px;
    color: black;
}
 th {
 	color:black;
 }
 #new {
 	color:black;
 }

#lui:hover
{
    color: #0080FF;
}	
	  
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}
    
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
	  <!-- sono classi predefinite, inverse vuol dire sfondo scuro
	quella di default  chiara -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
  <!-- questo  l header contiene gli elementi che devono essere visibili anche quando la barra  minimizzata per i display di piccole dimensioni -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
           <span class="icon-bar"></span>
        <span class="icon-bar"></span>   
        <!-- Ciascuno di questi disegna una lineetta sul pulsante quando si minimizza la pagina -->                     
      </button>
      <a class="navbar-brand">Borsa delle Idee</a>
    </div>
 <!--  elementi della barra -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Menu.php">Il mio profilo</a></li>
        <li><a href="#">About</a></li>
         <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Idee <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Crea</a></li>
          <li><a href="#">Cerca</a></li>
        </ul>
        <ul>
        <li> 
	    </li>
        </ul>
      </li>
        <li><a href="#">Contatti</a></li>
      </ul>
      <ul>
      <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search" method="post" action="risulatatoricerca.php?go"  id="searchform">
        <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="Cerca">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit" value="Search"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
	    
	    <?php 
	      include_once 'configurazioneDB.php';
		  if(isset($_POST['submit'])){ 
		  if(isset($_GET['go'])){ 
	  // per evitare le sql injection
		  if(preg_match("/[A-Z  | a-z]+/", $_POST['name'])){ 
	 	 $name=$_POST['name']; 
	 	 $sql="SELECT  id, nome_azienda, email FROM azienda WHERE nome_azienda LIKE '" . $name .  "%'";
	 	 //-run  the query against the mysql query function
	 	 $result=mysqli_query($conn,$sql);
	 	 if($result){
	 	 echo'
	 	 	<div class="container">
  			<div id="new" class="alert alert-warning">
	 	 	La ricerca ha prodotto i seguenti risultati
	 	 	</div>
  			 <table class="table" >
   			 	<thead>
   					<tr>
        				<th>Immagine proflo</th>
        				<th>Nome azienda</th>
        				<th>Email</th>
      				</tr>
   				 </thead>
   				<tbody>
	 	 ';
	 	 		  while($row=mysqli_fetch_assoc($result))
					{
						$Name=$row['nome_azienda'];
						$ID=$row['id'];
						$Mail=$row['email'];
						echo'
							<tr class="success">
							<td><img src="immagini\nala.jpg" width="140" height="60"></td>
							<td ><a id="lui" href="Menu2.php?id='.$ID.'">'.$Name.'</a></td>
							<td><a id="lui" href="Menu2.php?id='.$ID.'">'.$Mail.'</a></td>
							</tr>
						';
					}
				echo '
	 	   	 	</tbody>
  			</table>
			</div>
	 	 		 ';
	 	 }
		 }
	  
	  else{ 
	  	header("Location: Menu.php");
	  } 
	  } 
	}


	?> 
	  </body> 
</html> 


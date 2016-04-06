<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd"> 
	<html> 
	  <head> 
	    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
	    <title>Search  Contacts</title> 
	    <style  type="text/css" media="screen"> 
	ul  li{ 
	  list-style-type:none;
	  
	} 
	#lui  
{
    text-decoration: none; 
    font-weight: bold;
    color: blue;
}

#lui:hover
{
    color: #0080FF;
}	
	</style> 
	  </head> 
	  <p><body> 
	    <h3>Search  Contacts Details</h3> 
	    <p>You  may search either by first or last name</p> 
	    <form  method="post" action="Ricercaprova.php?go"  id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
	    
	    <?php 
	      include_once 'configurazioneDB.php';
		  if(isset($_POST['submit'])){ 
		  if(isset($_GET['go'])){ 
	  // per evitare le sql injection
		  if(preg_match("/[A-Z  | a-z]+/", $_POST['name'])){ 
	 	 $name=$_POST['name']; 
	 	 $sql="SELECT  id, nome_azienda FROM azienda WHERE nome_azienda LIKE '" . $name .  "%'";
	 	 //-run  the query against the mysql query function
	 	 $result=mysqli_query($conn,$sql);
	 	 while($row=mysqli_fetch_assoc($result)){
	 	 		          $Name  =$row['nome_azienda'];

	 	 		          $ID=$row['id'];
	 	 		  //-display the result of the array
	 	 		  echo "<ul>\n";
	 	 		  echo "<li>" . "<a id='lui' href='Ricercaprova.php?id=$ID'>"   .$Name . "</a></li>\n";
	 	 		  echo "</ul>";
	 	 		  }
		  }
	  
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	}
	if(isset($_GET['id']))
	{	$ID=$_GET['id'];
		$sql= "SELECT id,nome_azienda FROM azienda WHERE id='".$ID."'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$Name=$row['nome_azienda'];
			$ID=$row['id'];
			echo "<ul>\n";
			echo "<li>" .$Name . "</li>\n";
			echo "</ul>";
		}
	}
	?> 
	  </body> 
</html> 
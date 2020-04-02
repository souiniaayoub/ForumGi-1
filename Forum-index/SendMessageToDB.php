<?php

if(isset($_POST["SendMessage"]))
{
$val=0;


	if(empty($_POST["name"]))
	echo "Saisissez votre nom<br>";
	else{
		$name=$_POST["name"];
		$name=filter_var($name,FILTER_SANITIZE_STRING);
		if(ctype_alpha($name)){
			
			$val++;
		}
		else echo "Le nom n'est pas valide<br>"; 
			
			
		}

	
	if(empty($_POST["email"]))
	echo "Saisissez votre email<br>";
	else{
		$email=$_POST["email"];
		$email=filter_var($email,FILTER_SANITIZE_EMAIL);
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			
			$val++;
		
		}
		else
			echo "L'email' n'est pas valide <br>"; 
		}


if(empty($_POST["message"]))
	echo "Saisissez votre message<br>";
	else
		{
		$message=$_POST["message"];	
	     $val++;
		
		}
}

		echo" <br> <br> <br> ";
		echo "<table border = 1px solid blue; >
		<tr>
			<th>Nom</th> 

			<th>Email </th>

			<th>message </th>
			
		</tr>
		<tr >
			<td>$name</td>
			<td>$email</td>
			<td>$message</td>
	
		</table>";
		
	


	
		if($val==3)// the three parametres are valid
		
		{
	/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'school' with no password) */

$link = mysqli_connect("localhost", "root", "", "forum");  // U need to change school to ur db name
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
 $statu = 0;
 
// Attempt insert query execution
$sql = "INSERT INTO messages (email, fullName, message, Statu) VALUES ('$email', '$name', '$message', '$statu')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
		
		
	    }

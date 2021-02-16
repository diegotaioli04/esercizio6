
<?php
if((!isset($_POST['patenteA'])) && (!isset($_POST['patenteB'])) ){
	echo"non hai selezionato una patente";
}
else{
	session_start();
	$cognome = $_POST['cognome'];
	$nome = $_POST['nome'];
	$genere = $_POST['sesso'];
	$nazionalita = $_POST['nazionalita'];
	$categoria = "";
	if(isset($_POST['patenteA'])&&($_POST['patenteA'] == "YES")){
		$categoria = "A";
	}
	if(isset($_POST['patenteB'])&&($_POST['patenteB'] == "YES")){
		$categoria = "B";
	}
	$mail = $_POST['mail'];
	$pass = $_POST['password'];
	$_SESSION['cognome'] = $cognome;
	$_SESSION['nome'] = $nome;
	$_SESSION['sesso'] = $genere;
	$_SESSION['nazionalita'] = $nazionalita;
	$_SESSION['patente'] = $categoria;
	$_SESSION['mail'] = $mail;
	$_SESSION['password'] = $pass;
	
	echo" 
	<html>
	<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='style.css'/>
	</head>
	
	<body>
	<center>
	<form class='f1' name='form' method='get' action='registrato.php'>
	<legend class='titolo'> Modulo di iscrizione </legend>
	<table class='tab'>
	<tr> <td class='sinistra'> cognome: </td> 
	<td class='destra'> $cognome </td>
	</tr>
	
	<tr> <td class='sinistra'> nome: </td> 
	<td class='destra'> $nome </td>
	</tr>
	
	<tr> <td class='sinistra'> Sesso: </td> 
	<td class='destra'> $genere </td>
	</tr>
	
	<tr> <td class='sinistra'> Nazione: </td> 
	<td class='destra'> $nazionalita  </td>
	</tr>
	
	<tr> <td class='sinistra'> Patente: </td> 
	<td class='destra'> $categoria </td>
	</tr>
	
	<tr> <td class='sinistra' > E-mail: </td> 
	<td class='destra'> $mail </td>
	</tr>
	
	</table>
	<button class='b1' type='button' onClick='history.go(-1);return true;'> Correggi </button>
	<button class='b2' type='submit'> Registra </button>
	</form>
	</center>
	</body>
	</html>";
}

?>

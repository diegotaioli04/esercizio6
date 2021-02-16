
<?php
session_start();
$cognome = $_SESSION['cognome'];
$nome = $_SESSION['nome'];
$genere = $_SESSION['sesso'];
$nazionalita = $_SESSION['nazionalita'];
$categoria = $_SESSION['patente'];
$mail = $_SESSION['mail'];
$pass = $_SESSION['password'];

$host = "localhost";
$user = "root";
$db = "dati_utenti";
$connessione = mysqli_connect($host, $user, "", $db)
or die("Connessione non riuscita ". mysqli_connect_error());
$indexA = 0;
$indexB = 0;
$dup = controllomail($connessione, $mail);
if($dup == false){
	$idA = inserimento($connessione, "SELECT MAX(codice) FROM persona");
	$indexA = generaID($idA);
	inserimento($connessione, "INSERT INTO persona(codice, cognome, nome, genere, nazionalità, patente) VALUES($indexA, '$cognome', '$nome', '$genere', '$nazionalita', '$categoria')");
	inserimento($connessione, "INSERT INTO credenziali(username, password, idpersona) VALUES('$mail', '$pass', $indexA)");
	echo"
	<html>
	<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='style.css'/>
	</head>
	<body>
	<center>
	<form class='f2' action='LogIn.html'>
	<fieldset class='righe'>
	<label class='lab'>  Esito Registrazione </label>
	</fieldset>
	<fieldset class='righe'>
	<label class='lab'>  Dati Correttamente registrati </label>
	</fieldset>
	<fieldset class='righe'>
	<button class='chiudi' type='submit' > Chiudi </button>
	</fieldset>
	</form>
	</center>
	</body>
	</html>";
}
mysqli_close ($connessione)
or die("Chiusura connessione fallita " . mysqli_error ($connessione));

function generaID($id){
	$x = 0;
	while($row = mysqli_fetch_array($id, MYSQLI_NUM)) {
		$x = $row[0];
	}
	$x++;
	return $x;
}

function controllomail($con, $mai){
	$cont = 0;
	$duplicato = false;
	$user = inserimento($con, "SELECT username FROM credenziali");
	while($row = mysqli_fetch_array($user, MYSQLI_NUM)) {
		echo"$row[$cont]";
		if($mai == $row[$cont]){ 
		$duplicato = true;
		echo "<center><h2> ATTENZIONE la mail digitata è già in uso <br/>
		per favore cambiare username <br/>
		<a href='formdati.html'> Registrati </a> </h2> </center>";
		}
		$cont++;
	}
	return $duplicato;
}

function inserimento($con, $query){
	$result = mysqli_query ($con, $query)
	or die ("Query fallita " . mysqli_error($con) . "  ". mysqli_errno($con));
	return $result;
}
session_destroy();
?>
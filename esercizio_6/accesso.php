<?php


$negato = true;
$m = $_GET['mail'];
$p = $_GET['password'];

$num_righe = 0;
$host = "localhost";
$user = "root";
$db = "dati_utenti";
$connessione = mysqli_connect($host, $user, "", $db)
or die("Connessione non riuscita ". mysqli_connect_error());

$query = "SELECT persona.cognome, persona.nome, persona.genere, persona.nazionalità, persona.patente
FROM persona INNER JOIN credenziali ON persona.codice = credenziali.idpersona
WHERE credenziali.username = '$m' AND credenziali.password = '$p'";
$result = ricerca($connessione, $query);
$num_righe = mysqli_num_rows($result);
	
mysqli_close ($connessione)
or die("Chiusura connessione fallita " . mysqli_error ($connessione));
	
if($num_righe == 0){
	echo "<center>
	<h1> Accesso negato email o password non corretti </h1>
	</center>";
}
else{
	echo " <center> <h1> Accesso riuscito </h1> </center>";
	stampa($result);
}

function stampa($buffer){
	while($row = mysqli_fetch_array($buffer, MYSQLI_NUM)) {
		echo"<center> <h2> <table>
		<tr> <td> cognome: </td>
		<td> $row[0] </td> </tr>
		<tr> <td> nome: </td>
		<td> $row[1] </td> </tr>
		<tr> <td> genere: </td>
		<td> $row[2] </td> </tr>
		<tr> <td> nazionalità: </td>
		<td> $row[3] </td> </tr>
		<tr> <td> patente: </td>
		<td> $row[4] </td> </tr>
		</table> </h2></center>";
	}
}

function ricerca($con, $query){
	$result = mysqli_query ($con, $query)
	or die ("Query fallita " . mysqli_error($con) . "  ". mysqli_errno($con));
	return $result;
}
		 
?>
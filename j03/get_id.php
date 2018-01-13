<?PHP

$dsn = 'mysql:dbname=wordpress_e;host=localhost';
$user = 'wordpress_4';
$password = '5x9tPGc3!N';



if (!empty($_GET))
{

	try {
	    $bdd = new PDO($dsn, $user, $password);
			}
	catch (PDOException $e) {
			echo 'Connexion échouée : ' . $e->getMessage();
		}


	$req = $bdd->prepare('INSERT INTO Joul_input(id, time, light, temp)
												VALUES(:id, :time, :light, :temp)')
	or exit(print_r($bdd->errorInfo()));
	$req->execute(array(
		'id' => $_GET['id'],
		'time' => $_GET['time'],
		'light' => $_GET['light'],
		'temp' => $_GET['temp'],
	));
}

?>

<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$config = parse_ini_file("config.ini");
		

	if($_SERVER['REQUEST_METHOD'] == 'GET') {

		try {
			$pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}


        $sql = "SELECT patient.nomPatient as nom,patient.prenomPatient as prenom, rdv.dateHeureRdv FROM rdv INNER JOIN patient ON rdv.idPatient = patient.idPatient WHERE rdv.idMedecin = '16e3cbd02663ea1d89c06efeca5bbdb1d683f490' AND rdv.dateHeureRdv like CONCAT('2023-04-12', '%')";

		$req = $pdo->prepare($sql);
		//$req->bindParam(":idMedecin", "16e3cbd02663ea1d89c06efeca5bbdb1d683f490", PDO::PARAM_STR);
		//$req->bindParam(":dateheure", "2023-04-28", PDO::PARAM_STR);
		$req->execute();
		
		$donnees = $req->fetchAll(\PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
		header("Access-Control-Allow-Origin: *"); // Autorise l'utilisation de cette ressource depuis l'extérieur (utile pour de l'AJAX)
		$donnee = json_encode($donnees);
		echo $donnee;
	}else{
		echo "merdouille !!!";
	}
?>
<?php
session_start();

// Test de connexion à la base
$config = parse_ini_file("config.ini");
try {
	$pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
} catch(Exception $e) {
	http_response_code(500);
	header('Content-Type: application/json');
	header("Access-Control-Allow-Origin: *");
	echo '{ "message":"Erreur de connexion à la base de données" }';
	exit;
}

// Chargement des fichiers MVC
require("control/controleur.php");
require("vue/vue.php");
require("model/rdv.php");
require("model/patient.php");
require("model/authentification.php");
require("model/medecin.php");

// Routes et méthodes HTTP associées
if(isset($_GET["action"])) {
	switch($_GET["action"]) {
		case "rdv":
			switch($_SERVER["REQUEST_METHOD"]) {
				case "GET":
					(new controleur)->getRdv();
					break;
				case "POST":
					(new controleur)->ajouterRdv();
					break;
				case "PUT":
					(new controleur)->modifierRdv();
					break;
				case "PATCH":
					(new controleur)->ajoutCompteRendu();
					break;
				case "DELETE":
					(new controleur)->annulerRdv();
					break;
				case "OPTIONS":
					(new vue)->UneOption();
					break;
				default:
					(new controleur)->erreur404();
					break;
			}
			break;

		case "patient":
			switch($_SERVER["REQUEST_METHOD"]) {
				case "GET":
					(new controleur)->getPatient();
					break;
				case "POST":
					(new controleur)->inscriptionPatient();
					break;
				default:
					(new controleur)->erreur404();
					break;
			}
			break;
		case "connexion":
			switch($_SERVER["REQUEST_METHOD"]) {
				case "POST":
					(new controleur)->connexion();
					break;
				default:
					(new controleur)->erreur404();
					break;
			}
			break;
		case "medecin":
			switch($_SERVER["REQUEST_METHOD"]) {
				case "GET":
					(new controleur)->getIdMedecin();
					break;
				case "POST":
					(new controleur)->connexionMedecin();
					break;
				default:
					(new controleur)->erreur404();
					break;
				}
			break;

		
		// Route par défaut : erreur 404
		default:
			(new controleur)->erreur404();
			break;
	}
}
else {
	// Pas d'action précisée = erreur 404
	(new controleur)->erreur404();
}
<?php

class vue {

	public function erreur404() {
		$renvoi = array("message" => "Erreur 404 : ressource introuvable pour l'URL ou la méthode demandée");
		header('Content-Type: application/json');
		header("Access-Control-Allow-Origin: *"); // Autorise l'utilisation de cette ressource depuis l'extérieur (utile pour de l'AJAX)
		$renvoi = json_encode($renvoi);
		echo $renvoi;
	}

	public function transformerJson($donnee) {
		header('Content-Type: application/json');
		header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");
		header("Access-Control-Allow-Origin: *"); // Autorise l'utilisation de cette ressource depuis l'extérieur (utile pour de l'AJAX)
		$donnee = json_encode($donnee);
		echo $donnee;
	}

	public function UneOption() {
		http_response_code(200);
		header('Content-Type: application/json');
		header("Access-Control-Allow-Origin: *"); // Autorise l'utilisation de cette ressource depuis l'extérieur (utile pour de l'AJAX)
		header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");
		echo "{}";
	}

}
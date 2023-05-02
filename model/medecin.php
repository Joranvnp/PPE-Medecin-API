<?php

class medecin {
    private $pdo;

	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getMedecin($lelogin){
		$sql = "SELECT * FROM medecin where loginMedecin = :loginM";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(":loginM", $lelogin, PDO::PARAM_STR);
		$req->execute();
		
		return $req->fetch(\PDO::FETCH_ASSOC);
		
	} 

	public function connexion($login, $mdp) {
		$sql = "SELECT mdpMedecin FROM medecin WHERE loginMedecin = :logi";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':logi', $login, PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne != false) {

			if(password_verify($mdp, $ligne["mdpMedecin"])) {

				return 'authentifier';
			}
			else {
				return null;
			}
		}
		else {
			return false;
		}
	}

	public function exists($loginMedecin) {
		$sql = "SELECT COUNT(*) AS nb FROM medecin WHERE loginMedecin = :loginMedecin";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':loginMedecin', $loginMedecin, PDO::PARAM_STR);
		$req->execute();
		
		$nb = $req->fetch(\PDO::FETCH_ASSOC)["nb"];
		if($nb == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	
	
}

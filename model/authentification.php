<?php

class authentification {
    private $pdo;

	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	public function connexion($mail, $mdp) {
		$sql = "SELECT idPatient,mdpPatient FROM patient WHERE loginPatient = :mail";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':mail', $mail, PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne != false) {

			if(password_verify($mdp, $ligne["mdpPatient"])) {

				$token = bin2hex(random_bytes(30));
				$ip = $_SERVER["REMOTE_ADDR"];
			 
                $sql = "INSERT INTO authentification (token, idPatient,ipAppareil) VALUES (:token,:idpatient,:ipap)";
				$req = $this->pdo->prepare($sql);

				$req->bindParam(':token', $token, PDO::PARAM_STR);
				$req->bindParam(':idpatient', $ligne["idPatient"], PDO::PARAM_STR);
				$req->bindParam(':ipap', $ip, PDO::PARAM_STR);
                $req->execute();
                
				return $token;
			}
			else {
				return null;
			}
		}
		else {
			return false;
		}
	}
	public function exists($mail) {
		$sql = "SELECT COUNT(*) AS nb FROM patient WHERE loginPatient = :mail";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':mail', $mail, PDO::PARAM_INT);
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

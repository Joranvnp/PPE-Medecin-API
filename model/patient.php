<?php

class patient {
	
	private $pdo;

	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getAll() {
		$sql = "SELECT * FROM patient";
		
		$req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function insertpatient($nom, $prenom, $rue, $cp, $ville, $tel, $login, $mdpHash){
		$sql ="INSERT INTO patient (nomPatient, prenomPatient, ruePatient, cpPatient, villePatient, telPatient, loginPatient, mdpPatient) VALUES (:leNom, :lePrenom, :laRue, :leCp, :laVille, :leTel, :leLogin, :leMdp)";
 
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':leNom', $nom, PDO::PARAM_STR);
        $req->bindParam(':lePrenom', $prenom, PDO::PARAM_STR);
        $req->bindParam(':laRue', $rue, PDO::PARAM_STR);
        $req->bindParam(':leCp', $cp, PDO::PARAM_STR);
        $req->bindParam(':laVille', $ville, PDO::PARAM_STR);
        $req->bindParam(':leTel', $tel, PDO::PARAM_STR);
        $req->bindParam(':leLogin', $login, PDO::PARAM_STR);
        $req->bindParam(':leMdp', $mdpHash, PDO::PARAM_STR);
   
        return $req->execute();
	}

	public function get($id) {
		$sql = "SELECT * FROM patient WHERE idPatient = :id";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();
		
		return $req->fetch(\PDO::FETCH_ASSOC);
	}

	public function exists($id) {
		$sql = "SELECT COUNT(*) AS nb FROM patient WHERE idPatient = :id";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();
		
		$nb = $req->fetch(\PDO::FETCH_ASSOC)["nb"];
		if($nb == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	public function exist($token) {
		$sql = "SELECT COUNT(*) AS nb FROM authentification WHERE token = :token";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':token', $token, PDO::PARAM_STR);
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
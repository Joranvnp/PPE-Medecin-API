<?php

class rdv {
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
		$sql = "SELECT * FROM rdv";
		
		$req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll(\PDO::FETCH_ASSOC);
	}
	

	public function getidMedecin($id,$date)
	{
		$sql = "SELECT  rdv.idRdv,patient.nomPatient as nom,patient.prenomPatient as prenom, rdv.dateHeureRdv FROM rdv INNER JOIN patient ON rdv.idPatient = patient.idPatient WHERE rdv.idMedecin = :idMedecin AND rdv.dateHeureRdv like CONCAT(:dateheure, '%')";

		$req = $this->pdo->prepare($sql);
		$req->bindParam(":idMedecin", $id, PDO::PARAM_STR);
		$req->bindParam(":dateheure", $date, PDO::PARAM_STR);
		$req->execute();
		
		return $req->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getRdvMedecinHeure($id,$date)
	{
		$sql = "SELECT dateHeureRdv FROM rdv WHERE rdv.idMedecin = :idMedecin AND rdv.dateHeureRdv like CONCAT(:dateheure, '%')";

		$req = $this->pdo->prepare($sql);
		$req->bindParam(":idMedecin", $id, PDO::PARAM_STR);
		$req->bindParam(":dateheure", $date, PDO::PARAM_STR);
		$req->execute();
		
		$results = $req->fetchAll(\PDO::FETCH_ASSOC);
		$elements = array(); 

		foreach ($results as $value) {
			$dateHeureRdv = $value['dateHeureRdv'];
			array_push($elements, explode(" ", $dateHeureRdv)[1]); 
		}

		return $elements; 
		
	}


    public function GetCreerRdv($dateheure,$token,$idMedecin){

		$ipAppareil = $_SERVER["REMOTE_ADDR"];

		$sql = "SELECT idPatient FROM authentification WHERE token = :token AND ipAppareil = :ipAppareil";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':token', $token, PDO::PARAM_STR);
		$req->bindParam(':ipAppareil', $ipAppareil, PDO::PARAM_STR);
		$req->execute();
		
		$ligne = $req->fetch();

		if($ligne != false) {
			$dateheure = date('Y-m-d H:i:s', strtotime($dateheure . ' +2 hours'));
		
			$sql = "INSERT INTO rdv (dateHeureRdv,idPatient,idMedecin) VALUES (:dateheure,:idpatient,:idMedecin)";
			$req = $this->pdo->prepare($sql);

			$req->bindParam(':dateheure', $dateheure, PDO::PARAM_STR);
			$req->bindParam(':idpatient', $ligne["idPatient"], PDO::PARAM_STR);
			$req->bindParam(':idMedecin', $idMedecin, PDO::PARAM_STR);
			return $req->execute();
		}
		else {
			return false;
		}
		
	}

	public function AjoutCompteRenddu($CompteRendu,$idRdv){

		$sql = "UPDATE rdv set compteRendu = :compteRendu where rdv.idRdv = :idRdv";
		$req = $this->pdo->prepare($sql);

		$req->bindParam(':compteRendu', $CompteRendu, PDO::PARAM_STR);
		$req->bindParam(':idRdv', $idRdv, PDO::PARAM_INT);
		
		return $req->execute();
	}
	
	public function GetSupRDV($lid){

		$sql = "DELETE FROM rdv WHERE idRdv = :id";
		$req = $this->pdo->prepare($sql);
	
		$req->bindParam(':id', $lid, PDO::PARAM_INT);
		return $req->execute();

	}

	public function GetModifierRDV($dateheure,$idRdv){

		$sql = "UPDATE rdv set dateHeureRdv = :heuredate where rdv.idRdv = :idRdv";

		$req = $this->pdo->prepare($sql);
		$req->bindParam(':heuredate', $dateheure, PDO::PARAM_STR);
		$req->bindParam(':idRdv', $idRdv, PDO::PARAM_INT);
		return $req->execute();
	}

	public function GetConsulterRDV($token)
	{
		$sql = "SELECT * FROM rdv WHERE idPatient =(SELECT idPatient FROM authentification WHERE token = :token) AND rdv.dateHeureRdv > CURRENT_DATE AND rdv.dateHeureRdv > ADDTIME(CURRENT_TIME, '02:00:00');";
		
		$req = $this->pdo->prepare($sql);
		$req->bindParam(':token', $token, PDO::PARAM_STR);
		$req->execute();

		return $results = $req->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function exists($id) {
		$sql = "SELECT COUNT(*) AS nb FROM rdv WHERE idRdv = :id";
		
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

    
	
}
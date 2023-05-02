<?php

class controleur {

    public function erreur404() {
        http_response_code(404);
        (new vue)->erreur404();
    }

    public function verifierAttributsJson($objetJson, $listeDesAttributs) {
        $verifier = true;
        foreach($listeDesAttributs as $unAttribut) {
            if(!isset($objetJson->$unAttribut)) {
                $verifier = false;
            }
        }
        return $verifier;
    }

    public function getPatient() {
        $donnees = null;

        if(isset($_GET["id"])) {
            if((new patient)->exists($_GET["id"])) {
                http_response_code(200);
                $donnees = (new patient)->get($_GET["id"]);
            }
            else {
				http_response_code(404);
				$donnees = array("message" => "Patient introuvable");
			}
		}
		else {
			http_response_code(200);
			$donnees = (new patient)->getAll();
		}
		
		(new vue)->transformerJson($donnees);
	}

	public function getIdMedecin(){
		$donnees = null;

		if(isset($_GET["loginMedecin"])) {
            if((new medecin)->exists($_GET["loginMedecin"])) {
                http_response_code(200);
                $donnees = (new medecin)->getMedecin($_GET["loginMedecin"]);
            }
            else {
				http_response_code(404);
				$donnees = array("message" => "Patient introuvable");
			}
		}
		
		
	}

	


    public function ajouterRdv() {
		$donnees = json_decode(file_get_contents("php://input"));
		$renvoi = null;
		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("dateheure", "token", "idMedecin");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {
				if((new patient)->exist($donnees->token)) {
					$resultat = (new rdv)->GetCreerRdv($donnees->dateheure, $donnees->token, $donnees->idMedecin);
					
					if($resultat != false) {
						http_response_code(200);
						$renvoi = array("message" => "Ajout effectué avec succès");
					}
					else {
						http_response_code(500);
						$renvoi = array("message" => "Une erreur interne est survenue");
					}
				}
				else {
					http_response_code(400);
					$renvoi = array("message" => "Le patient spécifié n'existe pas");
				}
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
		}

		(new vue)->transformerJson($renvoi);
	}

	public function inscriptionPatient() {
		$donnees = json_decode(file_get_contents("php://input"));
	    $renvoi = null;

		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("nom", "prenom", "rue", "cp", "ville", "tel", "login", "mdp");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {
					$mdpHash = password_hash($donnees->mdp, PASSWORD_BCRYPT);
					$resultat = (new patient)->insertpatient($donnees->nom, $donnees->prenom, $donnees->rue, $donnees->cp, $donnees->ville, $donnees->tel, $donnees->login, $mdpHash);
					if($resultat != false) {

						$res = null;
						$res = (new authentification)->connexion($donnees->login, $donnees->mdp);
						if($res != null) {
							http_response_code(201);
							$renvoi = array("message" => "Patient inscrit avec succès" , "token" => $res);
						}
						
						
					}
					else {
						http_response_code(500);
						$renvoi = array("message" => "Une erreur interne est survenue");
					}
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
		}

		(new vue)->transformerJson($renvoi);

	}


	public function connexion() {

		$donnees = json_decode(file_get_contents("php://input"));
		$renvoi = null;
		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("login", "mdp");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {

				$resultat = null;
				
				$resultat = (new authentification)->connexion($donnees->login, $donnees->mdp);

				if($resultat != null) {
					
					http_response_code(201);
					$renvoi = array("message" => "Vous êtes correctement connecté", "token" => $resultat);
				}
				else {
					http_response_code(401);
					$renvoi = array("message" => "Login/Mot de passe incorrect");
				}
					
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
			
		}
		(new vue)->transformerJson($renvoi);
	}

	public function ajoutCompteRendu(){
		$donnees = json_decode(file_get_contents("php://input"));

		$renvoi = null;
		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("compteRendu", "idRdv");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {
				if((new rdv)->exists($donnees->idRdv)) {
					$resultat = (new rdv)->AjoutCompteRenddu($donnees->compteRendu, $donnees->idRdv);
					
					if($resultat != false) {
						http_response_code(201);
						$renvoi = array("message" => "Modification effectuée avec succès");
					}
					else {
						http_response_code(500);
						$renvoi = array("message" => "Une erreur interne est survenue");
					}
				}
				else {
					http_response_code(400);
					$renvoi = array("message" => "Le rdv spécifié n'existe pas");
				}
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
		}
	}

    public function modifierRdv() {
		$donnees = json_decode(file_get_contents("php://input"));
		$renvoi = null;
		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("id", "date");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {
				if((new rdv)->exists($donnees->id)) {
					$resultat = (new rdv)->GetModifierRDV($donnees->date, $donnees->id);
					
					if($resultat != false) {
						http_response_code(201);
						$renvoi = array("message" => "Modification effectuée avec succès");
					}
					else {
						http_response_code(500);
						$renvoi = array("message" => "Une erreur interne est survenue");
					}
				}
				else {
					http_response_code(400);
					$renvoi = array("message" => "Le rdv spécifié n'existe pas");
				}
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
		}

		(new vue)->transformerJson($renvoi);
	}

    public function annulerRdv() {
		$donnees = json_decode(file_get_contents("php://input"));
		$renvoi = null;
		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("id");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {
				if((new rdv)->exists($donnees->id)) {
					$resultat = (new rdv)->GetSupRDV($donnees->id);
					
					if($resultat === true) {
						http_response_code(200);
						$renvoi = array("message" => "Suppression effectuée avec succès");
					}
					else {
						http_response_code(500);
						$renvoi = array("message" => "Une erreur interne est survenue");
					}
				}
				else {
					http_response_code(400);
					$renvoi = array("message" => "Le rdv spécifiée n'existe pas");
				}
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
		}

		(new vue)->transformerJson($renvoi);
	}

    public function getRdv() {
        $donnees = null;

        if(isset($_GET["id"])) {
            if((new patient)->exists($_GET["id"])) {
                http_response_code(200);
                $donnees = (new rdv)->GetConsulterRDV($_GET["id"]);
            }
            else {
                http_response_code(404);
                $donnees = array("message" => "Rdv introuvable");
            }
        }
		elseif(isset($_GET["idMedecin"])){
			if(isset($_GET["date"])){

				http_response_code(200);
				$donnees = (new rdv)->getidMedecin($_GET["idMedecin"],$_GET["date"]);

			}
			elseif(isset($_GET["dateRdv"])){
				http_response_code(200);
				$donnees = (new rdv)->getRdvMedecinHeure($_GET["idMedecin"],$_GET["dateRdv"]);

			}

           
		}
		elseif(isset($_GET["token"])){
			http_response_code(200);
			$donnees = (new rdv)->GetConsulterRDV($_GET["token"]);
		}
        else {
            http_response_code(200);
            $donnees = (new rdv)->getAll();
        }

        (new vue)->transformerJson($donnees);
    }
	

	public function connexionMedecin() {

		$donnees = json_decode(file_get_contents("php://input"));
		$renvoi = null;
		if($donnees === null) {
			http_response_code(400);
			$renvoi = array("message" => "JSON envoyé incorrect");
		}
		else {
			$attributsRequis = array("login", "mdp");
			if($this->verifierAttributsJson($donnees, $attributsRequis)) {

				$resultat = null;
				
				$resultat = (new medecin)->connexion($donnees->login, $donnees->mdp);

				if($resultat != null) {
					
					http_response_code(201);
					$renvoi = array("message" => "Vous êtes correctement connecté");
				}
				else {
					http_response_code(401);
					$renvoi = array("message" => "Login/Mot de passe incorrect");
				}
					
			}
			else {
				http_response_code(400);
				$renvoi = array("message" => "Données manquantes");
			}
			
		}
		(new vue)->transformerJson($renvoi);
	}
}

?>
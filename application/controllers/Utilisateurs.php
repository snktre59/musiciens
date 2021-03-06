<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateurs extends CI_Controller {
	
	public function connexion()
	{	
		$utilisateurCourant = $this->session->userdata("utilisateurCourant");
		
		if($utilisateurCourant->estAuthentifie()) redirect(base_url());

		// Chargement des bibliothèques
		$this->load->library('form_validation');
		
		// Chargement des modèles
		$this->load->model("utilisateurs_model");
		
		$this->layout->ajouter_js('utilisateurs/connexion');

		$this->layout->ajouter_css("utilisateurs/connexion");
	 
	 	// Définition des règles de champs
		$this->form_validation->set_rules('ADRESSE_EMAIL_CONNEXION', '"Adresse Email"', 'trim|required|valid_email|encode_php_tags');
		$this->form_validation->set_rules('MOT_DE_PASSE_CONNEXION', '"Mot de passe"', 'trim|required|encode_php_tags');
	
		if ($this->form_validation->run())
		{
			// Récupération des variables postées
			$adresse_email = $this->input->post('ADRESSE_EMAIL_CONNEXION');
			$mot_de_passe = $this->input->post('MOT_DE_PASSE_CONNEXION');
			//$remember = $this->input->post('REMEMBER');
			
			// Récupération des informations du compte utilisateur
			$userData = $this->utilisateurs_model->getDataUtilisateurByEmail($adresse_email);
			
			// Le compte n'existe pas
			if ($userData == FALSE) {
				
				// Ajout d'un message d'erreur
				$this->layout->set_flashdata_message("red", "Le compte avec lequel vous souhaitez vous connecter n'existe pas, merci d'en créer un.");
				
				// Redirection et affichage du message d'erreur
				redirect("utilisateurs/connexion");
				
			// Le compte existe	
			} else {
				
				// Le compte existe mais n'est pas activé
				if ($userData["STATUT_COMPTE"] != "ACTIF") {
					
					// Ajout d'un message d'erreur
					$this->layout->set_flashdata_message("red", "Le compte auquel vous souhaitez vous connecter n'est pas activé. Pour l'activer, cliquez sur le mail que vous avez reçu lors de votre inscription puis reconnectez vous.");
					
					// Redirection et affichage du message d'erreur
					redirect("utilisateurs/connexion");
				}
				
				// Le compte existe et les mots de passe correspondent
				else if (password_verify($mot_de_passe, $userData["MOT_DE_PASSE"])) {
					
					// Instanciation d'un nouvel utilisateur avec ses informations
					$utilisateur = $this->utilisateurs_model->instancier_utilisateur($adresse_email);
					
					// Destruction de la session précédente (visiteur)
					$this->session->unset_userdata("utilisateurCourant");
					
					// Création d'une nouvelle session utilisateur
					$this->session->set_userdata("utilisateurCourant", $utilisateur);
					
					// Mémorisation de la session
					/*if($remember == "on"){
						$this->session->mark_as_temp('utilisateurCourant', 604800);
					}*/
					
					// Ajout d'un message de confirmation
					$this->layout->set_flashdata_message("green", "Vous êtes dès à présent connecté !");
					
					// Redirection et affichage du message de confirmation
					redirect("accueil");
				
				// Les identifiants du compte sont incorrects	
				} else {
					
					// Ajout d'un message d'erreur
					$this->layout->set_flashdata_message("red", "Les informations d'identification sont incorrectes, veuillez réessayer.");
					
					// Redirection et affichage du message d'erreur
					redirect("accueil");
				}
			}
		}
		else
		{
			$data["toto"] = "TOTO";
			$this->layout->view('accueil/accueil', $data);
		}
	}

	public function inscription(){

		$utilisateurCourant = $this->session->userdata("utilisateurCourant");

		if($utilisateurCourant->estAuthentifie()) redirect(base_url());
		
		// Chargement des bibliothèques
		$this->load->library('form_validation');
		
		//Chargement des modèles
		$this->load->model("utilisateurs_model");
		 
		// Définition du titre de la page
		$this->layout->set_titre("Porn Addicted | Inscription");
		
		// Définition des règles de champs
		$this->form_validation->set_rules('NOM', '"Nom"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('PRENOM', '"Prénom"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('ADRESSE_EMAIL', '"Adresse email"', 'trim|required|valid_email|encode_php_tags|is_unique[utilisateurs.ADRESSE_EMAIL]');
		$this->form_validation->set_rules('TYPE_UTILISATEUR', '"Rôle"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('MOT_DE_PASSE', '"Mot de passe"', 'trim|required|matches[MOT_DE_PASSE_CONFIRMATION]|encode_php_tags');
		$this->form_validation->set_rules('MOT_DE_PASSE_CONFIRMATION', '"Mot de passe confirmation"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('NUMERO_DE_TELEPHONE', '"Numéro de téléphone"', 'trim|numeric|exact_length[10]|encode_php_tags');
		$this->form_validation->set_rules('CODE_POSTAL', '"Code postal"', 'trim|numeric|exact_length[5]|required|encode_php_tags');
		$this->form_validation->set_rules('VILLE', '"Ville"', 'trim|required|encode_php_tags');
		//var_dump($this->input->post()); die();
		// Si le formulaire est correctement renseigné
		if($this->form_validation->run())
		{	               
			// Récupération des variables postées
			$nom = $this->input->post('NOM');
			$prenom = $this->input->post('PRENOM');
			$adresseEmail = $this->input->post('ADRESSE_EMAIL');
			$numeroDeTelephone = $this->input->post('NUMERO_DE_TELEPHONE');
			$codePostal = $this->input->post('CODE_POSTAL');
			$ville = $this->input->post('VILLE');
			$adresseIpDerniereConnexion = $this->input->ip_address();
			$motDePasse = password_hash($this->input->post('MOT_DE_PASSE'), PASSWORD_BCRYPT);
			$typeUtilisateur = $this->input->post('TYPE_UTILISATEUR');
			$tokenId = md5(microtime(TRUE)*100000);
			
			
			
			
			// L'utilisateur à été ajouté en BDD
			if($utilisateurCourant->inscrire($nom, $prenom, $adresseEmail, $numeroDeTelephone, $codePostal, $ville, $adresseIpDerniereConnexion, $motDePasse, $typeUtilisateur, $tokenId) == TRUE){
				
				$this->load->library("email_templates");
				
				$message = '
					Vous vous êtes inscrit sur notre site internet et nous vous en remercions. Pour valider votre inscription, merci de cliquer sur <a href="'.base_url().'/utilisateurs/confirmation/adresse_email='.$adresseEmail.'&token_id='.$tokenId.'">ce lien</a>.<br />
					A bientôt sur undershift.fr !<br/>
					Under Shift.
				';
				// Envoi d'un mail de confirmation
				if($this->email_templates->inscription_validation("noreply@undershift.fr", "UNDER SHIFT", $adresseEmail, $tokenId, "Confirmez votre inscription", $message)){
					// Ajout d'un message de confirmation
					$this->layout->set_flashdata_message('green', "Votre inscription s'est déroulée correctement. Vous allez recevoir un email avec les détails pour l'activation de votre compte.");
					
					// Redirection et affichage du message
					redirect("accueil/index");
					
				// L'email de confirmation n'a pas été envoyé
				} else {
					// Ajout d'un message de confirmation
					$this->layout->set_flashdata_message('red', "Vous avez été inscrit cependant il y a eu un problème lors de l'envoi du mail de confirmation. Veuillez contacter un administrateur.");
					
					// Redirection et affichage du message
					redirect("accueil/index");
				}
				
			
			// Il y a eu un problème lors de l'ajout de l'utilisateur en BDD
			} else {
				
				// Ajout d'un message de confirmation
				$this->layout->set_flashdata_message('red', "Suite à un problème technique votre inscription ne peut aboutir. Veuillez contacter l'administrateur du site via le formulaire de contact.
					Veuillez nous excuser pour la gêne occasionnée.");
				
				// Redirection et affichage du message
				redirect("utilisateurs/inscription");
			}
			
		}
		else
		{
			// Affichage
			$this->layout->view('accueil/accueil');
		}
	}
	
	function confirmation($adresse_email, $token_id){
		
		// Décodage de l'adresse email codée pour les caractères spéciaux
		$adresse_email = urldecode($adresse_email);
		
		// Chargement des modèles
		$this->load->model("utilisateurs_model");
		
		// Si le compte est activé
		if($this->utilisateur->activer_compte($adresse_email, $token_id) === TRUE){
			
			// Définition du message de confirmation et du statut
			$message = "Votre compte ".$adresse_email." à été activé ! Vous pouvez dès à présent vous connecter au site sur <a href='".base_url()."utilisateurs/connexion'>cette page</a>";
			$statut = "green";
			
			$this->layout->set_flashdata_message($statut, $message);
			
			// Affichage de la vue
			redirect("accueil/index");
			
		// Le compte à déjà été activé ou n'existe pas
		} else {
			
			// Définition du message d'erreur et du statut
			$message = "Votre compte n'a pas été activé. Cela peut-être dû au fait que le compte n'existe pas ou à déjà été validé.";
			$statut = "red";
			
			$this->layout->set_flashdata_message($statut, $message);
			
			// Affichage de la vue
			redirect("accueil/index");
		}
	}
	
	function deconnexion(){
		// Destruction de la session précédente (visiteur)
		$this->session->unset_userdata("utilisateurCourant");
		
		// Ajout d'un message de confirmation
		$this->layout->set_flashdata_message("orange", "Vous êtes à présent déconnecté !");
		
		// Redirection et affichage du message de confirmation
		redirect("accueil/index");
	}
	
	function csrf_redirect()
	{
	    
	    $this->layout->set_flashdata_message('red', "CSRF");
	    redirect('accueil', 'index');
	}
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{
	// Déclaration des variables
    private $CI;
	private $id;
    private $pseudo;
	private $nom;
	private $prenom;
	private $mot_de_passe;
	private $adresse_postale;
	private $code_postal;
    private $ville;
    private $adresse_email;
    private $numero_de_telephone;
    private $adresse_ip_derniere_connexion;
    private $date_inscription;
    private $type_abonnement;
    private $date_souscription;
    private $role;
    private $statut_compte;
    private $token_id;
    private $registered;

    /*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

    public function __construct($id = "1")
    {
        $CI =& get_instance();
        
        // Chargement du modèle utilisateur
        $CI->load->model("utilisateurs_model");
        
        $dataUser = $CI->utilisateurs_model->getDataUtilisateurById($id);
        
        $this->id = (int)$dataUser["ID_UTILISATEUR"];
        $this->nom = $dataUser["NOM"];
        $this->prenom = $dataUser["PRENOM"];
        $this->codePostal = $dataUser["CODE_POSTAL"];
        $this->ville = $dataUser["VILLE"];
        $this->adresseEmail = $dataUser["ADRESSE_EMAIL"];
        $this->numeroDeTelephone = $dataUser["NUMERO_DE_TELEPHONE"];
        $this->adresseIpDerniereConnexion = $dataUser["ADRESSE_IP_DERNIERE_CONNEXION"];
        $this->dateInscription = $dataUser["DATE_INSCRIPTION"];
        $this->typeAbonnement = $dataUser["TYPE_ABONNEMENT"];
        $this->dateSouscription = $dataUser["DATE_SOUSCRIPTION"];
        $this->typeUtilisateur = $dataUser["TYPE_UTILISATEUR"];
        $this->statutCompte = $dataUser["STATUT_COMPTE"];
        $this->tokenId = $dataUser["TOKEN_ID"];
        if($dataUser["ADRESSE_EMAIL"] == "visiteur"){
            $this->registered = FALSE;
        } else $this->registered = TRUE;
    }
    
    /*
     * Fonction d'inscription d'un utilisateur
     */
    public function inscrire($nom, $prenom, $adresseEmail, $numeroDeTelephone, $codePostal, $ville, $adresseIpDerniereConnexion, $motDePasse, $typeUtilisateur, $token_id)
	{
         $CI =& get_instance();
         $CI->load->model("utilisateurs_model");
        // Création du tableau contenant les informations à propos de l'utilisateur
		$tableau_utilisateur = array(
			"ID_UTILISATEUR"		            =>		"",
			"NOM"		                        =>		$nom,
			"PRENOM"	                        =>		$prenom,
			"CODE_POSTAL"			            =>		$codePostal,
			"VILLE"		                        =>		$ville,
			"ADRESSE_EMAIL"		                =>		$adresseEmail,
			"NUMERO_DE_TELEPHONE"		        =>		$numeroDeTelephone,
			"ADRESSE_IP_DERNIERE_CONNEXION"	    =>		$adresseIpDerniereConnexion,
			"MOT_DE_PASSE"		                =>		$motDePasse,  
			"TYPE_UTILISATEUR"	                =>		$typeUtilisateur,
            "STATUT_COMPTE"                     =>      "INACTIF",
			"TOKEN_ID"		                    =>		$token_id
		);
        
        // Insertion des données dans la table "utilisateurs"
		$resultat = $CI->utilisateurs_model->ajouter_utilisateur($tableau_utilisateur);
        
        return $resultat;
	}
    
    public function activer_compte($adresse_email, $token_id){
        $this->CI =& get_instance();
        
        return $this->CI->utilisateurs_model->activer_compte($adresse_email, $token_id);
    }
    
    public function connexion_utilisateur($adresse_email, $mot_de_passe){
        $dataUser = $this->CI->utilisateurs_model->getDataUtilisateurByEmail($adresse_email);
    }
    
    public function estAuthentifie(){
        return ($this->registered === TRUE) ? TRUE : FALSE;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return mixed
     */
    public function getAdressePostale()
    {
        return $this->adressePostale;
    }

    /**
     * @param mixed $adresse_postale
     */
    public function setAdressePostale($adressePostale)
    {
        $this->adressePostale = $adressePostale;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return mixed
     */
    public function getAdresseEmail()
    {
        return $this->adresseEmail;
    }

    /**
     * @param mixed $adresse_email
     */
    public function setAdresseEmail($adresseEmail)
    {
        $this->adresseEmail = $adresseEmail;
    }

    /**
     * @return mixed
     */
    public function getNumeroDeTelephone()
    {
        return $this->numeroDeTelephone;
    }

    /**
     * @param mixed $numero_de_telephone
     */
    public function setNumeroDeTelephone($numeroDeTelephone)
    {
        $this->numeroDeTelephone = $numeroDeTelephone;
    }

    /**
     * @return mixed
     */
    public function getAdresseIpDerniereConnexion()
    {
        return $this->adresseIpDerniereConnexion;
    }

    /**
     * @param mixed $adresse_ip_derniere_connexion
     */
    public function setAdresseIpDerniereConnexion($adresseIpDerniereConnexion)
    {
        $this->adresseIpDerniereConnexion = $adresseIpDerniereConnexion;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param mixed $date_inscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return mixed
     */
    public function getTypeAbonnement()
    {
        return $this->typeAbonnement;
    }

    /**
     * @param mixed $type_abonnement
     */
    public function setTypeAbonnement($typeAbonnement)
    {
        $this->typeAbonnement = $typeAbonnement;
    }

    /**
     * @return mixed
     */
    public function getDateSouscription()
    {
        return $this->dateSouscription;
    }

    /**
     * @param mixed $date_souscription
     */
    public function setDateSouscription($dateSouscription)
    {
        $this->dateSouscription = $dateSouscription;
    }

    /**
     * @return string
     */
    public function getTypeUtilisateur()
    {
        return $this->typeUtilisateur;
    }

    /**
     * @param string $droits_compte
     */
    public function setTypeUtilisateur($typeUtilisateur)
    {
        $this->typeUtilisateur = $typeUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getStatutCompte()
    {
        return $this->statutCompte;
    }

    /**
     * @param mixed $statut_compte
     */
    public function setStatutCompte($statutCompte)
    {
        $this->statutCompte = $statutCompte;
    }

    /**
     * @return mixed
     */
    public function getTokenId()
    {
        return $this->tokenId;
    }

    /**
     * @param mixed $token_id
     */
    public function setTokenId($tokenId)
    {
        $this->tokenId = $tokenId;
    }
}
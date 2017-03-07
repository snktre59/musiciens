<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller
{

	public function index()
	{
		
		// Définition du titre de la page
		$this->layout->set_titre("Musikos");
		
		//Définition de la meta-description
		$this->layout->set_meta_description("Retrouvez les dernières actualités du groupe, les prochains évènements et bien plus encore !");
		
		$this->layout->ajouter_js("nodes");
		 
		// Affichage du template
		$this->layout->view('accueil/accueil');
	}
}
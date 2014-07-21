<?php 

class User{
	protected $erreurs=array();
	private $pseudo;
	private $name;
	private $password;
	private $telephone;
	private $adresse_mail;
	private $sexe;
	
	
	
	public function __construct($valeur=array()){
		if(!empty($valeur)){
		$this->hydrate($valeurs);	
		}
		
	}
	
	public function hydrate($donnees)
	   {
		foreach( $donnees as $attribut=>$valeur)
		{
		$method='set'.ucfirst($attribut);	
			if(is_callable(array($this,$methode))){
				$this->$methode($valeur);
			}
		}
	}
	
	public function setPseudo($pseudo){
		if(empty($pseudo)){
			$this->erreur[]="Remplir pseudo";
		} else if(!is_string($pseudo))
		{
			$this->erreurs[]="pseudo invalide";
		}
		  else if(!empty($pseudo))
		  {
			$this->erreur[]="pseudo deja utilise";
		   }
		  else {
				$this->pseudo=$pseudo;
			}
		
	}
	
	public function setName($name){
		if(empty($name)){
			$this->erreurs[]="Remplir nom ";
		}
		else if(!is_string($name)){
			$this->erreurs="nom invalide";
		}
		else 
		{
			$this->name=$name;
		}
	}
	public function pseudo(){
		return $this->pseudo;
	}
	
	
}

?>
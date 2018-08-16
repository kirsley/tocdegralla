<?php

	class Autor{
		private $idAutor;
		private $nomAutor;
		private $cognomAutor;
		
		function getNomAutor(){
			return $this->nomAutor;
		}
		function getCognomAutor(){
			return $this->cognomAutor;
		}
		function getIdAutor(){
			return $this->idAutor;
		}
		function setNomAutor($nom){
			$this->nomAutor=$nom;
		}
		function setCognomAutor($cognom){
			$this->cognomAutor=$cognom;
		}
		function setIdAutor($id){
			$this->idAutor=$id;
		}
		function __toString(){
			return $this->getCognomAutor()." ".$this->getNomAutor();
		}
	}
	
	class Autors{
		public $autors=array();
		function __construct($link){
			$this->updateAutors($link);
		}
		function getAutors(){
			return $this->autors;
		}
		function updateAutors($link){
			$query="SELECT * FROM autor ORDER BY cognomAutor";
			$autorQuery=ejecutaQuery($query, $link);
			if ($autorQuery){
				$rows=mysqli_num_rows($autorQuery);
				if ($rows >0){
					while ($aut = mysqli_fetch_object($autorQuery, 'Autor')){
						array_push($this->autors, $aut);
					}
				}
			}
		}
		function getAutor($id){
			foreach($this->autors as $aut){
				if($aut->getIdAutor()==$id){
					return $aut;
				}
			}
			return false;
		}
		function total(){
			$aux=0;
			foreach($this->autors as $aut){
				$aux++;
			}
			return $aux;
		}
	}
	
	class Classificacio{
		private $idClassificacio;
		private $classificacio;
		function getIdClassificacio(){
			return $this->idClassificacio;
		}
		function getClassificacio(){
			return $this->classificacio;
		}
		function setIdClassificacio($id){
			$this->idClassificacio = $id;
		}
		function setClassificacio($classificacio){
			$this->classificacio = $classificacio;
		}
		function __toString(){
			return $this->getClassificacio();
		}
	}
	
	class Classificacions{
		public $classificacions=array();
		function __construct($link){
			$this->updateClassificacions($link);
		}
		function getClassificacions(){
			return $this->classificacions;
		}
		function updateClassificacions($link){
			$queryClassif="SELECT * FROM classifcontinguts";
			$query=$queryClassif;
			$classif=ejecutaQuery($query, $link);
			if ($classif){
				$rows=mysqli_num_rows($classif);
				if ($rows >0){
					while ($cla = mysqli_fetch_object($classif, 'Classificacio')){
						array_push($this->classificacions, $cla);
					}
				}
			}
		}
		/**
		 * Retorna un objecte del tipus classificacio, contingut 
		 * a l'array de classificacions, en base al seu id
		 * @param $id
		 */
		function getClassificacio($id){
			foreach($this->classificacions as $classif){
				if($classif->getIdClassificacio()==$id){
					return $classif;
				}
			}
		}
	}
	
	class Tipus{
		private $idTipus;
		private $nomTipus;
		
		function getNomTipus(){
			return $this->nomTipus;
		}
		function setNomTipus($tip){
			$this->nomTipus=$tip;
		}
		function getIdTipus(){
			return $this->idTipus;
		}
		function setIdTipus($tip){
			$this->idTipus=$tip;
		}
		function __toString(){
			return $this->getNomTipus();
		}
	}
	
	class CollecioTipus{
		public $colleccioTipus=array();
		function __construct($link){
			$this->updateCollecioTipus($link);
		}
		function getCollecioTipus(){
			return $this->colleccioTipus;
		}
		function updateCollecioTipus($link){
			$queryTipus="SELECT * FROM tipus";
			$tipusRes=ejecutaQuery($queryTipus, $link);
			if ($tipusRes){
				$rows=mysqli_num_rows($tipusRes);
				if ($rows >0){
					while ($tip = mysqli_fetch_object($tipusRes, 'Tipus')){
						array_push($this->colleccioTipus, $tip);
					}
				}
			}
		}
		/**
		 * Retorna un objecte del tipus 'Tipus', contingut 
		 * a l'array de coleccioTipus, en base al seu id
		 * @param $id
		 */
		function getTipus($id){
			foreach($this->colleccioTipus as $tip){
				if($tip->getIdTipus()==$id){
					return $tip;
				}
			}
		}
	}
?>

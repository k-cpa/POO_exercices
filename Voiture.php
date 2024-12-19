<?php 
class voiture {

    // ATTRIBUTS
    // Public accessible partout
    // public $couleur;
    // public $nbPortes;

    // private
    // Accessible uniquement dans la classe
    private $essence;
    private $consommation;
    private $compteurKilometrique;
    private $phareAllume;
    private $messageEssence;

    // CONSTRUCTEUR
    // Possible, comme en include SCSS, de paramétrer des valeurs par défaults
    public function __construct(
                                $essence = 30,
                                $compteurKilometrique = 0,
                                $consommation = 0.05,
                                $phareAllume = false
                                ){
        // On passe par les SETTER pour les constructeurs
        $this->essence = $essence;
        $this->compteurKilometrique = $compteurKilometrique;
        $this->consommation = $consommation;
        $this->phareAllume = $phareAllume;
    }

    // Setters et getters COMPTEUR 
    public function getCompteurKilometrique() {
        return $this->compteurKilometrique;
    }
    public function setCompteurKilometrique($compteurKilometrique) {
        $this->compteurKilometrique = $compteurKilometrique;
    }

    // fonction rouler
    public function rouler($distance) {

        // calcul conso essence pour la distance
        $consommationTotale = $distance * $this->consommation;

        // Vérifie si essence suffisante 
        if ($this->essence >= $consommationTotale) {

            // Mise à jour du compteur pour KM et essence
            $this->compteurKilometrique += $distance;
            $this->essence -= $consommationTotale;
        } else {
            // distance maximum disponible avec la conso de la voiture
            $distancePossible = $this->essence / $this->consommation;

            // Mise à jour du compteur avec la distance possible
            $this->compteurKilometrique += $distancePossible;
            $this->essence = 0; 
            $this->messageEssence = "Vous n'avez plus d'essence. Vous avez parcouru uniquement " . $distancePossible . " km.";
        }
    }

    public function faireLePlein() {
        if ($this->essence <=15) {
            $this->essence = 50;
            $this->messageEssence = "Vous avez fait le plein";
        }
    }

    public function allumerPhares() {
        if ($this->phareAllume == false) {
            $this->phareAllume = true;
        } else if ($this->phareAllume == true) {
            $this->phareAllume = false;
        }
    }

    public function afficherTableauDeBord() {
        echo "----------------Tableau de bord de ta ZX flinguée---------------</br>";
        echo "Kilomètres parcourus :" . $this->compteurKilometrique . "km</br>";
        echo "Essence restante :" . $this->essence . "litres</br>";
        echo "Etat des phares :" . ($this->phareAllume ? "Allumés" : "Eteints") . "</br>";
        echo $this->messageEssence . "</br>";
        echo "------------------------------------------------------------------------</br>";
    }

}

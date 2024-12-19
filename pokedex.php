<?php 

class pokemon {

    private $name;
    private $attackPower;
    private $type;
    private $healthPoints;


    // CONSTRUCTEUR
    public function __construct(
                                $name,
                                $attackPower,
                                $type,
                                $healthPoints = 100
                                )
    {
        $this->name = $name;
        $this->attackPower = $attackPower;  
        $this->type = $type;  
        $this->healthPoints = $healthPoints;  
    }

    

    // SETTERS et GETTERS attack power
    public function getAttackPower() {
        return $this->attackPower;
    }
    public function setAttackPower($attackPower) {
        $this->attackPower = $attackPower;
    }

    // SETTERS et GETTERS type
    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }

    // GETTER healthPoints
    public function getHealthPoints() {
        return $this->healthPoints;
    }
    // GETTER name
    public function getName() {
        return $this->name;
    }
    

    // Pokedex - affichage infos du pokemon
    public function pokedex() {
        echo "------------POKEDEX------------</br>";
        echo "| Nom :" . $this->name . " |</br>";
        echo "| Type :" . $this->type . " |</br>";
        echo "|Attack Power :" . $this->attackPower . " |</br>";
        echo "|Health Points :" . $this->healthPoints . " |</br>";
        echo "-------------------------------</br>";
    }

    // Bonus de dégat en fonction du type 
    public function bonusAttack(Pokemon $target) {
        $bonusDamage = 0;

        if ($this->type == 'electric' && $target->getType() == 'water') {
            $bonusDamage = 10; // Majoration de 10 points de dégats
        } else if ($this->type == 'water' && $target->getType() == 'fire') {
            $bonusDamage = 10;
        } else if ($this->type == 'fire' && $target->getType() == 'grass') {
            $bonusDamage = 10;
        }
        return $bonusDamage;
    }

    // Attaquer un autre pokemon
    public function attack (Pokemon $target) {
        $bonusDamage = $this->bonusAttack($target);
        $this->logAttack($target);
        $target->receiveDamage($this->attackPower + $bonusDamage);
    }

    // Subir des dégats
    public function receiveDamage($damage) {
        $this->healthPoints -= $damage;

        if ($this->healthPoints <= 0) {
            $this->healthPoints = 0;
            echo "| " . $this->name . " est K.O. |</br>";
        } else {
            echo "| " . $this->name . " receives " . $damage. " damage |</br>";
            echo "| " . $this->healthPoints . " health points left |</br>";
        }
    }

    private function logAttack(Pokemon $target) {
        echo "| " . $this->name . " attacks " . $target->name . " with a power of " . $this->attackPower . " ! + (" . $this->bonusAttack($target) ." bonus damage) |</br>";
    }
}

class arena {
    private $pokemon1;
    private $pokemon2;

    public function __construct (
                                $pokemon1,
                                $pokemon2
                                )
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function fight() {
        // randomisation de l'ordre pour la première attaque du combat
        $firstStrike = rand(1,2);

        echo "--------------------- ARENA ---------------------</br>";
        echo "| The battle begin between " . $this->pokemon1->getName() . " and " . $this->pokemon2->getName() . " |</br>";
        while ($this->pokemon1->getHealthPoints() > 0 && $this->pokemon2->getHealthPoints() > 0) {

            // si firstStrike = 1 alors c'est le pokemon 1 qui attaque en premier 
            if ($firstStrike == 1) {
                $this->pokemon1->attack($this->pokemon2);
                echo "</br>";

                if ($this->pokemon2->getHealthPoints() <= 0) {
                    echo "| " . $this->pokemon1->getName() . " won the fight ! |</br>";
                    echo "------------ CONGRATULATIONS ------------</br>";
                    break;
                }
                // sinon c'est le pokemon 2 qui attaque en premier
            } else if ($firstStrike == 2) {
                $this->pokemon2->attack($this->pokemon1);
                echo "</br>";

                if ($this->pokemon1->getHealthPoints() <= 0) {
                    echo "| " . $this->pokemon2->getName() . " won the fight ! |</br>";
                    echo "------------ CONGRATULATIONS ------------</br>";
                    break;
                }
            }            
        }
    }
}
<?php

namespace HG;

class Hero implements Character {

    public function __construct($name)
    {
        $this->name = $name;
        $this->health = rand(70, 100);
        $this->initial_health = $this->health;
        $this->strength = rand(70, 80);
        $this->defence = rand(45, 55);
        $this->speed = rand(40, 50);
        $this->luck = rand(10, 30);
    }

    public function attack(Monster $monster)
    {
        if (rand(1, 100) <= $monster->luck) {                                   // take into account $monster's luck
            return ["skill" => "Miss", "health_left" => $monster->health];
        }
        return $this->damage($monster);
    }

    public function damage(Monster $monster)
    {
        if (rand(1, 10) === 1) {                                                 // take into account strikeTwice 10% chance to proc
            $hit = $this->strikeTwice($monster);
        } else {
            $hit = $this->strike($monster);
        }
        $monster->health -= $hit["damage_done"];
        return ["hit" => $hit, "health_left" => $monster->health];
    }

    public function strike(Character $character)
    {
        return ["skill" => "Strike", "damage_done" => (($this->strength) - ($character->defence))];
    }

    public function strikeTwice(Monster $monster)
    {
        return ["skill" => "Strike Twice", "damage_done" => (($this->strength) - ($monster->defence))*2];
    }

}
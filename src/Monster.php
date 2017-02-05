<?php

namespace HG;

class Monster implements Character {

    public function __construct($name)
    {
        $this->name = $name;
        $this->health = rand(60, 90);
        $this->initial_health = $this->health;
        $this->strength = rand(60, 90);
        $this->defence = rand(40, 60);
        $this->speed = rand(40, 60);
        $this->luck = rand(25, 40);
    }

    public function attack(Hero $hero)
    {
        if (rand(1, 100) <= $hero->luck) {                              // take into account $hero's luck
            return ["skill" => "Miss", "health_left" => $hero->health];
        }
        return $this->damage($hero);
    }

    public function damage (Hero $hero)
    {
        if (rand(1, 5) === 1) {                                          // take into account Magic Shield 20% chance to proc
            $hit = $this->strikeWithmagicShield($hero);
        } else {
            $hit = $this->strike($hero);
        }
        $hero->health -= $hit["damage_done"];
        return ["hit" => $hit, "health_left" => $hero->health];
    }

    public function strike(Character $character)
    {
        return ["skill" => "Strike", "damage_done" => (($this->strength) - ($character->defence))];
    }

    public function strikeWithmagicShield(Hero $hero)
    {
        return ["skill" => "Strike/2 (Magic Shield)", "damage_done" => (($this->strength) - ($hero->defence))/2];
    }

}
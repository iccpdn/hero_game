<?php

namespace HG\Controllers;

use HG\Monster;
use HG\Hero;

class FightController {

    static function fight ()
    {
        $hero = new Hero("Orderus");
        $monster = new Monster("Slack Fang");
        $id = self::setId($hero, $monster);
        $rounds = [];
        $i = 1;

        while ($i <= 20 && $monster->health > 0  && $hero->health > 0) {
            if ($i%2 === $id) {
                $rounds[$i]["action"] = "$monster->name Attacks, $hero->name Defends!";
                $rounds[$i]["output"] = $monster->attack($hero);
            } else {
                $rounds[$i]["action"] = "$hero->name Attacks, $monster->name Defends!";
                $rounds[$i]["output"] = $hero->attack($monster);
            }
            $i++;
        }

        return ["hero" => $hero, "monster" => $monster, "rounds" => $rounds];
    }

    static function setId(Hero $hero, Monster $monster)         // $id===1, monster attacks first; $id===0, hero attacks first
    {
        if ($monster->speed > $hero->speed) {
            $id = 1;
        } else if ($monster->speed === $hero->speed) {
            if ($monster->luck > $hero->luck) {
                $id = 1;
            } else {
                $id = 0;
            }
        } else {
            $id = 0;
        }

        return $id;
    }
}

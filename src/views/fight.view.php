<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hero Game</title>
</head>
<body>

    <div style="display: inline-block">
    <table border="1">
        <tr><th colspan="2"><?= $data["hero"]->name ?></th></tr>
        <tr>
            <td>Health</td>
            <td><?= $data["hero"]->initial_health ?></td>
        </tr>
        <tr>
            <td>Strength</td>
            <td><?= $data["hero"]->strength ?></td>
        </tr>
        <tr>
            <td>Defence</td>
            <td><?= $data["hero"]->defence ?></td>
        </tr>
        <tr>
            <td>Speed</td>
            <td><?= $data["hero"]->speed ?></td>
        </tr>
        <tr>
            <td>Luck</td>
            <td><?= $data["hero"]->luck ?></td>
        </tr>
    </table>
    </div>

    <div style="display: inline-block">
        <table border="1">
            <tr><th colspan="2"><?= $data["monster"]->name ?></th></tr>
            <tr>
                <td>Health</td>
                <td><?= $data["monster"]->initial_health ?></td>
            </tr>
            <tr>
                <td>Strength</td>
                <td><?= $data["monster"]->strength ?></td>
            </tr>
            <tr>
                <td>Defence</td>
                <td><?= $data["monster"]->defence ?></td>
            </tr>
            <tr>
                <td>Speed</td>
                <td><?= $data["monster"]->speed ?></td>
            </tr>
            <tr>
                <td>Luck</td>
                <td><?= $data["monster"]->luck ?></td>
            </tr>
        </table>
    </div>
    <br/><br/>

    <?php foreach ($data["rounds"] as $round => $battle): ?>
    <?= "Round $round:"?>
    <table border="1">
        <tr>
            <td>
                <?= $battle["action"] ?>
            </td>
        </tr>
        <tr>
            <?php if(isset($battle["output"]["hit"])): ?>
                <td>
                    <?= $battle["output"]["hit"]["skill"]. " hits for " .$battle["output"]["hit"]["damage_done"]. ", defender's health left ". (($battle["output"]["health_left"]<0) ? 0 : $battle["output"]["health_left"])?>
                </td>
            <?php else: ?>
                <td>
                    <?= "Miss! Defender's health left ". (($battle["output"]["health_left"]<0) ? 0 : $battle["output"]["health_left"]) ?>
                </td>
            <?php endif ?>
        </tr>
    </table>
    <br/>
    <?php endforeach ?>

    <?php if($data["hero"]->health <= 0): ?>
        <?= $data["monster"]->name. " Wins!" ?>
    <?php elseif($data["monster"]->health <= 0): ?>
        <?= $data["hero"]->name. " Wins!" ?>
    <?php else: ?>
        <?= "20 rounds over! It's a draw!" ?>
    <?php endif ?>
</body>
</html>
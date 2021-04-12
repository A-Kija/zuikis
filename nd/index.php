<?php
session_start();
$ALL = json_decode(file_get_contents('members.json'));
if (!file_exists('m_wait.json')) {
    file_put_contents('m_wait.json', json_encode($ALL));
    $WAIT = $ALL;
}
else {
    $WAIT = (array)json_decode(file_get_contents('m_wait.json'));
}
if (!file_exists('m_done.json')) {
    file_put_contents('m_done.json', json_encode([]));
    $DONE = [];
}
else {
    $DONE = json_decode(file_get_contents('m_done.json'));
}
uasort($WAIT, function($a, $b){return $a->name <=> $b->name;});

if (isset($_POST['get_it'])) {
    if (count($WAIT)) {
        shuffle($WAIT);
        $NOW = array_pop($WAIT);
        $NOW->date = date('m.d');
        array_unshift($DONE, $NOW);
        uasort($WAIT, function($a, $b){return $a->name <=> $b->name;});
        
        file_put_contents('m_wait.json', json_encode($WAIT));
        file_put_contents('m_done.json', json_encode($DONE));
        $_SESSION['now'] = $NOW;
    }
    header('Location: http://localhost/nd/');
    die;
}

if (isset($_POST['reset'])) {

    unlink('m_wait.json');
    unlink('m_done.json');
    header('Location: http://localhost/nd/');
    die;
}

if (isset($_SESSION['now'])) {
    $name = $_SESSION['now']->name;
    $date = $_SESSION['now']->date;
    unset($_SESSION['now']);
}
else {
    $name = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sąrašo skelbėjas</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="app.css" rel="stylesheet">
    
</head>
<body>
<div class="top">
<h1>Sąrašo skelbėjas v.1.2</h1>
<form action="" method="POST">
<input name="reset" type="submit" value="RESET">
</form>
</div>

<div class="c">

<div class="col">
<h2>Laukia eilėje:</h2>
<?php foreach($WAIT as $user) : ?>
<div class="member"><?= $user->name ?></div>
<?php endforeach ?>
</div>

<div class="col">
<form action="" method="POST">
<button name="get_it" type="submit">GET NEXT!</button>
<h3><?= $name ?></h3>
</form>
</div>

<div class="col">
<h2>Dalyvavo:</h2>
<?php foreach($DONE as $user) : ?>
<div class="member"><?= $user->name ?> - <?= $user->date ?></div>
<?php endforeach ?>
</div>

</div>
    
</body>
</html>
<?php

if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["enregistrer"]) AND !empty($_POST['todo']) ) {
$json = file_get_contents('todo.json');
$json = json_decode($json, true);
$checked = $_POST["todo"];

    for ($init = 0; $init < count($json); $init ++){
        if (in_array($json[$init]['tache'], $checked)){
          $json[$init]['fait'] = true;
        }
    }

    $json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('todo.json', $json);
    header("location: index.php"); 
  }
?>

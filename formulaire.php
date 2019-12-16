<?php
//  Homemade Debugging tool
function GoldenPrint($key) {
  echo "<pre>";
  print_r($key);
  echo "</pre>";
}
function GoldenVarD($key) {
  echo "<pre>";
  var_dump($key);
  echo "</pre>";
}
//déclaration des variables
$taskError = ""; //initialisation de la variable erreur
//Sanitization
function GoldenP($a) {
  $a = filter_var($a, FILTER_SANITIZE_STRING); // filter_var
  $a = trim($a); 
  $a = stripslashes($a); 
  return $a;
}
function display_todo() {
  $json = file_get_contents('todo.json');
  $json = json_decode($json, true);
  foreach ($json as $key => $value) {
    if ($json[$key]["fait"] == false) {
    echo '<label for="' . $value['tache'] . '"><input type="checkbox" name="todo[]" value="' . $value['tache'] . '" id="' . $value['tache'] . '">' . $value['tache'] . '</label><br>';
    }
  }
}
function display_done() {
  $json = file_get_contents('todo.json');
  $json = json_decode($json, true);
  foreach ($json as $key => $value) {
    if ($json[$key]["fait"] == true) {
    echo '<p><s>' . $value['tache'] . '</s></p>';
    }
  }
}

if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["ajouter"]) ) { 
  if (empty($_POST["addTask"])) { 
  $taskError = "* Veuillez entrer une tâche."; 
  }
  else {
  $addTask = GoldenP($_POST["addTask"]); 
  $todo = array(); 
  $todo["tache"] = $addTask; 
  $todo["fait"] = false; 
  $json = file_get_contents('todo.json'); 
  $json = json_decode($json, true);
  $json[] = $todo; 
  $json = json_encode($json, JSON_PRETTY_PRINT); 
  file_put_contents('todo.json', $json); 
  }
}
?>
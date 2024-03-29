<!DOCTYPE html>
<html lang="fr">

  <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title> To Do List</title>
     <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include("formulaire.php");?>
    <?php include("contenu.php"); ?>
    <?php include("reset.php") ?>
    <section class="page">
      <form class="archiver" action="index.php" method="post">
        <h1>To do list</h1>
        <h2>ToDo</h2>
        <?php display_todo(); ?>
        <br>
        <input class="bouton" type="submit" name="enregistrer" value="Enregistrer">
        <div class="archive">
        <h2>Archive</h2>
        <?php display_done(); ?>
        </div>

      </form>
      <form class="ajouter" action="index.php" method="post">
        <h2>Ajouter une tâche</h2>
        <input type="text" name="addTask"><br>
        <span class="error"><?php echo $taskError; ?></span>
        <br><br>
        <input class="bouton" type="submit" name="ajouter" value="Ajouter"><input class="bouton" type="submit" name="reinit" value="Reset"><br>

      </form>
    </section>
  </body>
</html>

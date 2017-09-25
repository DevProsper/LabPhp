<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">
        span.surlign1{font-style: italic; background-color: #ffff00;}
        span.surlign2{font-style: italic; background-color: #ff99ff;}
        span.surlign3{font-style: italic; background-color: #ff9999;}
        span.surlign4{font-style: italic; background-color: #9999ff;}
    </style>
    <?php
    header('Content-type : text/html; charset=UTF8');
    ?>

    <form action="" method="GET">
        Resultat <input type="text" name="q" value="">
        <input type="submit" value="Chercher">
    </form>

    <?php
    if (isset($_GET['q'])) {
      require 'connect.php';
      $q = $_GET['q'];
      $s = explode(" ", $q);
      //print_r($s);
      $sql = ("SELECT * FROM posts");
      $i=0;
      foreach ($s as $mot) {
          if (strlen($mot) > 4) {
            if ($i==0) {
                $sql .= " WHERE ";
            }else {
                //$sql .= " OR "; strictement
                $sql .= " OR ";
            }
            //$sql .= "contenu LIKE'% $mot %'"; Pour n'afficher que des mots 
            $sql .= "contenu LIKE'%$mot%'";
            $i++;
          }
      }
      //echo $sql; AFFICHE LA REQUETTE SQL
      echo $sql ."<br/>";
      $req = mysql_query($sql) or die(mysql_error());
      echo mysql_num_rows($req). " Resultat(s)";
      while ($d=mysql_fetch_assoc($req)) {
          echo "<h1>{$d["titre"]}</h1>";
          $c = $d["contenu"];
          $i=0;
          foreach ($s as $mot) {
              if (strlen($mot) > 3) {
                  $i++;
                  if ($i > 4){$i=1;}
                  $c = str_ireplace($mot, '<span class="surlign'.$i.'">' .$mot. '</span>', $c);
              }
          }
          echo "<p>{$c}</p>";
      }
    }else{
        echo "Pas de recherche";
    }
    ?>

  </body>
</html>

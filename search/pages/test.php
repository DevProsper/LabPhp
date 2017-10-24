<?php
   header('Content-type : text/html; charset=UTF8');
?>

    <form action="" method="POST">
        <!-- Resultat <input type="text" name="q" value=""> -->
        <select name="q" class="form-control">
          <option value="ratons">Ratons</option>
          <option value="lorem">Lorem</option>
        </select>

        <select name="k" class="form-control">
          <option value="ipsum">Ipsum</option>
          <option value="dolor">Dolor</option>
        </select>
        <input type="submit" value="Chercher">
    </form>

    <?php
    if (isset($_POST['q']) AND isset($_POST['k'])) {
      require 'connect.php';
      $q = $_POST['q'];
      $k = $_POST['k'];
      $sk = explode(" ", $q);
      $s = explode(" ", $k);
      //print_r($s);
      $sql = ("SELECT * FROM posts");
      $i=0;
      foreach ($sk as $mot) {
        if (strlen($mot) > 3) {
              if ($i==0) {
                  $sql .= " WHERE ";
              }else {
                  //$sql .= " OR "; strictement
                  $sql .= " OR ";
              }
              //$sql .= "contenu LIKE'% $mot %'"; Pour n'afficher que des mots 
              $sql .= "contenu LIKE'%$mot%'";
            $i++;
            foreach ($s as $motk) {
              if (strlen($motk) > 3) {
                $sql .= " AND contenu LIKE'%$motk%'";
                $i++;
              }
            }
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


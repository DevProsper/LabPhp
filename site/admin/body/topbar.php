<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">LabPHP Partie Administration</a>
            <a href="#" data-actives="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li class="<?php echo ($page=="dashboard")? "active" : "";  ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
              <li class="<?php echo ($page=="write")? "active" : "";  ?>"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li>
              <li class="<?php echo ($page=="list")? "active" : "";  ?>"><a href="index.php?page=list"><i class="material-icons">wiew_list</i></a></li>
              <li class="<?php echo ($page=="settings")? "active" : "";  ?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>

              <li><a href="../index.php?page=home">Quiter</a></li>
              <li><a href="index.php?page=logout">Déconnexion</a></li>
            </ul>

            <ul class="side-nav" id="mobile-menu">
              <li class="<?php echo ($page=="dashboard")? "active" : "";  ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
            </ul>
        </div>
    </div>
  </nav>

<h2>Parametres</h2>
<div class="row">
    <div class="col m6 s12">
        <h4>Modérateur</h4>
    </div>

    <?php

    if (isset($_POST['submit'])) {

        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $email_again = htmlspecialchars(trim($_POST['email_again']));
        $role = htmlspecialchars(trim($_POST['role']));
        $token = token(50);

        die($token);

        $errors = [];

        if (empty($name) || empty($email) || empty($email_again)) {
            $errors['empty'] = "Veuillez remplir tous les champs";
        }

        if ($email != $email_again) {
            $errors['email'] = "Les adresses email ne concordent pas";
        }

        if (email_taken($email)) {
            $errors['email'] = "L'adresse email est déja assigné a un compte";
        }

        if (!empty($errors)) {
            ?>
            <div class="card red">
                <div class="card-content white-text">
                    <?php
                    foreach ($errors as $error) {
                        echo $error."<br/>";
                    }
                    ?>
                </div>
            </div>
            <?php
        }else{

        }
    }



    ?>

    <div class="col m6 s12">
        <h4>Ajouter un modo</h4>

        <form method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name" value="">
                    <label for="name">Nom</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" name="email" id="email" value="">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" name="email_again" id="email_again" value="">
                    <label for="email_again">Repeter l'email</label>
                </div>


                <div class="input-field col s12">
                  <select name="role" name="role">
                      <option value="modo">Modérateur</option>
                      <option value="admin">Administrateur</option>
                      <label for="role">Rôle</label>
                  </select>
                </div>

                <div class="col s12">
                    <button type="submit" name="submit" class="btn">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>

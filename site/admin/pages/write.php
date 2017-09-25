<h2>Posté un article</h2>

<?php
if (isset($_POST['post'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    $posted = isset($_POST['public']) ? "1" : "0";

    $erros = [];

    if (empty($title) || empty($content)) {
        $errors['empty'] = "Veuillez remplir tous les champs";
    }

    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image']['name'];
        $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JEPG','.GIF'];
        $extension = strrchr($file,'.');

        if (!in_array($extension,$extensions)) {
            $errors['image'] = "Cette image n'est pas valide";
        }
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
    }else {
        post($title,$content,$posted);
        if (!empty($_FILES['image']['name'])) {
            post_img($_FILES['image']['tmp_name'], $extension);
        }else{
          $id = $db->lastInsertId();
          header("Location:index.php?page=post&id=".$id);
        }
    }

}

?>


<form enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="input-flied col s12">
            <input type="text" name="title" id="title">
            <label for="title">Titre de l'article</label>
        </div>

        <div class="input-flied col s12">
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Titre de l'article</label>
        </div>
        <div class="col s12">
          <div class="form-group">
            <label for="image">File input</label>
            <input type="file" name="image" id="image">
            <p class="help-block">Example block-level help text here.</p>
          </div>
        </div>

        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="public">
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button type="submit" class="btn" name="post">Publier</button>
        </div>

    </div>
</form>

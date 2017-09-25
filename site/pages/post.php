<?php
$post = get_post();

if ($post == false) {
    header("Location:index.php?page=error");
}else {
    ?>
      </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title?>">
        </div>
    </div>

    <div class="container">
      <h2><?= $post->title ?></h2>
      <h6>Par <?= $post->name ?> le <?= date("m/d/Y à H:i", strtotime($post->date)); ?></h6>
      <p><?= nl2br($post->content); ?></p>
    <?php
}
?>
<hr>
<h4>Commentaires</h4>
<?php
$responses = get_comments();
if ($responses!= false) {
    foreach ($responses as $response) {
      ?>
        <blockquote>
            <strong><?= $response->name ?> (<?= date("m/d/Y à H:i", strtotime($response->date)); ?>)</strong>
            <p><?= nl2br($response->comment); ?></p>
        </blockquote>
      <?php
    }
}else echo "Aucun commentaire n'a été publié... Soyez le premier!"

?>
<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $comment = htmlspecialchars(trim($_POST['comment']));

    $errors = [];
    if (empty($name) || empty($email) || empty($comment)) {
        $errors['empty'] = "Tous les champs sont obligatoires";
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Votre email n'est pas correcte";
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
    }else{
        comment($name, $email, $comment);
        ?>
        <script type="text/javascript">
            window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
        </script>
        <?php
    }
}


?>
<form method="post">
    <div class="row">
        <div class="input-field col s12 m6">
            <input type="text" name="name" id="name">
            <label for="name">Nom :</label>
        </div>
        <div class="input-field col s12 m6">
            <input type="text" name="email" id="email">
            <label for="email">Email :</label>
        </div>
        <div class="input-field col s12">
            <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
            <label for="comment">Commentaires :</label>
        </div>
        <div class="col s12">
            <button type="sumit" name="submit" class="btn waves-effect">Commenter ce post</button>
        </div>
    </div>
</form>

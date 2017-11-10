<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>phperrorcode.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.js"></script>
  <script type="text/javascript" src="custom.js"></script>
</head>
<body>

<div class="container well" style="width: 50%">
  <h2 class="text-center">Chargement des données des états et des villes dinamiquement avec ajax</h2>
  <form>
    <div class="input-group">
      <select class="form-control" id="country">
        <option value="">---Select Country---</option>
        <?php $result = $conn->query("SELECT * FROM country");
            while ($row = $result->fetch_assoc()){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
            <?php } ?>
      </select>
      <span class="input-group-addon">Pays</span>
    </div>
    <br>
    <div class="input-group">
      <select class="form-control" id="state">
        <option value="">---Sélectionner l'Etat---</option>
      </select>
      <span class="input-group-addon">Etat</span>
    </div>
    <br>
    <div class="input-group">
      <select class="form-control" id="city">
        <option value="">---Sélectionner la ville---</option>
      </select>
      <span class="input-group-addon">Ville</span>
    </div>
  </form>
</div>

</body>
</html>
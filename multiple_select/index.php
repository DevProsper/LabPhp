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
  <h2 class="text-center">Country State City drop down list using ajax in php demo</h2>
  <form>
    <div class="input-group">
      <select class="form-control" id="country">
        <option value="">---Select Country---</option>
        <?php $result = $conn->query("SELECT * FROM country");
            while ($row = $result->fetch_assoc()){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
            <?php } ?>
      </select>
      <span class="input-group-addon">Country</span>
    </div>
    <br>
    <div class="input-group">
      <select class="form-control" id="state">
        <option value="">---Select State---</option>
      </select>
      <span class="input-group-addon">State</span>
    </div>
    <br>
    <div class="input-group">
      <select class="form-control" id="city">
        <option value="">---Select City---</option>
      </select>
      <span class="input-group-addon">City  </span>
    </div>
  </form>
</div>

</body>
</html>
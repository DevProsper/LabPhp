<?php 
require_once('config.php');
session_start(); 

if($result = $conn->prepare("SELECT * FROM technology where id=?") or die($conn->connect_errno))
{
    // Bind the variables to the parameter as strings.
    $result->bind_param('s', $_GET['id']);

    // Execute the prepared statement.
    $result->execute();

    // Gets a result set from a prepared statement.
    $result = $result->get_result();

    // Fetch the table data.
    $row = $result->fetch_assoc();

    $technology = explode(',', $row['technology_name']);
}
?>
<html>  
<body>  
   <?php 
      if (isset($_SESSION['msg'])) {
         echo $_SESSION['msg'];
      } 
   ?>
   <form action="update_technology.php" method="post">   
      <table border="1">  
         <tr>  
            <td colspan="2">Select Technolgy:</td>  
         </tr>  
         <tr>  
            <td>PHP</td>  
            <td>
                <input type="checkbox" name="technology[]" value="PHP" <?php foreach($technology as $key => $value){ if($value == "PHP") { echo "checked";} } ?>
                >
            </td>  
         </tr>  
         <tr>  
            <td>Java</td>  
            <td><input type="checkbox" name="technology[]" value="Java" <?php foreach($technology as $key => $value){ if($value == "Java") { echo "checked";} } ?>
            >
        </td>  
         </tr>  
         <tr>  
            <td>.net</td>  
            <td><input type="checkbox" name="technology[]" value="net" <?php foreach($technology as $key => $value){ if($value == "net") { echo "checked";} } ?>
            >
        </td>  
         </tr>  
         <tr>  
            <td>Androiad</td>  
            <td><input type="checkbox" name="technology[]" value="Androiad" <?php foreach($technology as $key => $value){ if($value == "Androiad") { echo "checked";} } ?>
            >
        </td>  
         </tr>  
         <tr>  
            <td colspan="2" align="center">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Update" name="submit">
            </td>  
         </tr>  
      </table>   
   </form>
</body>  
</html>
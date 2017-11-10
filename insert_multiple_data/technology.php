<?php 
require_once('config.php');
session_start(); 
?>
<html>  
<body>  
    <?php 
      if (isset($_SESSION['msg'])) {
         echo $_SESSION['msg'];
      } 
    ?>
    <form action="add_technology.php" method="post">   
      <table border="1">  
         <tr>  
            <td colspan="2">Select Technolgy:</td>  
         </tr>  
         <tr>  
            <td>PHP</td>  
            <td><input type="checkbox" name="technology[]" value="PHP"></td>  
         </tr>  
         <tr>  
            <td>Java</td>  
            <td><input type="checkbox" name="technology[]" value="Java"></td>  
         </tr>  
         <tr>  
            <td>.net</td>  
            <td><input type="checkbox" name="technology[]" value="net"></td>  
         </tr>  
         <tr>  
            <td>Androiad</td>  
            <td><input type="checkbox" name="technology[]" value="Androiad"></td>  
         </tr>  
         <tr>  
            <td colspan="2" align="center"><input type="submit" value="submit" name="submit"></td>  
         </tr>  
      </table>   
    </form>
    <table border="1" width="100%">
      <tr>
         <th>Id</th>
         <th>Technology Name</th>
         <th>Action</th>
      </tr>
      <?php
            $result = $conn->query("SELECT * FROM technology");
            if(!$result->num_rows > 0){ echo 'No Data Faund'; }
            while($row = $result->fetch_assoc())
            {
         ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['technology_name']; ?></td>
               <td><a href="show.php?id=<?php echo $row['id']; ?>">show</a></td>
            </tr>
      <?php } ?>
    </table>
</body>  
</html>
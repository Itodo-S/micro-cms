
<?php
  include("includes/db_connection.php");
  include("includes/functions.php");

  //CATEGORY
$submit_action = "submit_category";
$form_action = "index.php";

if(isset($_POST['submit_category'])){
    $category = ($_POST['ddlcategory']);
    
    $sql = "INSERT INTO categories  VALUES(null, '$category')";
    $result =  mysqli_query($conn, $sql);

    if(!$result){
        die("ERROR OCCURED! ". mysqli_error($conn));
    }else{
        
    }
}

//INSERT
$submit_action = "btnSubmit";
$form_action = "index.php";


    if(isset($_POST['btnSubmit'])){
        $category = sanitize_data($_POST['ddlcategory']);

        $sql = "INSERT INTO categories  VALUES(null, '$category')";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            die("ERROR OCCURED! ". mysqli_error($conn));
            
        }else {
          
        }

    }


    

//UPDATE
 $category = '';


if(isset($_GET['id'])){
    $id = sanitize_data($_GET['id']);

    $submit_action = "submit_update";
    $form_action = "index.php?id=$id";

  
    $sql = "SELECT * FROM categories WHERE id = '$id'";

    $update_result = mysqli_query($conn, $sql);

    if (!$update_result) {
        exit('Error occured');
    }else{
        while ($row = mysqli_fetch_assoc($update_result)) {
            $category = $row['name'];
           

        }
    }
}

if(isset($_POST['submit_update'])){
    $category = sanitize_data($_POST['ddlcategory']);

    $id = sanitize_data($_GET['id']);

    $sql = "UPDATE categories SET `name`= '$category' WHERE id = '$id'";
    
    $update_result = mysqli_query($conn, $sql);


    if(!$update_result){
        die("ERROR OCCURED! ". mysqli_error($conn));
    }else{
        
        header("Location: index.php");
    }

}
    


    
    //DELETE


    if(isset($_GET['del'])){
        $id = $_GET['del'];
        
    $form_action = "index.php?del=$id";
    $submit_action = "delete";
        $sql="DELETE FROM categories WHERE id =$id";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIES</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
</head>
<body>
    <form action="<?php echo $form_action?>" method="post">
        <input type="text" value="<?php echo $category;?>" name="ddlcategory" placeholder="New Category" required autofocus>
        <button type="submit" name="<?php  echo $submit_action;?>">ADD NEW</button>
    
    </form> <br><br>
    
    <table class="table">
         <thead>
             <tr>
                 <th>SN</th>
                 <th>CATEGORIES</th>
                 <th>ACTION</th>
             </tr>
         </thead>
         <tbody class="">
           
     <?php 
                
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($conn, $sql);
            
                if(!$result){
                    die("ERROR OCCURED!");
                }else{
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($result)) {

                        // $category_id = $row['name'];

                        // $sql = "SELECT * FROM categories WHERE id = $category_id";
                        // $result = mysqli_query($conn, $sql);
                        // while($category_row = mysqli_fetch_assoc($result)){
                        //     $category = $category_row['name'];
                        // }
                        

                        echo '<tr>
                                <td>'.$sn.'</td>
                                <td>'.$row['name'].'</td>                                
                               

                                
                                <td>
                                    <a href="index.php?id='.$row['id'].'">EDIT</a>
                                    <a href="index.php?del='.$row['id'].'" style="color:red;">DELETE</a>
                                </td>
                            </tr>';

                            $sn++;
                    }
                }
            
            
            ?>
         </tbody>
     </table>
     
</body>
</html>




     

<?php
  include("includes/db_connection.php");
  include("includes/functions.php");

  //CATEGORY
$submit_action = "submit_category";
$form_action = "index.php";

if(isset($_POST['submit_category'])){
    $state = ($_POST['ddlstate']);
    
    $sql = "INSERT INTO posts (`image`, body, category_id, author_id) VALUES(null, '$body', '$state','$authur')";
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
        $body = sanitize_data($_POST['txtBody']);
        $category = sanitize_data($_POST['ddlcategory']);
        $authur = sanitize_data($_POST['txtAuthur']);

        $sql = "INSERT INTO posts (image, body, category_id, author_id) VALUES ( null, '$body', '$category', '$authur')";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            die("ERROR OCCURED! ". mysqli_error($conn));
            
        }else {
          
        }

    }


    

//UPDATE

$body = $category = $authur = '';


if(isset($_GET['id'])){
    $id = sanitize_data($_GET['id']);

    $submit_action = "submit_update";
    $form_action = "index.php?id=$id";

  
    $sql = "SELECT * FROM posts WHERE id = '$id'";

    $update_result = mysqli_query($conn, $sql);

    if (!$update_result) {
        exit('Error occured');
    }else{
        while ($row = mysqli_fetch_assoc($update_result)) {
            $body = $row['body'];
            $category = $row['category_id'];
            $authur = $row['author_id'];
           

        }
    }
}

if(isset($_POST['submit_update'])){
    $body = sanitize_data($_POST['txtBody']);
    $category = sanitize_data($_POST['ddlcategory']);
    $authur = sanitize_data($_POST['txtAuthur']);

    $id = sanitize_data($_GET['id']);

    $sql = "UPDATE posts SET body = '$body', category_id = '$category', author_id = '$authur' WHERE id = '$id'";
    
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
        $sql="DELETE FROM posts WHERE id =$id";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
</head>
<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      ADD NEW
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD NEW POST</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $form_action?>" method="post">
                        <input type="text" value ="<?php echo $body;?>" name='txtBody' placeholder='Type Post' required>
                        <select name="ddlcategory"  required>
                <option value = "">CATEGORIES</option>
                <?php       
                      
                      $sql = "SELECT * FROM categories";
                      $result = mysqli_query($conn, $sql);
                  
                      if(!$result){
                          die("ERROR OCCURED!");
                      }else{
                      
                          while ($row = mysqli_fetch_assoc($result)) {
                        
                              echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                          }
                      }
                ?>
            </select>    
                        <input type="text" value ="<?php echo $authur;?>" name='txtAuthur' placeholder='Post Authur' required>
                        <!-- <input type="image" name='imgProduct' placeholder='Product image' required> -->
                        

                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="<?php  echo $submit_action;?>"  class="btn btn-primary">ADD</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>IMAGE</th>
                <th>BODY</th>
                <th>CATEGORY</th>
                <th>AUTHUR</th>
                <th>DATE CREATED</th>
                <th>ACTION</th>

            </tr>
        </thead>
        <tbody>

        <?php 
                
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sql);
            
                if(!$result){
                    die("ERROR OCCURED!");
                }else{
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($result)) {

                        $category_id = $row['category_id'];

                        $sql = "SELECT * FROM categories WHERE id = $category_id";
                        $results = mysqli_query($conn, $sql);
                        while($category_row = mysqli_fetch_assoc($results)){
                            $category = $category_row['name'];
                        }
                        

                        echo '<tr>
                                <td>'.$sn.'</td>
                                <td>'.$row['image'].'</td>
                                <td>'.$row['body'].'</td>
                                <td>'.$category.'</td>                                
                                <td>'.$row['author_id'].'</td>
                                <td>'.$row['created_at'].'</td>

                                
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
<?php include('../includes/admin_header.php') ?>    
<?php include('../includes/admin_sidemenu.php') ?> 
<?php include("../includes/db_connection.php")?>
<?php include("../includes/functions.php")?>




<?php
    // print_r($_SESSION); exit();
    if(isset($_POST['btnSubmit'])){
        $title=  sanitize_data($_POST['txtTitle']);
        $body=  sanitize_data($_POST['txtBody']);
        $category=  sanitize_data($_POST['ddlCategory']);
        // $img = sanitize_data($_POST['image']);
        $author = $_SESSION['logged_in'];


        //UPLOAD IMAGES

                        
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $temp_location = $_FILES['image']['tmp_name'];
            $error= $_FILES['image']['error'];
            $upload_path="uploads/";

            if(empty( $file_name)){
                $img = "no-image-e.png";
            }
                elseif ($file_size > 1000000000) {
                exit("File too, large please upload only file lower than 1MB");
            }
            else{
                $file_extension = explode(".",$file_name );

                $permited_extentions = ["jpg","png","gif","jpeg"];


                if (!in_array(strtolower($file_extension[1]), $permited_extentions)) {
                    exit("Unsupported File type");
                }else{
                    $new_file_name = uniqid();

                    $new_file_name = $upload_path.$new_file_name.".".strtolower($file_extension [1]);

                    // exit($new_file_name);
                    move_uploaded_file($temp_location, $new_file_name);
                    // echo "Image uploaded successfully!";
                }
            }




        $sql = " INSERT INTO posts (`image`, title, body, category_id, author_id) VALUES ('$new_file_name','$title', '$body', '$category', '$author')";

        $result = mysqli_query ($conn, $sql);

        if(!$result){
            die("ERROR OCCURED" . mysqli_error($conn));
        }else{
            // while($row = mysqli_fetch_assoc($result)){

            // }
        }



    }

    // DELETE

    
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        
    $form_action = "posts.php?del=$id";
    $submit_action = "delete";
        $sql="DELETE FROM posts WHERE id =$id";
        $result = mysqli_query($conn, $sql);
        // header("Location: posts.php");

    }



    // print_r($_FILES['image']);
    // exit();
?>



<!-- <div class="row"> -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">POSTS</h4>
            <!-- <code>.table</code> -->
            <p class="card-description">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                    <i class="icon-plus"></i>
                    ADD NEW
                </button>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th><strong>S/N</strong></th>
                    <th><strong>IMAGE</strong></th>
                    <th><strong>TITLE</strong></th>
                    <th><strong>CONTENT</strong></th>
                    <th><strong>CATEGORY</strong></th>
                    <th><strong>AUTHOR</strong></th>
                    <th><strong>DATE</strong></th>
                    <th><strong>ACTION</strong></th>

                </tr>
                </thead>
                <tbody>
                    <?php
                        // $author="";
                        // $img="";

                        $sql= "SELECT * FROM posts";
                        $result = mysqli_query($conn, $sql);
                        $sn=1;

                        while($row = mysqli_fetch_assoc($result)){

                            $category_id = $row['category_id'];

                        $catsql = "SELECT * FROM categories WHERE id = '$category_id'";
                        $catresults = mysqli_query($conn, $catsql);
                        while($category_row = mysqli_fetch_assoc($catresults)){
                            $category = $category_row['name'];
                        }


                        // $author_id = $row['author_id'];

                        // $auth_sql = "SELECT * FROM users WHERE id = '$author_id'";
                        // $auth_results = mysqli_query($conn, $auth_sql);
                        
                        //     while($author_row = mysqli_fetch_assoc($auth_results)){

                        //         $author =  $author_row['username'];
                            
                        // }


                                //Author Query
                                $author_id = $row['author_id'];

                                $auth_sql = "SELECT * FROM users WHERE id = '$author_id'";
                                $auth_results = mysqli_query($conn, $auth_sql);
                                
                                if(empty($row['first_name'])){
                                    while($author_row = mysqli_fetch_assoc($auth_results)){

                                        $author = $author_row['username'];
                                        

                                    }
                                    }else{
                                        echo "we don reach here";
                                        exit();
                                        while($author_row = mysqli_fetch_assoc($auth_results)){
                                            $author =  $author_row['first_name'].$author_row['last_name'];

                                        }
 
                                    }
                              


                                  //Image Query
                                if(empty($row["image"])){
                                    $img ="no-image-e.png";
                                } else{
                                    $img = $row['image'];
                                }
 
                            echo '  <tr>
                                        <td>'.$sn.'</td>
                                        <td><img src="'.$img.'" ></td>                    
                                        <td>'.$row['title'].'</td>
                                        <td>'.$row['body'].'</td>
                                        <td>'.$category.'</td>
                                        <td>'.$author.'</td>
                                        <td>'.$row['created_at'].'</td>
                                        <td>
                                            <a href="posts.php?id='.$row['id'].'" class = "btn btn-primary btn-sm "><i class="icon-pencil"></i>EDIT</a>
                                            <a href="posts.php?del='.$row['id'].'" class = "btn btn-danger btn-sm"><i class="icon-trash"></i>DELETE</a>
                                        </td>
                                    </tr>';
                        $sn++;

                        }

                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<!-- </div> -->




<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="posts.php" method="post" enctype = "multipart/form-data">
                   
                    <input type="text" name="txtTitle" placeholder="Post Title" required><br><br>
                   
                    <input id="" type="file" name = "image"><br><br>
                   
                    <select name="ddlCategory" id="" required>
                        <option value="">Categories</option>
                        
                        <?php

                            $sql= "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)){
                                echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
                            }

                        ?>
                    </select><br><br>

                    <textarea name="txtBody" id="" rows="5" placeholder="Post content"></textarea><br><br>

                     <button type="submit" name="btnSubmit" class="btn btn-primary btn-sm">Create Post</button>

                
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?php include('../includes/admin_footer.php') ?>    
              



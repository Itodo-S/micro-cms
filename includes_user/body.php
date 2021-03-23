
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
			    			<div class="col-md-12">
                                <?php

                                        
                                        $title = $image = $cartegory = $body = $author = $date = "";
                                        // $title = $_GET['id'];
                                        $sql = "SELECT * FROM posts";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_assoc($result)){
                                                $image = $row['image'];
                                                $title = $row['title'];
                                                $id = $row['id'];
                                                $body = $row['body'];
                                                // $author = $row['author_id'];

                                                
                                                //cart 
                                                $cart = $row['category_id'];
                                                $ddlcart_query = "SELECT * FROM categories 	WHERE id = '$cart'";
                                                $ddlcart_result = mysqli_query($conn, $ddlcart_query);

                                                while ($ddlcart_row = mysqli_fetch_assoc($ddlcart_result)){
                                                  $category = $ddlcart_row['name'];

												                        }
												
                                                //AUTHOR
                                                $auth = $row['author_id'];
                                                $ddlauth_query = "SELECT * FROM users 	WHERE id = '$auth'";
                                                $ddlauth_result = mysqli_query($conn, $ddlauth_query);

                                                while ($ddlauth_row = mysqli_fetch_assoc($ddlauth_result)){
                                                    $author = $ddlauth_row['username'];
                                                }
                                              

                                                 // this was grabed from the top
                                                $date = $row['created_at'];
                                              
                                                  //comment counter
                                              $query = "SELECT * FROM comments WHERE post_id = '$id'";
                                              $results = mysqli_query($conn, $query);
                                              $comment = mysqli_num_rows($results);
                                                
                                    echo '  <div class="blog-entry ftco-animate d-md-flex">
                                                <a href="single.php?read='.$row['id'].'"><img class="img img-2" src="admin/'.$image.'"></a>
                                                <div class="text text-2 pl-md-4">
                                                    <h3 class="mb-2"><a href="single.php?read='.$row['id'].'">'.$title.'</a></h3>
                                                    <div class="meta-wrap">
                                                        <p class="meta">
                                                            <span><i class="icon-calendar mr-2"></i>'.$date.'</span>
                                                            <span><a  href="category.php?category='.$row['id'].'"><i class="icon-folder-o mr-2"></i>'.$category.'</a></span>
                                                            <span><a href="single.php?read='.$row['id'].'"><i class="icon-comment2 mr-2"></i>'.$comment.' Comment</a></span>
                                                        </p>
                                                    </div>
                                                    <p class="mb-4">'.$body.'</p>
                                                    <p><a href="single.php?read='.$row['id'].'" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                                                </div>
                                            </div>  ';
                                            }
                                ?>
                            
                            
                                             </div>
								
			    		</div><!-- END-->
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
			                <li><a href="#">&lt;</a></li>
			                <li class="active"><span>1</span></li>
			                <li><a href="#">2</a></li>
			                <li><a href="#">3</a></li>
			                <li><a href="#">4</a></li>
			                <li><a href="#">5</a></li>
			                <li><a href="#">&gt;</a></li>
			              </ul>
			            </div>
			          </div>
			        </div>
                    </div>
                   
	    			

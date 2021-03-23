<?php include("./includes/db_connection.php")?>
<?php include("./includes/functions.php")?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Andrea - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="fashion.php">Fashion</a></li>
					<li class="colorlib-active"><a href="category.php">Travel</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Rocket<span>wares</span></a></h1>
				<div class="mb-4">
					<h3>Subscribe for newsletter</h3>
					<form action="#" class="colorlib-subscribe-form">
            <div class="form-group d-flex">
            	<div class="icon"><span class="icon-paper-plane"></span></div>
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
          </form>
				</div>
				<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
                            <?php

                                $title = $image = $cartegory = $body = $author = $date = "";
								// $title = $_GET['id'];
								if(isset($_GET['related'])){
									$id = $_GET['related'];
                                    $sql = "SELECT * FROM posts WHERE id = '$id' ";
                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)){
                                        $image = $row['images'];
                                        $title = $row['title'];
                                        $body = $row['body'];

                                        //cart 
                                        $cart = $row['category_id'];
                                        $ddlcart_query = "SELECT * FROM categories 	WHERE id = '$cart'";
                                        $ddlcart_result = mysqli_query($conn, $ddlcart_query);

                                        while ($ddlcart_row = mysqli_fetch_assoc($ddlcart_result)){
                                            $category = $ddlcart_row['name'];
                                        }
                                        // $cart = $row['category_id'];

                                        
                                        $date = $row['created_at'];
										// $author = $row['author_id'];
										
						  $auth = $row['author_id'];
						  $query = "SELECT * FROM users WHERE id ='$auth'";
						  $auth_result = mysqli_query($conn, $query);
						  while($auth_row = mysqli_fetch_assoc($auth_result)){
							  $author = $auth_row['user_name'];
						  }
        
                                echo '<h1 class="mb-3">'.$title.'</h1>
                                <p>'.$body.'</p>
                                <p>
                                  <img src="admin/'.$image.'" alt="" class="img-fluid">
                                </p>
								<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
									
								<h4 ><strong style="color:black;"> <i class ="icon icon-user">'.$author.'</i></strong></h4>';
								
								
								}
							}

                            ?>
	    					
		            
		            <div class="tag-widget post-tag-container mb-5 mt-5">
		              <div class="tagcloud">
		                <a href="#" class="tag-cloud-link">Life</a>
		                <a href="#" class="tag-cloud-link">Sport</a>
		                <a href="#" class="tag-cloud-link">Tech</a>
		                <a href="#" class="tag-cloud-link">Travel</a>
		              </div>
		            </div>
		            
		            <div class="about-author d-flex p-4 bg-light">
		              <div class="bio mr-5">
		                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
		              </div>
		              <div class="desc">
		                <h3>George Washington</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
		              </div>
		            </div>


		            <div class="pt-5 mt-5">
		              <h3 class="mb-5 font-weight-bold">6 Comments</h3>
		              <ul class="comment-list">
		                <li class="comment">
		                  <div class="vcard bio">
		                    <img src="images/person_1.jpg" alt="Image placeholder">
		                  </div>
		                  <div class="comment-body">
		                    <h3>John Doe</h3>
		                    <div class="meta">October 03, 2018 at 2:21pm</div>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                    <p><a href="#" class="reply">Reply</a></p>
		                  </div>
		                </li>

		                <li class="comment">
		                  <div class="vcard bio">
		                    <img src="images/person_1.jpg" alt="Image placeholder">
		                  </div>
		                  <div class="comment-body">
		                    <h3>John Doe</h3>
		                    <div class="meta">October 03, 2018 at 2:21pm</div>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                    <p><a href="#" class="reply">Reply</a></p>
		                  </div>

		                  <ul class="children">
		                    <li class="comment">
		                      <div class="vcard bio">
		                        <img src="images/person_1.jpg" alt="Image placeholder">
		                      </div>
		                      <div class="comment-body">
		                        <h3>John Doe</h3>
		                        <div class="meta">October 03, 2018 at 2:21pm</div>
		                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                        <p><a href="#" class="reply">Reply</a></p>
		                      </div>


		                      <ul class="children">
		                        <li class="comment">
		                          <div class="vcard bio">
		                            <img src="images/person_1.jpg" alt="Image placeholder">
		                          </div>
		                          <div class="comment-body">
		                            <h3>John Doe</h3>
		                            <div class="meta">October 03, 2018 at 2:21pm</div>
		                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                            <p><a href="#" class="reply">Reply</a></p>
		                          </div>

		                            <ul class="children">
		                              <li class="comment">
		                                <div class="vcard bio">
		                                  <img src="images/person_1.jpg" alt="Image placeholder">
		                                </div>
		                                <div class="comment-body">
		                                  <h3>John Doe</h3>
		                                  <div class="meta">October 03, 2018 at 2:21pm</div>
		                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                                  <p><a href="#" class="reply">Reply</a></p>
		                                </div>
		                              </li>
		                            </ul>
		                        </li>
		                      </ul>
		                    </li>
		                  </ul>
		                </li>

		                <li class="comment">
		                  <div class="vcard bio">
		                    <img src="images/person_1.jpg" alt="Image placeholder">
		                  </div>
		                  <div class="comment-body">
		                    <h3>John Doe</h3>
		                    <div class="meta">October 03, 2018 at 2:21pm</div>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                    <p><a href="#" class="reply">Reply</a></p>
		                  </div>
		                </li>
		              </ul>
		              <!-- END comment-list -->
		              
		              <div class="comment-form-wrap pt-5">
		                <h3 class="mb-5">Leave a comment</h3>
		                <form action="#" class="p-3 p-md-5 bg-light">
		                  <div class="form-group">
		                    <label for="name">Name *</label>
		                    <input type="text" class="form-control" id="name">
		                  </div>
		                  <div class="form-group">
		                    <label for="email">Email *</label>
		                    <input type="email" class="form-control" id="email">
		                  </div>
		                  <div class="form-group">
		                    <label for="website">Website</label>
		                    <input type="url" class="form-control" id="website">
		                  </div>

		                  <div class="form-group">
		                    <label for="message">Message</label>
		                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
		                  </div>
		                  <div class="form-group">
		                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
		              </div>
		            </div>
			    		</div><!-- END-->
			    	</div>
	    			<div class="col-lg-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Categories</h3>
                    <?php
						
						$group_sql="SELECT * FROM categories ";
                        $group_result = mysqli_query($conn, $group_sql);
							while($group_row =mysqli_fetch_assoc($group_result)){
							$group=$group_row['name'];

							
						$id=$group_row['id'];

						$sql =  "SELECT * FROM posts WHERE category_id = '$id' ";
						$result = mysqli_query($conn, $sql);

						$count = mysqli_num_rows($result);
						
							
							echo '<ul class="categories">
									<li><a href="category.php?category='.$group_row['id'].'">'.$group.'<span>'.$count.'</span></a></li>
								</ul>';
							
					
				}

                        ?>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Related Articles</h3>
				  <?php
					$sql = "SELECT * FROM posts WHERE category_id LIKE '$cart'";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)){
						$img = $row['images'];
						$title = $row['title'];
						$date = $row['created_at'];

						$auth = $row['author_id'];
						$query = "SELECT * FROM users WHERE id ='$auth'";
						$auth_result = mysqli_query($conn, $query);
						while($auth_row = mysqli_fetch_assoc($auth_result)){
							$author = $auth_row['user_name'];
						}


					
	             	echo ' <div class="block-21 mb-4 d-flex">
					 <a  href="related.php?related='.$row['id'].'" class="blog-img mr-4"><img class="img-fluid" src= "admin/'.$img.'"></a>
					 <div class="text">
					   <h3 class="heading"><a href="related.php?related='.$row['id'].'">'.$title.'</a></h3>
					   <div class="meta">
						 <div><a href="#"><span class="icon-calendar"></span>&nbsp;'. $date.'</a></div>
						 <div><a href="about.php"><span class="icon-person"></span>&nbsp;'.$author.'</a></div>
						 <div><a href="#"><span class="icon-chat"></span> 19</a></div>
					   </div>
					 </div>
				   </div>';
				}
				

				
					
				  ?>
	            </div>
	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Tag Cloud</h3>
	              <ul class="tagcloud">
	                <a href="#" class="tag-cloud-link">animals</a>
	                <a href="#" class="tag-cloud-link">human</a>
	                <a href="#" class="tag-cloud-link">people</a>
	                <a href="#" class="tag-cloud-link">cat</a>
	                <a href="#" class="tag-cloud-link">dog</a>
	                <a href="#" class="tag-cloud-link">nature</a>
	                <a href="#" class="tag-cloud-link">leaves</a>
	                <a href="#" class="tag-cloud-link">food</a>
	              </ul>
	            </div>

							<div class="sidebar-box subs-wrap img" style="background-image: url(images/bg_1.jpg);">
								<div class="overlay"></div>
								<h3 class="mb-4 sidebar-heading">Newsletter</h3>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
	              <form action="#" class="subscribe-form">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Email Address">
	                  <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
	                </div>
	              </form>
	            </div>

	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Archives</h3>
	              <ul class="categories">
	              	<li><a href="#">December 2018 <span>(10)</span></a></li>
	                <li><a href="#">September 2018 <span>(6)</span></a></li>
	                <li><a href="#">August 2018 <span>(8)</span></a></li>
	                <li><a href="#">July 2018 <span>(2)</span></a></li>
	                <li><a href="#">June 2018 <span>(7)</span></a></li>
	                <li><a href="#">May 2018 <span>(5)</span></a></li>
	              </ul>
	            </div>


	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Paragraph</h3>
	              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
	            </div>
	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
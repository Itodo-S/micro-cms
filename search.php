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
					<li class="colorlib-active"><a href="index.html">Home</a></li>
					<li><a href="fashion.html">Fashion</a></li>
					<li><a href="travel.html">Travel</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Rocket<span>Wares</span></a></h1>
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
                                                // $cart = $row['category_id'];

                                                
                                                $date = $row['created_at'];
                                                // $author = $row['author_id'];
                                                
                                    echo '  <div class="blog-entry ftco-animate d-md-flex">
                                                <a href="single.php?read='.$row['id'].'"><img class="img img-2" src="admin/'.$image.'"></a>
                                                <div class="text text-2 pl-md-4">
                                                    <h3 class="mb-2"><a href="single.php?read='.$row['id'].'">'.$title.'</a></h3>
                                                    <div class="meta-wrap">
                                                        <p class="meta">
                                                            <span><i class="icon-calendar mr-2"></i>'.$date.'</span>
                                                            <span><a href="single.php?read='.$row['id'].'"><i class="icon-folder-o mr-2"></i>'.$category.'</a></span>
                                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
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
                   
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="search.php" method="post" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" name="txtSearch" placeholder="Type a keyword and hit enter">
                      <button type="submit" name= "btnSearch">SEARCH</button>
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box ftco-animate">
                    <h3 class="sidebar-heading">Categories</h3>

					<?php
					
					// $count =  get_category_id_number();
					// echo $count;

					


					?>

                    <?php
                        
                        if(isset($_POST['btnSearch'])){
                            $input= $_POST['txtSearch'];

                            $sql = "SELECT * FROM categories WHERE `name` LIKE '$input%' OR `name` LIKE '%$input%' OR `name` LIKE '%$input'";
                            $result = mysqli_query($conn, $sql);

                            while($group_row =mysqli_fetch_assoc($result)){
                                $group=$group_row['name'];
                                $id=$group_row['id'];
    
                                $query =  "SELECT * FROM posts WHERE category_id = '$id' ";
                                $results = mysqli_query($conn, $query);
    
                                $count = mysqli_num_rows($results);
                                
    
                            
    
                            echo '<ul class="categories">
                                     <li><a href="category.php?category='.$group_row['id'].'">'.$group.'<span>('.($count).')</span></a></li>
                                  </ul>';
                        }
                        }
					
						// if($result){
						// 		$count = mysqli_num_fields ($result);
							
						// }
					


							echo "<hr/>";
                        $group_sql="SELECT * FROM categories";
                        $group_result = mysqli_query($conn, $group_sql);
                        while($group_row =mysqli_fetch_assoc($group_result)){
							$group=$group_row['name'];
							$id=$group_row['id'];

							$sql =  "SELECT * FROM posts WHERE category_id = '$id' ";
							$result = mysqli_query($conn, $sql);

							$count = mysqli_num_rows($result);
							

						

                        echo '<ul class="categories">
                                 <li><a href="category.php?category='.$group_row['id'].'">'.$group.'<span>('.($count).')</span></a></li>
                              </ul>';
                    }

                    ?>
	              
	            </div>
	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Popular Articles</h3>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(admin/uploads/5f6a13ae74b26.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $date; ?></a></div>
	                    <div><a href="#"><span class="icon-person"></span> <?php echo $author; ?></a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
                  </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(admin/uploads/5f6a146d1c719.jpeg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $date; ?></a></div>
	                    <div><a href="#"><span class="icon-person"></span><?php echo $author; ?></a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(admin/uploads/5f6b195acf4f1.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $date; ?></a></div>
	                    <div><a href="#"><span class="icon-person"></span> <?php echo $author; ?></a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
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

							<div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
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
	              	<li><a href="#">Decob14 2018 <span>(10)</span></a></li>
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
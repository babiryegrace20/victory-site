<?php #include_once('header.php'); 
  include '../Private/initialise.php';
  include SHARED_PATH.'/header.php';
?>

	<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <center>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<!-- <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->

      <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->

        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
              <img src="image/slidee.jpg" id="carouselImg">
               <div class="carousel-caption">
                      <p>
                      <h2>VICTORY EDUCATION<span>FOUNDATION</span></h2>
                      <p>we believe in creativity and skills</p>
                      <i class="fa fa-apple"></i>
                      <i class="fa fa-android"></i>
                      <i class="fa fa-windows"></i>
                      </p>
                </div>
            </div>

            <div class="carousel-item">
              <img src="image/slidee.jpg" id="carouselImg">
                <div class="carousel-caption">
                  <p>
                    <h2> OUR VISION</h2>
                    <b>TO extend the knowledge of agriculture to the citizens, eradicate poverty in the community by encouraging hands on exprience with work.</b><br><br>
                    <a href="" class="btn btn-half"> Get started</a>
                    <a href="" class="btn btn-full"> Buy now</a>
                  </p>
                </div>
            </div>

        </div>


        <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <!-- <span class="glyphicon glyphicon-chevron-left" ></span> -->
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
         <!--    <span class="glyphicon glyphicon-chevron-right" ></span> -->
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
      
    <?php endif ?>
    </center>
</div>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>

<?php include SHARED_PATH.'/footer.php'; ?>

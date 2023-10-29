<?php
include('include/header.php');
include_once('connection.php');

?>

<body>
  <!-- start video background -->
  <div class="container-fluid remove-vid-padding">
    <div class="vid-parent">
      <video playsinline autoplay muted loop>
        <source src="videos/bgvid3.mp4">
      </video>
      <div class="vid-overlay"></div>
      <div class="vid-content">
        <h1 class="my-content">Welcome to School</h1>
        <small class="my-content1">Learn and Emplement</small><br><br>
        <?php
        if (!isset($_SESSION['is_login'])) {
          echo '<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#regModal">Get Started</a>';
        } else {
          echo '<a class="btn btn-success" href="students/student-profile.php">My Profile</a>';
        }
        ?>
      </div>

    </div>
  </div>
  <!-- end video background -->


  <!-- start text banner -->
  <div class="container-fluid bg-danger txt-banner my-2">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fas fa-book-open mr-3" style="padding-right:10px"></i>100% Online Courses</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-user mr-3" style="padding-right:10px"></i>Expert Instructors</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-keyboard mr-3" style="padding-right:10px"></i>Lifetime Access</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-rupee-sign mr-3" style="padding-right:10px"></i>Money Back Guarantee</h5>
      </div>
    </div>
  </div>
  <!-- end text banner -->

  <!-- start Most popular courses -->
  <div class="container text-center">
        <h1 class="text center">Popular Courses</h1>
    <!-- first card deck -->
    <div class="row mx-5">
      <?php
      $sql = "select * from `courses`";
      $res = $con->query($sql);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $courseid = $row['course_id'];
          echo '<div class="col-md-4 mb-2">
          <a class="btn" href="coursedetails.php?course_id=' . $courseid . '">
          <div class="card">
          <img src="' . str_replace('..', '.', $row['course-img']) . '" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">' . $row['course-name'] . '</h5>
            <p class="card-text">' . $row['course-desc'] . '</p>
            </div>
            <div class="card-footer bg-light">
            <p class="card-text d-inline">Price:<small><del>' . $row['course-original-price'] . '</small></del>
            <span class="fw-bolder">' . $row['course-selling-price'] . '</span></p>
            <a class="btn btn-primary float-end text-white fw-bolder" href="coursedetails.php?course_id=' . $courseid . '">Enroll</a>
            </div>
          </div>
      </div>';
        }
      }
      ?>
    </div>
    <!-- end first row -->
    <a class="btn btn-danger mt-5" href="" type="submit" value="">View All Courses</a>
  </div>
  <!-- end first row -->
  <!-- end Most popular courses -->

  <!-- start contact us -->
  <?php
  include('./contact.php');
  ?>
  <!-- end contact us -->


  <!-- start feedback -->
  <div class="container-fluid feedback mt-5 pb-5" style="background-color : #4B7289 ">
    <h1 class="text-center text-white textheading p-4">Student's Feedback</h1>
    <div class="row">

      <div class="col-md-12">
        <div class="owl-carousel owl-theme text-center">
          <?php
          $sql = "select s.stu_name,s.stu_occ,s.stu_image,f.f_content
        from student as s join feedback as f on s.stu_id =f.stu_id ";
          $res = $con->query($sql);
          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              echo ' 
           <div class="item text-white rounded-3 m-2 pb-3 pt-2">
           <p class="description">' . $row['f_content'] . '</p>
           <img src="' . str_replace('..', '.', $row['stu_image']) . '" " class="card-img-top" alt="" style="width: 150px; height: 150px; border-radius: 50%;  display: block;
           margin-left: auto; margin-right: auto; width: 50%;">
           <h6>' . $row['stu_name'] . '</h6>
           <small>' . $row['stu_occ'] . '</small>
         </div>';
            }
          }
          ?>
        </div>
      </div>
    </div>

  </div>



  <!-- <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/guitar (1).jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/guitar (1).jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/guitar (1).jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> -->
  </div>

  <!-- end feedback -->

  <!-- start text banner -->
  <div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fa-brands fa-whatsapp mr-3" style="padding-right:10px"></i><i class="fa-brands fa-facebook mr-3" style="padding-right:10px"></i><i class="fa-brands fa-twitter mr-3" style="padding-right:10px"></i><i class="fa-brands fa-skype mr-3" style="padding-right:10px"></i></h5>
      </div>
      <!-- <div class="col-sm">
        <h5><i class="fa-brands fa-facebook mr-3" style="padding-right:10px"></i></h5>
      </div>
      <div class="col-sm">
        <h5><i class="fa-brands fa-twitter mr-3" style="padding-right:10px"></i></h5>
      </div>
      <div class="col-sm">
        <h5></h5>
      </div> -->
    </div>
  </div>
  <!-- end text banner -->


  <!--start about us  -->
  <div class="container-fluid bg-white">
    <h1 class="text-center textheading p-4">About us</h1>
    <div class="row text-center">
      <div class="col-sm">
        <h3>Address</h3>
      </div>
      <div class="col-sm">
        <h3>Contact us</h3>
      </div>
      <div class="col-sm">
        <h3>Contact us</h3>
      </div>
    </div>
  </div>
  <!--end about us  -->

  <!-- start footer -->
  <?php
  include('include/footer.php');
  ?>
  <!-- end footer -->



  <!-- js bootstrape -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- jquery -->
  <script type="text/javascript" src="js/event.js"></script>
  <!-- fontawsom js -->
  <script src="js/all.min.js"></script>
  <!-- ajax -->
  <script type="text/javascript" src="js/ajaxrequest.js"></script>
  <script type="text/javascript" src="js/adminajaxrequest.js"></script>

  <!-- owl_carousel -->
  <script type="text/javascript" src="js/owl.carousel.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>
</body>

</html>
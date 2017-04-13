<?php
error_reporting(0);
session_start();
$username=$_SESSION['username'];
$fname=$_SESSION['fname'];
?>
<!DOCTYPE html>
<html class="full"  lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NGOOGLE-HELP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/title.ico" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="css/full.css" rel="stylesheet">
    <link href="css/linecons-fonts-style.css" rel="stylesheet">
    <link href="css/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="css/font-awesome-4.6.3/css/font-awesome.min.css">

  </head>

<body>
 <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">NGOOGLE</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#work">OUR WORK</a></li>
        <li><a href="#donate">DONATE<span class="glyphicon glyphicon-heart"></span></a></li>
        <li><a href="#events">EVENTS</a></li>
        <li><a href="#donors">DONORS</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
      <ul class="pull-right nav navbar-nav">
        <?php
       if(!isset($username)){
          echo '<li><a href="#myModal" class="btn btn-default btn-lg" role="button" id="myBtn"><span class="glyphicon glyphicon-log-in">LOGIN</a></li>';
      }
      else{
        echo '<li style="color: white;padding-top:15px; text-transform: uppercase">WELCOME '.$fname.'</li>';
        echo '<li><a href="logout.php" class="btn btn-default btn-lg" role="button" id="myBtn"><span class="glyphicon glyphicon-log-out">LOGOUT</a></li>';
      }
        ?>
      </ul>
      </div>
    </div>
  </nav>
    <!-- Put your page content here! -->

    <!-- jQuery -->
    <div class="container">
  <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog" >
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="loginbox" style="margin-top:50px">
      <div class="panel panel-info" >
        <div class="panel-heading">
          <div class="panel-title">Sign In
          </div>
        </div>     
        <div style="padding-top:30px" class="panel-body" >
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginform" class="form-horizontal" role="form" action="login.php" method="POST">
              <div class="input-group" style="margin-bottom:25px">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email" > 
              </div>
              <div class="input-group" style="margin-bottom:25px">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" type="password" class="form-control" name="password" value="" placeholder="password">
              </div>
              <div  style="margin-top:10px" class="form-group">
                <div class="col-sm-12 controls">
                  <!--<a id="btn-login" href="#" class="btn btn-success">Login</a>-->
                  <!--<input type="submit" name="submit" value="Login">-->
                  <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Login</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12 control">
                  <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >Don't have an account! 
                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()"  style="color:#e62739; font-weight:2px;">Sign Up Here
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      

      <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
         <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">Sign Up
              </div>
              <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()  " style="color:#fff;">Sign In</a>
              </div>
            </div>  
            <div class="panel-body" >
              <form id="signupform" class="form-horizontal" role="form" method="POST" action="signup.php">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                  <p>Error:</p>
                  <span></span>
                </div>
                 <div class="form-group">
                  <label for="username" class="col-md-3 control-label">Username</label>
                  <div class="col-md-9">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-md-3 control-label">Email</label>
                  <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstname" class="col-md-3 control-label">First Name</label>
                  <div class="col-md-9">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-md-3 control-label">Last Name</label>
                  <div class="col-md-9">
                      <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-md-3 control-label">Password</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" name="passwd" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pincode" class="col-md-3 control-label">Pincode</label>
                  <div class="col-md-9">
                      <input type="text" class="form-control" name="pincode" placeholder="Pincode">
                    </div>
                </div>
                <div class="form-group">
                  <label for="icode" class="col-md-3 control-label">Country</label>
                  <div class="col-md-9">
                    <select name="country" class="countries" id="countryId" style="width:inherit; text-align:center;"><option value="">Select Country</option></select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="icode" class="col-md-3 control-label">State</label>
                  <div class="col-md-9">
                    <select name="states" class="states" id="stateId" style="width:inherit; text-align:center;"><option value="">Select State</option></select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="icode" class="col-md-3 control-label">City</label>
                  <div class="col-md-9">
                    <select name="city" class="cities" id="cityId" style="width:inherit; text-align:center;"><option value="">Select City</option></select>
                  </div>
                </div>
                <script src="js/jquery.js"></script>
                <script src="js/country_list.js"></script>
                <div class="form-group">                                        
                    <div class="col-md-offset-3 col-md-9">
                    <!--<input type="submit" name="signup" value="Sign Up">-->
                      <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Sign Up</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="parallax-style">
  <div class="slider-txt-container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="myCarousel" data-slide-to="1"></li>
        <li data-target="myCarousel" data-slide-to="2"></li>
        <li data-target="myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner overlay" role="listbox">
        <div class="item active">
          <h1>We bring the change!!</h1>
          <p class="link">
           <a href="#learnmore" class="btn custom-btn ">Learn More</a>
         </p>
       </div>
      <div class="item">
        <h1>Do you want to help us!??</h1>
        <p class="link">
         <a href="#learnmore" class="btn custom-btn ">Learn More</a>
       </p>
      </div>
      <div class="item">
        <h1>Well, what are you waiting for then!!</h1>
        <p class="link">
       <a href="#learnmore" class="btn custom-btn ">Learn More</a>
        </p>
      </div>
      <div class="item">
        <h1>Signup today!!</h1>
        <p class="link">
        <a href="#learnmore" class="btn custom-btn ">Learn More</a>
        </p>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
</div>


<div class="container-fluid about-section " id="about">
  <h2 class="section-title">About</h2>
  <div class="section-description">NGOOGLE is a non profit website which works to connect willing Donors with NGOs willing to accept donations. All our Donations are in form of things and no money is involved at this stage.
  </div>
  <br>
  <div class="row">
    <div class="content-box col-md-8 slideanim slide">
      <div class="hex content-icon-hex pull-left">
        <div class="content-icon">
          <span aria-hidden="true" class="li_bulb"></span>
        </div>
      </div>
      <h3 class="content-title">Our story</h3>
      <p class="paragraph-content"><strong>A few months ago, in one of the subjects of our third year of engineering college, we were given a project to make a website that would benefit the world and thus, this website was born!</strong>
      </p>
      <p>
      We felt the lack of connection between NGOs and donors. Then we came up with an idea to create this website. Day after day, we recieved many challenges and we worked to overcome them. Now we have a good working model of our original plan.
      </p>
    </div>
    <div class="col-md-4 delay-200 slideanim slide">
      <div id="about-img-carousel" class="about-img-carousel carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#about-img-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#about-img-carousel" data-slide-to="1"></li>
          <li data-target="#about-img-carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/01.jpg" alt="carousel image">
          </div>
          <div class="item">
            <img src="img/02.jpg" alt="carousel image"> 
          </div>
          <div class="item">
            <img src="img/03.jpg" alt="carousel image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container gray-bg">
    <div class="row">
      <div class="col-md-4 from-bottom delay-200">
        <div class="video-container slideanim slide">
          <iframe src="https://www.youtube.com/embed/NrT8wD3xcU0" frameborder="0" allowfullscreen autoplay="false" autostart="false" preload="none"></iframe>
        </div>
      </div>
      <div class="content-box col-md-8 from-bottom delay-600  slideanim slide" id="learnmore">
        <div class="hex content-icon-hex pull-left">
          <div class="content-icon">
            <span aria-hidden="true" class="li_params"></span>
          </div>
        </div>
        <h3 class="content-title">Our Mission</h3>
        <p class="paragraph-content">
          <strong>We dream about a new world for the potential donors to easily be able to donate goods. We are aiming to build a strong and a bouncing platform where anyone can donate things to NGOs easily worldwide.</strong>
        </p>
        <p class="paragraph-content">
          Together, we're going to make the future of the donations easy where we are able to virtually connect any person with any NGO near his residence or even at other places. We have already stepped out and started changing the world.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="work-section" id="work">
  <div class="parallax-overlay work-padding">
    <div class="container">
      <h3 class="work-title">We are very Thankful</h3>

        <?php 
              $conc = mysql_connect("localhost", "root", "", "ngoogle") or die("Connection Error"); 
              $result = mysql_query('SELECT SUM(donations) as total FROM ngoogle.user_id'); 
              $row = mysql_fetch_array($result);
              $sum = $row['total'];
              $progress_sum = $sum%100;
              echo '<p class="work-description">All our generous members have collectively made <br><span class="amount">'.$sum.'</span> donations so far!</p>
                    <div class="progress-bar-container">
                      <div class="progress">
                        <div id="about-progress-1" class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$progress_sum.'%;">
                        <span class="sr-only">60% Complete (warning)</span>
                      </div>
                    </div>';
        ?>
           
      </div>
    </div>
  </div>
</div>

<div class="donate" id="donate" style="padding-bottom: 50px">
  <div class="container" style="padding-top:50px;">
    <h2 class="donate-title">Donate</h2>
    <div class="section-description">WE ALLOW USERS TO HELP FIND NGOs THAT ACCEPT FOOD, BOOKS, CLOTHES, TOYS, MEDICAL EQUIPMENT. ALSO USERS WILLING TO GIVE THEIR TIME ARE GIVEN RESULTS ACCORDINGLY.
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="service-box">
        <div class="hex service-icon-hex">
          <div class="service-icon">
            <span aria-hidden="true" class="glyphicon glyphicon-cutlery" role="button" id="1"></span>
          </div>
        </div>
        <h3 class="service-title content-title">FOOD</h3>
        <p class="service-description">
          This will help you find NGOs that accept leftover food in good condition. 
        </p>
      </div>
    </div>
    <div class="col-md-4 from-bottom delay-600">
      <div class="service-box">
        <div class="hex service-icon-hex">
          <div class="service-icon">
            <span aria-hidden="true" class="glyphicon glyphicon-book" role="button" id="2"></span>
          </div>
        </div>
        <h3 class="service-title content-title">BOOKS</h3>
        <p class="service-description">
          To promote literacy this will help you find NGOs that accept books. All types of books are accepted.
        </p>
      </div>
    </div>

    <div class="col-md-4 from-bottom delay-1000">
      <div class="service-box">
        <div class="hex service-icon-hex">
          <div class="service-icon">
            <span aria-hidden="true" class="fa fa-clock-o" role="button" id="3"></span>
          </div>
        </div>
        <h3 class="service-title content-title">TIME</h3>
        <p class="service-description">
          The users can find NGOs where they can volunteer and help by giving their valuable time.
        </p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="service-box">
        <div class="hex service-icon-hex">
          <div class="service-icon">
            <span aria-hidden="true"><i class="ion-tshirt" role="button" id="4"></i></span>
          </div>
        </div>
        <h3 class="service-title content-title">CLOTHES</h3>
        <p class="service-description">
          Clothing is a basic need for all. This finds you the NGOs that accept clothes. 
        </p>
      </div>
    </div>
    
    <div class="col-md-4 from-bottom delay-600">
      <div class="service-box">
        <div class="hex service-icon-hex">
          <div class="service-icon">
            <span aria-hidden="true"><i class="ion-happy" role="button" id="5"></i></span>
          </div>
        </div>
        <h3 class="service-title content-title">TOYS</h3>
        <p class="service-description">
          Toys are basic needs of children. They promote holistic growth of children. This will help you find the NGOs accepting toys.
        </p>
      </div>
    </div>

    <div class="col-md-4 from-bottom delay-1000">
      <div class="service-box">
        <div class="hex service-icon-hex">
          <div class="service-icon">
            <span aria-hidden="true"><i class="fa fa-wheelchair" role="button" id="6"></i></span>
          </div>
        </div>
        <h3 class="service-title content-title">HEALTH & MOBILITY</h3>
        <p class="service-description">
          Health is Wealth. This will find you NGOs that accept equipment for old age homes.
        </p>

      </div><!-- /.service-box -->
    </div><!-- /.col-md-4 -->
  </div>
</div>



<section id="next-event">
      <div class="next-event  parallax-style" id="events">
        <div class="parallax-overlay section-padding">
          <div class="container">
            <h3 class="parallax-title">
              our next event in
            </h3><!-- /.parallax-title -->
            <div class="row">
              <div id="event_time_countdown" class="next-event-container">

                <div class="col-xs-6 col-sm-3 col-md-3 from-bottom delay-200">
                  <div class="time-circle dash days_dash animated" data-animation="rollIn" data-animation-delay="300">
                    <span class="time-number">
                      <span class="digit">0</span><span class="digit">0</span>
                    </span>
                    <span class="time-name">Days</span>
                  </div><!-- /.time-circle -->
                </div><!-- /.col-md-3 -->

                <div class="col-xs-6 col-sm-3 col-md-3 from-bottom delay-600">
                  <div class="time-circle dash hours_dash animated" data-animation="rollIn" data-animation-delay="600">
                    <span class="time-number">
                      <span class="digit">0</span><span class="digit">0</span>
                    </span>
                    <span class="time-name">Hours</span>
                  </div><!-- /.time-circle -->
                </div><!-- /.col-md-3 -->

                <div class="col-xs-6 col-sm-3 col-md-3 from-bottom delay-1000">
                  <div class="time-circle dash minutes_dash animated" data-animation="rollIn" data-animation-delay="900">
                    <span class="time-number">
                      <span class="digit">0</span><span class="digit">0</span>
                    </span>
                    <span class="time-name">Minutes</span>
                  </div><!-- /.time-circle -->
                </div><!-- /.col-md-3 -->

                <div class="col-xs-6 col-sm-3 col-md-3 from-bottom delay-1400">
                  <div class="time-circle dash seconds_dash animated" data-animation="rollIn" data-animation-delay="1200">
                    <span class="time-number">
                      <span class="digit">0</span><span class="digit">0</span>
                    </span>
                    <span class="time-name">Seconds</span>
                  </div><!-- /.time-circle -->
                </div><!-- /.col-md-3 -->

              </div><!-- /.next-event-container -->

              <p class="event-btn-container">
                <a class="btn custom-btn " href="#">Join Us</a>
              </p>

            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.bg-parallax-overlay -->
      </div><!-- /.parallax-style -->
    </section><!-- /#next-event -->
    <!-- Next Event End --> 


<section id="volunteer">
      <div class="volunteer-section" id="donors" style="padding-top:100px">
        <div class="gray-bg  section-padding">

          <div class="top-angle">
          </div><!-- /.top-angle -->
        <p style="color: #e62739"></p>
          <div class="container">
            <div class="row">
              <div class="section-content">
                <div class="media-content media-left col-md-4 from-bottom delay-200">
                  <div class="meida-container" style="padding-top:50px;">
                    <!--<img src="img/team1.jpg" alt="volunteer"><br>-->
                    <?php
                      $donor_month = mysql_query('SELECT * FROM ngoogle.user_id WHERE donations=(SELECT max(donations) FROM ngoogle.user_id)');
                      $donor = mysql_fetch_array($donor_month);
                      echo '<img src="data:image/jpeg;base64,' . base64_encode( $donor['profile_pic'] ) . '" style="height:200px; width:200px;" /><br>';
                      echo '<p><br><b style="color: #e62739; text-transform:uppercase; font-size:20px">'.$donor["fname"].' '.$donor["lname"].'</b></p>
                            <p><b style="color: #e62739; text-transform:uppercase; font-size:20px">'.$donor["city"].', '.$donor["state"].', '.$donor["country"].'</b></p>
                            <p><b style="color: #e62739; font-size:20px">'.$donor["donations"].' donations</b></p>';
                      ?>
                  </div><!-- /.meida-container -->
                </div><!-- /.media-content -->


                <div class="content-box col-md-8 from-bottom delay-600">
                  <div class="hex content-icon-hex pull-left">
                    <div class="content-icon">
                      <span aria-hidden="true" class="li_user"></span>
                    </div>
                  </div><!-- /.content-icon-hex -->
                  <h3 class="content-title">Donor of the  Month</h3>
                  <p>
                    <strong>Do you like to Donate? Do you feel the helping is a good deed. Yes. Here, you are welcome to use our website.</strong>
                  </p>
                  <p>
                    Each month we will choose a donor of the month. The major criteria for this selection will be the number of donations made in a month. This person will be featured on our website for one entire month!!!! 
                  </p>
                  <p>
                    <a href="#donate" class="btn custom-btn ">
                      Donate Now
                    </a>
                  </p>
                </div><!-- /.content-box -->
              </div><!-- /.section-content -->
            </div><!-- /.row -->
          </div><!-- /.container -->
          <div class="bottom-angle">
          </div><!-- /.bottom-angle -->
        </div><!-- ./gray-bg -->
      </div><!-- /.volunteer-section -->
    </section><!-- /#volunteer -->
    <!-- Volunteer Section End -->




<div id="contact" class="contact-head">
  <h2 class="donate-title">CONTACT</h2>
  <div class="section-description">ALL OF OUR SERVICES ARE CENTRALIZED WITH DONATIONS. YOU CAN FEEL FREE TO CONTACT US ANYTIME. REST ASSURED THAT ALL YOUR QUERIES WILL BE ANSWERED WITHIN A DAY'S TIME.
  </div>
  <div class="contact-body">
    <div class="row">
      <div class="col-md-6">
        <div class="contact-form-container">
          <h3 class="contact-title">
            Drop us a message
          </h3>

          <form class="contact-form" id="contact-form" action="contact.php" method="POST">
            <div class="input-container li_user" style="padding-bottom:20px;">
              <input type="text" class="form-control" name="name_sender" id="name_sender" placeholder="Name" required >
            </div><!-- /.input-container-->

            <div class="input-container li_mail" style="padding-bottom:20px;">
              <input type="email" class="form-control" name="email_sender" id="email_sender" placeholder="Email" required>
            </div><!-- /.input-container -->

            <div class="input-container li_pen" style="padding-bottom:20px;">
              <textarea class="form-control" id="message_sender" name="message_sender" cols="45" placeholder="Message" rows="6"></textarea>
            </div><!-- /.input-container -->

            <button type="submit" class="btn custom-btn" id="send_message" >Submit</button>
          </form><!-- /.contact-form -->

        </div><!-- /.contact-form-container -->
      </div><!-- /.col-md-6 -->

      <div class="col-md-6">
        <div class="contact-info">
          <h3 class="contact-title">
            Contact Info
          </h3>
          <p class="content-description">
            Feel free to contact with us through this platform.
          </p>
          <address> 
            <ul class="contact-address">
              <li class="fa-map-marker">
                Plot No. U-15, J.V.P.D. Scheme, Bhaktivedanta Swami Marg, Vile Parle(West)
              </li>
              <li  class="fa-phone">
                +918097014633, +919969387898
              </li>
              <li class="fa-envelope">
                wehelpyout@gmail.com
              </li>
            </ul><!-- /.contact-address --> 
          </address>
        </div><!-- /.contact-info -->
      </div><!-- /.col-md-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.contact-section -->

</div>



  <div class="modal fade" id="myFood" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DONATE FOOD</h4>
        </div>
        <div class="modal-body">
          <p>Today a lot of people do not get even one proper meal. Thank You for choosing to donate food and feed the unfed!!!.</p>
        </div>
        <?php
         echo'<div class="modal-footer">';
          if (!isset($username)) {
            echo '<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Please Login to Continue</button>';
          }
          else{
            echo'<button class="btn btn-default view_data" type="button" data-toggle="modal" data-target="foodModal" id="11" data-dismiss="modal">find ngo</button>';
          }
          echo'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';
        ?>
      </div>
    </div>
  </div>


  <div class="modal fade" id="myClothes" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DONATE CLOTHES</h4>
        </div>
        <div class="modal-body">
          <p>Food, Clothing and Shelter are the basic needs of a human. Thank You for one less shivering person!</p>
        </div>
        <?php
         echo'<div class="modal-footer">';
          if (!isset($username)) {
            echo '<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Please Login to Continue</button>';
          }
          else{
            echo'<button class="btn btn-default view_data" type="button" data-toggle="modal" data-target="clothesModal" id="14" data-dismiss="modal">find ngo</button>';
          }
          echo'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';
        ?>
        </div>
    </div>
  </div>

  <div class="modal fade" id="myHealth" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DONATE HEALTHCARE AND MOBILITY SERVICES</h4>
        </div>
        <div class="modal-body">
          <p>Old Age homes lack the medical equipment to help our elders. Thank You for choosing to donate equipment for our parents!!.</p>
        </div>
        <?php
         echo'<div class="modal-footer">';
          if (!isset($username)) {
            echo '<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Please Login to Continue</button>';
          }
          else{
            echo'<button class="btn btn-default view_data" type="button" data-toggle="modal" data-target="healthModal" id="16" data-dismiss="modal">find ngo</button>';
          }
          echo'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';
        ?>
      </div>
    </div>
  </div>


  <div class="modal fade" id="myTime" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DONATE TIME</h4>
        </div>
        <div class="modal-body">
          <p>We know what time means. And willing to spend your valuable time for others speaks volumes about your character. Thanks a ton!</p>
        </div>
        <?php
         echo'<div class="modal-footer">';
          if (!isset($username)) {
            echo '<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Please Login to Continue</button>';
          }
          else{
            echo'<button class="btn btn-default view_data" type="button" data-toggle="modal" data-target="timeModal" id="13" data-dismiss="modal">find ngo</button>';
          }
          echo'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';
        ?>
      </div>
    </div>
  </div>


  <div class="modal fade" id="myToys" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DONATE TOYS</h4>
        </div>
        <div class="modal-body">
         <p>Children need to play. And what better than a few toys for them to play with. Thank You for thinking to donate toys!!</p>
        </div>
        <?php
         echo'<div class="modal-footer">';
          if (!isset($username)) {
            echo '<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Please Login to Continue</button>';
          }
          else{
            echo'<button class="btn btn-default view_data" type="button" data-toggle="modal" data-target="toysModal" id="15" data-dismiss="modal">find ngo</button>';
          }
          echo'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';
        ?>
      </div>
    </div>
  </div>


  <div class="modal fade" id="myBooks" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DONATE BOOKS</h4>
        </div>
        <div class="modal-body">
          <p>Education is not a privilege but is a need. Thank You for helping a person read and become literate!!</p>
        </div>
        <?php
         echo'<div class="modal-footer">';
          if (!isset($username)) {
            echo '<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Please Login to Continue</button>';
          }
          else{
            echo'<button class="btn btn-default view_data" type="button" data-toggle="modal" data-target="booksModal" id="12" data-dismiss="modal">find ngo</button>';
          }
          echo'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';
        ?>
      </div>
    </div>
  </div>

  <div class="container">
  <div class="modal fade" id="toysModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">List of NGOs</h4>
        </div>
        <div class="modal-body" id="toysdetail">
        <div id="toyswait" style="display:none;width:32px;height:32px;position:absolute;left:50%;padding:2px;">  <img src='ajax-loading.gif' width="64" height="32" />
        </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
    </div>
  </div>
  </div>
  </div>

  <div class="container">
  <div class="modal fade" id="foodModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">List of NGOs</h4>
        </div>
        <div class="modal-body" id="fooddetail">
          <div id="foodwait" style="display:none;width:32px;height:32px;position:absolute;left:50%;padding:2px;">  <img src='ajax-loading.gif' width="64" height="32" />
        </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  </div>


  <div class="container">
  <div class="modal fade" id="booksModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close">&times;</button>
          <h4 class="modal-title">List of NGOs</h4>
        </div>
        <div class="modal-body" id="booksdetail">
          <div id="bookswait" style="display:none;width:32px;height:32px;position:absolute;left:50%;padding:2px;">  <img src='ajax-loading.gif' width="64" height="32" />
        </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
  <div class="modal fade" id="timeModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">List of NGOs</h4>
        </div>
        <div class="modal-body" id="timedetail">
          <div id="timewait" style="display:none;width:32px;height:32px;position:absolute;left:50%;padding:2px;">  <img src='ajax-loading.gif' width="64" height="32" />
          </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
  <div class="modal fade" id="clothesModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">List of NGOs</h4>
        </div>
        <div class="modal-body" id="clothesdetail">
          <div id="clotheswait" style="display:none;width:32px;height:32px;position:absolute;left:50%;padding:2px;">  <img src='ajax-loading.gif' width="64" height="32" />
          </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
  <div class="modal fade" id="healthModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">List of NGOs</h4>
        </div>
        <div class="modal-body" id="healthdetail">
          <div id="healthwait" style="display:none;width:32px;height:32px;position:absolute;left:50%;padding:2px;">  <img src='ajax-loading.gif' width="64" height="32" />
        </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  </div>


<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
  });
    $("#1").click(function(){
        $("#myFood").modal();
  });
    $("#4").click(function(){
        $("#myClothes").modal();
  });
    $("#3").click(function(){
        $("#myTime").modal();
  });
    $("#6").click(function(){
        $("#myHealth").modal();
  });
    $("#5").click(function(){
        $("#myToys").modal();
  });
    $("#2").click(function(){
        $("#myBooks").modal();
  });
    $('#15').click(function(){
        console.log("entered modal");
        var toys_ngo=5;
        $.ajax({
          url: "toys.php",
          method: "POST", 
          data:{toys_ngo:5},
          beforeSend: function(){
            console.log("dikhao");
            $("#toysModal").modal("show");

            $("#toyswait").css("display", "block");
          },
          complete: function(){
            console.log("ab modal ayega");
            $("#toyswait").css("display", "none");
          },
          success: function(data){
            console.log("entered success");
            console.log(data);
            $("#toysdetail").html(data);
          }          
        });
  });
    $('#11').click(function(){
        console.log("entered modal");
        var food_ngo=1;
        $.ajax({
          url: "food.php",
          method: "POST", 
          data:{food_ngo:1},
          beforeSend: function(){
            console.log("dikhao");
            $("#foodModal").modal("show");
            $("#foodwait").css("display", "block");
          },
          complete: function(){
            console.log("ab modal ayega");
            $("#foodwait").css("display", "none");
          },
          success: function(data){
            console.log("entered success");
            console.log(data);
            $("#fooddetail").html(data);
          }          
        });
  });
    $('#12').click(function(){
        console.log("entered modal");
        var books_ngo=2;
        $.ajax({
          url: "books.php",
          method: "POST", 
          data:{books_ngo:2},
          beforeSend: function(){
            console.log("dikhao");
            $("#booksModal").modal("show");
            $("#bookswait").css("display", "block");
          },
          complete: function(){
            console.log("ab modal ayega");
            $("#bookswait").css("display", "none");
          },
          success: function(data){
            console.log("entered success");
            console.log(data);
            $("#booksdetail").html(data);
          }          
        });
  });
    $('#13').click(function(){
        console.log("entered modal");
        var time_ngo=3;
        $.ajax({
          url: "time.php",
          method: "POST", 
          data:{time_ngo:3},
          beforeSend: function(){
            console.log("dikhao");
            $("#timeModal").modal("show");
            $("#timewait").css("display", "block");
          },
          complete: function(){
            console.log("ab modal ayega");
            $("#timewait").css("display", "none");
          },
          success: function(data){
            console.log("entered success");
            console.log(data);
            $("#timedetail").html(data);
          }          
        });
  });
    $('#14').click(function(){
        console.log("entered modal");
        var clothes_ngo=4;
        $.ajax({
          url: "clothes.php",
          method: "POST", 
          data:{clothes_ngo:4},
          beforeSend: function(){
            console.log("dikhao");
            $("#clothesModal").modal("show");
            $("#clotheswait").css("display", "block");
          },
          complete: function(){
            console.log("ab modal ayega");
            $("#clotheswait").css("display", "none");
          },
          success: function(data){
            console.log("entered success");
            console.log(data);
            $("#clothesdetail").html(data);
          }          
        });
  });
    $('#16').click(function(){
        console.log("entered modal");
        var health_ngo=6;
        $.ajax({
          url: "health.php",
          method: "POST", 
          data:{health_ngo:6},
          beforeSend: function(){
            console.log("dikhao");
            $("#healthModal").modal("show");
            $("#healthwait").css("display", "block");
          },
          complete: function(){
            console.log("ab modal ayega");
            $("#healthwait").css("display", "none");
          },
          success: function(data){
            console.log("entered success");
            console.log(data);
            $("#healthdetail").html(data);
          }          
        });
  });

    $('#event_time_countdown').countDown({
          targetDate: {
            'day': 23,
            'month': 11,
            'year': 2016,
            'hour': 0,
            'min': 0,
            'sec': 0
          },
          omitWeeks: true
        });
});
</script>


    <script type="text/javascript" src="js/countdown.jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

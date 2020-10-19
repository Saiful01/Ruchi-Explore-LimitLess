<?php
session_start();
//session_destroy();
if(isset( $_SESSION["LOGIN"])){
    // $_SESSION["LOGIN"] = 0;
}else{
    $_SESSION["LOGIN"] = 0;
}

$msg = 3;

?>
<?php
include('connect.php');
$connection = new PDO("mysql:host=$servername;dbname=$dbname", $dbUser, $dbPass);
try {    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $table_create = "CREATE TABLE IF NOT EXISTS user_table(
				user_id INT AUTO_INCREMENT,
				full_name VARCHAR(255),

				f_name VARCHAR(255),

				m_name VARCHAR(255),

				b_group VARCHAR(255),

				v_name VARCHAR(255),

				house VARCHAR(255),

				quality VARCHAR(255),

				post VARCHAR(255),

				thana VARCHAR(255),

				phone VARCHAR(255),

				district VARCHAR(255),

				age VARCHAR(255),

				profession VARCHAR(255),

				email VARCHAR(255),


				date datetime NOT NULL DEFAULT NOW(),
				PRIMARY KEY(user_id)
			)";
    $connection->exec($table_create);
    // echo 'user_table Created Successfully';
} catch (PDOException $e) {
    echo 'Table Not Creted' . $e->getMessage();
}

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];//echo$username.'<br>';

    $f_name = $_POST['f_name'];//echo$username.'<br>';

    $m_name = $_POST['m_name'];

    $b_group = $_POST['b_group'];

    $v_name = $_POST['v_name'];

    $house = $_POST['house'];

    $quality = $_POST['quality'];

    $post = $_POST['post'];

    $thana = $_POST['thana'];

    $phone = $_POST['phone'];

    $district = $_POST['district'];

    $age = $_POST['age'];

    $profession = $_POST['profession'];

    $email = $_POST['email'];




    $status = 1;
    try {
        $connection = new PDO("mysql:host=$servername; dbname=$dbname", $dbUser, $dbPass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);






        $insert_user = "INSERT INTO user_table(
                          full_name,
                          f_name,
                          m_name,
                          b_group,
                          v_name,
                          house,
                          quality,
                          post,
                          thana,
                          phone,
                          district,
                          age,
                          profession,
                          email

                         )

				VALUES(
				  '$full_name',
				  '$f_name',
				  '$m_name',
				  '$b_group',
				  '$v_name',
				  '$house',
				  '$quality',
				  '$post',
				  '$thana',
				  '$phone',
				  '$district',
				   '$age',
				   '$profession',
				   '$email'
				  )
				";
        $connection->exec($insert_user);
        $message = "Dear " . $full_name . "আপনাকে ধন্যবাদ পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন এর পক্ষ থেকে। আপনি এখন থেকে পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন এর একজন মেম্বার

		শুভেচান্তে
		পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন






";
        mail($email, "Invitation", $message);


        $msg = 1;
        //$_SESSION["LOGIN"] = 1;
    } catch (Exception $e) {
        echo $e->getMessage();
        $msg = 0;
    }
}


//ANOTHER TABLE

try {    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $table_create = "CREATE TABLE IF NOT EXISTS user_table2(
				user_id INT AUTO_INCREMENT ,
				full_name VARCHAR(255),
				email VARCHAR(255),
				phone VARCHAR(255),
				speciality VARCHAR(255),
				district VARCHAR(255),
				institution VARCHAR(255),
				date datetime NOT NULL DEFAULT NOW(),
				PRIMARY KEY(user_id)
			)";
    $connection->exec($table_create);
    // echo 'user_table Created Successfully';
} catch (PDOException $e) {
    echo 'Table Not Creted' . $e->getMessage();
}

if (isset($_POST['login'])) {
    $full_name = $_POST['full_name'];//echo$username.'<br>';
    $email = $_POST['email'];//echo$username.'<br>';
    $phone = $_POST['phone'];
    $speciality = $_POST['speciality'];
    $district = $_POST['district'];
    $institution = $_POST['institution'];



    $status = 1;
    try {

        $_SESSION["LOGIN"] = 1;
        //echo "holla".$_SESSION["LOGIN"];

        $connection = new PDO("mysql:host=$servername; dbname=$dbname", $dbUser, $dbPass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $insert_user = "INSERT INTO user_table2(
                          full_name,
                          email,
                          phone,
                          speciality,
                          district,
                          institution
                         )

				VALUES(
				  '$full_name',
				  '$email',
				  '$phone',
				  '$speciality',
				  '$district',
				  '$institution'
				  )
				";
        $connection->exec($insert_user);

        $message = "Dear " . $full_name . " You are cordially invited to attend  COVID-19 and Mental Health
22nd May , 2020 Time : 3:00 PM -4:00 PM
Mental health care for Healthcare professionals & Management of Psychosocial issue during COVID-19";
        // mail($email, "Invitation", $message);


        $msg = 1;

    } catch (Exception $e) {
        echo $e->getMessage();
        $msg = 0;
    }
}



function successMessage()
{
    echo '<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 Registartion Successfully Done
		 </div>';
}

function errMessage()
{
    echo '<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			There is a problem, Try again later.
		 </div>';
}

?>


        <!DOCTYPE html>
<html lang="en">
<head>
    <title>পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- =========================
     PRE LOADER
============================== -->
<!--<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>-->


<!-- =========================
     NAVIGATION LINKS
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
    <div class="container">

        <!-- navbar header -->
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="http://abgict.com" class="navbar-brand"><img style="" src="images/logo.jpg" alt="Sun Pharma"/></a>
        </div>

        <div style="background:rgba(255, 255, 255, .4); padding-right:15px;" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#intro" class="smoothScroll">হোম </a></li>
                <li><a href="#register" class="smoothScroll">সদস্য হতে চান</a></li>
                <li><a href="#overview" class="smoothScroll">আমাদের সম্পর্কে</a></li>
                <li><a href="#contact" class="smoothScroll">যোগাযোগ  </a></li>



            </ul>

        </div>

    </div>
</div>


<!-- =========================
    INTRO SECTION
============================== -->
<section id="intro" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!--<h3 class="wow bounceIn" data-wow-delay="0.9s"><img style="width:100%" src="images/banner.gif" alt="Banner Add"/></h3>-->
                <h3 class="wow fadeInUp" data-wow-delay="1.6s">পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন<br>একটি সমাজ বিনির্মাণে অলাভ জনক সংগঠন<br>গরিব দুঃখী অসহায়দের পাশে আমরা সব সময়  মানুষের সেবায় আমরা আছি</h3>
                <!--<h3 class="wow bounceIn" data-wow-delay="0.9s"> 22 May , 2020<br>
                Time : 3:00 PM -4:00 PM</h3>-->
                <!--<h3 style="color:red;" id="demo"></h3>-->
                <a href="#register" class="btn btn-lg btn-danger smoothScroll wow fadeInUp " data-wow-delay="2.3s">সদস্য হতে চান ?</a>
                <a href="#live" class="btn btn-lg btn-default smoothScroll wow fadeInUp" data-wow-delay="2.3s">আমাদের সম্পর্কে</a>
            </div>
        </div>
    </div>
</section>


<!-- =========================
   REGISTER SECTION
============================== -->
<section id="register" class="parallax-section">
    <div class="container">
        <div class="row">

            <?php
            if ($msg == 1) {
                successMessage();
            } else if ($msg == 0) {
                errMessage();
            }
            ?>

            <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">

                <h2 style="padding-bottom:15px;"><center>পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন  সদস্য নিয়মাবলী</center></h2>
                <br><br><br>

            </div>


            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">

                <img src="images/reg.jpg" class="img-responsive" alt="program">

            </div>

            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="1s">

                <form method="post">
                    <input type="text" class="form-control" id="name" আবশ্যক  name="full_name" placeholder="নাম (আবশ্যক )">

                    <input name="f_name" type="text" class="form-control" id="f_name" আবশ্যক
                           placeholder="পিতার নাম (আবশ্যক )" required>

                    <input name="m_name" type="text" class="form-control" id="m_name"
                           placeholder="মাতার নাম (আবশ্যক )" required>

                    <input name="b_group" type="text" class="form-control" id="b_group" আবশ্যক
                           placeholder="রক্তের গ্রুপ  (আবশ্যক )" required>

                    <input name="v_name" type="text" class="form-control" id="v_name" আবশ্যক
                           placeholder="গ্রাম (আবশ্যক )" required>

                    <input name="house" type="text" class="form-control" id="house"
                           placeholder="বাড়ী  (আবশ্যক )" required>


                    <input name="quality" type="text" class="form-control" id="quality"
                           placeholder="যোগ্যতা  (আবশ্যক )" required>

                    <input name="post" type="text" class="form-control" id="post"
                           placeholder="পোস্ট(আবশ্যক )" required>

                    <input name="thana" type="text" class="form-control" id="thana"
                           placeholder="থানা (আবশ্যক )" required>

                    <input name="phone" type="telephone" class="form-control" id="phone"
                           placeholder="ফোন (আবশ্যক )" required>

                    <input name="district" type="text" class="form-control" id="district"
                           placeholder="জেলা (আবশ্যক )" required>

                    <input name="age" type="text" class="form-control" id="age"
                           placeholder="বয়স  (আবশ্যক )" required>

                    <input name="profession" type="text" class="form-control" id="profession"
                           placeholder="পেশা (আবশ্যক )" required>

                    <input name="email" type="text" class="form-control" id="email"
                           placeholder="ইমেইল (আবশ্যক )" required>




                    <div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
                        <center><input name="submit" type="submit" class="form-control" id="submit" value="ক্লিক করুন"><center>
                    </div>
                </form>
            </div>

            <div class="col-md-1"></div>

        </div>
    </div>
</section>


<!-- =========================
    OVERVIEW SECTION
============================== -->
<section id="overview" class="parallax-section">
    <div class="container">
        <div class="row">






            <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.9s">
                <h3>পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন</h3>
                <img src="images/m.png" class="img-responsive" alt="Overview">
            </div>

        </div>
    </div>
</section>







<!-- =========================
    CONTACT SECTION
============================== -->
<section id="contact" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-offset-1 col-md-11 col-sm-12" data-wow-delay="0.6s">
                <div class="contact_des">
                    <h3 style="color:#237543;">অফিস</h3>
                    <p style="color:#237543;">পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন.</p>
                    <p style="color:#237543;">পূর্বসোনাখালী, মঙ্গলের হাট , মোরেলগঞ্জ, বাগের হাট  <br>যোগাযোগ:
                        +8801718548649</p>
                </div>
            </div>



        </div>
    </div>
</section>






<!-- =========================
    FOOTER SECTION
============================== -->
<footer>
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <h3 class="wow fadeInUp" data-wow-delay="0.6s"> প্রচারে: <a rel="nofollow"
                                                                            href="https://www.facebook.com/grambanglar.channel"
                                                                            target="_parent">পূর্বসোনাখালী যুব কল্যান ফাউন্ডেশন</a></h3>

                <ul class="social-icon">
                    <li><a href="https://www.facebook.com/grambanglar.channel" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>


                </ul>

            </div>

        </div>
    </div>
</footer>

<!-- Button to Open the Modal -->

<!-- The Modal -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Registration information </h4>
                <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form method="post">
                    <input type="text" class="form-control" id="name" name="full_name" placeholder="Name (আবশ্যক )"
                           আবশ্যক ><br>
                    <input name="speciality" type="text" class="form-control" আবশ্যক  id="specialty"
                           placeholder="Specialty (আবশ্যক )" ><br>
                    <input name="phone" type="telephone" class="form-control" id="phone"
                           placeholder="Mobile Number (আবশ্যক )" ><br>
                    <input name="email" type="email" class="form-control" id="email"
                           placeholder="Email Address (আবশ্যক )" আবশ্যক ><br>
                    <input name="district" type="text" class="form-control" id="district"
                           placeholder="Area (আবশ্যক )" আবশ্যক ><br>
                    <input name="institution" type="text" class="form-control" id="institution"
                           placeholder="Name of Institution (আবশ্যক )" ><br>
                    <div class="col-md-offset-6 col-md-6">
                        <br>
                    <?php /*echo $_SESSION["LOGIN"] */?><!--dddddddddddd-->
                        <input name="login" type="submit" class="form-control btn-primary" id="submit" value="LOGIN">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>

<!-- Back top -->
<!--<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>-->


<!-- =========================
     SCRIPTS
============================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>


<?php
if ($msg == 1) {
?>
<script>
    sweetAlert("Success", "Successfully Registered", "success");

</script>

<?php
}
?>







<?php

if ($_SESSION["LOGIN"] == 0) { ?>

<script>
    $(window).load(function () {
        // $('#myModal').modal('show');
    });
</script>
<?php
}

?>

</body>
</html>
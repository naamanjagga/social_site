<?php include 'backend.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
            </a>
            <form action="backend.php" method="POST" class="d-flex">
                <button type="submit" class="btn btn-lg bg-primary mx-5" name="logout">Log Out</button>

            </form>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="user_profile.php" class="active">FEED</a>
        <a href="find_friends.php">FIND FRIENFS</a>
        <a href="#">NOTIFICATION</a>
        <a href="profile.php">MY PROFILE</a>
        <a href="new_post.php">POST SOMETHING</a>
    </div>


    <span style="font-size:30px;cursor:pointer;   min-height: 200px;" onclick="openNav()">&#9776; open</span>
    <?php display_myfeed(); ?>
    <!--footer start-->
    <?php user_table(); ?>
    <footer>
        <div class="footer-wrap">
            <div class="container first_class">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <h3>BE THE FIRST TO KNOW</h3>
                        <p>Get all the latest information on Triedge Services, Events, Jobs
                            and Fairs. Sign up for our newsletter today.</p>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <form class="newsletter">
                            <input type="text" placeholder="Email Address">
                            <button class="newsletter_submit_btn" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>

                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="col-md-12">
                            <div class="standard_social_links">
                                <div>
                                    <li class="round-btn btn-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>

                                    </li>
                                    <li class="round-btn btn-linkedin"><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>

                                    </li>
                                    <li class="round-btn btn-twitter"><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>

                                    </li>
                                    <li class="round-btn btn-instagram"><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>

                                    </li>
                                    <li class="round-btn btn-whatsapp"><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>

                                    </li>
                                    <li class="round-btn btn-envelop"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>

                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <h3 style="text-align: right;">Stay Connected</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second_class">
                <div class="container second_class_bdr">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">

                            <div class="footer-logo"><img src="http://localhost/lrn/img/footer_logo.png" alt="logo">
                            </div>
                            <p>Your one-stop career platform to find Jobs, Internships, Professional Trainings, Projects, and Volunteering Opportunities.</p>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <h3>Quick LInks</h3>
                            <ul class="footer-links">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">About us</a>
                                </li>
                                <li><a href="#">Triedge Partners</a>
                                </li>
                                <li><a href="#">Contact Us</a>
                                </li>
                                <li><a href="#" target="_blank">Terms &amp; Conditions</a>
                                </li>
                                <li><a href="#" target="_blank">Privacy Policy</a>
                                </li>
                                <li><a href="#">Sitemap</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h3>OUR SERVICES</h3>
                            <ul class="footer-category">
                                <li><a href="#">Fresher Jobs</a>
                                </li>
                                <li><a href="#">InternEdge - Internships &amp; Projects </a>
                                </li>
                                <li><a href="#">Resume Edge - Resume Writing Services</a>
                                </li>
                                <li><a href="#">Readers Galleria - Curated Library</a>
                                </li>
                                <li><a href="#">Trideus - Campus Ambassadors</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h3>triedge Events</h3>
                            <ul class="footer-links">
                                <li><a href="#">Triedge Events</a>
                                </li>

                                <li><a href="#">Jobs &AMP; Internship Fair 2019</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="container-fluid">
                    <div class="copyright"> Copyright 2019 | All Rights Reserved by TRIEDGE Solutions Pvt. Ltd.</div>
                </div>

            </div>
        </div>

    </footer>

    <!--footer end-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Font Awesome 5 links-->
    <script src="https://kit.fontawesome.com/fddf5c0916.js" crossorigin="anonymous"></script>

</body>

</html>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
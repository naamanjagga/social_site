<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="image/download.jpeg" class="img-fluid" alt="Sample image" width="100%" height="300px">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="backend.php" method="POST">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link  px-5" id="tab-login" data-mdb-toggle="pill" href="log_in.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active px-5" id="tab-register" data-mdb-toggle="pill" href="#" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="text" name="fullname" class="form-control" placeholder="Full Name" />

                        </div>

                        <div class="form-outline mb-2">
                            <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Email" />
                        </div>
                        <!-- Username input -->
                        <div class="form-outline mb-2">
                            <input type="text" name="username" id="registerUsername" class="form-control" placeholder="Username" />
                        </div>

                        <div class="form-outline mb-2">
                            <input type="password" name="password" id="registerPassword" class="form-control" placeholder="Password" />
                        </div>

                        <!-- Repeat Password input -->
                        <div class="form-outline mb-2">
                            <input type="number" name="mobile" id="registerRepeatPassword" class="form-control" placeholder="mobile" />
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" name="city" id="city" class="form-control" placeholder="city" />
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" name="country" id="country" class="form-control" placeholder="country" />
                        </div>


                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-2">
                            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                            <label class="form-check-label" for="registerCheck">
                                I have read and agree to the terms
                            </label>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" name="btn1" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

<!--footer start-->
<footer>
  <div class="footer-wrap">
  <div class="container first_class">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <h3>BE THE FIRST TO KNOW</h3>
          <p>Get all the latest information on  Triedge Services, Events, Jobs
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
        <div class="col-md-12"><h3 style="text-align: right;">Stay Connected</h3></div>
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
          <h3>Quick  LInks</h3>
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
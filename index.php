<?php
require_once('ClassLibraries/MainClass.php');
$mainPlug = new mainClass();

if(isset($_POST['submit']))
{
   if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']))
   {
     echo 'good';
     die();
    // $result = $mainPlug->saveInput($_POST, $_SESSION['code']);
    if($result == 'good')
    {
		echo "<script>location='http://localhost/hdplus-certificate/certificate/index.php?status=".$_SESSION['code']."'</script>";
    }
    // if($result == "good")
    // {
    //   print_r($result);
    // }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sonzie's Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img.jpeg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Blaise Sonzie Mennia</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.linkedin.com/in/blaise-mennia-50b25369/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
          <a href="https://github.com/i-Blaise" class="github" target="_blank"><i class="bx bxl-github"></i></a>
          <a href="https://www.instagram.com/sonzie.online/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
          <a href="https://www.facebook.com/blaze.mennia/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Blaise Sonzie Mennia</h1>
      <p>I'm <span class="typed" data-typed-items="Web Developer, Freelancer, Photographer"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->

    <?php
  $about = $mainPlug->aboutMe();
    ?>
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p><?php echo $about['about']; ?> </p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/ab.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>UI/UX Designer &amp; Web Developer.</h3>
            &nbsp;
            &nbsp;
            <!-- <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p> -->
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $about['birthday']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?php echo $about['website']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $about['phone']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo $about['city']; ?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo $about['age']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo $about['degree']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong> <span><?php echo $about['email']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?php echo $about['freelance']; ?></span></li>
                </ul>
              </div>
            </div>
            <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Facts</h2>
          <p>Being a truly competent software developer means having to sacrifice and endure countless hours of researches, development, testings, and supporting clients after project completion. Following this with a little bit of consistency, you’re guaranteed to make happy clients. These are the numbers I put in in my career path.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> day and night</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Cups Of Coffee</strong></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->


    <?php
  $skills_desc = $mainPlug->fetchSkillDesc();
  $skill_result1 = $mainPlug->fetchSkillDetails1();
  $skill_result2 = $mainPlug->fetchSkillDetails2();

    ?>
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
          <p><?php echo $skills_desc['skill_desc']; ?></p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">


  <?php
          while($skill_details1 = mysqli_fetch_assoc($skill_result1))
  {
  ?>
            <div class="progress">
              <span class="skill"><?php echo $skill_details1['skill']; ?> <i class="val"><?php echo $skill_details1['percentage']; ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill_details1['percentage']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  <?php
  }
  ?>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <?php
          while($skill_details2 = mysqli_fetch_assoc($skill_result2))
  {
  ?>
            <div class="progress">
              <span class="skill"><?php echo $skill_details2['skill']; ?> <i class="val"><?php echo $skill_details2['percentage']; ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill_details2['percentage']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
<?php
  }
  ?>

          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->

    <?php
  $resume_desc = $mainPlug->fetchResumeDesc();
  $resume_summary = $mainPlug->fetchResumeSummary();
  $resume_edu_results = $mainPlug->fetchResumeEdu();
  $resume_exp_results = $mainPlug->fetchResumeExp();

    ?>
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resume</h2>
          <p><?php echo $resume_desc['description']; ?></p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
              <h4><?php echo $resume_summary['full_name']; ?></h4>
              <p><em><?php echo $resume_summary['description']; ?></em></p>
              <ul>
                <li><?php echo $resume_summary['location']; ?></li>
                <li><?php echo $resume_summary['phone']; ?></li>
                <li><?php echo $resume_summary['email']; ?></li>
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            <?php
          while($resume_edu = mysqli_fetch_assoc($resume_edu_results))
          {
          ?>
            <div class="resume-item">
              <h4><?php echo $resume_edu['degree_name']; ?></h4>
              <h5><?php echo $resume_edu['start']; ?> - <?php echo $resume_edu['end']; ?></h5>
              <p><em><?php echo $resume_edu['institute_name']; ?>, <?php echo $resume_edu['institute_city']; ?>, <?php echo $resume_edu['institute_state']; ?></em></p>
              <p><?php echo $resume_edu['description']; ?></p>
            </div>
          <?php
          }
          ?>
            <!-- <div class="resume-item">
              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
              <h5>2010 - 2014</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
            </div> -->
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
            <?php
          while($resume_exp = mysqli_fetch_assoc($resume_exp_results))
          {
          ?>
            <div class="resume-item">
              <h4><?php echo $resume_exp['job_title']; ?></h4>
              <h5><?php echo $resume_exp['start']; ?> - <?php echo $resume_exp['end']; ?></h5>
              <p><em><?php echo $resume_exp['institute_name']; ?>, 
              <?php echo $resume_exp['institute_city']; ?>
              <?php $region = !is_null($resume_exp['institute_state']) ? 
              $resume_exp['institute_state'] : "."; if($region !== "."){echo ', '.$region;}?> </em></p>
              <ul>
                <li><?php echo $resume_exp['description_1']; ?></li>
                <li><?php echo $resume_exp['description_2']; ?></li>
                <li><?php echo $resume_exp['description_3']; ?></li>
                <?php
                if(!is_null($resume_exp['description_4']))
                {
                ?>
                <li><?php echo $resume_exp['description_4']; ?></li>
                <?php } ?>
                <?php
                if(!is_null($resume_exp['description_5']))
                {
                ?>
                <li><?php echo $resume_exp['description_5']; ?></li>
                <?php } ?>
              </ul>
            </div>

          <?php
          }
          ?>
            <!-- <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
            </div> -->
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->

    <?php
  $mainPortDesc = $mainPlug->fetchMainPortfolioDesc();
  $portResult = $mainPlug->fetchPortfolio();

    ?>
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p><?php echo $mainPortDesc['description']; ?></p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".app">App</li>
              <li data-filter=".card">Card</li>
              <li data-filter=".web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

        <?php
          while($portfolio = mysqli_fetch_assoc($portResult))
          {
            $id = $portfolio['id'];
            $url = "portfolio-details.php?id=".$id;
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item app">
            <div class="portfolio-wrap">
              <img src="<?php echo $portfolio['image1']; ?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="<?php echo $portfolio['image2']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $portfolio['portfolio-title']; ?>"><i class="bx bx-plus"></i></a>
                <a href="<?php echo $url; ?>" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <?php
         }
          ?>

          <!-- <div class="col-lg-4 col-md-6 portfolio-item web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->

    <?php
  $service_desc = $mainPlug->fetchServiceDesc();
  $service_result1 = $mainPlug->fetchServiceDetails1();
  $service_result2 = $mainPlug->fetchServiceDetails2();

    ?>
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p><?php echo $service_desc['description']; ?></p>
        </div>

        <div class="row">

        <?php
        $delay1 = 0;
          while($service_details1 = mysqli_fetch_assoc($service_result1))
        {
          $delay1 += 100;
        ?>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="<?php echo $delay1; ?>">
            <div class="icon"><i class="<?php echo $service_details1['icon_code']; ?>" aria-hidden="true"></i></div>
            <h4 class="title"><a href=""><?php echo $service_details1['service-name']; ?></a></h4>
            <p class="description"><?php echo $service_details1['service-desc']; ?></p>
          </div>
        <?php
        }
        ?>

      <!-- <?php
        $delay2 = 400;
          while($service_details2 = mysqli_fetch_assoc($service_result2))
        {
          $delay2 += 100;
        ?>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="<?php echo $delay2; ?>">
            <div class="icon"><i class="<?php echo $service_details2['icon_code']; ?>" aria-hidden="true"></i></div>
            <h4 class="title"><a href=""><?php echo $service_details2['service-name']; ?></a></h4>
            <p class="description"><?php echo $service_details2['service-desc']; ?></p>
          </div>
        <?php
        }
        ?> -->

        
        </div>

      </div>
    </section><!-- End Services Section -->
    

    <!-- ======= Contact Section ======= -->

    <?php
  $contact = $mainPlug->fetchContact();
    ?>
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Want to start a prject? Or inquire about anything web? Please do not hesitate to hit me up. I'll be glad to hear from you! </p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo $contact['location']; ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $contact['email']; ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $contact['phone']; ?></p>
              </div>

              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
          <div class="col-lg-8" data-aos="fade-right">
            <img src="assets/img/contacts.jpg" class="img-fluid" alt="" height="100px">
          </div>
                
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sonzie</span></strong>
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
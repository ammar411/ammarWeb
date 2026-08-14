@extends('layouts.app')

@section('content')
<div>
       <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- main header -->
         <header class="main-header menu-absolute">
            <!--Header-Upper-->
            <div class="header-upper">
    <div class="container container-1620 clearfix">

        <div class="header-inner rel d-flex align-items-center">
            <div class="logo-outer">
                <div class="logo">
                    <a href="{{ url('/') }}">
                       <h2>Portfolio</h2>
                    </a>
                </div>
            </div>

            <div class="nav-outer clearfix mx-auto">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-lg">
                    <div class="navbar-header">
                        <div class="mobile-logo my-15">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" title="Logo">
                            </a>
                        </div>
                        
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle me-4" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="dropdown"><a href="{{ url('/') }}">Home</a>
                                <!-- <ul>
                                    <li class="dropdown"><a href="#">MultiPage</a>
                                        <ul>
                                            <li><a href="{{ url('/') }}">Home One</a></li>
                                            <li><a href="{{ url('index2') }}">Home Two</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">OnePage</a>
                                        <ul>
                                            <li><a href="{{ url('indexonepage') }}">Home One</a></li>
                                            <li><a href="{{ url('index2onepage') }}">Home Two</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li><a href="{{ url('about') }}">about</a></li>
                            <li><a href="{{ url('services') }}">services</a></li>
                            <!-- <li class="dropdown"><a href="#">projects</a>
                                <ul>
                                    <li><a href="{{ url('projects') }}">project Grid</a></li>
                                    <li><a href="{{ url('projects-masonry') }}">projects masonry</a></li>
                                    <li><a href="{{ url('project-details') }}">projects details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown"><a href="#">blog</a>
                                <ul>
                                    <li><a href="{{ url('blog') }}">blog standard</a></li>
                                    <li><a href="{{ url('blog-details') }}">blog details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown"><a href="#">pages</a>
                                <ul>
                                    <li><a href="{{ url('404') }}">Error Page</a></li>
                                </ul>
                            </li> -->
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>

                </nav>
                <!-- Main Menu End-->
            </div>
            
            <!-- Menu Button -->
            <div class="menu-btns">
                <!-- menu sidbar -->
                <div class="menu-sidebar">
                    <button>
                        <img src="{{ asset('assets/images/shape/sidebar-tottler.svg') }}" alt="Toggler">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

            <!--End Header Upper-->
        </header>
       
       
        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="https://html.webtend.net/noxfolio/contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->
       
        
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-200 rpt-140 pb-100 rpb-60 rel z-1 text-center">
            <div class="container">
                <div class="banner-inner text-white">
                    <h1 class="page-title wow fadeInUp delay-0-2s">About Me</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center wow fadeInUp delay-0-4s">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">About Me</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="bg-lines">
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <div class="about-main-image-area pt-40">
            <div class="container">
                <div class="about-main-image wow fadeInUp delay-0-5s">
                    <img src="assets/images/about/about-page.html" alt="About Page">
                </div>
            </div>
        </div>
        
        
        <!-- About Page Area start -->
          <section class="about-area rel z-1">
    <div class="for-bgc-black py-130 rpy-100">
        <div class="container">
            <div class="row gap-100 align-items-center">
                <div class="col-lg-7">
                    <div class="about-content-part rel z-2 rmb-55">
                       <h2>Professional <span>Web & Design Solutions</span> For Modern Digital Products</h2>
    <p>
        I am a Software Engineer with 2+ years of experience in frontend and full-stack development, 
        specializing in <strong>Laravel</strong>, <strong>React</strong>, and modern web technologies. 
        With a strong grasp of <strong>Agile methodologies</strong> and the Software Development Life Cycle (SDLC), 
        I deliver scalable, secure, and efficient solutions.  
        Alongside development, I bring creative expertise in <strong>UI/UX design</strong> using tools like Figma and Canva, 
        ensuring that every project is both functional and visually appealing.
    </p>
                        <ul class="list-style-one two-column wow fadeInUp delay-0-2s">
                           <li>Full-Stack Software Development</li>
<li>Backend Engineering (Laravel, PHP, MySQL)</li>
<li>Frontend Web Development (React, JavaScript, CSS)</li>
<li>Agile Software Engineering & SDLC</li>
<li>Testing with PEST & PHPunit</li>
<li>APis Sanctum/Smphony</li>
<li>Version Control (Git, GitHub)</li>
<li>AWS</li>
                        </ul>
                        <div class="about-info-box mt-25 wow fadeInUp delay-0-2s">
                            <div class="info-box-item">
                                <i class="far fa-envelope"></i>
                                <div class="content">
                                    <span>Email</span><br>
                                    <a href="mailto:support@gmail.com">ammarmalik046@gmail.com</a>
                                </div>
                            </div>
                            <div class="info-box-item">
                                <i class="far fa-phone"></i>
                                <div class="content">
                                    <span>Make A Call</span><br>
                                    <a href="tel:+88012345688">+923345865096</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-image-part wow fadeInUp delay-0-3s">
                        <img src="{{ asset('assets/images/hero/second.jpg') }}" alt="About Me">
                        <!-- <div class="about-btn btn-one wow fadeInRight delay-0-4s">
                            <img src="{{ asset('assets/images/about/btn-image1.png') }}" alt="Image">
                            <h6>Experience Designer</h6>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="about-btn btn-two wow fadeInRight delay-0-5s">
                            <img src="{{ asset('assets/images/about/btn-image2.png') }}" alt="Image">
                            <h6>Mark J. Collins</h6>
                            <i class="fas fa-arrow-right"></i>
                        </div> -->
                        <!-- <div class="dot-shape">
                            <img src="{{ asset('assets/images/shape/about-dot.png') }}" alt="Shape">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-lines">
       <span></span><span></span>
       <span></span><span></span>
       <span></span><span></span>
       <span></span><span></span>
       <span></span><span></span>
    </div>
</section>
        <!-- About Page Area end -->
        
        
        <!-- Services Area start -->
           <section class="services-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                    <span class="sub-title mb-15">Popular Services</span>
                    <h2>My <span>Special Service</span> For Your Business Development</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s">
                    <div class="number">01.</div>
                    <div class="content">
                        <h4>Full-Stack Web Development</h4>
                        <p>End-to-end web solutions using Laravel, PHP, React, and MySQL for scalable, secure, and modern applications.</p>
                    </div>
                    <a href="service-details.html" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s">
                    <div class="number">02.</div>
                    <div class="content">
                        <h4>Frontend Development</h4>
                        <p>Responsive, user-friendly interfaces with React, Bootstrap, Tailwind CSS, Vue.js, JavaScript, HTML, and CSS to deliver engaging digital experiences.</p>
                    </div>
                    <a href="service-details.html" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s">
                    <div class="number">03.</div>
                    <div class="content">
                        <h4>Backend Development</h4>
                        <p>Robust backend systems using Laravel, PHP, and MySQL with REST APIs for secure and efficient data handling.</p>
                    </div>
                    <a href="service-details.html" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s">
                    <div class="number">04.</div>
                    <div class="content">
                        <h4>Agile Software Engineering</h4>
                        <p>Delivering high-quality projects through Agile methodologies, SDLC practices, and continuous integration.</p>
                    </div>
                    <a href="service-details.html" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s">
                    <div class="number">05.</div>
                   <div class="content">
    <h4>PEST Testing & AWS Cloud Services</h4>
    <p>Automated testing with PEST for reliable Laravel applications, and scalable cloud solutions using AWS for secure deployments.</p>
</div>

                    <a href="service-details.html" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s">
                    <div class="number">06.</div>
                    <div class="content">
                        <h4>Database Design & Management</h4>
                        <p>Optimized SQL databases with efficient schema design, queries, and integrations for data-driven applications.</p>
                    </div>
                    <a href="service-details.html" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-lines">
       <span></span><span></span>
       <span></span><span></span>
       <span></span><span></span>
       <span></span><span></span>
       <span></span><span></span>
    </div>
</section>
        <!-- Services Area end -->
        
        
       
        
        
       
        
        
       
        
        
        <!-- footer area start -->
        <footer class="main-footer rel z-1">
            <div class="footer-top-wrap bgc-black pt-100 pb-75">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <div class="footer-widget widget_logo wow fadeInUp delay-0-2s">
                             <h2>Portfolio</h2>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="footer-widget widget_nav_menu wow fadeInUp delay-0-4s">
                                <h6 class="footer-title">Quick Link</h6>
                                <ul>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Projects</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Faqs</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="footer-widget widget_newsletter wow fadeInUp delay-0-4s">
                                <form action="#">
                                    <label for="email"><i class="far fa-envelope"></i></label>
                                    <input id="email" type="email" placeholder="Email Address" required>
                                    <button>Sign Up <i class="far fa-angle-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5">
                            <div class="footer-widget widget_contact_info wow fadeInUp delay-0-6s">
                                <h6 class="footer-title">Address</h6>
                                <ul>
                                    <li><i class="far fa-map-marker-alt"></i> 55 Main Street, 2nd block, New York City</li>
                                    <li><i class="far fa-envelope"></i> <a href="mailto:support@gmail.com">ammarmalik046@gmail</a></li>
                                    <li><i class="far fa-phone"></i> <a href="callto:+880(123)45688">+923345865096</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-20 pb-5 rpt-25">
                <div class="container">
                   <div class="row">
                       <div class="col-lg-6">
                            <div class="copyright-text">
                                <p>Copyright @2025, <Ammar href="{{ url('/') }}">Ammar's Portfolio</a> All Rights Reserved</p>
                            </div>
                       </div>
                       <div class="col-lg-6 text-lg-end">
                           <ul class="footer-bottom-nav">
                               <li><a href="#">Facebook</a></li>
                               <li><a href="#">Twitter</a></li>
                               <li><a href="#">Instagram</a></li>
                               <li><a href="{{ url('www.linkedin.com/in/ammar-khalid-15883b247

') }}">LinkedIn</></li>
                           </ul>
                       </div>
                   </div>
                   <!-- Scroll Top Button -->
                    <button class="scroll-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></button>
                </div>
                <div class="bg-lines">
                   <span></span><span></span>
                   <span></span><span></span>
                   <span></span><span></span>
                   <span></span><span></span>
                   <span></span><span></span>
                </div>
            </div>
        </footer>
        <!-- footer area end -->

    </div>
</div>
@endsection
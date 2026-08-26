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
            <div class="menu-btns d-flex align-items-center gap-3">
                <!-- AI Model Selector -->
                <div class="ai-model-selector">
                    <button class="ai-selector-btn" id="aiSelectorToggle" title="Select AI Model">
                        <i class="bi bi-brain"></i>
                    </button>
                    <div class="ai-selector-dropdown" id="aiSelectorDropdown">
                        <button class="ai-model-option" data-model="all" title="Show all services">All Models</button>
                        <button class="ai-model-option" data-model="tensorflow" title="TensorFlow">TensorFlow</button>
                        <button class="ai-model-option" data-model="pytorch" title="PyTorch">PyTorch</button>
                        <button class="ai-model-option" data-model="opencv" title="OpenCV">OpenCV</button>
                        <button class="ai-model-option" data-model="data-science" title="Data Science">NumPy/Pandas</button>
                        <button class="ai-model-option" data-model="face-recognition" title="Face Recognition">Face Recognition</button>
                    </div>
                </div>

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
    <form method="POST" action="{{route('send.appointment') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Message" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="theme-btn">Submit now</button>
        </div>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
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
       
        
        <!-- Hero Section Start -->
       <section class="main-hero-area pt-150 pb-80 rel z-1">
    <div class="container container-1620">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-7">
                <div class="hero-content rmb-55 wow fadeInUp delay-0-2s">
                    <span class="h2">Hello, i’m </span>
                    <h1><b>Ammar Khalid</b> Software Engineer</h1>
                    <p>"Turning ideas into scalable and user-friendly applications."</p>
                    <div class="hero-btns">
                        <a href="{{ url('contact') }}" class="theme-btn">Hire Me <i class="far fa-angle-right"></i></a>
                        <a href="{{ url('contact') }}" class="read-more">Download Resume <i class="far fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-5 order-lg-3">
                <div class="hero-counter-wrap ms-lg-auto rmb-55 wow fadeInUp delay-0-4s">
                    <div class="counter-item counter-text-wrap">
                        <span class="count-text plus" data-speed="3000" data-stop="3">0</span>
                        <span class="counter-title">Years Of Experience</span>
                    </div>
                    <div class="counter-item counter-text-wrap">
                        <span class="count-text plus" data-speed="3000" data-stop="10">0</span>
                        <span class="counter-title">Project Completed</span>
                    </div>
                    <div class="counter-item counter-text-wrap">
                        <span class="count-text percent" data-speed="3000" data-stop="95">0</span>
                        <span class="counter-title">Client Satisfactions</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="author-image-part wow fadeIn delay-0-3s">
                    <div class="bg-circle"></div>
                    <img src="{{ asset('assets/images/hero/me2.png') }}" alt="Author">
                     <div class="progress-shape">
                        <img src="{{ asset('assets/images/hero/progress-shape.png') }}" alt="Progress">
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

        <!-- Hero Section End -->
        
        
        <!-- About Area start -->
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

        <!-- About Area end -->
        
        
        <!-- Resume Area start -->
        <section class="resume-area pt-130 rpt-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="big-icon mt-85 rmt-0 rmb-55 wow fadeInUp delay-0-2s">
                            <i class="flaticon-asterisk-1"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9">
                                <div class="section-title mb-60 wow fadeInUp delay-0-2s">
                                    <span class="sub-title mb-15">My Resume</span>
                                    <h2>Real <span>Problem Solutions</span> Experience</h2>
                                </div>
                            </div>
                        </div>
                        <div class="resume-items-wrap">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-md-6">
                                    <div class="resume-item wow fadeInUp delay-0-3s">
                                        <div class="icon">
                                            <i class="far fa-arrow-right"></i>
                                        </div>
                                        <div class="content">
                                            <span class="years">2025 - Present</span>
                                            <h4>Full Stack Developer (laravel/PHP)</h4>
                                            <span class="company">Exarth</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    <div class="resume-item wow fadeInUp delay-0-4s">
                                        <div class="icon">
                                            <i class="far fa-arrow-right"></i>
                                        </div>
                                        <div class="content">
                                            <span class="years">July 2024-Sept 2024</span>
                                            <h4>Frontend Developer Team Lead (Intern)</h4>
                                            <span class="company">ItSolera Pvt Ltd</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    <div class="resume-item wow fadeInUp delay-0-2s">
                                        <div class="icon">
                                            <i class="far fa-arrow-right"></i>
                                        </div>
                                        <div class="content">
                                            <span class="years">Feb 2023-July 2023</span>
                                            <h4>Web Developer Intern</h4>
                                            <span class="company">Ezitech Pvt Ltd</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    <div class="resume-item wow fadeInUp delay-0-4s">
                                        <div class="icon">
                                            <i class="far fa-arrow-right"></i>
                                        </div>
                                        <div class="content">
                                            <span class="years">2021 - 2022</span>
                                            <h4>Freelance Web Developer</h4>
                                            <span class="company">Fiverr</span>
                                        </div>
                                    </div>
                                </div>
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
        <!-- Resume Area end -->
        
        
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
                <div class="service-item wow fadeInUp delay-0-2s" data-ai-models="all">
                    <div class="number">01.</div>
                    <div class="content">
                        <h4>Full-Stack Web Development</h4>
                        <p>End-to-end web solutions using Laravel, PHP, React, and MySQL for scalable, secure, and modern applications.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s" data-ai-models="all">
                    <div class="number">02.</div>
                    <div class="content">
                        <h4>Frontend Development</h4>
                        <p>Responsive, user-friendly interfaces with React, Bootstrap, Tailwind CSS, Vue.js, JavaScript, HTML, and CSS to deliver engaging digital experiences.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s" data-ai-models="all">
                    <div class="number">03.</div>
                    <div class="content">
                        <h4>Backend Development</h4>
                        <p>Robust backend systems using Laravel, PHP, and MySQL with REST APIs for secure and efficient data handling.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s" data-ai-models="all">
                    <div class="number">04.</div>
                    <div class="content">
                        <h4>Agile Software Engineering</h4>
                        <p>Delivering high-quality projects through Agile methodologies, SDLC practices, and continuous integration.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s" data-ai-models="all">
                   <div class="content">
    <h4>PEST Testing & AWS Cloud Services</h4>
    <p>Automated testing with PEST for reliable Laravel applications, and scalable cloud solutions using AWS for secure deployments.</p>
</div>

                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s" data-ai-models="all">
                    <div class="number">06.</div>
                    <div class="content">
                        <h4>Database Design & Management</h4>
                        <p>Optimized SQL databases with efficient schema design, queries, and integrations for data-driven applications.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <!-- AI Services -->
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s" data-ai-models="tensorflow,pytorch">
                    <div class="number">07.</div>
                    <div class="content">
                        <h4>AI Model Training & Fine-tuning</h4>
                        <p>Custom machine learning model training using TensorFlow and PyTorch for your specific use cases, with optimization and deployment support.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s" data-ai-models="opencv">
                    <div class="number">08.</div>
                    <div class="content">
                        <h4>Computer Vision Integration</h4>
                        <p>Image processing and real-time vision solutions using OpenCV. Build powerful visual recognition and analysis systems.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s" data-ai-models="face-recognition">
                    <div class="number">09.</div>
                    <div class="content">
                        <h4>Face Recognition Systems</h4>
                        <p>Biometric authentication and identification systems. Implement advanced face detection, recognition, and verification features.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-4s" data-ai-models="data-science">
                    <div class="number">10.</div>
                    <div class="content">
                        <h4>Data Processing & Analysis</h4>
                        <p>Data pipeline creation and ML data preparation using NumPy and Pandas. Transform raw data into insights for machine learning.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-item wow fadeInUp delay-0-2s" data-ai-models="tensorflow,pytorch">
                    <div class="number">11.</div>
                    <div class="content">
                        <h4>AI-Powered Backend Integration</h4>
                        <p>Seamlessly integrate machine learning models into your web applications. Build intelligent backends with API endpoints for AI predictions.</p>
                    </div>
                    <a href="{{ url('services') }}" class="details-btn"><i class="fas fa-arrow-right"></i></a>
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
        
        
        <!-- Skill Area start -->
      <section class="skill-area rel z-1">
    <div class="for-bgc-black pt-130 rpt-100 pb-100 rpb-70">
        <div class="container">
            <div class="row gap-100">
                <div class="col-lg-5">
                    <div class="skill-content-part rel z-2 rmb-55 wow fadeInUp delay-0-2s">
                        <div class="section-title mb-40">
                            <span class="sub-title mb-15">My Skills</span>
                            <h2>Let’s Explore Popular <span>Skills & Experience</span></h2>
                            <p>I specialize in modern software engineering — from frontend to backend, cloud services, and agile methodologies.</p>
                        </div>
                        <a href="{{ url('about') }}" class="theme-btn">Learn More <i class="far fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="skill-items-wrap">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-2s">
                                    <i class="bi bi-braces fs-1"></i>
                                    <h5>Laravel</h5>
                                    <span class="percent">90%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-3s">
                                    <i class="bi bi-code-slash fs-1"></i>
                                    <h5>Full Stack</h5>
                                    <span class="percent">98%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-4s">
                                    <i class="bi bi-cloud-check fs-1"></i>
                                    <h5>AWS Cloud</h5>
                                    <span class="percent">92%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-5s">
                                    <i class="bi bi-shield-check fs-1"></i>
                                    <h5>Testing (PEST)</h5>
                                    <span class="percent">95%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-2s">
                                    <i class="bi bi-palette fs-1"></i>
                                    <h5>UI/UX Design</h5>
                                    <span class="percent">90%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-3s">
                                    <i class="bi bi-diagram-3 fs-1"></i>
                                    <h5>Agile</h5>
                                    <span class="percent">97%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-4s">
                                    <i class="bi bi-laptop fs-1"></i>
                                    <h5>Frontend</h5>
                                    <span class="percent">92%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-5s">
                                    <i class="bi bi-database fs-1"></i>
                                    <h5>Backend</h5>
                                    <span class="percent">89%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-2s">
                                    <i class="bi bi-brain fs-1"></i>
                                    <h5>TensorFlow</h5>
                                    <span class="percent">85%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-3s">
                                    <i class="bi bi-lightning fs-1"></i>
                                    <h5>PyTorch</h5>
                                    <span class="percent">82%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-4s">
                                    <i class="bi bi-graph-up fs-1"></i>
                                    <h5>NumPy/Pandas</h5>
                                    <span class="percent">87%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-5s">
                                    <i class="bi bi-image fs-1"></i>
                                    <h5>OpenCV</h5>
                                    <span class="percent">84%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-2s">
                                    <i class="bi bi-person-check fs-1"></i>
                                    <h5>Face Recognition</h5>
                                    <span class="percent">86%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-3s">
                                    <i class="bi bi-gear fs-1"></i>
                                    <h5>React.js</h5>
                                    <span class="percent">91%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-4s">
                                    <i class="bi bi-type fs-1"></i>
                                    <h5>TypeScript</h5>
                                    <span class="percent">88%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-5s">
                                    <i class="bi bi-phone fs-1"></i>
                                    <h5>Flutter</h5>
                                    <span class="percent">80%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-2s">
                                    <i class="bi bi-braces-asterisk fs-1"></i>
                                    <h5>Dart</h5>
                                    <span class="percent">79%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-3s">
                                    <i class="bi bi-cup-straw fs-1"></i>
                                    <h5>Java</h5>
                                    <span class="percent">83%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-4s">
                                    <i class="bi bi-collection fs-1"></i>
                                    <h5>Livewire</h5>
                                    <span class="percent">88%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-5s">
                                    <i class="bi bi-git fs-1"></i>
                                    <h5>Git/GitHub</h5>
                                    <span class="percent">94%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-2s">
                                    <i class="bi bi-eyedropper fs-1"></i>
                                    <h5>Figma</h5>
                                    <span class="percent">89%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-3s">
                                    <i class="bi bi-filetype-json fs-1"></i>
                                    <h5>JSON/REST</h5>
                                    <span class="percent">96%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-4s">
                                    <i class="bi bi-diagram-2 fs-1"></i>
                                    <h5>OOP/DSA</h5>
                                    <span class="percent">93%</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="skill-item wow fadeInUp delay-0-5s">
                                    <i class="bi bi-code-square fs-1"></i>
                                    <h5>PHP/MySQL</h5>
                                    <span class="percent">93%</span>
                                </div>
                            </div>
                        </div>
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
        <!-- Skill Area end -->
        
        
        <!-- Projects Area start -->
        <!-- <section class="projects-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                            <span class="sub-title mb-15">Latest Works</span>
                            <h2>Explore My Popular <span>Projects</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center pb-25">
                    <div class="col-lg-6">
                        <div class="project-image wow fadeInLeft delay-0-2s">
                            <img src="assets/images/projects/project1.jpg" alt="Project">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="project-content wow fadeInRight delay-0-2s">
                            <span class="sub-title">Product Design</span>
                            <h2><a href="{{ url('services') }}">Mobile Application Design</a></h2>
                            <p>Sed ut perspiciatis unde omnin natus totam rem aperiam eaque inventore veritatis architecto beatae</p>
                            <a href="{{ url('services') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center pb-25">
                    <div class="col-lg-6 order-lg-2">
                        <div class="project-image wow fadeInLeft delay-0-2s">
                            <img src="assets/images/projects/project2.jpg" alt="Project">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 ms-auto">
                        <div class="project-content wow fadeInRight delay-0-2s">
                            <span class="sub-title">Product Design</span>
                            <h2><a href="{{ url('services') }}">Website Makeup Design</a></h2>
                            <p>Sed ut perspiciatis unde omnin natus totam rem aperiam eaque inventore veritatis architecto beatae</p>
                            <a href="{{ url('services') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center pb-25">
                    <div class="col-lg-6">
                        <div class="project-image wow fadeInLeft delay-0-2s">
                            <img src="assets/images/projects/project3.jpg" alt="Project">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="project-content wow fadeInRight delay-0-2s">
                            <span class="sub-title">Product Design</span>
                            <h2><a href="{{ url('services') }}">Brand Identity and Motion Design</a></h2>
                            <p>Sed ut perspiciatis unde omnin natus totam rem aperiam eaque inventore veritatis architecto beatae</p>
                            <a href="{{ url('services') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center pb-25">
                    <div class="col-lg-6 order-lg-2">
                        <div class="project-image wow fadeInLeft delay-0-2s">
                            <img src="assets/images/projects/project4.jpg" alt="Project">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 ms-auto">
                        <div class="project-content wow fadeInRight delay-0-2s">
                            <span class="sub-title">Product Design</span>
                            <h2><a href="{{ url('services') }}">Mobile Application Development</a></h2>
                            <p>Sed ut perspiciatis unde omnin natus totam rem aperiam eaque inventore veritatis architecto beatae</p>
                            <a href="{{ url('services') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="project-btn text-center wow fadeInUp delay-0-2s">
                    <a href="{{ url('services') }}" class="theme-btn">View More Projects <i class="far fa-angle-right"></i></a>
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
        <!-- Projects Area end -->
        
        
        <!-- Testimonial Area start -->
        <!-- <section class="testimonials-area rel z-1">
            <div class="for-bgc-black py-130 rpy-100">
                <div class="container">
                    <div class="row gap-90">
                        <div class="col-lg-4">
                            <div class="testimonials-content-part rel z-2 rmb-55 wow fadeInUp delay-0-2s">
                                <div class="section-title mb-40">
                                    <span class="sub-title mb-15">Clients Testimonials</span>
                                    <h2>I’ve 1253+ Clients <span>Feedback</span></h2>
                                    <p>Sed ut perspiciatis unde omnin natus totam rem aperiam eaque inventore veritatis</p>
                                </div>
                                <div class="slider-arrows">
                                    <button class="testimonial-prev"><i class="fal fa-arrow-left"></i></button>
                                    <button class="testimonial-next"><i class="fal fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="testimonials-wrap">
                                <div class="testimonial-item wow fadeInUp delay-0-3s">
                                    <div class="author">
                                        <img src="assets/images/testimonials/author1.png" alt="Author">
                                    </div>
                                    <div class="text">At vero eoset accusamus et iusto odio dignissimos ducimus quie blanditiis praesentium voluptatum deleniti atque corrupti dolores</div>
                                    <div class="testi-des">
                                        <h5>Rodolfo E. Shannon</h5>
                                        <span>CEO & Founder</span>
                                    </div>
                                </div>
                                <div class="testimonial-item wow fadeInUp delay-0-4s">
                                    <div class="author">
                                        <img src="assets/images/testimonials/author2.png" alt="Author">
                                    </div>
                                    <div class="text">Nam libero tempore cumsoluta nobise est eligendi optio cumque nihil impedit quominus idquod maxime placeat facere possimus</div>
                                    <div class="testi-des">
                                        <h5>Kenneth J. Dutton</h5>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                                <div class="testimonial-item wow fadeInUp delay-0-2s">
                                    <div class="author">
                                        <img src="assets/images/testimonials/author1.png" alt="Author">
                                    </div>
                                    <div class="text">At vero eoset accusamus et iusto odio dignissimos ducimus quie blanditiis praesentium voluptatum deleniti atque corrupti dolores</div>
                                    <div class="testi-des">
                                        <h5>Rodolfo E. Shannon</h5>
                                        <span>CEO & Founder</span>
                                    </div>
                                </div>
                                <div class="testimonial-item wow fadeInUp delay-0-2s">
                                    <div class="author">
                                        <img src="assets/images/testimonials/author2.png" alt="Author">
                                    </div>
                                    <div class="text">Nam libero tempore cumsoluta nobise est eligendi optio cumque nihil impedit quominus idquod maxime placeat facere possimus</div>
                                    <div class="testi-des">
                                        <h5>Kenneth J. Dutton</h5>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
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
        </section> -->
        <!-- Testimonial Area end -->
        
        
        <!-- Pricing Area start -->
        <!-- <section class="pricing-area pt-130 rpt-100 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                            <span class="sub-title mb-15">Pricing Package</span>
                            <h2>Amazing <span>Pricing</span> For your Projects</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item wow fadeInUp delay-0-2s">
                            <div class="pricing-header">
                                <h4 class="title">Basic Plan</h4>
                                <p class="save-percent">Try Out Basic Plan Save <span>20%</span></p>
                                <span class="price">19.95</span>
                            </div>
                            <div class="pricing-details">
                                <p>Sed perspiciatis unde natus totam see rem aperiam eaque inventore</p>
                                <ul>
                                    <li>Website Design</li>
                                    <li>Mobile Apps Design</li>
                                    <li>Product Design</li>
                                    <li class="unable">Digital Marketing</li>
                                    <li class="unable">Custom Support</li>
                                </ul>
                                <a href="{{ url('contact') }}" class="theme-btn">Choose Package <i class="far fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item wow fadeInUp delay-0-4s">
                            <div class="pricing-header">
                                <h4 class="title">Standard Plan</h4>
                                <p class="save-percent">Try Out Basic Plan Save <span>35%</span></p>
                                <span class="price">19.95</span>
                            </div>
                            <div class="pricing-details">
                                <p>Sed perspiciatis unde natus totam see rem aperiam eaque inventore</p>
                                <ul>
                                    <li>Website Design</li>
                                    <li>Mobile Apps Design</li>
                                    <li>Product Design</li>
                                    <li>Digital Marketing</li>
                                    <li>Custom Support</li>
                                </ul>
                                <a href="{{ url('contact') }}" class="theme-btn">Choose Package <i class="far fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item wow fadeInUp delay-0-6s">
                            <div class="pricing-header">
                                <h4 class="title">Basic Plan</h4>
                                <p class="save-percent">Try Out Basic Plan Save <span>45%</span></p>
                                <span class="price">19.95</span>
                            </div>
                            <div class="pricing-details">
                                <p>Sed perspiciatis unde natus totam see rem aperiam eaque inventore</p>
                                <ul>
                                    <li>Website Design</li>
                                    <li>Mobile Apps Design</li>
                                    <li>Product Design</li>
                                    <li>Digital Marketing</li>
                                    <li>Custom Support</li>
                                </ul>
                                <a href="{{ url('contact') }}" class="theme-btn">Choose Package <i class="far fa-angle-right"></i></a>
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
        </section>  -->
        <!-- Pricing Area end -->
        
        
        <!-- Contact Area start -->
        <section class="contact-area pt-95 pb-130 rpt-70 rpb-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-content-part pt-5 rpt-0 rmb-55 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-40">
                                <span class="sub-title mb-15">Get In Touch</span>
                                <h2>Let’s Talk For your <span>Next Projects</span></h2>
                                <p>Sed ut perspiciatis unde omnin natus totam rem aperiam eaque inventore veritatis</p>
                            </div>
                            <ul class="list-style-two">
                                <li>3+ Years Of Experience</li>
                                <li>Professional Web Developer</li>
                                <li>Implementations & Deployment</li>
                                <li>Custom Designs and Professional Development</li>
                            </ul>
                        </div>
                    </div>
                 <div class="col-lg-8">
   <div class="contact-form contact-form-wrap form-style-one wow fadeInUp delay-0-4s">
    <form id="contactForm" name="contactForm" 
          action="{{ route('send.contact') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Full Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                           placeholder="Enter Your Name Here" required>
                    <label for="name" class="for-icon"><i class="far fa-user"></i></label>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="support@gmail.com" required>
                    <label for="email" class="for-icon"><i class="far fa-envelope"></i></label>
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Phone -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                           placeholder="+880 (123) 456 88" required>
                    <label for="phone_number" class="for-icon"><i class="far fa-phone"></i></label>
                    @error('phone_number') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Subject -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control"
                           placeholder="Subject" required>
                    <label for="subject" class="for-icon"><i class="far fa-edit"></i></label>
                    @error('subject') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Message -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="4"
                              placeholder="Write message" required></textarea>
                    @error('message') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Submit -->
            <div class="col-md-12">
                <div class="form-group mb-0">
                    <button type="submit" class="theme-btn">
                        Send a Message <i class="far fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
      

    </form>

    @if(session('success'))
        <p class="text-success mt-2">{{ session('success') }}</p>
    @endif
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
        <!-- Contact Area end -->
        
        
        <!-- Blog Area start -->
        <!-- <section class="blog-area rel z-1">
            <div class="for-bgc-black pt-130 pb-100 rpt-100 rpb-70">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                                <span class="sub-title mb-15">News & Blog</span>
                                <h2>Latest News & <span>Blog</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog-item wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img src="assets/images/blog/blog1.png" alt="Blog">
                                </div>
                                <div class="content">
                                    <div class="blog-meta mb-35">
                                        <a class="tag" href="{{ url('about') }}">Design</a>
                                        <a class="tag" href="{{ url('about') }}">Figma</a>
                                    </div>
                                    <h5><a href="{{ url('about') }}">Tips For Conductin See Usability Studies</a></h5>
                                    <hr>
                                    <div class="blog-meta mt-35">
                                        <a class="date" href="#"><i class="far fa-calendar-alt"></i> September 25, 2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog-item wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img src="assets/images/blog/blog2.png" alt="Blog">
                                </div>
                                <div class="content">
                                    <div class="blog-meta mb-35">
                                        <a class="tag" href="{{ url('about') }}">Design</a>
                                        <a class="tag" href="{{ url('about') }}">Figma</a>
                                    </div>
                                    <h5><a href="{{ url('about') }}">Keyboard-Only Suppor Assistive Technology</a></h5>
                                    <hr>
                                    <div class="blog-meta mt-35">
                                        <a class="date" href="#"><i class="far fa-calendar-alt"></i> September 25, 2023</a>
                                    </div>
                                </div>
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
        </section> -->
        <!-- Blog Area end -->
        
        <!-- Client Log start -->
        <!-- <div class="client-logo-area rel z-1 pt-130 rpt-100 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-title text-center pt-5 mb-65 wow fadeInUp delay-0-2s">
                            <h6>I’ve <span>1253+ Global Clients</span> & lot’s of Project Complete</h6>
                        </div>
                    </div>
                </div>
                <div class="client-logo-wrap">
                    <a class="client-logo-item wow fadeInUp delay-0-2s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo1.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-3s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo2.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-4s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo3.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-5s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo4.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-6s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo5.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-2s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo6.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-3s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo7.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-4s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo8.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-5s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo9.png" alt="Client Logo">
                    </a>
                    <a class="client-logo-item wow fadeInUp delay-0-6s" href="{{ url('contact') }}">
                        <img src="assets/images/client-logos/client-logo10.png" alt="Client Logo">
                    </a>
                </div>
            </div>
            <div class="bg-lines">
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
            </div>
        </div> -->
        <!-- Client Log end -->
        
        
        <!-- footer area start -->
        <footer class="main-footer rel z-1">
            <div class="footer-top-wrap bgc-black pt-100 pb-75">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <div class="footer-widget widget_logo wow fadeInUp delay-0-2s">
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="footer-widget widget_nav_menu wow fadeInUp delay-0-4s">
                                <h6 class="footer-title">Quick Link</h6>
                                <ul>
                                    <li><a href="{{ url('services') }}">Services</a></li>
                                    <li><a href="{{ url('about') }}">About</a></li>
                                    <li><a href="{{ url('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                            <div class="footer-widget widget_newsletter wow fadeInUp delay-0-4s">
                                <form action="#">
                                    <label for="email-address"><i class="far fa-envelope"></i></label>
                                    <input id="email-address" type="email" placeholder="Email Address" required>
                                    <button>Sign Up <i class="far fa-angle-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5">
                            <div class="footer-widget widget_contact_info wow fadeInUp delay-0-6s">
                                <h6 class="footer-title">Address</h6>
                                <ul>
                                    <li><i class="far fa-map-marker-alt"></i>Pakistan</li>
                                    <li><i class="far fa-envelope"></i> <a href="mailto:support@gmail.com">ammarmalik046@gmail.com</a></li>
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
                                <p>Copyright @2025, <a href="{{ url('/') }}">Ammar's Portfolio</a> All Rights Reserved</p>
                            </div>
                       </div>
                       <div class="col-lg-6 text-lg-end">
                           <ul class="footer-bottom-nav">
                               <li><a href="https://www.linkedin.com/in/ammar-khalid-15883b247" target="_blank">LinkedIn</a></li>
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
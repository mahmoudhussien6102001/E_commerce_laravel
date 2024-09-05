@extends('website.layouts.master')

@section('title' ,'About page')  

@section('main-content') 


<div class="site-wrap">


<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">About</strong></div>
        </div>
      </div>
    </div> 



    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="{{asset('assets/images/blog_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded">
                <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="ion-md-play"></span></a>

              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            
            
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">How We Started</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius repellat, dicta at laboriosam, nemo exercitationem itaque eveniet architecto cumque, deleniti commodi molestias repellendus quos sequi hic fugiat asperiores illum. Atque, in, fuga excepturi corrupti error corporis aliquam unde nostrum quas.</p>
            <p>Accusantium dolor ratione maiores est deleniti nihil? Dignissimos est, sunt nulla illum autem in, quibusdam cumque recusandae, laudantium minima repellendus.</p>
            
          </div>
        </div>
      </div>
    </div>


    
    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>The Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{asset('assets/images/person_3.jpg')}}" alt="Image placeholder" class="mb-4">
                  <h3 class="block-38-heading h4">Mahmoud Hussein</h3>
                  <p class="block-38-subheading"> The Team Leader</p>
                </div>
                <div class="block-38-body">
                  <p>Led a team in developing and deploying an E-commerce platform with PHP Laravel, managing the project lifecycle and contributing to development, code review, and project management.</p>
                </div>
              </div>
            </div>
          </div>
    
          <div class="col-md-6 col-lg-4">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" class="mb-4">
                  <h3 class="block-38-heading h4">Mohamed Sedeek</h3>
                  <p class="block-38-subheading">Laravel Backend Developer</p>
                </div>
                <div class="block-38-body">
                  <p>I'm a Laravel backend developer specializing in scalable, secure web applications, delivering tailored, high-performance solutions with up-to-date industry knowledge.</p>
                </div>
              </div>
            </div>
          </div>
    
          <div class="col-md-6 col-lg-4">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{asset('assets/images/person_2.jpg')}}" alt="Image placeholder" class="mb-4">
                  <h3 class="block-38-heading h4">Ahmed Sayed</h3>
                  <p class="block-38-subheading">Full-Stack Developer</p>
                </div>
                <div class="block-38-body">
                  <p>Professional web developer specializing in PHP and Laravel. I create high-performance web applications, focusing on innovative solutions and adhering to the latest standards for project success.</p>
                </div>
              </div>
            </div>
          </div>
    
          <div class="col-md-6 col-lg-4">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{asset('assets/images/person_4.jpg')}}" alt="Image placeholder" class="mb-4">
                  <h3 class="block-38-heading h4">Waad Ahmed</h3>
                  <p class="block-38-subheading">Backend Developer-Laravel</p>
                </div>
                <div class="block-38-body">
                  <p>I'm a Backend Developer skilled in PHP and Laravel, focused on creating scalable web applications, managing databases, and integrating APIs for optimal performance and security.</p>
                </div>
              </div>
            </div>
          </div>
    
          <div class="col-md-6 col-lg-4">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{asset('assets/images/person_5.jpg')}}" alt="Image placeholder" class="mb-4">
                  <h3 class="block-38-heading h4">Omar Yehia</h3>
                  <p class="block-38-subheading">Backend Developer</p>
                </div>
                <div class="block-38-body">
                  <p>I'm a backend developer with strong PHP skills, focused on creating secure, scalable web applications and delivering innovative solutions by staying updated with industry trends.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    



    
    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    
































































</div>



@endsection
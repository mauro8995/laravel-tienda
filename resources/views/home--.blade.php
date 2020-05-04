@extends('layouts.base')
@section('content')
<!-- Masthead -->
<header class="">
  <div class="container h-100" style="padding-top:100px;">
    <div class="row h-100 align-items-center justify-content-center text-center" style="padding:20px;">
     <strong><h1>CUENTA REGRESIVA PARA EL AÑO NUEVO</h1></div></strong>
    <div class="row h-100 align-items-center justify-content-center text-center">
      
         
        <style type="text/css">
        .form_input
        {
          font-family: Verdana;
          font-size: 12;
          color: #f4623a;
          border-width: 0; 
          
          text-align: center;
        }
        .time
        {
          font-family: 'Fjalla One', sans-serif;
          font-size:50px;
          background-color: #f4623a;
          border-radius: 6px;
          border: #000;
          color: #fff;
          padding-left: 15px;
          padding-right: 15px;
          padding-top: 20px;
          padding-bottom: 20px;
          margin: 5px;
          -webkit-box-shadow: 0px 0px 33px -12px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 33px -12px rgba(0,0,0,0.75);
box-shadow: 0px 0px 33px -12px rgba(0,0,0,0.75);
        }
        </style>
         
        </head>
         
        <!--Al iniciar la pagina, ejecutamos la funcion-->
        <body onload="countDown();">
         
        <!--formulario deshabilitado donde se muestran los datos-->
        <form name="form">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-secondary  mb-3" >
                  <div class="card-header"><input type="text" size="5" class="form_input" name="year" disabled> <br></div>
                  <div class="card-body text-secondary ">
                    <h5 class="card-title">AÑOS </h5>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-secondary  mb-3" >
                  <div class="card-header"><input type="text" size="5" class="form_input" name="month" disabled> <br></div>
                  <div class="card-body text-secondary ">
                    <h5 class="card-title">MESES</h5>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-secondary  mb-3" >
                  <div class="card-header"><input type="text" size="5" class="form_input" name="day" disabled> <br></div>
                  <div class="card-body text-secondary ">
                    <h5 class="card-title">DIAS</h5>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-secondary  mb-3" >
                  <div class="card-header"><input type="text" size="5" class="form_input" name="hour" disabled><br></div>
                  <div class="card-body text-secondary ">
                    <h5 class="card-title">HORAS</h5>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-secondary  mb-3" >
                  <div class="card-header"><input type="text" size="5" class="form_input" name="minute" disabled> <br></div>
                  <div class="card-body text-secondary ">
                    <h5 class="card-title">MIN.</h5>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-secondary  mb-3" >
                  <div class="card-header"><input type="text" size="5" class="form_input" name="second" disabled> <br></div>
                  <div class="card-body text-secondary ">
                    <h5 class="card-title">SEG.</h5>
                    
                  </div>
                </div>
              </div>
            </div>
<!-- fin del primer contador -->

            <div class="container-fluid" style="margin: 25px;">
              <div class="row">
                <div class="col-xl-12 col-md-12 mb-12">
                  <span class="time new_month">

                  </span>
                    
                  <span class="time new_day">

                  </span>
                    
                  <span class="time new_hour">

                  </span>
                  
                  <span class="time new_minute">
                    
                  </span>
                  
                  <span class="time new_second">

                  </span>
                  
                  
                </div>

                
              </div>
            </div>

            
           

           

          </div>
        </form>
    </div>
  </div>
</header>

<!-- About Section -->
<section id="portfolio">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('/img/portfolio/fullsize/1.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/1.jpg')}}" alt="">
          <div class="portfolio-box-caption">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/2.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/2.jpg')}}" alt="">
          <div class="portfolio-box-caption">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/3.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/3.jpg')}}" alt="">
          <div class="portfolio-box-caption">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/4.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/4.jpg')}}" alt="">
          <div class="portfolio-box-caption">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/5.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/5.jpg')}}" alt="">
          <div class="portfolio-box-caption">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/6.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/6.jpg')}}" alt="">
          <div class="portfolio-box-caption p-3">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/6.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/6.jpg')}}" alt="">
          <div class="portfolio-box-caption p-3">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-sm-6">
        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/6.jpg')}}">
          <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/6.jpg')}}" alt="">
          <div class="portfolio-box-caption p-3">
            <div class="project-category text-white-50">
              Category
            </div>
            <div class="project-name">
              Project Name
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="page-section" id="services">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
        </div>
      </div>
      
    </div>
    
   
  </div>
</section>

<!-- Portfolio Section -->


<!-- Call to Action Section -->
<section class="page-section bg-dark text-white">
  <div class="container text-center">
    <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
    <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
  </div>
</section>
@endsection

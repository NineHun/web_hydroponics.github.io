@php
$site_name = get_setting_value('_site_name');
$jumbotron = get_section_data('JUMBOTRON');
$location = get_setting_value('_location');
$site_description = get_setting_value('_site_description');

$instagram = get_setting_value('_instagram');
$linkedin = get_setting_value('_linkedin');
$github = get_setting_value('_github');
$about = get_section_data('ABOUT');

$content = get_content();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $site_name }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
      .masthead-avatar {
        transition: filter 0.3s;
      }

      .masthead-avatar:hover {
        filter: brightness(50%);
      }

      /* Tambahkan kode CSS berikut */
      .navbar {
        background-color: transparent !important; /* Membuat background navbar menjadi transparan */
        border: none; /* Menghapus border jika ada */
      }

      /* Tambahkan kode ini untuk menambah efek pada elemen link di navbar */
      .navbar .nav-link {
        color: white; /* Mengubah warna teks link menjadi putih */
      }

      .navbar .nav-link:hover {
        color: lightgray; /* Mengubah warna teks link saat hover */
      }

      .navbar-toggler {
        color: white; /* Mengubah warna ikon toggler menjadi putih */
        border-color: white; /* Mengubah warna border toggler menjadi putih */
      }

      /* Custom header style */
      .masthead-custom {
        position: relative;
        background: url('{{ Storage::url($jumbotron->thumbnail) }}') no-repeat center center;
        background-size: cover;
        height: 100vh; /* Ensure it covers the full viewport height */
      }
      
      .masthead-custom::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Adjust the transparency here */
        z-index: 1;
      }

      .masthead-custom .container {
        position: relative;
        z-index: 2;
      }
    </style>
  </head>
  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#page-top">{{ $site_name }}</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#partner">News</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Information</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#profile">Contact Us</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('filament.auth.login') }}">Log in</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-dark text-white text-center position-relative masthead-custom">
      <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5 rounded-circle" src="{{ asset('images/Screenshot2024-05-29010733.png') }}" alt="Cinque Terre" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer;" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ $jumbotron->title }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">{!! strip_tags($jumbotron->content) !!}</p>
      </div>
    </header>

    <!-- Content Section-->
    <section class="page-section portfolio bg-secondary text-white" id="partner">
    <div class="container">
        <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <!-- Content Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase mb-0">News</h2>
        <!-- Icon Divider-->
        <div class="divider-custom-line"></div>
        </div>
        
        <!-- Content Grid Items-->
        <div class="row justify-content-center">
        @php
        $i=1;
        @endphp

        @foreach ($content as $item)
        <!-- Content Item {{ $i }}-->
        <div class="col-md-6 col-lg-4 mb-5">
            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal{{ $i }}">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-green"> 
                <i class="fas fa-plus fa-3x"></i>
                <p class="text-green">{{$item->title}}</p> 
                </div>
            </div>
            <img class="img-fluid rounded" src="{{ Storage::url($item->thumbnail) }}" alt="..." />
            </div>
        </div>
        <!-- last content {{ $i }}-->
        @php
        $i++;
        @endphp
        @endforeach
        </div>
    </div>
    </section>
    

    <!-- About Section-->
    <section class="masthead bg-dark text-white text-center position-relative mb-0" id="about">
      <div class="container">
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">{{ $about->title }}</h2>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
        <div class="col-lg-6 me-auto lead">
            <p class="page-section-subheading text-muted">In the heart of innovation, where ideas mingle with ambition and creativity dances with technology, lies the essence of our mission. We are not merely creators; we are architects of tomorrow's possibilities. With each line of code, each stroke of design, we sculpt the future, a future where boundaries are but a distant memory. Our journey is one of perpetual evolution, where learning is our compass and curiosity our fuel.</p>
        </div>
        <div class="col-lg-6 me-auto lead">
            <p class="page-section-subheading text-muted">Amidst the digital symphony, we orchestrate experiences that transcend the ordinary, crafting digital realms that captivate, inspire, and transform. Our canvas extends beyond pixels; it encompasses emotions, aspirations, and dreams. We are storytellers, weaving narratives that resonate across screens and souls, leaving an indelible mark on the tapestry of human experience. Our passion is our guide, guiding us through the vast expanse of the digital landscape, where every click is a step towards innovation, and every pixel is a brushstroke of possibility.</p>
        </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center" id="profile">
      <div class="container">
        <div class="row">
          <!-- Footer Location-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">
              {{$location}}
            </p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            @if ($instagram)
                <a class="btn btn-outline-light btn-social mx-1" href="{{ $instagram }}" target="blank"><i 
                    class="fab fa-fw fa-instagram"></i></a>
            @endif

            @if ($linkedin)
                <a class="btn btn-outline-light btn-social mx-1" href="{{ $linkedin }}" target="blank"><i 
                    class="fab fa-fw fa-linkedin"></i></a>
            @endif

            @if ($github)
                <a class="btn btn-outline-light btn-social mx-1" href="{{ $github }}" target="blank"><i 
                class="fab fa-fw fa-github"></i></a>
            @endif

            </div>
          <!-- Footer About Text-->
          <div class="col-lg-4">
            <h4 class="text-uppercase mb-4">Information</h4>
            <p class="lead mb-0">
              {!! strip_tags($site_description) !!}
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
      <div class="container"><small>simple &copy; {{ $site_name }} 2023</small></div>
    </div>
    <!-- content Modals-->
    @php
        $i=1;
    @endphp

    @foreach ($content as $item)
    <!-- content Modal {{ $i }}-->

<div class="portfolio-modal modal fade" id="portfolioModal{{ $i }}" tabindex="-1" aria-labelledby="portfolioModal{{ $i }}" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body text-center pb-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <!-- content Modal - Title-->
              <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{ $item->title }}</h2>
              <!-- Icon Divider-->
              <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
              </div>
              <!-- content Modal - Image-->
              <div class="embed-responsive embed-responsive-21by9 mt-4">
                <!-- Overlay untuk latar belakang -->
                <div class="embed-responsive-overlay"></div>
                <!-- Iframe video -->
                <iframe class="embed-responsive-item" src="{{ $item->video_link }}" allowfullscreen></iframe>
              </div>
              <!-- content Modal - Text-->
              {!! $item->content !!}
              <div class="m-5">
                Link : <a href="{{ $item->link }}" target="blank">{{ $item->link }}</a>
              </div>
              <button class="btn btn-primary" data-bs-dismiss="modal">
                <i class="fas fa-xmark fa-fw"></i>
                Close Window
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    @php
        $i++;
    @endphp
    @endforeach
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
      <div class="container"><small> &copy; {{ $site_name }}</small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>

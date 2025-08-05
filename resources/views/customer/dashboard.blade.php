<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lempeng Cengklok</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
  <style>
   html, body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  scroll-behavior: smooth;
  overflow-x: hidden;
  background-color: #f7f9fb;
}

/* Navbar tetap di atas */
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  background-color: white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Logo branding */
.navbar-brand img {
  height: 40px;
}

    .hero-carousel {
      position: relative;
      height: 100vh;
      overflow: hidden;
    }

    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 100vh;
      filter: brightness(0.5);
    }

    .hero-text-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
      z-index: 2;
      text-align: center;
    }

    .glass-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      backdrop-filter: blur(10px);
      padding: 30px;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .product-img {
      height: 220px;
      object-fit: cover;
      border-radius: 16px 16px 0 0;
    }

    .card:hover {
      transform: scale(1.03);
      transition: 0.3s;
    }

    .login-dropdown {
      position: relative;
    }

    .login-dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: white;
      min-width: 180px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      border-radius: 10px;
      overflow: hidden;
      z-index: 1;
    }

    .login-dropdown:hover .login-dropdown-content {
      display: block;
    }

    .login-dropdown-content a {
      display: block;
      padding: 10px 20px;
      text-decoration: none;
      color: #333;
      transition: background-color 0.3s ease;
    }

    .login-dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    #desc {
      background: linear-gradient(120deg, #ffffff, #e3f2fd);
      padding: 80px 20px;
      margin-top: 0;
    }

    #desc .content-box {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .floating-img {
      animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    footer {
      background: #2e7d32;
      color: white;
      padding: 40px 0;
      text-align: center;
    }

    footer img {
      height: 60px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-success" href="/">
      <img src="{{ asset('storage/Logo.png') }}" alt="Logo" class="h-40 w-auto mx-auto" />
    </a><a class="navbar-brand fw-bold text-success" href="/">Lempi-Go</a>
    <div class="ms-auto login-dropdown">
      <button class="btn btn-outline-dark">
        <i class="fas fa-bars"></i> Login
      </button>
      <div class="login-dropdown-content">
        <a href="{{ route('join') }}#mitra">Login Mitra</a>
        <a href="{{ route('join') }}#admin">Login Admin</a>
      </div>
    </div>
  </div>
</nav>

<!-- HERO CAROUSEL -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="{{ asset('storage/slide1.jpeg') }}" alt="slide 1" />
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slide2.jpeg') }}" alt="slide 2" />
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slide3.jpeg') }}" alt="slide 3" />
    </div>
  </div>
  <div class="hero-text-overlay">
    <div class="glass-box">
      <h1 class="display-4 fw-bold">Lempeng Cengklok Wonogiri</h1>
      <p class="lead">Diproduksi oleh Kelompok Tani "Makaryo Tani" Cengklok Ngadirojo Wonogiri</p>
    </div>
  </div>
</div>

<!-- SECTION "TENTANG KAMI" -->
<section id="desc">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4" data-aos="fade-right">
        <img src="{{ asset('storage/about.png') }}" class="img-fluid rounded shadow" alt="Tentang Kami">
      </div>
      <div class="col-md-6 content-box" data-aos="fade-left">
  <!-- Maps Google -->
  <div class="mb-4 rounded shadow overflow-hidden">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.2612816128235!2d110.92310567404126!3d-7.537524474577782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a020b4e2d6d6f%3A0x5b9ad24b7ef14468!2sNgadirojo%2C%20Wonogiri%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1691234567890!5m2!1sid!2sid" 
      width="100%" 
      height="250" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <h2 class="text-success mb-3">Tentang Kami</h2>
  <p>Kami adalah komunitas UMKM lokal yang memproduksi dan memasarkan <strong>Lempeng Cengklok Wonogiri</strong> berkualitas tinggi dengan harga terjangkau. Melalui inovasi dan kerja sama, kami menghadirkan produk sehat langsung dari tangan petani ke meja Anda.</p>
  <ul class="list-unstyled mt-3">
    <li><i class="fa fa-check text-success"></i> 100% Lokal dan Organik</li>
    <li><i class="fa fa-check text-success"></i> Diproduksi oleh Mitra Terpercaya</li>
    <li><i class="fa fa-check text-success"></i> Dukungan terhadap Ekonomi Desa</li>
  </ul>
</div>
    </div>
  </div>
</section>

<div class="container py-5">
  <h2 class="text-center mb-4 text-success" data-aos="zoom-in">Produk Unggulan Mitra Kami</h2>
  @if($products->isEmpty())
    <div class="alert alert-warning text-center">Belum ada produk tersedia.</div>
  @endif
  <div class="row">
  @foreach($products as $product)
  <div class="col-md-4 mb-4" data-aos="fade-up">
    <div class="card h-100">
      <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/no-image.png') }}" class="product-img floating-img" alt="{{ $product->name }}">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="card-text"><strong>Stok:</strong> {{ $product->stock }}</p>
        <p class="card-text text-muted">{{ Str::limit($product->description, 80) }}</p>
        <div class="mt-auto">
          @if($product->wa)
            <a href="https://wa.me/{{ $product->wa }}" target="_blank" class="btn btn-outline-success btn-sm w-100 mb-2">
              <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
            </a>
          @endif
          @if($product->ig)
            <a href="https://instagram.com/{{ $product->ig }}" target="_blank" class="btn btn-outline-danger btn-sm w-100">
              <i class="fab fa-instagram"></i> Pesan via Instagram
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endforeach
  </div>
</div>

<footer>
  <div class="container">
    <h5 class="mb-3">Ingin bergabung menjadi mitra?</h5>
    <p class="mb-1">Hubungi kami via WhatsApp:</p>
    <p><a href="https://wa.me/6281234567890" class="text-white">+62 812-3456-7890</a></p>
    <div class="mt-3">
      <a href="https://www.tiktok.com/@lempengcengklok" class="text-white me-3"><i class="fab fa-tiktok"></i></a>
      <a href="https://wa.me/6281234567890" class="text-white"><i class="fab fa-whatsapp"></i></a>
    </div>
    <p class="mt-3">&copy; {{ date('Y') }} Lempeng Cengklok. All rights reserved.</p>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
  });

  const carousel = document.querySelector('#heroCarousel');
  const bsCarousel = new bootstrap.Carousel(carousel, {
    interval: 500,
    ride: 'carousel'
  });
</script>
</body>
</html>

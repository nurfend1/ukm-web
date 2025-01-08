<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Website informasi UKM kampus" />
    <meta name="author" content="UKM Kampus" />
    <title>Informasi UKM Kampus</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homestyle.css') }}">
    <style>
        /* Warna background minimalis dan estetis */
        body {
            background-color: #f7f7f7; /* Warna latar belakang utama */
            color: #333; /* Teks gelap untuk kontras yang baik */
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: #2d3e50; /* Gelap dengan sentuhan modern */
        }

        .navbar-brand {
            color: #fbb13c; /* Warna kuning emas untuk brand */
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* Teks putih untuk tautan */
        }

        .navbar-nav .nav-link:hover {
            color: #fbb13c; /* Kuning emas saat hover */
        }

        /* Heading Row - Warna background untuk bagian ini */
        .heading-row {
            background-color: #ffffff; /* Putih agar lebih bersih */
            padding: 60px 0; /* Padding lebih banyak untuk jarak */
        }

        .carousel-inner img {
            object-fit: cover;
            height: 400px; /* Ukuran tetap untuk carousel */
        }

        /* Call to Action Card - Warna latar belakang untuk bagian ini */
        .card.bg-secondary {
            background-color: #333; /* Warna latar belakang gelap */
            color: #fff; /* Warna teks putih */
        }

        /* Carousel dengan chunk data */
        .carousel-item {
            background-color: #f4f4f4; /* Warna latar belakang terang untuk chunk */
        }

        .card {
            background-color: #fff; /* Putih untuk kartu */
            border: 1px solid #ddd; /* Border abu-abu muda */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
        }

        .card-body {
            padding: 20px; /* Padding yang lebih besar agar isi tidak terasa sempit */
        }

        /* Kegiatan Section */
        .kegiatan-section {
            background-color: #ffffff; /* Putih untuk membedakan dari bagian lain */
            padding: 50px 0; /* Padding lebih banyak untuk jarak */
        }

        /* Footer */
        footer {
            background-color: #2d3e50; /* Gelap untuk footer */
            color: white;
            padding: 20px 0;
        }

        footer p {
            margin: 0;
        }

        /* Button */
        .btn-primary {
            background-color: #fbb13c; /* Kuning emas untuk tombol */
            border: none;
        }

        .btn-primary:hover {
            background-color: #f07b00; /* Warna sedikit lebih gelap saat hover */
        }

    </style>
</head>
<body>

    <x-navbar />

    <!-- Heading Row -->
    <div class="heading-row">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7">
                    <div id="ukmCarousel1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="tugu-depan2_utdi.jpg" class="img-fluid rounded mb-4 mb-lg-0" alt="Gambar UKM 1" />
                            </div>
                            <div class="carousel-item">
                                <img src="media.png" class="img-fluid rounded mb-4 mb-lg-0" alt="Gambar UKM 2" />
                            </div>
                            <div class="carousel-item">
                                <img src="imagewebp.webp" class="img-fluid rounded mb-4 mb-lg-0" alt="Gambar UKM 3" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ukmCarousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ukmCarousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Selamat Datang di Portal UKM Kampus</h1>
                    <p>Di sini, kamu bisa menemukan berbagai informasi tentang Unit Kegiatan Mahasiswa (UKM) di kampus kita. Jelajahi berbagai aktivitas, tujuan, dan event UKM yang dapat kamu ikuti untuk mengembangkan diri.</p>
                    <a class="btn btn-primary" href="{{ route('ukm.index') }}">Lihat UKM</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action (Pembaruan) -->
<!-- Call to Action (Menggunakan Heroicons) -->
<div class="card bg-secondary my-5 py-5 text-center">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center">
            <!-- Ikon dari Heroicons -->
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Judul Atraktif -->
            <h2 class="text-white fw-bold mb-3" style="font-size: 2rem;">
                Temukan Potensi Terbaikmu!
            </h2>

            <!-- Deskripsi Motivasi -->
            <p class="text-white mb-4" style="max-width: 600px; font-size: 1.2rem;">
                Jadilah bagian dari komunitas yang mendukung bakat dan minatmu. Bersama UKM Kampus, 
                kembangkan diri dan raih pengalaman berharga untuk masa depanmu.
            </p>

            <!-- Tombol Atraktif -->
            <a href="{{ route('ukm.index') }}" class="btn btn-primary btn-lg px-5 py-3" style="font-size: 1.2rem; background: linear-gradient(90deg, #fbb13c, #f07b00); border: none;">
                Jelajahi UKM Sekarang
            </a>
        </div>
    </div>
</div>



    <!-- Carousel dengan chunk data -->
    <div id="ukmCarousel2" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($ukms->chunk(3) as $index => $ukmChunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($ukmChunk as $ukm)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <img src="{{ asset('storage/' . $ukm->logo_url) }}" alt="Logo {{ $ukm->name }}" class="img-fluid me-3" style="width: 50px; height: auto;">
                <div>
                    <h5>{{ $ukm->name }}</h5>
                    <p>{{ \Str::limit($ukm->description, 150, '...') }}</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('ukm.show', $ukm->id) }}" class="btn btn-sunkiss-orange btn-sm">Selengkapnya</a>
            </div>
        </div>
    </div>
@endforeach

                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#ukmCarousel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#ukmCarousel2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Kegiatan Section -->
    <div class="kegiatan-section">
        <h2 class="text-center mb-4">Kegiatan UKM</h2>
        <div class="row">
            <div class="container my-5">
                <div class="row justify-content-center">
                    @foreach($kegiatans as $kegiatan)
                    <div class="col-md-8 col-lg-6 mb-4">
                        <div class="card bg-transparent border-0">
                            <div class="row g-0">
                                <div class="col-md-4 my-auto">
                                    <!-- Gambar Kegiatan -->
                                    <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->title }}" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body bg-transparent rounded">
                                        <!-- Judul Kegiatan -->
                                        <h5 class="card-title mb-1">{{ $kegiatan->title }}</h5>
                                        <!-- Waktu Kegiatan -->
                                        <p class="card-text mb-1">
                                            <small class="text-muted">
                                                {{ $kegiatan->created_at->diffForHumans() }}
                                            </small>
                                        </p>
                                        <!-- Deskripsi Singkat Kegiatan -->
                                        <p class="card-text">
                                            {{ \Str::limit($kegiatan->description, 150) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Link ke halaman detail kegiatan -->
                            <a href="{{ route('infokegiatan.show', $kegiatan->id) }}" title="{{ $kegiatan->title }}" class="stretched-link"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            

        </div>
    </div>

    <!-- Footer -->
    <x-footer />
    <footer>
        <div class="container">
            <p class="m-0 text-white">Copyright &copy; UKM Kampus 2024</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

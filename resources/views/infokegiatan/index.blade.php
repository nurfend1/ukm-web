<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Informasi UKM di Kampus" />
    <meta name="author" content="UKM Kampus" />
    <title>Informasi Kegiatan UKM</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/homestyle.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
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

        /* Membuat card lebih menonjol dengan efek shadow dan border-radius */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efek saat hover pada card */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }

        .activity-img {
            width: 100%;
            height: 200px;
            object-fit: cover; 
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .activity-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .activity-description {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Styling untuk grid landscape */
        .activity-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            padding-top: 30px;
        }

        .activity-card {
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .activity-footer {
            background-color: #f1f1f1;
            padding: 10px 0;
            border-radius: 0 0 15px 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <x-navbar />

    <!-- Page Content -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Kegiatan Terbaru dari UKM</h2>
        <p class="text-center mb-5">Temukan kegiatan terbaru dari UKM yang ada di kampus.</p>

        <div class="row">
            @foreach($ukms as $ukm)
                @foreach($ukm->activities as $activity)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $activity->image) }}" alt="Foto Kegiatan" class="activity-img mb-3">
                                <strong>{{ $ukm->name }}</strong>
                                <p>{{ Str::limit($activity->description, 150) }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('infokegiatan.show', $activity->id) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
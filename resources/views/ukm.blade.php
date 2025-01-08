<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Informasi UKM di Kampus" />
    <meta name="author" content="UKM Kampus" />
    <title>UKM di Kampus</title>
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
            background-color: #3b2a2a; /* Warna latar belakang gelap */
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
    
        /* Warna latar belakang card */
        .card-dark {
            background-color: #262626;
            color: white;
        }
    
        /* Efek pada tombol "Selengkapnya" */
        .btn-light {
            background-color: #ffc107; /* Warna latar belakang tombol */
            color: #333; /* Warna teks tombol */
            border: 1px solid #ccc; /* Border tombol */
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
    
        /* Efek saat tombol di-hover */
        .btn-light:hover {
            background-color: #ffc107; /* Ubah latar belakang menjadi kuning saat hover */
            color: #fff; /* Ubah warna teks menjadi putih saat hover */
            transform: translateY(-3px); /* Efek angkat saat di-hover */
        }
    
        .btn-light:focus {
            outline: none; /* Hilangkan outline saat tombol fokus */
        }
    </style>
    
</head>
<body>
    <x-navbar />

    <!-- Page Content -->
    <div class="container my-5">
        <h2 class="text-center">Unit Kegiatan Mahasiswa (UKM)</h2>
        <p class="text-center">Temukan informasi lengkap mengenai UKM di kampus dan pilih yang sesuai dengan minat Anda.</p>

        <div class="row">
            @foreach($ukms as $ukm)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 card-dark">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('storage/' . $ukm->logo_url) }}" alt="Logo {{ $ukm->name }}" class="img-fluid me-3" style="width: 50px; height: auto;">
                            <div>
                                <h5>{{ $ukm->name }}</h5>
                                <p class="ukm-description" id="description-{{ $ukm->id }}">{{ $ukm->description }}</p>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('ukm.show', $ukm->id) }}" class="btn btn-light btn-sm"><strong>Selengkapnya</strong></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        

    </div>

    <!-- Footer -->
    <footer class="footer-dark text-center py-4">
        <div class="container">
            <p class="m-0 text-white">Copyright &copy; UKM Kampus 2024</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
    $(".toggle-description").click(function() {
        var ukmId = $(this).data("ukm-id");
        var description = $("#description-" + ukmId);

        // Toggle kelas 'expanded' untuk memperpanjang atau mengurangi deskripsi
        description.toggleClass("expanded");

        // Ubah teks tombol
        if (description.hasClass("expanded")) {
            $(this).html("<strong>Kurangi</strong>");
        } else {
            $(this).html("<strong>Selengkapnya</strong>");
        }
    });
});

    </script>
</body>
</html>

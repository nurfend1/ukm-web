<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kegiatan->title }} - Detail Kegiatan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }
        .detail-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 2rem;
        }
        .detail-card img {
            max-height: 300px;
            border-radius: 8px;
        }
        .info-item {
            margin-bottom: 1rem;
        }
        .info-item strong {
            color: #0056b3;
        }
        .btn-action {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-action:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>
    <x-navbar />

    <!-- Detail Kegiatan -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="detail-card">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="Kegiatan {{ $kegiatan->title }}" class="img-fluid mb-3">
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title">{{ $kegiatan->title }}</h2>
                            <p>{{ $kegiatan->description }}</p>
                            <div class="info-item">
                                <p><strong>Tanggal Kegiatan:</strong> {{ \Carbon\Carbon::parse($kegiatan->date)->format('d F Y') }}</p>
                            </div>
                            <div class="info-item">
                                <p><strong>Diselenggarakan oleh:</strong> {{ $kegiatan->ukm->name }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-action">Ikuti Kegiatan</a>
                                <a href="javascript:history.back()" class="btn btn-outline-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

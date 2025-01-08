<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ukm->name }} - Profil UKM</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Golden ratio layout */
        .content-wrapper {
            margin-top: 30px;
        }

        /* Profil dan kegiatan menggunakan golden ratio */
        .ukm-logo {
            max-width: 200px;
            max-height: 200px;
            object-fit: contain;
        }

        .description {
            margin-bottom: 20px;
        }

        /* Menambahkan margin untuk ruang antar bagian */
        .section-title {
            margin-top: 30px;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .activity-list img {
            max-width: 100%;
            height: auto;
        }

        /* Bagian profil dan kegiatan menggunakan golden ratio */
        .row-golden-ratio {
            display: flex;
            gap: 30px;
        }

        .profile-col {
            flex: 38%;  /* Golden ratio 38% */
        }

        .activities-col {
            flex: 62%;  /* Golden ratio 62% */
        }

        .activity-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
            margin-bottom: 20px;
        }

        .activity-card h5 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .activity-card p {
            margin-bottom: 10px;
        }

        /* Tombol kembali */
        .btn-back {
            margin-top: 30px;
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <x-navbar />

    <!-- Profil UKM -->
    <div class="container content-wrapper">
        <div class="row row-golden-ratio">
            <!-- Bagian logo dan deskripsi UKM -->
            <div class="profile-col">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $ukm->logo_url) }}" alt="Logo {{ $ukm->name }}" class="ukm-logo mb-3">
                </div>
                <h2>{{ $ukm->name }}</h2>
                <p class="description">{{ $ukm->description }}</p>
                <p><strong>Visi & Misi:</strong></p>
                <ul>
                    @if(!empty($ukm->missions) && is_array($ukm->missions))
                        @foreach($ukm->missions as $mission)
                            <li>{{ $mission }}</li>
                        @endforeach
                    @else
                        <p>Belum tersedia.</p>
                    @endif
                </ul>
                <p><strong>Kontak:</strong> {{ $ukm->contact }}</p>
            </div>

            <!-- Bagian kegiatan -->
            <div class="activities-col">
                <div class="section-title">Kegiatan Terbaru:</div>
                @foreach($ukm->activities as $activity)
                    <div class="activity-card">
                        <h5>{{ $activity->title }}</h5>
                        <p><strong>Deskripsi:</strong> {{ $activity->description }}</p>
                        <p><strong>Tanggal:</strong> {{ $activity->start_date }} - {{ $activity->end_date }}</p>
                        @if($activity->image)
                            <!-- Tautan untuk melihat dokumentasi -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $activity->id }}" class="btn btn-primary">Lihat Dokumentasi</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal untuk gambar kegiatan -->
        @foreach($ukm->activities as $activity)
            <div class="modal fade" id="imageModal{{ $activity->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $activity->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{ $activity->id }}">Dokumentasi Kegiatan: {{ $activity->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="Image for {{ $activity->title }}" class="img-fluid">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

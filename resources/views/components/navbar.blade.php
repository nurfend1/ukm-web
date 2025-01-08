<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3e50;">
    <div class="container px-5">
        <a class="navbar-brand text-warning" href={{ url('/') }} style="color: #fbb13c;">UKM Kampus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ url('/') }} style="color: #ffffff;">Beranda</a>
                </li>
                <a class="nav-link" href="{{ route('ukm.index') }}" style="color: #ffffff;">UKM</a>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('infokegiatan.index') }}" style="color: #ffffff;">Kegiatan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

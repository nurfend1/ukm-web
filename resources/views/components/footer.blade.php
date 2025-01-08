<!-- resources/views/components/footer.blade.php -->
<style>
    /* Styling untuk footer */
.bg-utdi-blue {
    background-color: #2d3e50; /* Ganti dengan warna biru UTDI */
}

.text-utdi-orange {
    color: #f07b00; /* Ganti dengan warna oranye UTDI */
}

.text-light {
    color: #f8f9fa; /* Warna teks terang untuk footer */
}

.footer img {
    max-width: 100%;
    height: auto;
}

    </style>
<footer class="py-5 text-muted bg-utdi-blue">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-3 text-center mb-5">
                <img src="{{ asset('utdi-2b.png') }}" alt="UTDI" class="img-fluid w-75">
                <hr>
                <div class="text-light">
                    <p>
                        Website Unit Kegiatan Mahasiswa Universitas Teknologi Digital Indonesia (UTDI) - dahulu STMIK Akakom
                    </p>
                    Jl. Raya Janti Karang Jambe No. 143 <br>Yogyakarta 55198, Indonesia
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="mb-3 text-utdi-orange">Informasi</h3>
                <ul class="list-unstyled text-light">
                    <li class="mb-1">
                        <i class="bi bi-telephone me-3"></i>
                        +62 274 486664
                    </li>
                    <li class="mb-1">
                        <i class="bi bi-envelope me-3"></i>
                        info@utdi.ac.id
                    </li>
                </ul>

                <h3 class="mb-3 text-utdi-orange">Ikuti Kami</h3>
                <ul class="list-inline">
                    <li class="list-inline-item mb-2 me-3">
                        <a href="https://www.facebook.com/utdi.official/" target="_blank">
                            <img src="https://utdi.ac.id/___files/25360_1517158800_link_33.png" title="Facebook" alt="Facebook" width="25">
                        </a>
                    </li>
                    <li class="list-inline-item mb-2 me-3">
                        <a href="https://www.tiktok.com/@utdiofficial" target="_blank">
                            <img src="https://www.utdi.ac.id/___files/48026_1638896400_link_86.png" title="TikTok" alt="TikTok" width="25">
                        </a>
                    </li>
                    <li class="list-inline-item mb-2 me-3">
                        <a href="https://www.youtube.com/c/UniversitasTeknologiDigitalIndonesia" target="_blank">
                            <img src="https://utdi.ac.id/___files/36721_1517158800_link_39.png" title="YouTube" alt="YouTube" width="25">
                        </a>
                    </li>
                    <li class="list-inline-item mb-2 me-3">
                        <a href="https://www.instagram.com/utdi_official/" target="_blank">
                            <img src="https://www.utdi.ac.id/___files/36510_1638896400_link_36.png" title="Instagram" alt="Instagram" width="25">
                        </a>
                    </li>
                    <li class="list-inline-item mb-2 me-3">
                        <a href="https://twitter.com/utdiofficial" target="_blank">
                            <img src="https://www.utdi.ac.id/___files/76637_1638896400_link_35.png" title="Twitter" alt="Twitter" width="25">
                        </a>
                    </li>
                    <li class="list-inline-item mb-2 me-3">
                        <a href="https://www.linkedin.com/school/utdiofficial/" target="_blank">
                            <img src="https://www.utdi.ac.id/___files/15241_1638896400_link_54.png" title="LinkedIn" alt="LinkedIn" width="25">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="mb-3 text-utdi-orange">Tautan</h3>
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <a href="https://keuportal.utdi.ac.id" class="text-light text-decoration-none" title="Sistem Informasi Keuangan Pembayaran Universitas Teknologi Digital Indonesia">KEUPORTAL</a>
                    </li>
                    <li class="mb-1">
                        <a href="https://siakad.utdi.ac.id" class="text-light text-decoration-none" title="Sistem Informasi Akademik Universitas Teknologi Digital Indonesia">SIAKAD</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

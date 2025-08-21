<!-- Footer -->
<footer class="bg-gradient-to-r  from-teal-800 to-cyan-600 text-white mt-5 py-4">
  <div class="container max-w-7xl">
    <div class="row gy-4">
      
      <!-- Hubungi Kami -->
      <div class="col-12 col-md-6">
        <h5 class="mb-3 text-center text-md-start">Hubungi Kami</h5>
        <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start">
          <!-- Ikon Call Center -->
          <div class="mb-3 mb-sm-0 me-sm-3 text-center text-sm-start">
            <img src="{{ asset('umum/images/icon-call-center.png') }}" alt="Contact Center PLN 123" width="120">
          </div>
          <!-- Daftar Kontak -->
          <div class="d-flex flex-column gap-2">
            <div class="d-flex align-items-center">
              <img src="{{ asset('umum/images/contact-icon.png') }}" width="22">
              <span class="ms-2">123</span>
            </div>
            <div class="d-flex align-items-center">
              <img src="{{ asset('umum/images/phone-icon.png') }}" width="22">
              <span class="ms-2">(kode area) 123</span>
            </div>
            <div class="d-flex align-items-center">
              <img src="{{ asset('umum/images/twiter-icon.png') }}" width="22">
              <span class="ms-2">@pln_123</span>
            </div>
            <div class="d-flex align-items-center">
              <img src="{{ asset('umum/images/facebook-icon.png') }}" width="22">
              <span class="ms-2">PLN 123</span>
            </div>
            <div class="d-flex align-items-center">
              <img src="{{ asset('umum/images/email-icon.png') }}" width="22">
              <span class="ms-2">pln123@pln.co.id</span>
            </div>
            <div class="d-flex align-items-center">
              <img src="{{ asset('umum/images/instagram-icon.png') }}" width="22">
              <span class="ms-2">pln123_official</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Sitemap -->
      <div class="col-6 col-md-3 text-center text-md-start">
        <h5 class="mb-3">Sitemap</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">Pelanggan</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">Media</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">Tentang Kami</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">Stakeholder</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">PLN Peduli</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">KIP</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">Karier</a></li>
          <li><a href="#" class="text-white text-decoration-none d-block mb-1">Webmail</a></li>
        </ul>
      </div>

      <!-- Ikuti Kami -->
      <div class="col-6 col-md-3 text-center text-md-start">
        <h5 class="mb-3">Ikuti Kami</h5>
        <div class="d-flex justify-content-center justify-content-md-start gap-3">
          <a href="#"><img src="{{ asset('umum/images/facebook-icon.png') }}" width="30" alt="Facebook"></a>
          <a href="#"><img src="{{ asset('umum/images/twiter-icon.png') }}" width="30" alt="Twitter"></a>
          <a href="#"><img src="{{ asset('umum/images/youtube-icon.png') }}" width="30" alt="Youtube"></a>
          <a href="#"><img src="{{ asset('umum/images/instagram-icon.png') }}" width="30" alt="Instagram"></a>
        </div>
      </div>
    </div>

    <hr class="border-light mt-4">

    <!-- Copyright -->
    <div class="text-center small">
      <p class="mb-0">© 2025 PT PLN (Persero) - All Rights Reserved</p>
    </div>
  </div>
</footer>

<!-- Instalasi Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    let navbar = document.getElementById("stickyNavbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            navbar.classList.add("visible-navbar");
            navbar.classList.remove("hidden-navbar");
        } else {
            navbar.classList.remove("visible-navbar");
            navbar.classList.add("hidden-navbar");
        }
    });
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'), {
        interval: 2000,  // Ganti angka ini untuk mengatur durasi antar slide
        ride: 'carousel'
    });
    document.querySelectorAll(".toggle-content").forEach(button => {
        button.addEventListener("click", function () {
            let targetId = this.getAttribute("data-target");
            
            // Sembunyikan semua konten terlebih dahulu
            document.querySelectorAll(".content-section").forEach(section => {
                section.style.display = "none";
            });

            // Tampilkan konten yang sesuai dengan tombol yang diklik
            document.getElementById(targetId).style.display = "block";
        });
    });
</script>
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let q = this.value.toLowerCase();
    let items = document.querySelectorAll('#newsList div.border');
    items.forEach(div => {
        let text = div.innerText.toLowerCase();
        div.style.display = text.includes(q) ? '' : 'none';
    });
});
</script>
<script>
  // Toggle mobile menu
  document.getElementById('menu-btn').addEventListener('click', function () {
    document.getElementById('menu').classList.toggle('hidden');
  });
</script>
</body>
</html>
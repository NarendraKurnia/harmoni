</div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  // notifikasi
<?php if(Session::get('sukses')) { ?>
  Swal.fire({
    title: 'Berhasil!',
    text: "{{ Session::get('sukses') }}",
    icon: 'success',
    confirmButtonText: 'Ok, Terimakasih'
});
<?php } ?> 

  // Popup Delete konfirmasi
  $(document).ready(function() {
    // Event handler untuk link dengan class 'delete-link'
    $('.delete-link').on('click', function(e) {
      e.preventDefault(); 

      var href = $(this).attr('href'); 

      // Menampilkan konfirmasi dengan SweetAlert2
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor:  '#d33',
        confirmButtonText:  'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if    (result.isConfirmed) {
          // Jika pengguna menkonfirmasi, lanjutkan ke URL penghapusan
          window.location.href = href;
        }    
      });
    });
   });
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script> -->
</body>
</html>
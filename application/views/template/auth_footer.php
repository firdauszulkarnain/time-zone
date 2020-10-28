   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- SELECT PICKER -->
   <script src="<?= base_url() ?>assets/js/bootstrap-select.js"></script>
   <script src="<?= base_url('assets/js/select/defaults-id_ID.min.js') ?>"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

   <script>
      // const regis = document.getElementById('regis');
      // if (regis = 'CUSTOMER') {
      //    roleId = 3
      // } else if (regis = 'SELLER') {
      //    roleId = 2
      // }
      // $('#provinsi').on('change', function() {
      //    var prov = $(this).val();
      //    console.log(prov);
      //    $.ajax({
      //       url: ,
      //       type: 'post',
      //       data: 'id_provinsi=' + prov,
      //       success: function() {}
      //    });
      // });
      $('#provinsi').on('change', function() {
         var idprov = $(this).val();
         $.ajax({
            type: "post",
            url: "<?= base_url('auth/alamat/kabupaten') ?>",
            data: "id_provinsi=" + idprov,
            success: function(msg) {
               $("#kabupaten").html(msg).selectpicker('refresh');
               $(".kabupaten").selectpicker('refresh');
               ambildatakecamatan();
            }
         });
      });
      $("#kabupaten").change(ambildatakecamatan);

      function ambildatakecamatan() {
         var idkab = $("#kabupaten").val();
         $.ajax({
            type: "post",
            url: "<?= base_url('auth/alamat/kecamatan') ?>",
            data: "id_kabupaten=" + idkab,
            success: function(msg) {
               $("#kecamatan").html(msg).selectpicker('refresh');
               $("select.kecamatan").selectpicker('refresh');
               ambildatakelurahan();
            }
         });
      }
      $("#kecamatan").change(ambildatakelurahan);

      function ambildatakelurahan() {
         var idkec = $("#kecamatan").val();
         $.ajax({
            type: 'post',
            url: "<?= base_url('auth/alamat/kelurahan') ?>",
            data: "id_kecamatan=" + idkec,
            success: function(msg) {
               $("#kelurahan").html(msg).selectpicker('refresh');
               $("select.kelurahan").selectpicker('refresh');
            }
         });
      }
   </script>
   </body>

   </html>
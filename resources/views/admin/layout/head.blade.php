<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Icon web -->
  <link rel="icon" href="{{asset('dist/img/Logo_PLN.png') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('jquery-ui/external/jquery/jquery.js') }}"></script>
   <!-- jQuery -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
  <!-- sweetalert -->
  <script src="{{ asset('sweetalert/js/sweetalert.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert/css/sweetalert.css') }}">
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- TinyMCE -->
  <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
  <script>
          tinymce.init({
          selector: '#editor',  // ID textarea yang akan diubah menjadi TinyMCE
          toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
          menubar: false,
          forced_root_block: false, // Ini memastikan TinyMCE tidak menghapus isi textarea
          setup: function(editor) {
              editor.on('change', function() {
                  tinymce.triggerSave(); // Pastikan TinyMCE menyimpan isi textarea
              });
          }
      });
  </script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper"></div>
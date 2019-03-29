<!doctype html>
<html>
<head>
@include('common.head')
</head>
<body>

@include('common.nav')

@include('layouts.form-new-todo')

@yield('content')


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>
</html>

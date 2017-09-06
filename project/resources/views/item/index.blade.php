@extends('master')
@section('content')
<div id="app" class="gogogo">
</div>
 <script>
   window.Laravel = <?php echo json_encode([
       'csrfToken' => csrf_token(),
            ]); ?>
  </script>
<script src="{{asset('js/app.js')}}"></script>
@endsection

<!doctype html>
<html lang="en">

  @include('blocks.head')

  <body>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')


  @include('blocks.script')

  <script type="">
    $(document).ready(function(){
      $('#xemthem').click(function(){
        $('#4').removeAttr('style');
        $('#5').removeAttr('style');
        $('#xemthem').css('display', 'none');
      })
    })
  </script>

  </body>
</html>
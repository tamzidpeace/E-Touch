<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
     function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('public/user/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/user/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{ asset('public/user/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{ asset('public/user/js/jquery-1.11.1.min.js') }}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('public/user/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/user/js/easing.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
     $(".scroll").click(function(event){		
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
     });
});
</script>
<!-- start-smoth-scrolling -->
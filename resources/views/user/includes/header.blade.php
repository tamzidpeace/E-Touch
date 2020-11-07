<div class="logo_products">
     <div class="container">
          <div class="w3ls_logo_products_left">
               <span>
                    <img id="logoImage" height="80px" style="" src="{{ asset('public/images/logo.png') }}" alt="">
               </span>
               <h1 id="siteName" style=""><a href="{{ route('user.home') }}">E-Touch</a></h1>
          </div>     
        

          

     <div class="w3l_search">
          <form action="{{ route('user.product.search') }}" method="get">
               @csrf
               <input type="search" name="search" placeholder="Search" >               
               <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
               </button>
               <div class="clearfix"></div>
          </form>          
     </div>
          
          <div class="clearfix"> </div>
     </div>
</div>
<!-- //header -->
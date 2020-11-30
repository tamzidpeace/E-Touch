@extends('user.layouts.master')

@section('title')
    <title> Etouch | Home </title>
@endsection

@section('styles')

     <style>
          #siteName {
               margin-left: -50px; margin-top:-60px;
          }

          #logoImage {
               margin-left:-325px;
          }
          

          @media (max-width:767px) {
               #logoImage {
                    margin-left: -180px;
               }

               #siteName {
                    margin-left: 30px
               }

               .w3ls_logo_products_left {
                    margin-bottom: 40px;
               }
          }
     </style>

@endsection

@section('content')

<div class="row">
     <!-- main-slider -->
     <ul id="demo1">
          <li>
               <img src="{{ asset('public/user/images/sl1.jpg') }}" alt="" />
               <!--Slider Description example-->
               <div class="slide-desc">
                    <h3> E-TOUCH ENGINEERING LTD began operations in 2010</h3>
               </div>
          </li>
          <li>
               <img src="{{ asset('public/user/images/sl2.jpg') }}" alt="" />
               <div class="slide-desc">
                    <h3>We are dedicated to bringing the latest concepts, technology and machinery to the industry of Bangladesh.</h3>
               </div>
          </li>

          <li>
               <img src="{{ asset('public/user/images/sl3.jpg') }}" alt="" />
               <div class="slide-desc">
                    <h3>We have our team that is build up with professional engineers and technical experts specialized in utility machinery</h3>
               </div>
          </li>
     </ul>
     <!-- //main-slider -->
</div>


<div class="products">
     <div class="row">
          <div class="col-md-2 products-left">
               <div style="margin-top: 40px;" class="categories">
                    <h3 class="category" style="text-align:center;">Categories</h3>
                    <ul class="cate">
                         @foreach ($categories as $item)
                         <li ><a style="color: black" href="{{ route('user.product.category', ['id' => $item->id]) }}">
                              <i  class="fa fa-arrow-right" aria-hidden="true"></i>{{ $item->name }}</a></li>
                         @endforeach
                    </ul>
               </div>
          </div>
          <div class="col-md-10 products-right">
               <div class="agile_top_brands_grids">
                    <?php $x=0?>
                    @foreach ($products as $item)
                    <div class="col-md-3 top_brand_left" style="margin-bottom: 20px;">
                         <div class="hover14 column">
                              <div class="agile_top_brand_left_grid">                                   
                              <div class="agile_top_brand_left_grid1">
                                   <figure>
                                        <div class="snipcart-item block">
                                             <div class="snipcart-thumb">
                                                  <a style="height: 220px;" href="{{ route('user.product-details', ['id' => $item->id]) }}"><img style="height: 220px; width:220px" title=" " alt=" "
                                                            src="{{ asset('public/images/product/'. $image_names[$x++]->name) }}"></a>
                                                  <p><strong>{{ $item->name }}</strong></p>                                                  
                                             </div>
                                             <div class="snipcart-details top_brand_home_details">
                                                  <form action="#" method="post">
                                                       <fieldset>                                                                                                                      
                                                            <a href="{{ route('user.product-details', ['id' => $item->id]) }}" class="btn btn-primary">Details</a>
                                                       </fieldset>
                                                  </form>
                                             </div>
                                        </div>
                                   </figure>
                              </div>
                         </div>
                    </div>
               </div>

               @endforeach
               <div class="clearfix"> </div>
          </div>

     </div>
     <div class="clearfix"> </div>
</div>
</div>

@endsection
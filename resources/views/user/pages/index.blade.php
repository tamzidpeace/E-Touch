@extends('user.layouts.master')

@section('content')

<div class="row">
     <!-- main-slider -->
     <ul id="demo1">
          <li>
               <img src="{{ asset('public/user/images/11.jpg') }}" alt="" />
               <!--Slider Description example-->
               <div class="slide-desc">
                    <h3>Buy Rice Products Are Now On Line With Us</h3>
               </div>
          </li>
          <li>
               <img src="{{ asset('public/user/images/22.jpg') }}" alt="" />
               <div class="slide-desc">
                    <h3>Whole Spices Products Are Now On Line With Us</h3>
               </div>
          </li>

          <li>
               <img src="{{ asset('public/user/images/44.jpg') }}" alt="" />
               <div class="slide-desc">
                    <h3>Whole Spices Products Are Now On Line With Us</h3>
               </div>
          </li>
     </ul>
     <!-- //main-slider -->
</div>


<div class="products">
     <div class="row">
          <div class="col-md-2 products-left">
               <div style="margin-top: 40px;" class="categories">
                    <h3 style="text-align:center;">Categories</h3>
                    <ul class="cate">
                         @foreach ($categories as $item)
                         <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $item->name }}</a></li>
                         @endforeach
                    </ul>
               </div>
          </div>
          <div class="col-md-10 products-right">
               <div class="agile_top_brands_grids">
                    <?php $x=0?>
                    @foreach ($products as $item)
                    <div class="col-md-3 top_brand_left">
                         <div class="hover14 column">
                              <div class="agile_top_brand_left_grid">                                   
                              <div class="agile_top_brand_left_grid1">
                                   <figure>
                                        <div class="snipcart-item block">
                                             <div class="snipcart-thumb">
                                                  <a href="{{ route('user.product-details', ['id' => $item->id]) }}"><img title=" " alt=" "
                                                            src="{{ asset('public/images/product/'. $image_names[$x++]->name) }}"></a>
                                                  <p>{{ $item->name }}</p>
                                                  <h4>$35.99 <span>$55.00</span></h4>
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
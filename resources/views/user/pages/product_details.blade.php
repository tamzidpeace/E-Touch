@extends('user.layouts.master')

@section('content')

<!-- //breadcrumbs -->
<div class="products">
     <div class="container">
          <div class="agileinfo_single">

               <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="{{ asset('public/images/product/'. $product_image_first->name) }}" alt=" " class="img-responsive">
               </div>
               <div class="col-md-8 agileinfo_single_right">
                    <h2>{{ $product->name }}</h2>                    
                    <div class="w3agile_description">
                         <h4>Description :</h4>
                         <p>{{$product->description}}</p>
                    </div>                    
               </div>
               <div class="clearfix"> </div>
          </div>
     </div>
</div>
<!-- new -->
<div class="newproducts-w3agile">
     <div class="container">
          <h3>Similar Products</h3>
          @foreach ($similar_products as $item)
              
          @endforeach
          <div class="agile_top_brands_grids">
               <?php $i=0; ?>
               @foreach ($similar_products as $item)
                                  
               <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                         <div class="agile_top_brand_left_grid">                              
                              <div class="agile_top_brand_left_grid1">
                                   <figure>
                                        <div class="snipcart-item block">
                                             <div class="snipcart-thumb">
                                                  <a href="{{ route('user.product-details', ['id' => $item->id]) }}"><img title=" " alt=" "
                                                            src="{{ asset('public/images/product/'.$similar_product_images[$i++]->name) }}"></a>
                                                  <p>{{ $item->name }}</p>                                                  
                                                  <h4>$35.99 <span>$55.00</span></h4>
                                             </div>
                                             {{-- <div class="snipcart-details top_brand_home_details">
                                                  <form action="#" method="post">
                                                       <fieldset>
                                                            <input type="hidden" name="cmd" value="_cart">
                                                            <input type="hidden" name="add" value="1">
                                                            <input type="hidden" name="business" value=" ">
                                                            <input type="hidden" name="item_name"
                                                                 value="Fortune Sunflower Oil">
                                                            <input type="hidden" name="amount" value="35.99">
                                                            <input type="hidden" name="discount_amount" value="1.00">
                                                            <input type="hidden" name="currency_code" value="USD">
                                                            <input type="hidden" name="return" value=" ">
                                                            <input type="hidden" name="cancel_return" value=" ">
                                                            <input type="submit" name="submit" value="Add to cart"
                                                                 class="button">
                                                       </fieldset>
                                                  </form>
                                             </div> --}}
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
</div>
<!-- //new -->

@endsection
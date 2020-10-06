@extends('user.layouts.master')

@section('content')

<form action="#">
     <input type="hidden" name="" id="product_id" value="{{ $product->id }}">
</form>
<!-- //breadcrumbs -->
<div class="products">
     <div class="container">
          <div class="agileinfo_single">

               <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="{{ asset('public/images/product/'. $product_image_first->name) }}" alt=""
                         class="img-responsive">
               </div>
               <div class="col-md-8 agileinfo_single_right">
                    <h2>{{ $product->name }}</h2>
                    <div class="w3agile_description">
                         <h4>Description :</h4>
                         <p>{{$product->description}}</p>
                    </div>
               </div>

               <div class="clearfix"> </div>
               <div style="margin-top: 5px;" class="col-md-4 agileinfo_single_left">
                    <div class="row">
                         <?php $x=0; ?>
                         @foreach ($product_images as $item)
                         <div class="col-md-2">
                              <img class="productExtraImages" style="height: 40px; width:40px;" src="{{ asset('public/images/product/'. $item->name) }}" alt="">
                              <form action="#">
                                   <input type="hidden" name="" id="image_no" value="{{ $x++ }}">
                              </form>
                         </div>  
                         @endforeach
                                                 
                    </div>
               </div>
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
                                                  <a href="{{ route('user.product-details', ['id' => $item->id]) }}"><img
                                                            title=" " alt=" "
                                                            src="{{ asset('public/images/product/'.$similar_product_images[$i++]->name) }}"></a>
                                                  <p>{{ $item->name }}</p>
                                                  <h4>$35.99 <span>$55.00</span></h4>
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
</div>
<!-- //new -->

@endsection

@section('scripts')

{{-- <script>
     $(document).ready(function() {
          let product_id = $('#product_id').val();
          $.ajax({
               url:'ajax_product_images',
               type:'GET',
               dataType: 'JSON',
               data: {id:product_id},
               success: function(result) {
                     console.log(result);
                    // $(".productExtraImages" ).click(function() {
                    //      console.log(result[0].name);
                    //      // var source = '{!! asset('public/images/product/'  ') !!}';
                         
                    // $('#example').attr("src", source);
                    // //public/images/product/" + result[0].name
               });
            }
          })          
     });
</script> --}}
    
@endsection
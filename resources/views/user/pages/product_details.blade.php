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
                         <h4 > Category: <small style="color: black"><strong>{{ $product->category->name }}</strong></small></h4>  <br>                         
                         <h4 > Model Number: <small style="color: black"><strong>{{ $product->model_number }}</strong></small></h4>  <br>                         
                         <h4>Description :</h4>
                         <p style="color: black">{{$product->description}}</p><br>
                         <a target="_blank" href="{{ url('public/files/product/'. $product->file) }}" class="btn btn-info">File</a>
                    </div>
               </div>

               <div class="clearfix"> </div>
               <div style="margin-top: 5px;" class="col-md-4 agileinfo_single_left">
                    <div class="row">
                         <?php $x=0; ?>
                         @foreach ($product_images as $item)
                         <div id="productExtraImage"  class="col-md-2 productExtraImages">
                              <img height="220px;" onclick="getImageID({{ $item->id }})" style="height: 40px; width:40px;" src="{{ asset('public/images/product/'. $item->name) }}" alt="">
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
          <div class="agile_top_brands_grids">
               <?php $i=0; ?>
               @if (isset($similar_product_images))
               @foreach ($similar_products as $item)
               
               <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                         <div class="agile_top_brand_left_grid">
                              <div class="agile_top_brand_left_grid1">
                                   <figure>
                                        <div class="snipcart-item block">
                                             <div class="snipcart-thumb">
                                                  <a href="{{ route('user.product-details', ['id' => $item->id]) }}"><img
                                                           height="220px;" title=" " alt=" "
                                                            src="{{ asset('public/images/product/'.$similar_product_images[$i++]->name) }}"></a>
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
               @endif               


               <div class="clearfix"> </div>
          </div>
     </div>
</div>
<!-- //new -->

@endsection

@section('scripts')

<script>               
     function getImageID(id) {
          //console.log(id);
          $.ajax({
               url : 'ajax_product_images',
               type : 'GET',
               dataType: 'json',
               data : {id:id},
               success : function(result) {
                    //console.log(result.image.name);
                    let source =  "http://" + result.server+ "/ecommerce/public/images/product/" + result.image.name;
                    $('#example').attr("src", source);
               }
          })
     }
</script>
    
@endsection

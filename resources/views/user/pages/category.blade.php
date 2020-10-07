@extends('user.layouts.master')

@section('content')
<div class="products">
     <div class="row">
          <div class=" products-right">
               <div class="agile_top_brands_grids">                    
                    @foreach ($products as $item)
                    <div class="col-md-3 top_brand_left" style="margin-bottom: 10px;">
                         <div class="hover14 column">
                              <div class="agile_top_brand_left_grid">
                                   <div class="agile_top_brand_left_grid1">
                                        <figure>
                                             <div class="snipcart-item block">
                                                  <div class="snipcart-thumb">
                                                       <a
                                                            href="{{ route('user.product-details', ['id' => $item->id]) }}"><img
                                                                 title=" " alt=" "
                                                                 src="{{ asset('public/images/product/'. $item->productImages->first()->name) }}"></a>
                                                       <p><strong>{{ $item->name }}</strong></p>
                                                  </div>
                                                  <div class="snipcart-details top_brand_home_details">
                                                       <form action="#" method="post">
                                                            <fieldset>
                                                                 <a href="{{ route('user.product-details', ['id' => $item->id]) }}"
                                                                      class="btn btn-primary">Details</a>
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
                   
               </div>
              
          </div>
          {{-- <div class="clearfix"> </div> --}}
          
     </div>
     
</div>


@endsection
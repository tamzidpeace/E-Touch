@extends('user.layouts.master')
@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('public/css/app.css') }}"> --}}
@endsection

@section('content')



<div class="products">
     <div class="row">
          <div class=" products-right">
               <div class="col-md-2 products-left">
                    <div style="margin-top: 40px;" class="categories">
                         <h3 style="text-align:center;">Categories</h3>
                         <ul class="cate">
                              <li ><a style="color: black" href="{{ route('user.home') }}">
                                   <i  class="fa fa-arrow-right" aria-hidden="true"></i>All</a></li>
                              @foreach ($categories as $item)
                              <li ><a style="color: black" href="{{ route('user.product.category', ['id' => $item->id]) }}">
                                   <i  class="fa fa-arrow-right" aria-hidden="true"></i>{{ $item->name }}</a></li>
                              @endforeach
                         </ul>
                    </div>
               </div>
               <div class="agile_top_brands_grids">                    
                    @foreach ($products as $item)
                    <div class="col-md-3 top_brand_left" style="margin-bottom: 10px;">
                         <div class="hover14 column">
                              <div class="agile_top_brand_left_grid">
                                   <div class="agile_top_brand_left_grid1">
                                        <figure>
                                             <div class="snipcart-item block">
                                                  <div class="snipcart-thumb">
                                                       <a style="height: 220px;" href="{{ route('user.product-details', ['id' => $item->id]) }}"><img
                                                                height="220px" title=" " alt=" "
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
     {{ $products->withQueryString()->links() }}     

</div>


@endsection

@section('scripts')
{{-- <script src="{{ asset('public/js/app.js') }}"></script> --}}
    
@endsection
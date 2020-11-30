@extends('user.layouts.master')

@section('content')

<!-- about -->
<div class="about">
     <div class="container">
          <h3 class="w3_agile_header">About Us</h3>
          <div class="about-agileinfo w3layouts">
               <div class="col text-center about-wthree-grids grid-top">
                    <h4>Engineering & Automation Item Import , supply and Support.</h4>
                    <p class="top">E-TOUCH ENGINEERING Ltd began operations in 2010, dedicated to bringing the latest
                         concepts, technology and machinery to the industry of Bangladesh.</p>

                    <div class="about-w3agilerow">
                         <div class="col-md-4 about-w3imgs">
                              <img src=" {{ asset('public/user/images/ab1.png') }} " alt=""
                                   class="img-responsive zoom-img" />
                         </div>
                         <div class="col-md-4 about-w3imgs">
                              <img src="{{ asset('public/user/images/ab2.png')}}" alt=""
                                   class="img-responsive zoom-img" />
                         </div>
                         <div class="col-md-4 about-w3imgs">
                              <img src="{{ asset('public/user/images/ab3.png') }}" alt=""
                                   class="img-responsive zoom-img" />
                         </div>
                         <div class="clearfix"> </div>
                    </div>
               </div>

               <div class="clearfix"> </div>
          </div>
     </div>
</div>
<!-- //about -->
<!-- about-slid -->
<div class="about-slid agileits-w3layouts">
     <div class="container">
          <div class="about-slid-info">
               <h2> E-TOUCH ENGINEERING LTD 
               </h2>
               <p>E-TOUCH ENGINEERING LTD began operations in 2010, dedicated to bringing the latest concepts,
                    technology and machinery to the industry of Bangladesh.</p>
               <p>The Principle Business of our company is importing of Utility machinery and equipments Air compressor,
                    Boiler, Industrial pumps, Generator, Industrial cooling system, Material handling, Cooling Tower etc
                    and giving continues support to customer.</p>
               <p>We have our team that is build up with professional engineers and technical experts specialized in
                    utility machinery.</p>
          </div>
     </div>
</div>
<!-- //about-slid -->

@endsection
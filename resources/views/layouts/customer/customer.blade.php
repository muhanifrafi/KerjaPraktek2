<!DOCTYPE html>
<html lang="zxx" dir="ltr">
@include('includes.head')
@include('includes.topbar')
@include('includes.navbar')
@include('includes.banner')
<main id="main">
    <section id="body">
@include('includes.breadcrumb')
<style>
@foreach ($countries as $country)
.marker{{$loop->iteration}}{
  background-image: url({{ url('frontend/assets/img/icon/world/'.$country->n_cust_fileflag)}});
    background-repeat: no-repeat;
    top: {{ $country->i_cust_coortop}};
    left: {{ $country->i_cust_coorleft}};
}
@endforeach
@media only screen and (min-width:48em){
@foreach ($countries as $country)
.map-item{{$loop->iteration}}{
  background-image: url({{ url('frontend/assets/img/icon/world/'.$country->n_cust_fileflag)}});
    background-repeat: no-repeat;
    top: {{ $country->i_cust_coortop }};
    left: {{ $country->i_cust_coorleft}};
}
@endforeach 
} 
</style>
<section id="worldwide" class="clearfix">
    <!-- Analytics map based session -->
    <div class="row no-gutters">
        <div class="map map-wwc">
            @foreach($countries as $country)
            <div class="map-item map-item{{$loop->iteration}}">
                <a class="marker marker{{$loop->iteration}}" href="#marker{{$loop->iteration}}" title="{{$country->a_cust}}"></a>
                <aside id="marker{{$loop->iteration}}" class="map-popup">
                        <h2 class="popup-title">{{$country->a_cust}}</h2>
                        @inject('CustomerController', 'App\Http\Controllers\CustomerController')
                        @foreach($CustomerController->show($country->a_cust) as $value)
                          <div class="row">
                            <div class="col-12 square">
                              <h3 class="popup-title">{{$value->n_cust}}</h3>
                            </div>
                        </div>
                        @foreach($CustomerController->showplane($value->c_cust) as $airplane)
                        <div class="data-box col-12">
                            <img class="float-left" src="frontend/assets/images_ac/{{$airplane->n_ac_image}}" alt="">
                            <div class="float-right">
                                <div class="title-plane">
                                    {{$airplane->n_title}}
                                </div>
                                <div class="detail-plane">
                                <ul>
                                @foreach($CustomerController->showplane2($airplane->c_custdeliv_ac,$value->c_cust) as $plane)
                                <li><!--b>{{$plane->q_custdeliv_ac}}</b-->{{$plane->e_custdeliv_ac}}</li>
                                @endforeach
                                </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                        @endforeach
                </aside>
            </div>
            @endforeach
            <img src="frontend/assets/img/world-map.jpg" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row pad-row">
            <div class="col-md-6  col-sm-6">
                <h3>Domestic</h3>
                <ul class="liscust">
                @foreach($domestics as $domestic)
                    <li ><i class="fa fa-flag fa-domestic"></i>{{$domestic->n_cust}}</li>
                @endforeach
                </ul>
                </ul>
            </div>
            <div class="col-md-6  col-sm-6">
                <h3>International</h3>
                <ul class="liscust">
                @foreach($internationals as $inter)
                    <li><i class="fa fa-flag fa-intern"></i>{{$inter-> n_cust}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- START:JS World Map & Chart-->
    <script src="backend/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="backend/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="backend/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="backend/app-assets/vendors/js/charts/chart.min.js"></script>
    <!-- END:JS World Map & Chart-->
    <script>
    jQuery(function($) {
        var pop = $('.map-popup');
        pop.click(function(e) {
            e.stopPropagation();
        });

        $('a.marker').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).next('.map-popup').toggleClass('open');
            $(this).parent().siblings().children('.map-popup').removeClass('open');
        });

        $(document).click(function() {
            pop.removeClass('open');
        });

        pop.each(function() {
            var w = $(window).outerWidth(),
                edge = Math.round(($(this).offset().left) + ($(this).outerWidth()));
            if (w < edge) {
                $(this).addClass('edge');
            }
        });
    });
    </script>
@include('pages.contact')
@include('includes.footer')


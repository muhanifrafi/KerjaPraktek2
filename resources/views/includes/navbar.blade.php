<?php
// include "./x-admin/cmslibs_pg/tmcustomer_trainingServices/tmcustomer_trainingServices.php";
// include "./x-admin/cmslibs_pg/tmcust_training_detailServices/tmcust_training_detailServices.php";
// include "./x-admin/cmslibs_pg/tmstatus_trainingServices/tmstatus_trainingServices.php";
// include "./x-admin/cmslibs_pg/tmmroServices/tmmroServices.php";
// include "./x-admin/cmslibs_pg/tmmrodtlServices/tmmrodtlServices.php";
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">

    <div class="menu-container">
        <div class="menu d-flex align-items-center justify-content-between">
            <a href="" class="logo"><img class="img-fluid" src="{{ url('frontend/assets/img/logo/ptdi.png') }}" alt=""></a>
            <ul>
                <li><a href="#">Customer</a>
                    <ul>
                        <li><a href="customer">WorldWide Customers</a></li>
                        <li><a target="_blank" href="./statisfaction">Customer Statisfaction Survey</a></li>
                    </ul>
                </li>
                <li><a href="#">Aircraft</a>
                    <ul>
                        <li><a href="fixed_wing">Fixed Wing</a></li>
                        <li><a href="rotary_wing">Rotary Wing</a></li>
                    </ul>
                </li>
                <li><a href="#">Services</a>
                    <ul class="sub-more">
                        <li>
                            <p>Technical Support</p>
                            <ul>
                                <li><a href="adam">ADAM</a></li>
                                <li><a href="ram">RAM</a></li>
                                <li><a href="warranty_terms">Warranty Terms</a></li>
                            </ul>
                        </li>
                        <li>
                            <p>Manuals</p>
                            <ul>
                                <li>
                                    <a>Aircraft Manuals</a>
                                    <ul class="editable-list">
                                        <li><a href="loap+index">Loap Index</a></li>
                                        <li><a href="sb+index">SB Index</a></li>
                                    </ul>
                                </li>
                                <li><a href="ietm">IETM</a></li>
                            </ul>
                        </li>
                        <li>
                            <p>Spare Parts</p>
                            <ul>
                                <li><a href="stocks">Stock</a></li>
                                <li><a href="howtoorder">How To Order</a></li>
                            </ul>
                        </li>
                        <li>
                            <p>Training</p>
                            <ul>
                            @inject('NavController', 'App\Http\Controllers\NavController')
                            @foreach($NavController->index() as $train)
                                <li><a href="/training_detail-{{$train->id}}-{{$train->n_title}}">{{$train -> n_title}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li>
                            <p>MRO</p>
                            <ul>
                            @foreach($NavController->index2() as $mro)
                            @if ($NavController->index3($mro->i_id_mro)->count() > 0)
                            <li><a href="#">{{$mro -> n_mro_title}}</a>
                            <ul class="editable-list">
                            @foreach($NavController->index3($mro->i_id_mro) as $mrodtl)
                            <li><a href="/mro_detail-{{$mrodtl -> i_id_mrodtl}}-{{$mrodtl -> n_mro_dtl}}">{{$mrodtl -> n_mro_dtl}}</a></li>
                            @endforeach
                            </ul>
                            </li>
                            @else
                            <li><a href="/mro-{{$mro->i_id_mro}}-{{$mro->n_mro_title}}">{{$mro -> n_mro_title}}</a></li>
                            @endif
                            @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Status</a>
                    <ul>
                        <li><a href="fleet">Fleet</a></li>
                        <li><a href="project">Project</a></li>
                        <li><a href="management-representative">Management Representative</a></li>
                    </ul>
                </li>
                <li><a href="certificate">Certificates</a></li>
            </ul>
        </div>
    </div>


</header><!-- End Header -->

<script>
    /*global $ */
    $(document).ready(function () {

        "use strict";

        $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI

        $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
        //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)

        $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");

        //Adds menu-mobile class (for mobile toggle menu) before the normal menu
        //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
        //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
        //Done this way so it can be used with wordpress without any trouble



        // $('.sub-more').addClass('d-flex').addClass('justify-content-center');


        $(".menu > ul > li").hover(function (e) {

            if ($(window).width() > 943) {
                $(this).children("ul").stop(true, false).fadeToggle(150);
                $(this).children("ul .sub-more").stop(true, false).fadeToggle(150).toggleClass(
                    "d-flex justify-content-center");
                // e.preventDefault();
            }
        });
        //If width is more than 943px dropdowns are displayed on hover

        $(".menu > ul > li").click(function () {
            if ($(window).width() <= 943) {
                $(this).children("ul").fadeToggle(150);
            }
        });

        if ($(window).width() <= 943) {
            $(".menu").removeClass('d-flex').removeClass('align-items-center');
        } else {
            $(".menu").addClass('d-flex').addClass('align-items-center');
        }
        //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

        $(".menu-mobile").click(function (e) {
            $(".menu > ul").toggleClass('show-on-mobile');
            e.preventDefault();
        });
        //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

    });

</script>

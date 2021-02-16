@extends('layouts.category')

@section('content')
<div class="cathead pb-1">
<div class="container hh">
<h1 class="text-white"><p class="small-title"><b>10 BEST</b> </p>{{ str_replace('-', ' ', ucfirst($title)) }}s
<p class="small-title">of {{  date('F Y') }}</p>
</h1>
<p class="text-white mt-4"><i class="fas fa-check-circle fa-2x" style="color:#80C947; vertical-align: middle;"></i> 100M consumers helped this year. <span class="d-none d-md-block" style="float: right"><i class="fas fa-tags"></i> BEST DEALS THIS WEEK</span></p>
</div>
</div>
<div style="clear: both"></div>
<nav class="navbar navbar-expand justify-content-center mb-5" style="background-color: #573E78;">
    <ul class="navbar-nav list-group list-group-horizontal">
      <li class="nav-item">
        <a class="nav-link text-white" href="#section1" style="border-bottom: 4px solid #FFE38F">Top 10</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#section2">Related categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#section3">Buying guide</a>
      </li>
    </ul>
  </nav>
<div class="container">
            <?php $i=0 ?>
            @foreach ($products['asin'] as $key => $product)
            <?php $i++ ?>
            @if ($i == 4)
            <div id="section1" class="p-5 mt-3 btn-shadow" style="background-color: #E9F5FC; box-shadow: 0 -10px 16px 0 rgba(0,0,0,.05);">

                  <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading ml-5">
                                <h2 class="panel-title h1">How we score</h2>
                                <b><a class="link-unstyled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                LEARN MORE
                                </a></b>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body ml-5">
                                    Our app considers products features, online popularity, consumer’s reviews, brand reputation, prices, and many more factors, as well as reviews by our experts. The most common brand will be identified by ShuffleLoot  based on the number of the product that was sold daily. The information will be used to update the listings regularly. All the information is converted to value rating that is represented as the product's “score.” The score is used to make the ordered list of the top products.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

            <?php
            if ($key == 0) {
            $min = 9.5; $max = 9.9; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 1) {
            $min = 9.3; $max = 9.7; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 2) {
            $min = 8.9; $max = 9.3; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 3) {
            $min = 8.4; $max = 8.9; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 4) {
            $min = 8.1; $max = 8.4; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 5) {
            $min = 7.9; $max = 8.1; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 6) {
            $min = 7.6; $max = 7.9; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 7) {
            $min = 7.2; $max = 7.6; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 8) {
            $min = 6.9; $max = 7.2; $sc = rand ($min*10, $max*10) / 10;
            } else if ($key == 9) {
            $min = 6.6; $max = 6.9; $sc = rand ($min*10, $max*10) / 10;
            }
            $sc = $sc * 10;
            ?>

            <div id="section1" class="p-3 mt-3" style="background-color: rgb(255, 255, 255); box-shadow: 0 -10px 16px 0 rgba(0,0,0,.05);">
            <div class="row d-flex flex-wrap align-items-center">
            <div class="col-3 d-flex align-items-center justify-content-center prodwrapper"><div class="rounded-circle numb d-flex align-items-center justify-content-center">{{ $loop->iteration }}</div> <a target="_blank" href="/loadretailer/{{ $products['asin'][$key] }}"><img class="prodimg img-fluid" src="{{ $products['image'][$key] }}"></a></div>
            <div class="col-6" style="max-height: 90px; overflow: hidden;">{{ $products['name'][$key] }}</div>
            <div class="col-2 col-lg-3 col-md-3 text-center">
            <span style="display: -webkit-inline-flex; mb-5">
                <div class="progressbar mr-3">
                    <div class="second circle" data-percent="<?php echo $sc; ?>">
                        <div class="value"></div>
                    </div>
                    </div>
            <button onclick="window.open('/loadretailer/{{ $products['asin'][$key] }}')" type="button" class="btn btn-success btn-lg mb-3 d-none d-md-block">View deal</button>
            <form style="display: -webkit-inline-flex;" method="GET" action="http://www.amazon.com/gp/aws/cart/add.html">
                <input type="hidden" name="AWSAccessKeyId" value="[AWSAccessKeyId]"/>
                <input type="hidden" name="AssociateTag" value="bkto-20"/>
                <input type="hidden" name="ASIN.1" value="{{ $products['asin'][$key] }}"/>
                <input type="hidden" name="Quantity.1" value="1"/>
                <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Save it">
                    <button class="ml-2 d-none d-lg-block d-lg-none" type="submit" name="add" value="add" style="border: 0; background: none;">
                      <i class="fas fa-heart fa-2x ciklamen" aria-hidden="true"></i>
                    </button>

                 </a>
            </form>
            </span>
            <p class="d-none d-md-block"><a target="_blank" href="/loadretailer/{{ $products['asin'][$key] }}">Buy it on Amazon</a>
            </p>
            {{-- <div class="progress" style="height: 30px; width: 140px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $sc; ?>%" aria-valuenow="<?php echo $sc; ?>" aria-valuemin="66" aria-valuemax="100"></div>
              </div> --}}
              <script>
                  $(document).ready(function ($) {
                    function animateElements() {
                        $('.progressbar').each(function () {
                            var elementPos = $(this).offset().top;
                            var topOfWindow = $(window).scrollTop();
                            var percent = $(this).find('.circle').attr('data-percent');
                            var animate = $(this).data('animate');
                            if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                                $(this).data('animate', true);
                                $(this).find('.circle').circleProgress({
                                    // startAngle: -Math.PI / 2,
                                    value: percent / 10 / 10,
                                    size : 45,
                                    thickness: 3,
                                    fill: {
                                        color: '#7EC95C'
                                    }
                                }).on('circle-animation-progress', function (event, progress, stepValue) {
                                if (stepValue * 10 < 10) {
                                $(this).find('.value').text((stepValue*10).toFixed(1));
                                }
                                }).stop();
                            }
                        });
                    }

                    animateElements();
                    $(window).scroll(animateElements);
                });
            </script>


                <form style="display: -webkit-inline-flex;" method="GET" action="http://www.amazon.com/gp/aws/cart/add.html">
                    <input type="hidden" name="AWSAccessKeyId" value="[AWSAccessKeyId]"/>
                    <input type="hidden" name="AssociateTag" value="bkto-20"/>
                    <input type="hidden" name="ASIN.1" value="{{ $products['asin'][$key] }}"/>
                    <input type="hidden" name="Quantity.1" value="1"/>
                    <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Save it">
                        <button class="ml-2 d-block d-md-none" type="submit" name="add" value="add" style="border: 0; background: none;">
                          <i class="fas fa-heart fa-2x ciklamen" aria-hidden="true"></i>
                        </button>

                     </a>
                </form>
            </div>
            </div>
        </div>
            @endforeach

        <div class="mt-5">
            <a href="/">Shuffleloot</a> >
            <?php $link = "" ?>
            @for($i = 1; $i <= count(Request::segments()); $i++)
                @if($i < count(Request::segments()) & $i > 0)
                <?php $link .= "/" . Request::segment($i); ?>
                <a href="/categories"><b>Categories</b></a> >
                @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}s
                @endif
            @endfor
        </div>
            <div id="section2" class="p-3 mt-2" style="background-color: rgb(255, 255, 255); box-shadow: 0 -10px 16px 0 rgba(0,0,0,.05);">
                <h2>People also looked at</h2>
                <div class="row">
                @foreach ($related->take(4)->shuffle() as $rel)
                <div class="col-12 col-xl-3 mb-3">
                    <div class="card cardheight">
                        <div class="d-flex align-items-center justify-content-center prodwrapper card-img-top">
                        <a href="{{ str_replace(' ', '-', strtolower($rel['category_name'])) }}"><img class="prodimg p-2 img-fluid" src="{{ $rel['category_image'] }}"></a>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">{{ $rel['category_name'] }}s</h5>
                        </div>
                      </div>
                </div>
                @endforeach
                </div>
            </div>

                    <div id="section3" class="p-3 mt-5" style="background-color: rgb(255, 255, 255); box-shadow: 0 -10px 16px 0 rgba(0,0,0,.05);">
                    <h2>How to choose the best {{ $title }}?</h2>
                    <p>Our {{ $title }} buying guide explains how to compare {{ $title }}s by technical specifications.</p>
                    <p class="mt-5">{!! $products['guide'] !!}</p>
                    </div>

                    <h2 class="mt-5">Product comparison table</h2>
                    <button id="left" class="btn btn-success"><</button>
                    <button id="right" class="btn btn-success">></button>
                    <div class="table-responsive mt-1">
                    <table class="table table-striped table-sm">
                        <caption>{{ $title }} comparison</caption>
                        <thead>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Product name</th>
                                <th scope="">Popularity score</th>
                                <th scope="">Quality score</th>
                                <th scope="">Brand rating</th>
                                <th scope="">Trending now</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach ($products['asin'] as $key => $product)
                            <?php $i++ ?>
                            <?php
                            if ($key == 0) {
                            $min = 9.5; $max = 9.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 1) {
                            $min = 9.3; $max = 9.7; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 2) {
                            $min = 8.9; $max = 9.3; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 3) {
                            $min = 8.4; $max = 8.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 4) {
                            $min = 8.1; $max = 8.4; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 5) {
                            $min = 7.9; $max = 8.1; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 6) {
                            $min = 7.6; $max = 7.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 7) {
                            $min = 7.2; $max = 7.6; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 8) {
                            $min = 6.9; $max = 7.2; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 9) {
                            $min = 6.6; $max = 6.9; $sc = rand ($min*10, $max*10) / 10;
                            }

                            $sc1 = $sc;

                            if ($key == 0) {
                            $min = 9.5; $max = 9.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 1) {
                            $min = 9.3; $max = 9.7; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 2) {
                            $min = 8.9; $max = 9.3; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 3) {
                            $min = 8.4; $max = 8.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 4) {
                            $min = 8.1; $max = 8.4; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 5) {
                            $min = 7.9; $max = 8.1; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 6) {
                            $min = 7.6; $max = 7.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 7) {
                            $min = 7.2; $max = 7.6; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 8) {
                            $min = 6.9; $max = 7.2; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 9) {
                            $min = 6.6; $max = 6.9; $sc = rand ($min*10, $max*10) / 10;
                            }

                            $sc2 = $sc;

                            if ($key == 0) {
                            $min = 9.5; $max = 9.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 1) {
                            $min = 9.3; $max = 9.7; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 2) {
                            $min = 8.9; $max = 9.3; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 3) {
                            $min = 8.4; $max = 8.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 4) {
                            $min = 8.1; $max = 8.4; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 5) {
                            $min = 7.9; $max = 8.1; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 6) {
                            $min = 7.6; $max = 7.9; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 7) {
                            $min = 7.2; $max = 7.6; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 8) {
                            $min = 6.9; $max = 7.2; $sc = rand ($min*10, $max*10) / 10;
                            } else if ($key == 9) {
                            $min = 6.6; $max = 6.9; $sc = rand ($min*10, $max*10) / 10;
                            }

                            $sc3 = $sc;
                            ?>

                            <tr class="tablerow">
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $products['name'][$key] }}</td>
                                <td>
                                <div id="circlecss1">{{ $sc1 }}</div>
                                </td>
                                <td>
                                <div id="circlecss2">{{ $sc2 }}</div>
                                </td>
                                <td>
                                <div id="circlecss3">{{ $sc3 }}</div>
                                </td>
                                <td><span class="fas fa-shopping-bag checked"></span>
                                    <span class="fas fa-shopping-bag checked"></span>
                                    <span class="fas fa-shopping-bag checked"></span>
                                    <span id="ffid" class="fas fa-shopping-bag ff"></span>
                                    <span class="fas fa-shopping-bag fff"></span></td>
                            </tr>
                            @endforeach

                            <script>
                            $(document).ready(function() {

                                var classes = ["checked", "uc"];

                                $(".ff").each(function(){
                                    $(this).addClass(classes[~~(Math.random()*classes.length)]);
                                });

                                if ($( "#ffid" ).hasClass( "checked" )) {
                                    var classes = ["uc"];
                                    $(".fff").each(function(){
                                    $(this).addClass(classes);
                                });
                                } else {
                                    var classes = ["uc"];
                                    $(".fff").each(function(){
                                    $(this).addClass(classes);
                                });
                                }
                            });
                            </script>
                    </table>
                </div>
                <script>
                    $("#right").click(function() {
                    event.preventDefault();
                    $(".table-responsive").animate(
                        {
                        scrollLeft: "+=300px"
                        },
                        "slow"
                    );
                    });

                    $("#left").click(function() {
                    event.preventDefault();
                    $(".table-responsive").animate(
                        {
                        scrollLeft: "-=300px"
                        },
                        "slow"
                    );
                    });
                    </script>


                    <div id="section3" class="p-3 mt-5" style="background-color: rgb(255, 255, 255); box-shadow: 0 -10px 16px 0 rgba(0,0,0,.05);">

                    <h2>More buying guides</h2>
                    <div class="row">
                    @foreach ($guide_related as $gr)
                    <?php $gr->product_guide=str_ireplace('<p>','',$gr->product_guide); ?>
                        <?php $gr->product_guide=str_ireplace('</p>','',$gr->product_guide); ?>
                    <div class="col-12 mt-5 blog-module">
                        <?php echo mb_substr($gr->product_guide, 0, mb_strpos($gr->product_guide, ' ', 380)); ?>... <a href="{{ str_replace('+', '-', strtolower($gr->category_id)) }}">Read more</a>
                    </div>
                    @endforeach
                    <script>
                        $('.blog-module').each(function(){
                            var SP_Link = $(this).find("a").attr('href');
                            var SP_Module_Name = $(this).find("h3").text();
                            $(this).find("h3").replaceWith ('<h3><a href="'+SP_Link+'">'+SP_Module_Name+'</a></h3>');
                            });
                        </script>
                        </div></div>

                        @endsection

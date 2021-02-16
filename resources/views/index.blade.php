@extends('layouts.app')

@section('content')

<div class="s-container text-center">
<div class="container">

    <h1>The easiest way to find the best deals and best products</h1>
<p>ShuffleLoot analyzes thousands of articles and customer reviews to find the top-rated products at today’s lowest prices. With our expert reviews, we try to help you for choosing the right products in every category.</p>
<form id="your_form" class="container" action="" method="post">
<div class="form-row">
<div class="col-md-6 mx-auto">
    <div class="input-group input-group-lg">
            @csrf
          <input spellcheck="false" dir="auto" id="search" type="text" name="category" class="catinput typeahead" placeholder="Show me the best ..." autocomplete="off" autofocus>
          <div class="input-group-append">
            <button id="button1" class="btn btn-outline-secondary b2" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('#your_form .typeahead').typeahead({

        hint: true,
        minLength: 0,
        highlight: true,

        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        },
        highlighter: function (item, data) {
            var parts = item.split('#'),
                html = '<div class="row">';
                // html += '<div class="col-md-2 col-2">';
                // html += '<img class="s-img" src="'+data.img+'">';
                // html += '</div>';
                html += '<div class="col-md-10 pl-0">';
                html += '<span>'+data.name+'s</span>';
                html += '<p class="m-0">See the top 10 '+data.name+'s</p>';
                html += '</div>';
                html += '</div>';

            return html;
        }
    });
    $('#your_form').submit(function(){
        var formAction = $("#search").val().toLowerCase().replace(/ /g, '-')
        $("#your_form").attr("action", "/category/" + formAction);
        });
        var input = document.getElementById('search');
        input.focus();
        input.select();
</script>
</div>
</div>
<div class="container mt-5">
    <h2>Featured buying guides</h2>
        @foreach ($product_guides as $pg)
                <div class="row blog-module mt-4">
            <?php $pg->product_guide=str_ireplace('<p>','',$pg->product_guide); ?>
            <?php $pg->product_guide=str_ireplace('</p>','',$pg->product_guide); ?>
            <div class="col-12 col-md-3 col-lg-3">
                <a href="/category/{{ str_replace('+', '-', strtolower($pg->category_id)) }}"><img class="img-fluid" src="images/guides/{{ $pg->pg_image }}"></a>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
            <?php echo mb_substr($pg->product_guide, 0, mb_strpos($pg->product_guide, ' ', 400)); ?><div class="more"><a href="/category/{{ str_replace('+', '-', strtolower($pg->category_id)) }}" style="display: none">Read more</a></div>
            </div>
        </div>
        @endforeach
        <script>
        $('.blog-module').each(function(){
            var SP_Link = $(this).find(".more a").attr('href');
            var SP_Module_Name = $(this).find("h3").text();
            $(this).find("h3").replaceWith ('<h3><a href="'+SP_Link+'">'+SP_Module_Name+'</a></h3>');
            });
        </script>
</div>

<div class="container mt-5">
    <h2>Who we are</h2>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">What we do</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">How is works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Keep visiting us</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row text-white">
        <div class="col-xl-6 order-2 order-xl-1 align-self-center mb-5 mt-5 tabs">
        <p class="tabcontent">When you are searching for a product on ShuffleLoot, you will see some list of the high-rated brands of that product category. ShuffleLoot gathers necessary information from manufacturers, sales records from retailers, client reviews, and blog articles written by professionals concerning the product to rate the brands in every category.</p>
        </div>
        <div class="col-xl-6 order-1 order-xl-2">
        <img class="img-fluid" src="/images/what-we-do.jpg" alt="what-we-do shuffleloot.com">
        </div>
        </div>
         </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row text-white">
                <div class="col-xl-6 order-2 order-xl-1 align-self-center mb-5 mt-5 tabs">
                <p class="tabcontent">ShuffleLoot is an online site that was designed to support customers in decision-making when purchasing a particular product. The website generates the list of best products and high brands based on the sales records and client reviews.</p>
                </div>
                <div class="col-xl-6 order-1 order-xl-2">
                <img class="img-fluid" src="/images/how-is-works.jpg" alt="what-is-works shuffleloot.com">
                </div>
                </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row text-white">
                <div class="col-xl-6 order-2 order-xl-1 align-self-center mb-5 mt-5 tabs">
                <p class="tabcontent">We are constantly adding more products, reviews, and categories. You can enjoy all this benefits by checking us up from time to time. (Simply Bookmark This Page)</p>
                </div>
                <div class="col-xl-6 order-1 order-xl-2">
                <img class="img-fluid" src="/images/keep-visiting-us.jpg" alt="keep-visiting-us shuffleloot.com">
                </div>
                </div>
        </div>
      </div>
</div>

<div class="container mt-5">
<h2>Popular categories</h2>
    <div class="card-columns">

        <div class="card">
            <img class="card-img-top" src="/images/toys-children-and-baby.jpg" alt="Toys children and baby.jpg">
            <div class="card-body">
              <h5 class="card-title">Toys, Children & Baby</h5>
              <p class="card-text"><ul class="list-unstyled">
                @foreach ($toy->take(4) as $t)
                    <li class="white mt-1">
                        <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($t['category_name'])) }}">
                        <div class="">Top 10 {{ $t['category_name'] }}s</div></a>
                    </li>
                @endforeach
                </ul></p>
            </div>
          </div>

                <div class="card">
                <img class="card-img-top" src="/images/electronics-and-computers.jpg" alt="Electronics and computers">
                <div class="card-body">
                  <h5 class="card-title">Electronics & Computers</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($ele->take(4) as $e)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($e['category_name'])) }}">
                            <div class="">Top 10 {{ $e['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                </div>
                </div>

                <div class="card">
                    <img class="card-img-top" src="/images/books-and-audible.jpg" alt="Books and audible">
                    <div class="card-body">
                      <h5 class="card-title">Books & Audible</h5>
                      <p class="card-text"><ul class="list-unstyled">
                        @foreach ($boo->take(4) as $b)
                            <li class="white mt-1">
                                <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($b['category_name'])) }}">
                                <div class="">Top 10 {{ $b['category_name'] }}s</div></a>
                            </li>
                        @endforeach
                        </ul></p>
                    </div>
                  </div>

                  <div class="card">
                    <img class="card-img-top" src="/images/fashion-shoes-and-watches.jpg" alt="Fashion shoes and watches">
                    <div class="card-body">
                      <h5 class="card-title">Fashion, Shoes & Watches</h5>
                      <p class="card-text"><ul class="list-unstyled">
                        @foreach ($fas->take(4) as $f)
                            <li class="white mt-1">
                                <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($f['category_name'])) }}">
                                <div class="">Top 10 {{ $f['category_name'] }}s</div></a>
                            </li>
                        @endforeach
                        </ul></p>
                    </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Movies, Music & Games</h5>
                          <p class="card-text"><ul class="list-unstyled">
                            @foreach ($mov->take(4) as $m)
                                <li class="white mt-1">
                                    <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($m['category_name'])) }}">
                                    <div class="">Top 10 {{ $m['category_name'] }}s</div></a>
                                </li>
                            @endforeach
                            </ul></p>
                        </div>
                      </div>

                      <div class="card">
                        <img class="card-img-top" src="/images/car-and-motor.jpg" alt="Car and motor">
                        <div class="card-body">
                          <h5 class="card-title">Car & Motorbike</h5>
                          <p class="card-text"><ul class="list-unstyled">
                            @foreach ($car->take(4) as $c)
                                <li class="white mt-1">
                                    <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($c['category_name'])) }}">
                                    <div class="">Top 10 {{ $c['category_name'] }}s</div></a>
                                </li>
                            @endforeach
                            </ul></p>
                        </div>
                      </div>

                      <div class="card">
                        <img class="card-img-top" src="/images/food-and-grocery.jpg" alt="Food and grocery">
                        <div class="card-body">
                          <h5 class="card-title">Food & Grocery</h5>
                          <p class="card-text"></p>
                        </div>
                      </div>

                      <div class="card">
                        <img class="card-img-top" src="/images/home-garden-tools.jpg" alt="Home garden and tools">
                        <div class="card-body">
                          <h5 class="card-title">Home, Garden & Tools</h5>
                          <p class="card-text"><ul class="list-unstyled">
                            @foreach ($hom->take(4) as $h)
                                <li class="white mt-1">
                                    <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($h['category_name'])) }}">
                                    <div class="">Top 10 {{ $h['category_name'] }}s</div></a>
                                </li>
                            @endforeach
                            </ul></p>
                        </div>
                      </div>

                      <div class="card">
                        <img class="card-img-top" src="/images/sports-and-outdoors.jpg" alt="Sports-and-outdoors">
                        <div class="card-body">
                          <h5 class="card-title">Sports & Outdoors</h5>
                          <p class="card-text"><ul class="list-unstyled">
                          @foreach ($spo->take(4) as $s)
                          <li class="white mt-1">
                              <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($s['category_name'])) }}">
                              <div class="">Top 10 {{ $s['category_name'] }}s</div></a>
                          </li>
                      @endforeach
                      </ul></p>
                        </div>
                      </div>

                      <div class="card">
                        <img class="card-img-top" src="/images/health-and-beauty.jpg" alt="Health and beauty">
                        <div class="card-body">
                          <h5 class="card-title">Health & Beauty</h5>
                          <p class="card-text"></p>
                        </div>
                      </div>

                      <div class="card">
                        <img class="card-img-top" src="/images/business-industrial-and-scientific.jpg" alt="Business industrial and scientific">
                        <div class="card-body">
                          <h5 class="card-title">Business, Industrial and Scientific</h5>
                          <p class="card-text"><ul class="list-unstyled">
                            @foreach ($bus->take(4) as $b)
                                <li class="white mt-1">
                                    <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($b['category_name'])) }}">
                                    <div class="">Top 10 {{ $b['category_name'] }}s</div></a>
                                </li>
                            @endforeach
                            </ul></p>
                        </div>
                        </div>

        </div>


</div>

@endsection

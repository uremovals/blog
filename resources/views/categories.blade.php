@extends('layouts.categories')
@section('content')
<div class="topichead pb-5">
    <div class="container hh">
    <h1 class="text-white">Topics <span class="small-title "><i class="fas fa-star-half-alt"></i> Find the top rated products</span></h1>
    <p class="text-white"><i class="far fa-calendar-alt"></i> Last update 30-Jan-2021 <span style="float: right"><i class="fas fa-tags"></i> BEST DEALS THIS WEEK</span></p>
    </div>
    </div>
<div class="container">

    <div class="mt-5 mb-3">
        <a href="/">Shuffleloot</a> >
        <?php $link = "" ?>
        @for($i = 1; $i <= count(Request::segments()); $i++)
            @if($i < count(Request::segments()) & $i > 0)
            <?php $link .= "/" . Request::segment($i); ?>
            <a href="/categories">Categories</a> >
            @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
            @endif
        @endfor
    </div>

<div class="card-columns">

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Toys, Children & Baby</h5>
      <p class="card-text"><ul class="list-unstyled">
        @foreach ($toy as $t)
            <li class="white mt-1">
                <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($t['category_name'])) }}">
                <div class="prodwrappercat"><img src="{{ $t['category_image'] }}"></div>
                <div class="cat_name">Top 10 {{ $t['category_name'] }}s</div></a>
            </li>
        @endforeach
        </ul></p>
      <p class="card-text"></p>
    </div>
  </div>

        <div class="card">
        <div class="card-body">
          <h5 class="card-title">Electronics & Computers</h5>
          <p class="card-text"><ul class="list-unstyled">
            @foreach ($ele as $e)
                <li class="white mt-1">
                    <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($e['category_name'])) }}">
                    <div class="prodwrappercat"><img src="{{ $e['category_image'] }}"></div>
                    <div class="cat_name">Top 10 {{ $e['category_name'] }}s</div></a>
                </li>
            @endforeach
            </ul></p>
        </div>
        </div>

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Books & Audible</h5>
              <p class="card-text"><ul class="list-unstyled">
                @foreach ($boo as $b)
                    <li class="white mt-1">
                        <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($b['category_name'])) }}">
                        <div class="prodwrappercat"><img src="{{ $b['category_image'] }}"></div>
                        <div class="cat_name">Top 10 {{ $b['category_name'] }}s</div></a>
                    </li>
                @endforeach
                </ul></p>
              <p class="card-text"></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fashion, Shoes & Watches</h5>
              <p class="card-text"><ul class="list-unstyled">
                @foreach ($fas as $f)
                    <li class="white mt-1">
                        <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($f['category_name'])) }}">
                        <div class="prodwrappercat"><img src="{{ $f['category_image'] }}"></div>
                        <div class="cat_name">Top 10 {{ $f['category_name'] }}s</div></a>
                    </li>
                @endforeach
                </ul></p>
            </div>
            </div>


            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Movies, Music & Games</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($mov as $m)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($m['category_name'])) }}">
                            <div class="prodwrappercat"><img src="{{ $m['category_image'] }}"></div>
                            <div class="cat_name">Top 10 {{ $m['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                  <p class="card-text"></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Car & Motorbike</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($car as $c)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($c['category_name'])) }}">
                            <div class="prodwrappercat"><img src="{{ $c['category_image'] }}"></div>
                            <div class="cat_name">Top 10 {{ $c['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                  <p class="card-text"></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Food & Grocery</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($foo as $f)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($f['category_name'])) }}">
                            <div class="prodwrappercat"><img src="{{ $f['category_image'] }}"></div>
                            <div class="cat_name">Top 10 {{ $f['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                  <p class="card-text"></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Home, Garden & Tools</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($hom as $h)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($h['category_name'])) }}">
                            <div class="prodwrappercat"><img src="{{ $h['category_image'] }}"></div>
                            <div class="cat_name">Top 10 {{ $h['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Sports & Outdoors</h5>
                  <p class="card-text"><ul class="list-unstyled">
                  @foreach ($spo as $s)
                  <li class="white mt-1">
                      <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($s['category_name'])) }}">
                      <div class="prodwrappercat"><img src="{{ $s['category_image'] }}"></div>
                      <div class="cat_name">Top 10 {{ $s['category_name'] }}s</div></a>
                  </li>
              @endforeach
              </ul></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Health & Beauty</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($hea as $h)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($h['category_name'])) }}">
                            <div class="prodwrappercat"><img src="{{ $h['category_image'] }}"></div>
                            <div class="cat_name">Top 10 {{ $h['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Business, Industrial and Scientific</h5>
                  <p class="card-text"><ul class="list-unstyled">
                    @foreach ($bus as $b)
                        <li class="white mt-1">
                            <a class="catname" href="/category/{{ str_replace(' ', '-', strtolower($b['category_name'])) }}">
                            <div class="prodwrappercat"><img src="{{ $b['category_image'] }}"></div>
                            <div class="cat_name">Top 10 {{ $b['category_name'] }}s</div></a>
                        </li>
                    @endforeach
                    </ul></p>
                </div>
                </div>

</div>
@endsection

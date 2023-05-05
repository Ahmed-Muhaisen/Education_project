
@extends('Website/master')
@section('title', 'Courses '.''.env('APP_NAME'))
@section('content')


<div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="assets/images/close.png" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>
                  @if($Category=='All Courses')
                {{ $Category }}
                @else
                  {{$Category->L_Name}}

                @endif
            </h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="{{ route('index') }}">{{ __('trans.Home')}}</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                @if($Category=='All Courses')
                {{ $Category }}
                @else
                  {{$Category->L_Name}}

                @endif

              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="section-padding course">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">

                </div>

                <div class="col-lg-4">
                    <div class="topbar-search">
                        <form method="get" action="">

                            <input type="text" name="as"  placeholder="Search our courses" class="form-control">
                            <a ><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            @foreach ($Courses as $item)
            <div class="col-lg-4 col-md-6">
         @include('Website/part_course')
            @endforeach


        </div>
        <div class="blog-pagination text-center">
{{ $Courses->links() }}
</div>

    </div>
</section>


@endsection



@extends('Website/master')
@section('title', 'About' .''.env('APP_NAME'))
@section('content')

 <!--search overlay start-->
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
            <h1>{{$Course->L_Name }}</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">{{ __('trans.Home') }}</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                {{ __('trans.Courses') }}
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="page-wrapper edutim-course-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-single-header">
    <div class="rating">
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <span>(5.00)</span>
    </div>

    <h3 class="single-course-title">{{ __('trans.Information_About') }} {{$Course->L_Name}}</h3>
    <p>{{$Course->L_InternalContent}}</p>

    <div class="single-course-meta ">
        <ul>
            <li>
                <span><i class="fa fa-calendar"></i>Last Update :</span>
                <a href="#" class="d-inline-block">{{$Course->updated_at->format('F d , Y')}}</a>
</a>
            </li>

            <li>
                <span><i class="fa fa-bookmark"></i>{{ __('trans.Category') }} :</span>
                <a href="#" class="d-inline-block">{{$Course->Category->L_Name }}</a>
            </li>
        </ul>
    </div>
</div>


                <!--  Course Topics -->
<div class="edutim-single-course-segment  edutim-course-topics-wrap">
    <div class="edutim-course-topics-header d-lg-flex justify-content-between">
        <div class="edutim-course-topics-header-left">
            <h4 class="course-title">Topics for this course</h4>
        </div>
        <div class="edutim-course-topics-header-right">
            <span> Total learning: <strong>{{ $Course->Category->count() }} Lessons</strong></span>
            <span> Time: <strong>13h 20m 20s</strong> </span>
        </div>
    </div>

    <div class="edutim-course-topics-contents">
        <div class="edutim-course-topic ">
            <div class="accordion" id="accordionExample">


@foreach ($Course->Video as $item)
<div class="card">
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="course-lessons">
          <div class="single-course-lesson">
              <div class="course-topic-lesson">
                <img  width='20' src="{{$item->image}}" alt="">
                <span> {{ $item->L_Name }}</span>
              </div>
              <div class="course-lesson-duration">
                {{ $item->time }}
              </div>
          </div>
      </div>
    </div>
  </div>
@endforeach



              </div>
        </div>
    </div>
</div>
<!--  COurse Topics End -->

            </div>

            <div class="col-lg-4">
                <div class="course-sidebar">
    <div class="course-single-thumb">
        <img src="{{ $Course->image }}" alt="" class="img-fluid w-100">
        <div class="course-price-wrapper">
            <div class="course-price ml-3"><h4>Price: <span>${{$Course->price}}</span></h4></div>
            <div class="buy-btn"><a href="{{route('Website.Buy_Course',$Course) }}" class="btn btn-main btn-block">Buy This Course</a></div>
        </div>
    </div>





    <div class="course-widget course-share d-flex justify-content-between align-items-center">
        <span>Share</span>
        <ul class="social-share list-inline">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li  class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li  class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li  class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
        </ul>
    </div>

    <div class="course-widget course-metarials">
        <h4 class="course-title">Requirements</h4>
        <ul>
            <li>
                <i class="fa fa-check"></i>
                No previous knowledge of Photoshop required.
            </li>
             <li>
                <i class="fa fa-check"></i>
                If you have Photoshop installed, that's great.
            </li>
            <li>
                <i class="fa fa-check"></i>
                If not, I'll teach you how to get it on your computer.
            </li>

        </ul>
    </div>

    <div class="course-widget">
        <h4 class="course-title">Tags</h4>
        <div class="single-course-tags">
            <a href="#">Web Deisgn</a>
            <a href="#">Development</a>
            <a href="#">Html</a>
            <a href="#">css</a>
        </div>
    </div>



</div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding related-course">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h4>Related Courses You may Like</h4>
                </div>
            </div>
        </div>

        <div class="row">

               @foreach ($Courses as $item)
               <div class="col-lg-4 col-md-6">
                @include('Website/part_course')
               @endforeach
            </div>

        </div>
    </div>
</section>




@endsection

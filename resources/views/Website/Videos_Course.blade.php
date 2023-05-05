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
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="assets/images/close.png"
                                srcset="assets/images/close@2x.png 2x" alt="" />
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

                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-wrapper edutim-course-single">
    <div class="container">
@php
if($user_Videos){
    $average=round(count($user_Videos)/$Course->Video->count() *100 ,1);
}else{
    $average=0;
}



@endphp

@if($average >= 80)
<div class="mb-3">
<a href="{{ route('Website.pdf',$Course) }}" class="btn btn-main btn-small m-auto"></i>Certifecate</a>
</div>
@endif
        <div class="row">
            <div class="col-lg-12">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $average }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $average }}%</div>
                  </div>
                <!--  Course Topics -->
                <div class="edutim-single-course-segment  edutim-course-topics-wrap">
                    <div class="edutim-course-topics-header d-lg-flex justify-content-between">
                        <div class="edutim-course-topics-header-left">
                            <h4 class="course-title">Topics for this course</h4>
                        </div>
                        <div class="edutim-course-topics-header-right">
                            <span> Total learning: <strong>{{ $Course->Video->count() }} Lessons</strong></span>
                            <span> Time: <strong>13h 20m 20s</strong> </span>
                        </div>
                    </div>


                    <div class="edutim-course-topics-contents">
                        <div class="edutim-course-topic ">
                            <div class="accordion" id="accordionExample">


                                @foreach ($Course->Video as $item)
                                <div class="card">
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <a href="{{ route('Website.Video_sengel',$item) }}">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                <div class="w-100 d-flex justify-content-between align-items-center mr-3">{{  $item->L_Name  }}
                                                <div class="course-topic-lesson">
                                                    <img width='20' src="{{$item->image}}" alt="">
                                                    <span> {{ $item->L_Name }}</span>
                                                </div>
                                                <div class="course-lesson-duration">
                                                    {{ $item->time }}
                                                </div>
                                            </div>
                                            @if(in_array($item->id,$user_Videos))
                                                <div><span class="badge badge-success"><i class="fa fa-check"></i></span></div>
                                                @endif
                                            </div>





                                        </a>
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


        </div>
    </div>
</section>





@endsection

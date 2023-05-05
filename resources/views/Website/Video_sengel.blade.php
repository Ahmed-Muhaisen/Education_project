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
                    <h1>{{$Video->L_Name }}</h1>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-wrapper edutim-course-single">
    <div class="container">
             <div class="row mb-3">

            <div class="col-lg-12 ">


                <iframe width="1160" height="550" src="{{ $Video->path }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


            </div>


        </div>

        <div>

            <a href="{{ route('Website.Video_Show',[$Video->id,$Video->Course->id]) }}" class="btn btn-main btn-small m-auto"></i>Complete</a>

            <a href="{{ route('Website.Video_Show',[$Video->id,$Video->Course->id,$Complete=1]) }}" class="btn btn-main btn-small m-auto"></i>Return Course list</a>

        </div>

    </div>
</section>





@endsection

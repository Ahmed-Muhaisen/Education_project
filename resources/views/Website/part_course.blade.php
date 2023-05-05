

@php
    $Courses_user =DB::table('_course_user')->where('user_id',Auth::id())->pluck('course_id')->toArray();
    if(in_array($item->id,$Courses_user)){
$route='Website.Videos_Course';

}else{
    $route='Website.Course_sengel';

}

@endphp

    <div class="course-block">
        <div class="course-img">
            <img src="{{$item->image}}" alt="" class="img-fluid">

        </div>

        <div class="course-content">
            <div class="course-price ">{{$item->price}}</div>

            <h4><a href="{{ route($route,$item)}}">{{$item->L_Name}}</a></h4>
            <div class="rating">
                <a href="#"><i class="fa fa-star"></i></a>
                <a href="#"><i class="fa fa-star"></i></a>
                <a href="#"><i class="fa fa-star"></i></a>
                <a href="#"><i class="fa fa-star"></i></a>
                <a href="#"><i class="fa fa-star"></i></a>
                <span>(5.00)</span>
            </div>
            <p>{{$item->L_External_Content}}</p>

            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                <div class="course-meta">
                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                    <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                </div>

                <div class="buy-btn"><a href="{{ route($route,$item)}}" class="btn btn-main-2 btn-small">Details</a></div>
            </div>
        </div>
    </div>
</div>

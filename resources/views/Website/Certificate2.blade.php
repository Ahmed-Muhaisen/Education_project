<!DOCTYPE html>
<html >

<head>
    <!-- Mobile Specific Meta-->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Great+Vibes&display=swap" rel="stylesheet"> --}}
    <!-- bootstrap.min css -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<section class="mt-3">

<div class="w-100 position-relative">
    <img style="width:60%; height:60%;margin:auto; display: block; " src="{{asset('website/assets/images/certificate.png')  }}" alt="">

<style>
body{
    font-family:sans-serif;
    direction: rtl;
}
.data p{
    font-size: 43px !important;
    margin: 100px;
    text-align: center;
}

</style>

@php

    // foreach ($Video as $key => $item) {
    //  $time[$key]=$item->time;
    // }
@endphp



<div style="position: absolute;
top: 47%;
left: 50%;
transform: translate(-50%, -50%);
width: 60%
;height: 70%;
" class="data">
    <div class="">
    <p style="font-family: 'Fjalla One', sans-serif;">{{ "Laravel" }}</p>
</div>
<div style="margin-top:120px ">
    <p style="font-family: 'Great Vibes', cursive;">{{"أحمد محيسن"}}</p>
</div>

<div style="
text-align: right;
margin-right: 250px;margin-top: 185px;"
>
    {{-- {{
    array_sum($time);
         }} --}}
         50
         </div>
</div>

</div>
</section>


</body>

</html>

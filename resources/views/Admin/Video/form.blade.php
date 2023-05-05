@extends('admin/head')
@section('head_content')

<div class="container card mt-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >
        <h2>Create Video</h2>
        <a class="btn btn-outline-info h-25" onclick="window.history.back()" >Return Back</a>
    </div>



    <form enctype="multipart/form-data" action="@if($page=='Create')
                {{ route('admin.Video.store') }}
            @else
                {{ route('admin.Video.update',$Video->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
            @method('put')
        @endif

        @csrf
        <div class="my-3">
            <label for="">
                Name English
            </label>
            <input type="text" name="Name_en"           class="form-control
                    @error('Name_en')
                    is-invalid
                    @enderror"
                value="{{ old('Name_en',$Video->En_Name)}}">
            @error('Name_en')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
                Arabic Name
            </label>
            <input type="text" name="Name_ar"           class="form-control
                    @error('Name_ar')
                    is-invalid
                    @enderror"
                value="{{ old('Name_ar',$Video->Ar_Name)}}">
            @error('Name_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>



        <div class="my-3">
            <label for="">
               Time
            </label>
            <input type="number" name="time"           class="form-control
                    @error('time')
                    is-invalid
                    @enderror"
                value="{{ old('time',$Video->time)}}">
            @error('time')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Path
            </label>
            <input type="text" name="path"           class="form-control
                    @error('path')
                    is-invalid
                    @enderror"
                value="{{ old('path',$Video->path)}}">
            @error('path')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>





        <div class="my-3">
            <label for="">
               Image
            </label>

            @if($Video->image)
                <img width="100" src="{{asset('uploads/'.$Video->image)}}" alt="">

            @endif

            <input type="file" name="image"           class="form-control
                    @error('image')
                    is-invalid
                    @enderror"
              >
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Course
            </label>
            <select name="Course"
                 class="form-control
                    @error('Course')
                    is-invalid
                    @enderror"
                >
                <option value="">Select</option>
                @foreach($Course as $item)
                    <option value="{{$item->id}}" @if(old('Course',$Video->course_id)==$item->id)selected @endif>{{$item->En_Name}}</option>
                @endforeach

            </select>
            @error('Course')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info w-100">Create Video</button>
</form>

</div>





@endsection

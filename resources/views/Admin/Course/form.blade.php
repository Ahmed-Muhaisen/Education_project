@extends('admin/head')
@section('head_content')

<div class="container card mt-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >
        <h2>Create Course</h2>
        <a class="btn btn-outline-info h-25" onclick="window.history.back()" >Return Back</a>
    </div>



    <form enctype="multipart/form-data" action="@if($page=='Create')
                {{ route('admin.Course.store') }}
            @else
                {{ route('admin.Course.update',$Course->id) }}
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
                value="{{ old('Name_en',$Course->En_Name)}}">
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
                value="{{ old('Name_ar',$Course->Ar_Name)}}">
            @error('Name_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>



        <div class="my-3">
            <label for="">
               Price
            </label>
            <input type="text" name="price"           class="form-control
                    @error('price')
                    is-invalid
                    @enderror"
                value="{{ old('price',$Course->price)}}">
            @error('price')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Descount
            </label>
            <input type="text" name="descount"           class="form-control
                    @error('descount')
                    is-invalid
                    @enderror"
                value="{{ old('descount',$Course->descount)}}">
            @error('descount')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>



        <div class="my-3">
            <label for="">
               English External Content
            </label>
            <textarea cols="4" role="4" name="en_extrnal_content"           class="form-control
                    @error('en_extrnal_content')
                    is-invalid
                    @enderror"
              >{{ old('en_extrnal_content',$Course->En_External_Content)}}</textarea>

            @error('en_extrnal_content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Arabic External Content
            </label>
            <textarea cols="4" role="4" name="ar_extrnal_content"           class="form-control
                    @error('ar_extrnal_content')
                    is-invalid
                    @enderror"
              >{{ old('ar_extrnal_content',$Course->Ar_External_Content)}}</textarea>

            @error('ar_extrnal_content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               English Internal Content
            </label>
            <textarea cols="4" role="4" name="en_intrnal_content"           class="form-control
                    @error('en_intrnal_content')
                    is-invalid
                    @enderror"
              >{{ old('en_intrnal_content',$Course->En_Internal_Content)}}</textarea>

            @error('en_intrnal_content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Arabic Internal Content
            </label>
            <textarea cols="4" role="4" name="ar_intrnal_content"           class="form-control
                    @error('ar_intrnal_content')
                    is-invalid
                    @enderror"
              >{{ old('ar_intrnal_content',$Course->Ar_Internal_Content)}}</textarea>

            @error('ar_intrnal_content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Image
            </label>

            @if($Course->image)
                <img width="100" src="{{asset('uploads/'.$Course->image)}}" alt="">

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
               Type
            </label>
            <select name="type"           class="form-control
                    @error('type')
                    is-invalid
                    @enderror"
                >
            <option value="">Select</option>
            <option value="free" @if(old('type',$Course->type)=='free')selected @endif>free</option>

            <option value="payment" @if(old('type',$Course->type)=='payment')selected @endif>payment</option>

            </select>
            @error('type')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="my-3">
            <label for="">
               Category
            </label>
            <select name="Category"           class="form-control
                    @error('Category')
                    is-invalid
                    @enderror"
                >
                <option value="">Select</option>
                @foreach($Category as $item)
                    <option value="{{$item->id}}" @if(old('Category',$Course->category_id)==$item->id)selected @endif>{{$item->En_Name}}</option>
                @endforeach

            </select>
            @error('Category')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info w-100">Create Course</button>
</form>

</div>





@endsection

@extends('admin/head')
@section('head_content')

<div class="container card mt-5 py-4">
<div class="d-flex justify-content-between align-items-center" >
        <h2>Create Category</h2>
        <a class="btn btn-outline-info h-25" onclick="window.history.back()" >Return Back</a>
    </div>


<form action="@if($page=='Create')
{{ route('admin.Category.store') }}
@else
{{ route('admin.Category.update',$Category->id) }}
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
<input type="text" name="Name_en" class="form-control @error('Name_en')
is-invalid
@enderror

" value="{{ old('Name_en',$Category->En_Name)}}">
@error('Name_en')
<p class="text-danger">{{$message}}</p>
@enderror
</div>


<div class="my-3">
    <label for="">
        Name Arabic
    </label>
    <input type="text" name="Name_ar" class="form-control @error('Name_ar')
    is-invalid
    @enderror

    " value="{{ old('Name_ar',$Category->Ar_Name)}}">
    @error('Name_ar')
    <p class="text-danger">{{$message}}</p>
    @enderror
    </div>

    <button type="submit" class="btn btn-info w-100">Create Category</button>
</form>

</div>





@endsection

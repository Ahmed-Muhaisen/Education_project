@extends('Admin/master')
@section('content')

@if(@session('msg'))
<div class="alert alert-{{@session('type')}} alert-dismissible fade show" role="alert">
   {{@session('msg')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif



<div class="d-flex justify-content-between align-items-center m-4">

    <h1>{{ ($page=='Trash')?'Course Trash':'Course Page' }}</h1>
    <a class="btn btn-outline-info h-25" href="{{ route('admin.Course.create') }}">Add New Course</a>

</div>




    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Manige Course</h6>

            @if($page=='Trash')
            <a class="btn btn-danger py-2 " href="{{ route('admin.Course.index') }}"><i class="fa-solid fa-tags"></i> Index
            @else
            <a class="btn btn-danger py-2 " href="{{ route('admin.Course.trash') }}"><i class="fa-solid fa-trash"></i> Trash
            @endif

            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>english Name</th>
                            <th>arabic Name</th>
                            <th>price</th>
                            <th>descount</th>
                            <th>english extrnal_content</th>
                            <th>arabic extrnal_content</th>
                            <th>english intrnal_content</th>
                            <th>arabic intrnal_content</th>
                            <th>image</th>
                            <th>type</th>
                            <th>Category</th>

                            <th>action</th>

                        </tr>
                    </thead>
                                  <tbody>
                                    @foreach($Course as $item)

                        <tr>


                            <td>{{ $item->En_Name}}</td>
                            <td>{{ $item->Ar_Name}}</td>
                            <td>{{ $item->price}}</td>
                            <td>{{ $item->descount}}</td>
                            <td>{{ $item->En_External_content}}</td>
                            <td>{{ $item->Ar_External_content}}</td>
                            <td>{{ $item->En_Internal_content}}</td>
                            <td>{{ $item->Ar_Internal_content}}</td>
                            <td><img width="100" src="{{asset('uploads/'.$item->image)}}" alt=""></td>
                            <td>{{ $item->type}}</td>
                            <td>{{ $item->Category->En_Name}}</td>




                            <td>

                                @if($page=='Trash')
                                <a href="{{ route('admin.Course.restore',$item->id) }}" class="btn btn-primary py-2"><i class="fa-solid fa-trash-restore"></i></a>

                                <form class="d-inline" action="{{ route('admin.Course.forcedelete',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button  onclick="confirm('Are You Sure')" class="btn btn-danger py-2 "> <i class="fa-solid fa-close"></i>
                                    </button>
                                </form>

                                @else
                                <a href="{{ route('admin.Course.edit',$item->id) }}" class="btn btn-primary py-2"><i class="fa-solid fa-pencil"></i></a>

                                <form class="d-inline" action="{{ route('admin.Course.destroy',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="confirm('Are You Sure')" class="btn btn-danger py-2 "> <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>


                                @endif



                            </td>
                        </tr>


                        @endforeach
                               </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

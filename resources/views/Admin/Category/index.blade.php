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

    <h1>{{ ($page=='Trash')?'Category Trash':'Category Page' }}</h1>
    <a class="btn btn-outline-info h-25" href="{{ route('admin.Category.create') }}">Add New Category</a>

</div>




    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Manige Category</h6>

            @if($page=='Trash')
            <a class="btn btn-danger py-2 " href="{{ route('admin.Category.index') }}"><i class="fa-solid fa-tags"></i> Index
            @else
            <a class="btn btn-danger py-2 " href="{{ route('admin.Category.trash') }}"><i class="fa-solid fa-trash"></i> Trash
            @endif

            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name English</th>
                            <th>name Arabic</th>
                            <th>Local name</th>
                            <th>Count</th>
                            <th>action</th>

                        </tr>
                    </thead>
                                  <tbody>
                                    @foreach($Category as $item)

                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->En_Name}}</td>
                            <td>{{ $item->Ar_Name}}</td>
                            <td>{{ $item->L_Name}}</td>
                            <td>{{$item->Course->count()}}</td>
                            <td>

                                @if($page=='Trash')
                                <a href="{{ route('admin.Category.restore',$item->id) }}" class="btn btn-primary py-2"><i class="fa-solid fa-trash-restore"></i></a>

                                <form class="d-inline" action="{{ route('admin.Category.forcedelete',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button  onclick="confirm('Are You Sure')" class="btn btn-danger py-2 "> <i class="fa-solid fa-close"></i>
                                    </button>
                                </form>

                                @else
                                @can('Category.update')


                                <a href="{{ route('admin.Category.edit',$item->id) }}" class="btn btn-primary py-2"><i class="fa-solid fa-pencil"></i></a>

                                <form class="d-inline" action="{{ route('admin.Category.destroy',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="confirm('Are You Sure')" class="btn btn-danger py-2 "> <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                @endcan
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

@extends('admin.layout.app')
@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Роли</h5>
            <!-- Table with stripped rows -->
            <div class="dataTable-wrapper dataTable-loading sortable searchable fixed-columns">
                <div class="dataTable-container">

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
{{--                            <th scope="col">#</th>--}}
                            <th scope="col">Название</th>
                            <th scope="col">Разрешения</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
{{--                                <th scope="row">{{$role->id}}</th>--}}
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge text-primary">{{$permission->name}}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{route("admin.role.edit", $role->id)}}"><i class="bx bxs-edit"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->

                </div>
                <div class="dataTable-bottom">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{route("admin.role.create")}}" class="btn btn-primary" type="button">Создать</a>
                    </div>
                </div>
            </div>
            <!-- End Table with stripped rows -->

        </div>
    </div>

@endsection

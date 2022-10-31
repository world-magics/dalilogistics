@extends('admin.layout.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Роль: <i>{{$role->name}}</i></h5>

        <!-- General Form Elements -->
        <form id="form-role" method="post" action="{{ route('admin.role.update', $role->id) }}">
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Название</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" value="{{$role->name}}">
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Разрешения</legend>
                <div class="col-sm-10">
                    @foreach($permissions as $permission)
                        <div class="form-check">
                            <input
                                name="permissions[{{$permission->id}}]"
                                class="form-check-input"
                                type="checkbox"
                                id="permission_{{$permission->id}}"
                                {{in_array($permission->name,$role->permissions->pluck("name")->toArray())?"checked":""}}
                                {{$role->name == "super-admin"
                                    ?$permission->name == "admin-panel"?"disabled":""
                                    :""
                                }}
                            >
                            <label class="form-check-label" for="permission_{{$permission->id}}">
                                {{$permission->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{route("admin.role.index")}}" class="btn btn-secondary" type="submit">@lang("all.back")</a>
                <input class="btn btn-success" type="submit" value="Сохранять">
            </div>
        </form><!-- End General Form Elements -->

    </div>
</div>
@endsection

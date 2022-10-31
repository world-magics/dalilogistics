@extends('admin.layout.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Изменить пользователя</h5>

        <!-- General Form Elements -->
        <form id="form-role" method="post" action="{{ route('admin.user.update', $user->id) }}">
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label required">@lang("all.username")</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" value="{{$user->name}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label required">Login</label>
                <div class="col-sm-10">
                    <input name="username" type="text" class="form-control" value="{{$user->username}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label required">E-mail</label>
                <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" value="{{$user->email}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label required">Password</label>
                <div class="col-sm-10">
                    <input name="password" type="password" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label required">Password Confirm</label>
                <div class="col-sm-10">
                    <input name="password_confirmation" type="password" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0 required">@lang("all.roles")</legend>
                <div class="col-sm-10">
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input
                                name="roles[{{$role->id}}]"
                                class="form-check-input"
                                type="checkbox"
                                id="role_{{$role->id}}"
                                {{in_array($role->name,$user->roles->pluck("name")->toArray())?"checked":""}}
                            >
                            <label class="form-check-label" for="role_{{$role->id}}">
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{route("admin.user.index")}}" class="btn btn-secondary" type="submit">@lang("all.back")</a>
                <input class="btn btn-success" type="submit" value="Сохранять">
            </div>
        </form><!-- End General Form Elements -->

    </div>
</div>
@endsection

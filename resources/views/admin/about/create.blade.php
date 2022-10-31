@extends('admin.layout.app')
@section('content')
@php
    $langs = App\Services\AdminService::getLang();
@endphp
<div class="mb-5">
    <div class="float-start">
    </div>
    <div class="float-end">
        <button type="submit" form="form-about" class="btn btn-success "><i class="ri-save-3-line"></i></button>
        <button type="reset" form="form-about" class="btn btn-secondary "><i class="bx bx-reset"></i></button>
        <a href="{{ route('admin.about.index') }}" form="form-about" class="btn btn-light border bg-white"><i class="ri-reply-line"></i></a>
    </div>
</div>
<div class="card">
    <h5 class="card-header">Добавить о нас</h5>
    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
        @foreach($langs as $key => $lang)
            <li class="nav-item" role="presentation">
                <button class="nav-link  {{  $key === 0 ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab" data-bs-target="#{{ $lang['code'] }}"
                        type="button" role="tab" aria-controls="{{ $lang['code'] }}" aria-selected="true">
                    <img src="{{ $lang['icon'] }}" style="width: 20px">
                    {{ $lang['name'] }}</button>
            </li>
        @endforeach
    </ul>
    <form id="form-about" method="post" action="{{ route('admin.about.store') }}" class="px-4">
        @if (count($errors) > 0)
            <div class="pt-4">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif
        @csrf
        <div class="tab-content" id="myTabContent">
            <div class="row mb-3 mt-3">
                <label for="status" class="col-sm-3 col-form-label required">Статус</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" id="status" name="status" required>
                        <option value="1">активный</option>
                        <option value="0">не активен</option>
                    </select>
                    {{-- <input type="text" class="form-control" id="status" name="status" required="" value="{{ old('status') }}"> --}}
                </div>
            </div>
            @foreach($langs as $key => $lang)
                <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}" id="{{ $lang['code'] }}" role="tabpanel" aria-labelledby="{{ $lang['code'] }}-tab">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-form-label required">Заглавие</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title[{{ $lang['code'] }}]" required
                                   value="{{ old('title.'. $lang['code'], '') }}">
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div> --}}
                    <div class="row mb-3">
                        <label for="info" class="col-sm-3 col-form-label required"> Инфо</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="info" name="info[{{ $lang['code'] }}]" required rows="3">
                                {{ old('info.'. $lang['code'], '') }}
                            </textarea>
                            {{-- <input type="text" class="form-control" id="info" name="info[{{ $lang['code'] }}]" required
                                   value="{{ old('info.'. $lang['code'], '') }}"> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>
@endsection

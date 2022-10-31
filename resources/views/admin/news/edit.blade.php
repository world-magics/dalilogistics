@extends('admin.layout.app')
@section('content')
@php
    $langs = App\Services\AdminService::getLang();
@endphp
<div class="mb-5">
    <div class="float-start">
    </div>
    <div class="float-end">
        <button type="submit" form="form-news" class="btn btn-success "><i class="ri-save-3-line"></i></button>
        <button type="reset" form="form-news" class="btn btn-secondary "><i class="bx bx-reset"></i></button>
        <a href="{{ route('admin.news.index') }}" form="form-news" class="btn btn-light border bg-white"><i class="ri-reply-line"></i></a>
    </div>
</div>
<div class="card">
    <h5 class="card-header">Редактировать новости</h5>
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
    <form id="form-news" method="post" action="{{ route('admin.news.update', ['id'=>$news->id]) }}" class="px-4" enctype="multipart/form-data">
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
                <label for="status" class="col-sm-2 col-form-label required">Статус</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="status" name="status" required>
                        @if ($news->status == 1)
                            <option value="1" selected>активный</option>
                            <option value="0">не активен</option>
                        @else
                            <option value="1">активный</option>
                            <option value="0" selected>не активен</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <label for="image" class="col-sm-2 col-form-label required">Изображение</label>
                <div class="col-sm-10">
                    <input id="image" class="form-control" type="file" name="image">
                </div>
            </div>
            @foreach($langs as $key => $lang)
                <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}" id="{{ $lang['code'] }}" role="tabpanel" aria-labelledby="{{ $lang['code'] }}-tab">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label required">Название</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title[{{ $lang['code'] }}]" required
                                   value="{{ old('title.'. $lang['code'], $news->realTitle[$lang['code']]) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="info" class="col-sm-2 col-form-label required">Краткая информация</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="info" name="info[{{ $lang['code'] }}]" required rows="5">
                                {{ old('info.'. $lang['code'], $news->realInfo[$lang['code']]) }}
                            </textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>
@endsection


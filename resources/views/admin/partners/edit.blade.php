@extends('admin.layout.app')
@section('content')
@php
    $langs = App\Services\AdminService::getLang();
@endphp
<div class="mb-5">
    <div class="float-start">
    </div>
    <div class="float-end">
        <button type="submit" form="form-partners" class="btn btn-success "><i class="ri-save-3-line"></i></button>
        <button type="reset" form="form-partners" class="btn btn-secondary "><i class="bx bx-reset"></i></button>
        <a href="{{ route('admin.partners.index') }}" form="form-partners" class="btn btn-light border bg-white"><i class="ri-reply-line"></i></a>
    </div>
</div>
<div class="card">
    <h5 class="card-header">Изменить Партнёри</h5>

    <form id="form-partners" method="post" action="{{ route('admin.partners.update', ['id'=> $partners->id]) }}" class="px-4" enctype="multipart/form-data">
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
                        @if ($partners->news == 1)
                            <option value="1" selected>активный</option>
                            <option value="0">не активен</option>
                        @else
                            <option value="1">активный</option>
                            <option value="0" selected>не активен</option>
                        @endif
                    </select>
                    {{-- <input type="text" class="form-control" id="status" name="status" required="" value="{{ old('status') }}"> --}}
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <label for="link" class="col-sm-2 col-form-label required">Вебсите домен адрес</label>
                <div class="col-sm-10">
                    <input id="link" class="form-control" type="text" name="link" value="{{ old('link', $partners->link) }}">
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <label for="image" class="col-sm-2 col-form-label required">Изображение</label>
                <div class="col-sm-10">
                    <input id="image" class="form-control" type="file" name="image" value="{{ old('image', $partners->image) }}">
                </div>
            </div>


        </div>
    </form>
</div>
@endsection

@extends('admin.layout.app')
@section('content')
    @php
        $langs = App\Services\AdminService::getLang();
    @endphp
    <div class="mb-5">
        <div class="float-start">
        </div>
        <div class="float-end">
            <button type="submit" form="form-category" class="btn btn-success "><i class="ri-save-3-line"></i></button>
            <button type="reset" form="form-category" class="btn btn-secondary "><i class="bx bx-reset"></i></button>
            <a href="{{ route('admin.setting.index') }}" form="form-category" class="btn btn-light border bg-white"><i class="ri-reply-line"></i></a>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Изменить настройку</h5>
        <div class="card-body">
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
            <form id="form-category" method="post" action="{{ route('admin.setting.update', ['id' => $setting->id]) }}">
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
                        <label for="key" class="col-sm-3 col-form-label required"> Key</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="key" name="key" required="" value="{{ old('key', $setting->key) }}">
                        </div>
                    </div>
                    @foreach($langs as $key => $lang)
                        <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}" id="{{ $lang['code'] }}" role="tabpanel" aria-labelledby="{{ $lang['code'] }}-tab">
                            <div class="row mb-3 ">
                                <label for="value" class="col-sm-3 col-form-label required"> Value</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" id="value" name="value[{{ $lang['code'] }}]" required
                                           value="{{ old('value.'. $lang['code'], $setting->value[$lang['code']]) }}"> --}}
                                    <input type="text" name="value[{{ $lang['code'] }}]" class="form-control"
                                           value="{{ old('value.'.$lang['code'], $setting->realValue[$lang['code']]) }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
@endsection

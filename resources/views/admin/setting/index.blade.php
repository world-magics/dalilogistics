@extends('admin.layout.app')
@section('content')
    <div class="mb-5">
        <div class="float-start">
        </div>
        <a href="{{ route('admin.setting.create') }}" class="btn btn-success float-end"><i class="bi bi-plus-square-dotted"></i></a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Список настройка</h5>
            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" class="align-middle">Key</th>
                    <th scope="col" class="align-middle">Value</th>
                    <th scope="col" class="align-middle" width="5%">Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pagination as $setting)
                    <tr>
                        <td class="align-middle">
                            {{ $setting->key }}
                        </td>
                        <td class="align-middle">
                            {{ $setting->value }}
                        </td>
                        <td>
                            {{--<a href="#" target="_new" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>--}}
                            <a href="{{ route('admin.setting.edit', ['id' => $setting->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('admin.setting.delete', ['id' => $setting->id]) }}" class="btn btn-danger btn-sm"
                               onclick="return confirm('Вы хотите удалить настройка?')">
                                <i class="ri-delete-bin-7-line"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Нет категорий</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <!-- End Table with hoverable rows -->
        </div>
        <div class="card-footer">
            <nav>
                {{ $pagination->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>


@endsection

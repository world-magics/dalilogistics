@extends('admin.layout.app')
@section('content')
<div class="mb-5">
    <div class="float-start">
    </div>
    <a href="{{ route('admin.project.create') }}" class="btn btn-success float-end"><i class="bi bi-plus-square-dotted"></i></a>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Список проекты</h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="align-middle">Ид</th>
                    <th scope="col" class="align-middle">Название</th>
                    <th scope="col" class="align-middle">Slug</th>
                    <th scope="col" class="align-middle">Рисунка</th>
                    <th scope="col" class="align-middle">Статус</th>
                    <th scope="col" class="align-middle" width="5%">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pagination as $item)
                    <tr>
                        <td class="align-middle">
                            {{ $item->id }}
                        </td>
                        <td class="align-middle">
                            {{ $item->title }}
                        </td>
                         <td class="align-middle">
                            {{ $item->slug }}
                        </td>
                        <td class="align-middle">
                            <img src="/template/datlan/images/{{$item->image}}" alt="image" style="width: 100px;">
                        </td>
                        <td class="align-middle">
                            @if ($item->status == 1)
                                <p class="text-success">
                                    Активный
                                </p>
                            @else
                                <p class="text-danger">
                                    Не активен
                                </p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.project.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('admin.project.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Вы хотите удалить настройка?')">
                                <i class="ri-delete-bin-7-line"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Нет проекты</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <nav>
            {{ $pagination->links('pagination::bootstrap-4') }}
        </nav>
    </div>
</div>
@endsection

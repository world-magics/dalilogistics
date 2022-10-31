@extends('admin.layout.app')
@section('content')
<div class="mb-5">
    <div class="float-start">
    </div>
    <a href="{{ route('admin.partners.create') }}" class="btn btn-success float-end"><i class="bi bi-plus-square-dotted"></i></a>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Список баннеры</h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="align-middle">Ид</th>
                    <th scope="col" class="align-middle">Ссылка</th>
                    <th scope="col" class="align-middle">Изображение</th>
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
                            {{ $item->link }}
                        </td>

                        <td class="align-middle">
                            <img src="/template/datlan/image/{{$item->image}}" alt="image" style="width: 100px;">
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
                            <a href="{{ route('admin.partners.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('admin.partners.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Вы хотите удалить настройка?')">
                                <i class="ri-delete-bin-7-line"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Нет баннеры</td>
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

@extends('admin.layout.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Список о нас</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="align-middle">Ид</th>
                    <th scope="col" class="align-middle">Ф.И.Ш</th>
                    <th scope="col" class="align-middle">Почта</th>
                    <th scope="col" class="align-middle">Инфо</th>
                    <!-- <th scope="col" class="align-middle" width="5%">Действия</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td class="align-middle">
                            {{ $item->id }}
                        </td>
                        <td class="align-middle">
                            {{ $item->full_name }}
                        </td>
                        <td class="align-middle">
                            {{ $item->email }}
                        </td>
                        <td class="align-middle">
                            {{ $item->content }}
                        </td>
                       <!--  <td>
                            <a href="{{ route('admin.about.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Нет о нас</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <nav>
            {{ $data->links('pagination::bootstrap-4') }}
        </nav>
    </div>
</div>
@endsection

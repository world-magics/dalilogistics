@extends('admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Выберите заполнить категорию</h5>
            <div class="dataTable-wrapper dataTable-loading sortable searchable fixed-columns">
                <div class="dataTable-container">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Название</th>
                            <th scope="col" width="5%">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="align-left">
                                    <input type="checkbox" value="{{ $category->id }}" onclick="save({{$category->id}})" {{$category->ispopulate == "1"?"checked":""}}/>
                                </td>
                                <td>
                                    <a href="{{ route('admin.setting.category.up', ['id' => $category->id]) }}"><i class='ri-arrow-up-line'></i></a></td>
                                <td>
                                    <a href="{{ route('admin.setting.category.down', ['id' => $category->id]) }}"><i class='ri-arrow-down-line'></i> </a>
                                </td>
                                <td class="align-middle"> {{ $category->title }}  </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-sm float-end"><i class="bi bi-pencil"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Нет категорий</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function save(cat_id) {
            $.ajax({
                url: "{{ route('admin.setting.category.update') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    cat_id: cat_id
                },
                dataType: "json",
                success: function (data) {
                    NotificationMessage(data.message)
                },
            });
        }
    </script>

@endsection



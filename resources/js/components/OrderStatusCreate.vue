<template>
    <div class="card-body" style=" padding: 0; ">
        <div class="row mb-3  pt-4">
            <label for="input-type" class="col-sm-3 col-form-label required">Тип</label>
            <div class="col-sm-9">
                <select name="type" id="input-type" class="form-control" @change="selectChange($event)" required>
                    <option value="" selected>Выберите тип</option>
                    <optgroup label="Выбор">
                        <option value="select">Список</option>
                        <option value="radio">Переключатель</option>
                        <option value="checkbox">Флажок</option>
                    </optgroup>
                    <optgroup label="Поле ввода">
                        <option value="text">Текст</option>
                        <option value="textarea">Текстовая область</option>
                    </optgroup>
                    <optgroup label="Файл">
                        <option value="file">Файл</option>
                    </optgroup>
                    <optgroup label="Дата">
                        <option value="date">Дата</option>
                        <option value="time">Время</option>
                        <option value="datetime">Дата и время</option>
                    </optgroup>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderStatusEdit"
}
</script>

<style scoped>

</style>

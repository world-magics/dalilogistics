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
        <div class="tab-content" id="myTabContent">
            <div v-for="(item, key) in langs" class="tab-pane fade active show" :id="item.code">
                <div class="row mb-3 ">
                    <label class="col-sm-3 col-form-label required">
                        <img :src="item.icon" style="width: 20px; "> Название опции
                    </label>
                    <div class="col-sm-9">
                        <input type="text" :name="'name['+item.code+']'" maxlength="250" class="form-control" :placeholder="item.code" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 ">
            <label for="sort" class="col-sm-3 col-form-label required"> Порядок сортировки</label>
            <div class="col-sm-9">
                <input type="number" name="sort_order" class="form-control" value="0" id="sort">
            </div>
        </div>
        <fieldset v-if="option_value">
            <legend>Значение</legend>
            <hr>
            <table id="option-value" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td class="text-left required">Значение опции</td>
                    <td class="text-center">Изображение</td>
                    <td class="text-right">Порядок сортировки</td>
                    <td width="5%"></td>
                </tr>
                </thead>
                <tbody id="tbody"></tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-right">
                        <button type="button" data-toggle="tooltip" @click="addOptionValue" title="" class="btn btn-primary" data-original-title="Добавить">
                            <i class="bi bi-plus-square-dotted"></i>
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </fieldset>

    </div>
</template>
<script>
export default {
    props: {
        routelang: String,
    },
    data() {
        return {
            endpointLanguage: this.routelang,
            langs: [],
            option_value_row: 0,
            option_value: true,
        };
    },
    mounted() {
        this.getLanguage();
    },
    methods: {
        getLanguage() {
            axios.get(this.endpointLanguage)
                .then(response => {
                    this.langs = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        addOptionValue() {
            let langs = '';
            for (let i = 0; i < this.langs.length; i++) {
                langs += '<div class="input-group">'
                    + '<img src="' + this.langs[i].icon + '" style="width: 20px;margin-right: 7px;">'
                    + '<input type="text" name="option_value[' + this.option_value_row + '][description][' + this.langs[i].code + ']" max="250" placeholder="Значение опции" class="form-control" required>'
                    + '</div>';
            }
            let html = `
                <tr id="option-value-row${this.option_value_row}">
                    <td class="align-middle">
                        <span>${langs}</span>
                    </td>
                    <td class="text-center align-middle">
                        <a id="thumb-image${this.option_value_row}" data-toggle="image" onclick="FileManager(${this.option_value_row})" style="cursor: pointer;">
                            <img src="/assets/img/no_image-100x100.png" class="img-thumbnail " id="imagevue${this.option_value_row}" style="width: 100px;">
                        </a>
                        <input type="hidden" name="option_value[${this.option_value_row}][image]" id="input-image${this.option_value_row}"></td>
                    <td class="align-middle">
                        <input type="number" name="option_value[${this.option_value_row}][sort_order]" placeholder="Порядок сортировки" class="form-control" value="0">
                    </td>
                    <td class="align-middle">
                        <button type="button" onclick="document.getElementById('option-value-row${this.option_value_row}').remove();" data-toggle="tooltip" title="Удалить" class="btn btn-danger">
                            <i class="ri-delete-bin-7-line"></i>
                        </button>
                    </td>
                </tr>`;
            document.getElementById('tbody').insertAdjacentHTML('beforeend', html);
            window.scrollTo(0, document.body.scrollHeight);
            return this.option_value_row++;
        },
        selectChange(event) {
            if (event.target.value == 'select' || event.target.value == 'radio' || event.target.value == 'checkbox' || event.target.value == 'image') {
                this.option_value = true;
            } else {
                this.option_value = false;
            }
        },
    }
}
</script>

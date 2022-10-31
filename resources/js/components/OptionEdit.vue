<template>
    <div class="card-body" style=" padding: 0; ">
        <div class="row mb-3  pt-4">
            <label for="input-type" class="col-sm-3 col-form-label required">Тип</label>
            <div class="col-sm-9">
                <select name="type" id="input-type" class="form-control" @change="selectChange($event)" required v-model="option.type">
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
                        <input type="text" :name="'name['+item.code+']'" maxlength="250" class="form-control" :placeholder="item.code" required v-model="option.name[item.code]">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 ">
            <label for="sort" class="col-sm-3 col-form-label required"> Порядок сортировки</label>
            <div class="col-sm-9">
                <input type="number" name="sort_order" class="form-control"  id="sort" v-model="option.sort_order">
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
                <tbody id="tbody">
                <tr v-for="(item, key) in values" :id="'option-value-row'+key">
                    <td class="align-middle">
                        <input type="hidden" :name="'option_value['+key+'][id]'" :value="item.id">
                        <div class="input-group" v-for="(item_lang, key_lang) in langs">
                            <img :src="item_lang.icon" style="width: 20px;margin-right: 7px;">
                            <input type="text" :name="'option_value['+key+'][description]['+item_lang.code+']'" max="250" class="form-control" required :value="item.name[item_lang.code]">
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <a :id="'thumb-image'+key" data-toggle="image" :onclick="'FileManager('+key+')'" style="cursor: pointer;">
                            <img :src="item.image" class="img-thumbnail " :id="'imagevue'+key" style="width: 100px;">
                        </a>
                        <input type="hidden" :name="'option_value['+key+'][image]'" :id="'input-image'+key" :value="item.image">
                    </td>
                    <td class="align-middle">
                        <input type="number" :name="'option_value['+key+'][sort_order]'" class="form-control" :value="item.sort_order">
                    </td>
                    <td class="align-middle">
                        <button type="button" @click="removeTR(key)" data-toggle="tooltip" title="Удалить" class="btn btn-danger">
                            <i class="ri-delete-bin-7-line"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
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
        optionurl: String,
    },
    data() {
        return {
            endpointLanguage: this.routelang,
            optionUrl: this.optionurl,
            langs: [],
            option_value_row: 0,
            option_value: true,
            option: {
                id: 0,
                name: {},
                type: '',
                sort_order: 0,
            },
            values: {
                id: 0,
                name: {},
                option_id: '',
                image: '',
                sort_order: 0,
            },
        };
    },
    mounted() {
        this.getOption();
    },
    methods: {
        getOption() {
            axios.get(this.optionUrl).then(response => {
                this.getLanguage();
                this.option = response.data.option;
                this.values = response.data.values;
                this.option_value_row = response.data.values.length;
            });
        },
        getLanguage() {
            axios.get(this.endpointLanguage).then(response => {
                this.langs = response.data;
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
        removeTR(id) {
            document.getElementById('option-value-row' + id).remove();
        },

    }
}
</script>

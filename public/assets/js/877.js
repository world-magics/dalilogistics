"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[877],{877:(t,e,a)=>{a.r(e),a.d(e,{default:()=>o});const n={props:{routelang:String},data:function(){return{endpointLanguage:this.routelang,langs:[],option_value_row:0,option_value:!0}},mounted:function(){this.getLanguage()},methods:{getLanguage:function(){var t=this;axios.get(this.endpointLanguage).then((function(e){t.langs=e.data})).catch((function(t){console.log(t)}))},addOptionValue:function(){for(var t="",e=0;e<this.langs.length;e++)t+='<div class="input-group"><img src="'+this.langs[e].icon+'" style="width: 20px;margin-right: 7px;"><input type="text" name="option_value['+this.option_value_row+"][description]["+this.langs[e].code+']" max="250" placeholder="Значение опции" class="form-control" required></div>';var a='\n                <tr id="option-value-row'.concat(this.option_value_row,'">\n                    <td class="align-middle">\n                        <span>').concat(t,'</span>\n                    </td>\n                    <td class="text-center align-middle">\n                        <a id="thumb-image').concat(this.option_value_row,'" data-toggle="image" onclick="FileManager(').concat(this.option_value_row,')" style="cursor: pointer;">\n                            <img src="/assets/img/no_image-100x100.png" class="img-thumbnail " id="imagevue').concat(this.option_value_row,'" style="width: 100px;">\n                        </a>\n                        <input type="hidden" name="option_value[').concat(this.option_value_row,'][image]" id="input-image').concat(this.option_value_row,'"></td>\n                    <td class="align-middle">\n                        <input type="number" name="option_value[').concat(this.option_value_row,'][sort_order]" placeholder="Порядок сортировки" class="form-control" value="0">\n                    </td>\n                    <td class="align-middle">\n                        <button type="button" onclick="document.getElementById(\'option-value-row').concat(this.option_value_row,'\').remove();" data-toggle="tooltip" title="Удалить" class="btn btn-danger">\n                            <i class="ri-delete-bin-7-line"></i>\n                        </button>\n                    </td>\n                </tr>');return document.getElementById("tbody").insertAdjacentHTML("beforeend",a),window.scrollTo(0,document.body.scrollHeight),this.option_value_row++},selectChange:function(t){"select"==t.target.value||"radio"==t.target.value||"checkbox"==t.target.value||"image"==t.target.value?this.option_value=!0:this.option_value=!1}}};const o=(0,a(900).Z)(n,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"card-body",staticStyle:{padding:"0"}},[a("div",{staticClass:"row mb-3  pt-4"},[a("label",{staticClass:"col-sm-3 col-form-label required",attrs:{for:"input-type"}},[t._v("Тип")]),t._v(" "),a("div",{staticClass:"col-sm-9"},[a("select",{staticClass:"form-control",attrs:{name:"type",id:"input-type",required:""},on:{change:function(e){return t.selectChange(e)}}},[a("option",{attrs:{value:"",selected:""}},[t._v("Выберите тип")]),t._v(" "),t._m(0),t._v(" "),t._m(1),t._v(" "),t._m(2),t._v(" "),t._m(3)])])]),t._v(" "),a("div",{staticClass:"tab-content",attrs:{id:"myTabContent"}},t._l(t.langs,(function(e,n){return a("div",{staticClass:"tab-pane fade active show",attrs:{id:e.code}},[a("div",{staticClass:"row mb-3 "},[a("label",{staticClass:"col-sm-3 col-form-label required"},[a("img",{staticStyle:{width:"20px"},attrs:{src:e.icon}}),t._v(" Название опции\n                ")]),t._v(" "),a("div",{staticClass:"col-sm-9"},[a("input",{staticClass:"form-control",attrs:{type:"text",name:"name["+e.code+"]",maxlength:"250",placeholder:e.code,required:""}})])])])})),0),t._v(" "),t._m(4),t._v(" "),t.option_value?a("fieldset",[a("legend",[t._v("Значение")]),t._v(" "),a("hr"),t._v(" "),a("table",{staticClass:"table table-striped table-bordered table-hover",attrs:{id:"option-value"}},[t._m(5),t._v(" "),a("tbody",{attrs:{id:"tbody"}}),t._v(" "),a("tfoot",[a("tr",[a("td",{attrs:{colspan:"3"}}),t._v(" "),a("td",{staticClass:"text-right"},[a("button",{staticClass:"btn btn-primary",attrs:{type:"button","data-toggle":"tooltip",title:"","data-original-title":"Добавить"},on:{click:t.addOptionValue}},[a("i",{staticClass:"bi bi-plus-square-dotted"})])])])])])]):t._e()])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("optgroup",{attrs:{label:"Выбор"}},[a("option",{attrs:{value:"select"}},[t._v("Список")]),t._v(" "),a("option",{attrs:{value:"radio"}},[t._v("Переключатель")]),t._v(" "),a("option",{attrs:{value:"checkbox"}},[t._v("Флажок")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("optgroup",{attrs:{label:"Поле ввода"}},[a("option",{attrs:{value:"text"}},[t._v("Текст")]),t._v(" "),a("option",{attrs:{value:"textarea"}},[t._v("Текстовая область")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("optgroup",{attrs:{label:"Файл"}},[a("option",{attrs:{value:"file"}},[t._v("Файл")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("optgroup",{attrs:{label:"Дата"}},[a("option",{attrs:{value:"date"}},[t._v("Дата")]),t._v(" "),a("option",{attrs:{value:"time"}},[t._v("Время")]),t._v(" "),a("option",{attrs:{value:"datetime"}},[t._v("Дата и время")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"row mb-3 "},[a("label",{staticClass:"col-sm-3 col-form-label required",attrs:{for:"sort"}},[t._v(" Порядок сортировки")]),t._v(" "),a("div",{staticClass:"col-sm-9"},[a("input",{staticClass:"form-control",attrs:{type:"number",name:"sort_order",value:"0",id:"sort"}})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("thead",[a("tr",[a("td",{staticClass:"text-left required"},[t._v("Значение опции")]),t._v(" "),a("td",{staticClass:"text-center"},[t._v("Изображение")]),t._v(" "),a("td",{staticClass:"text-right"},[t._v("Порядок сортировки")]),t._v(" "),a("td",{attrs:{width:"5%"}})])])}],!1,null,null,null).exports},900:(t,e,a)=>{function n(t,e,a,n,o,i,s,l){var r,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=a,c._compiled=!0),n&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),s?(r=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},c._ssrRegister=r):o&&(r=l?function(){o.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:o),r)if(c.functional){c._injectStyles=r;var d=c.render;c.render=function(t,e){return r.call(e),d(t,e)}}else{var u=c.beforeCreate;c.beforeCreate=u?[].concat(u,r):[r]}return{exports:t,options:c}}a.d(e,{Z:()=>n})}}]);
"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_OptionCreate_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/OptionCreate.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/OptionCreate.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    routelang: String
  },
  data: function data() {
    return {
      endpointLanguage: this.routelang,
      langs: [],
      option_value_row: 0,
      option_value: true
    };
  },
  mounted: function mounted() {
    this.getLanguage();
  },
  methods: {
    getLanguage: function getLanguage() {
      var _this = this;

      axios.get(this.endpointLanguage).then(function (response) {
        _this.langs = response.data;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    addOptionValue: function addOptionValue() {
      var langs = '';

      for (var i = 0; i < this.langs.length; i++) {
        langs += '<div class="input-group">' + '<img src="' + this.langs[i].icon + '" style="width: 20px;margin-right: 7px;">' + '<input type="text" name="option_value[' + this.option_value_row + '][description][' + this.langs[i].code + ']" max="250" placeholder="Значение опции" class="form-control" required>' + '</div>';
      }

      var html = "\n                <tr id=\"option-value-row".concat(this.option_value_row, "\">\n                    <td class=\"align-middle\">\n                        <span>").concat(langs, "</span>\n                    </td>\n                    <td class=\"text-center align-middle\">\n                        <a id=\"thumb-image").concat(this.option_value_row, "\" data-toggle=\"image\" onclick=\"FileManager(").concat(this.option_value_row, ")\" style=\"cursor: pointer;\">\n                            <img src=\"/assets/img/no_image-100x100.png\" class=\"img-thumbnail \" id=\"imagevue").concat(this.option_value_row, "\" style=\"width: 100px;\">\n                        </a>\n                        <input type=\"hidden\" name=\"option_value[").concat(this.option_value_row, "][image]\" id=\"input-image").concat(this.option_value_row, "\"></td>\n                    <td class=\"align-middle\">\n                        <input type=\"number\" name=\"option_value[").concat(this.option_value_row, "][sort_order]\" placeholder=\"\u041F\u043E\u0440\u044F\u0434\u043E\u043A \u0441\u043E\u0440\u0442\u0438\u0440\u043E\u0432\u043A\u0438\" class=\"form-control\" value=\"0\">\n                    </td>\n                    <td class=\"align-middle\">\n                        <button type=\"button\" onclick=\"document.getElementById('option-value-row").concat(this.option_value_row, "').remove();\" data-toggle=\"tooltip\" title=\"\u0423\u0434\u0430\u043B\u0438\u0442\u044C\" class=\"btn btn-danger\">\n                            <i class=\"ri-delete-bin-7-line\"></i>\n                        </button>\n                    </td>\n                </tr>");
      document.getElementById('tbody').insertAdjacentHTML('beforeend', html);
      window.scrollTo(0, document.body.scrollHeight);
      return this.option_value_row++;
    },
    selectChange: function selectChange(event) {
      if (event.target.value == 'select' || event.target.value == 'radio' || event.target.value == 'checkbox' || event.target.value == 'image') {
        this.option_value = true;
      } else {
        this.option_value = false;
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/components/OptionCreate.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/OptionCreate.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _OptionCreate_vue_vue_type_template_id_63ff6588___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OptionCreate.vue?vue&type=template&id=63ff6588& */ "./resources/js/components/OptionCreate.vue?vue&type=template&id=63ff6588&");
/* harmony import */ var _OptionCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OptionCreate.vue?vue&type=script&lang=js& */ "./resources/js/components/OptionCreate.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OptionCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OptionCreate_vue_vue_type_template_id_63ff6588___WEBPACK_IMPORTED_MODULE_0__.render,
  _OptionCreate_vue_vue_type_template_id_63ff6588___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/OptionCreate.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/OptionCreate.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/OptionCreate.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OptionCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./OptionCreate.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/OptionCreate.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OptionCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/OptionCreate.vue?vue&type=template&id=63ff6588&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/OptionCreate.vue?vue&type=template&id=63ff6588& ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OptionCreate_vue_vue_type_template_id_63ff6588___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OptionCreate_vue_vue_type_template_id_63ff6588___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OptionCreate_vue_vue_type_template_id_63ff6588___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./OptionCreate.vue?vue&type=template&id=63ff6588& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/OptionCreate.vue?vue&type=template&id=63ff6588&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/OptionCreate.vue?vue&type=template&id=63ff6588&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/OptionCreate.vue?vue&type=template&id=63ff6588& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "card-body", staticStyle: { padding: "0" } },
    [
      _c("div", { staticClass: "row mb-3  pt-4" }, [
        _c(
          "label",
          {
            staticClass: "col-sm-3 col-form-label required",
            attrs: { for: "input-type" },
          },
          [_vm._v("Тип")]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "col-sm-9" }, [
          _c(
            "select",
            {
              staticClass: "form-control",
              attrs: { name: "type", id: "input-type", required: "" },
              on: {
                change: function ($event) {
                  return _vm.selectChange($event)
                },
              },
            },
            [
              _c("option", { attrs: { value: "", selected: "" } }, [
                _vm._v("Выберите тип"),
              ]),
              _vm._v(" "),
              _vm._m(0),
              _vm._v(" "),
              _vm._m(1),
              _vm._v(" "),
              _vm._m(2),
              _vm._v(" "),
              _vm._m(3),
            ]
          ),
        ]),
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "tab-content", attrs: { id: "myTabContent" } },
        _vm._l(_vm.langs, function (item, key) {
          return _c(
            "div",
            {
              staticClass: "tab-pane fade active show",
              attrs: { id: item.code },
            },
            [
              _c("div", { staticClass: "row mb-3 " }, [
                _c(
                  "label",
                  { staticClass: "col-sm-3 col-form-label required" },
                  [
                    _c("img", {
                      staticStyle: { width: "20px" },
                      attrs: { src: item.icon },
                    }),
                    _vm._v(" Название опции\n                "),
                  ]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "col-sm-9" }, [
                  _c("input", {
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "name[" + item.code + "]",
                      maxlength: "250",
                      placeholder: item.code,
                      required: "",
                    },
                  }),
                ]),
              ]),
            ]
          )
        }),
        0
      ),
      _vm._v(" "),
      _vm._m(4),
      _vm._v(" "),
      _vm.option_value
        ? _c("fieldset", [
            _c("legend", [_vm._v("Значение")]),
            _vm._v(" "),
            _c("hr"),
            _vm._v(" "),
            _c(
              "table",
              {
                staticClass: "table table-striped table-bordered table-hover",
                attrs: { id: "option-value" },
              },
              [
                _vm._m(5),
                _vm._v(" "),
                _c("tbody", { attrs: { id: "tbody" } }),
                _vm._v(" "),
                _c("tfoot", [
                  _c("tr", [
                    _c("td", { attrs: { colspan: "3" } }),
                    _vm._v(" "),
                    _c("td", { staticClass: "text-right" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-primary",
                          attrs: {
                            type: "button",
                            "data-toggle": "tooltip",
                            title: "",
                            "data-original-title": "Добавить",
                          },
                          on: { click: _vm.addOptionValue },
                        },
                        [_c("i", { staticClass: "bi bi-plus-square-dotted" })]
                      ),
                    ]),
                  ]),
                ]),
              ]
            ),
          ])
        : _vm._e(),
    ]
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("optgroup", { attrs: { label: "Выбор" } }, [
      _c("option", { attrs: { value: "select" } }, [_vm._v("Список")]),
      _vm._v(" "),
      _c("option", { attrs: { value: "radio" } }, [_vm._v("Переключатель")]),
      _vm._v(" "),
      _c("option", { attrs: { value: "checkbox" } }, [_vm._v("Флажок")]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("optgroup", { attrs: { label: "Поле ввода" } }, [
      _c("option", { attrs: { value: "text" } }, [_vm._v("Текст")]),
      _vm._v(" "),
      _c("option", { attrs: { value: "textarea" } }, [
        _vm._v("Текстовая область"),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("optgroup", { attrs: { label: "Файл" } }, [
      _c("option", { attrs: { value: "file" } }, [_vm._v("Файл")]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("optgroup", { attrs: { label: "Дата" } }, [
      _c("option", { attrs: { value: "date" } }, [_vm._v("Дата")]),
      _vm._v(" "),
      _c("option", { attrs: { value: "time" } }, [_vm._v("Время")]),
      _vm._v(" "),
      _c("option", { attrs: { value: "datetime" } }, [_vm._v("Дата и время")]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row mb-3 " }, [
      _c(
        "label",
        {
          staticClass: "col-sm-3 col-form-label required",
          attrs: { for: "sort" },
        },
        [_vm._v(" Порядок сортировки")]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "col-sm-9" }, [
        _c("input", {
          staticClass: "form-control",
          attrs: { type: "number", name: "sort_order", value: "0", id: "sort" },
        }),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("td", { staticClass: "text-left required" }, [
          _vm._v("Значение опции"),
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "text-center" }, [_vm._v("Изображение")]),
        _vm._v(" "),
        _c("td", { staticClass: "text-right" }, [_vm._v("Порядок сортировки")]),
        _vm._v(" "),
        _c("td", { attrs: { width: "5%" } }),
      ]),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);
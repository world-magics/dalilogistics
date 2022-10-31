"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[320],{320:(t,a,s)=>{s.r(a),s.d(a,{default:()=>n});var e=function(t,a,s,e,n,i,o,r){var l,c="function"==typeof t?t.options:t;if(a&&(c.render=a,c.staticRenderFns=s,c._compiled=!0),e&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),o?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(o)},c._ssrRegister=l):n&&(l=r?function(){n.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:n),l)if(c.functional){c._injectStyles=l;var u=c.render;c.render=function(t,a){return l.call(a),u(t,a)}}else{var h=c.beforeCreate;c.beforeCreate=h?[].concat(h,l):[l]}return{exports:t,options:c}}({data:function(){return{inputs:[{inglizcha:"",uzbekcha:"",ruscha:""}],inputNumbers:[{eng:"",uz:"",ru:""}],success:!1,results:[]}},methods:{DictonarySave:function(){var t=this;axios.post("/dictionary/save",{lauanges:this.inputs}).then((function(a){t.success=!0})).catch((function(t){alert("Qandaydur xatolik")}))},add:function(){this.inputs.push({inglizcha:"",uzbekcha:"",ruscha:""})},remove:function(t){this.inputs.splice(t,1)}}},(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"container"},[!1===t.success?s("form",{attrs:{method:"post"},on:{submit:function(a){return a.preventDefault(),t.DictonarySave.apply(null,arguments)}}},[s("h1",[t._v("Yangi so'z qoshish")]),t._v(" "),s("hr"),t._v(" "),s("div",{staticClass:"alert alert-info",attrs:{role:"alert"}},[t._v("\n                So'zlar admin tasdiqlangandan so'ng chop etiladi. Juda ko'p xato so'zlarni kiritish bloklanishingizga sabab bo'lishi mumkun\n            ")]),t._v(" "),t._l(t.inputs,(function(a,e){return s("div",{key:e,staticClass:"input-group mb-3"},[s("div",{staticClass:"form-floating col"},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.inglizcha,expression:"input.inglizcha"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Inglizchaa",autofocus:""},domProps:{value:a.inglizcha},on:{input:function(s){s.target.composing||t.$set(a,"inglizcha",s.target.value)}}}),t._v(" "),s("label",{attrs:{for:"ofam"}},[t._v("Inglizcha so'z")])]),t._v(" "),s("div",{staticClass:"form-floating col"},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.uzbekcha,expression:"input.uzbekcha"}],staticClass:"form-control",attrs:{type:"text",placeholder:"O'zbekcha"},domProps:{value:a.uzbekcha},on:{input:function(s){s.target.composing||t.$set(a,"uzbekcha",s.target.value)}}}),t._v(" "),s("label",{attrs:{for:"ofam"}},[t._v("O'zbekcha so'z")])]),t._v(" "),s("div",{staticClass:"form-floating col"},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.ruscha,expression:"input.ruscha"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Ruscha"},domProps:{value:a.ruscha},on:{input:function(s){s.target.composing||t.$set(a,"ruscha",s.target.value)}}}),t._v(" "),s("label",{attrs:{for:"ofam"}},[t._v("Ruscha so'z")])]),t._v(" "),s("div",{staticClass:"form-floating col-1"},[s("span",[s("i",{directives:[{name:"show",rawName:"v-show",value:e||!e&&t.inputs.length>1,expression:"k || ( !k && inputs.length > 1)"}],staticClass:"fas fa-minus-circle",on:{click:function(a){return t.remove(e)}}},[s("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",height:"50px",viewBox:"-66 0 512 512",width:"50px"}},[s("g",{attrs:{id:"surface1"}},[s("path",{staticStyle:{stroke:"none","fill-rule":"nonzero",fill:"rgb(0%,0%,0%)","fill-opacity":"1"},attrs:{d:"M 178.84375 288.277344 L 173.949219 288.277344 L 173.949219 431.652344 L 203.957031 431.652344 L 203.957031 288.277344 Z M 178.84375 288.277344 "}}),t._v(" "),s("path",{staticStyle:{stroke:"none","fill-rule":"nonzero",fill:"rgb(0%,0%,0%)","fill-opacity":"1"},attrs:{d:"M 228.542969 431.652344 L 258.632812 431.652344 L 269.335938 288.277344 L 239.238281 288.277344 Z M 228.542969 431.652344 "}}),t._v(" "),s("path",{staticStyle:{stroke:"none","fill-rule":"nonzero",fill:"rgb(0%,0%,0%)","fill-opacity":"1"},attrs:{d:"M 108.574219 288.277344 L 119.269531 431.652344 L 149.363281 431.652344 L 138.664062 288.277344 Z M 108.574219 288.277344 "}}),t._v(" "),s("path",{staticStyle:{stroke:"none","fill-rule":"nonzero",fill:"rgb(0%,0%,0%)","fill-opacity":"1"},attrs:{d:"M 268.851562 209.027344 L 359.792969 118.089844 L 241.707031 0 L 66.136719 175.570312 L 99.59375 209.027344 L 0 209.027344 L 0 239.035156 L 35.21875 239.035156 L 72.667969 512 L 305.242188 512 L 342.691406 239.035156 L 380.5 239.035156 L 380.5 209.027344 Z M 98.832031 481.992188 L 65.496094 239.035156 L 312.402344 239.035156 L 279.066406 481.992188 Z M 221.59375 62.554688 L 211.570312 145.433594 L 128.691406 155.457031 Z M 119.765625 186.761719 L 238.535156 172.398438 L 252.898438 53.632812 L 317.355469 118.089844 L 226.414062 209.027344 L 142.035156 209.027344 Z M 119.765625 186.761719 "}})])])]),t._v(" "),s("i",{directives:[{name:"show",rawName:"v-show",value:e==t.inputs.length-1,expression:"k == inputs.length-1"}],staticClass:"fas fa-plus-circle",on:{click:function(a){return t.add(e)}}},[s("svg",{staticStyle:{"enable-background":"new 0 0 612 612"},attrs:{version:"1.1",id:"Capa_1",xmlns:"http://www.w3.org/2000/svg","xmlns:xlink":"http://www.w3.org/1999/xlink",x:"0px",y:"0px",width:"50px",height:"50px",viewBox:"0 0 612 612","xml:space":"preserve"}},[s("g",{attrs:{id:"_x31__26_"}},[s("path",{attrs:{d:"M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125c-10.557,0-19.125,8.568-19.125,19.125v95.625\n\t\t\t\tH191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125h95.625v95.625\n\t\t\t\tc0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625c10.557,0,19.125-8.568,19.125-19.125\n\t\t\t\tC439.875,295.443,431.307,286.875,420.75,286.875z M535.5,0h-459C34.253,0,0,34.253,0,76.5v459C0,577.747,34.253,612,76.5,612\n\t\t\t\th459c42.247,0,76.5-34.253,76.5-76.5v-459C612,34.253,577.747,0,535.5,0z M573.75,535.5c0,21.133-17.136,38.25-38.25,38.25h-459\n\t\t\t\tc-21.133,0-38.25-17.117-38.25-38.25v-459c0-21.133,17.117-38.25,38.25-38.25h459c21.114,0,38.25,17.136,38.25,38.25V535.5z"}})])])])])])])})),t._v(" "),s("button",{staticClass:"btn btn-primary btn-block",attrs:{type:"submit"}},[t._v("\n                Saqlash\n            ")]),t._v(" "),s("a",{staticClass:"btn btn-secondary btn-block",attrs:{href:"../"}},[t._v("\n                Orqaga\n            ")])],2):t._e(),t._v(" "),!0===t.success?s("div",[s("h3",{staticClass:"alert alert-success"},[t._v("So'zlar bazaga qo'shildi admin tekshiruvidan so'ng saytda chop e'tiladi va kerakli ballarni sizga taqdim etadi!.\n                Saytga yordam berganingiz uchun tashakkur!")]),t._v(" "),s("a",{staticClass:"btn btn-secondary btn-block",attrs:{href:"../"}},[t._v("\n                Bosh sahifaga\n            ")]),t._v(" "),s("a",{staticClass:"btn btn-primary btn-block",attrs:{href:"?"}},[t._v("\n                Yana qo'shish\n            ")])]):t._e()])}),[],!1,null,null,null);const n=e.exports}}]);
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-set-invoice-manage"],{"21b2":function(e,t,n){"use strict";var a=n("ad41"),i=n.n(a);i.a},"2b74":function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.notifyAnnounceView=t.notifyAnnounceIndex=t.wechatConfig=t.configList=t.payCreate=t.advList=t.transmitCreate=t.collectDel=t.collectCreate=t.provinceList=void 0;var a="/tiny-shop/v1/common/provinces/index";t.provinceList=a;var i="/tiny-shop/v1/common/collect/create";t.collectCreate=i;var r="/tiny-shop/v1/common/collect/delete";t.collectDel=r;var o="/tiny-shop/v1/common/transmit/create";t.transmitCreate=o;var s="/tiny-shop/v1/common/adv/index";t.advList=s;var c="/tiny-shop/v1/common/config/index";t.configList=c;var u="/tiny-shop/v1/common/pay/create";t.payCreate=u;var v="/tiny-shop/v1/third-party/wechat-js-sdk";t.wechatConfig=v;var d="/tiny-shop/v1/common/notify-announce/index";t.notifyAnnounceIndex=d;var l="/tiny-shop/v1/common/notify-announce/view";t.notifyAnnounceView=l},"802d":function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.orderCustomerRefundClose=t.orderCustomerRefundApply=t.orderCustomerSalesReturn=t.rechargeConfigIndex=t.thirdPartyAuthDelete=t.thirdPartyAuthList=t.opinionDetail=t.opinionCreate=t.opinionList=t.uploadBase64Image=t.uploadImage=t.orderInvoiceList=t.invoiceDel=t.invoiceDefault=t.invoiceDetail=t.invoiceUpdate=t.invoiceCreate=t.invoiceList=t.evaluateAgain=t.evaluateCreate=t.creditsLogList=t.collectList=t.footPrintDel=t.footPrintList=t.couponReceive=t.orderTakeDelivery=t.orderDelete=t.orderDetail=t.orderProductSalesReturn=t.closeOrderRefundApply=t.orderRefundApply=t.orderList=t.couponDetail=t.couponClear=t.myCouponList=t.couponList=t.addressDelete=t.addressUpdate=t.addressDetail=t.addressDefault=t.addressCreate=t.addressList=t.memberUpdate=t.memberInfo=void 0;var a=n("3e3e"),i="/tiny-shop/v1/member/member/index";t.memberInfo=i;var r="/tiny-shop/v1/member/member/update";t.memberUpdate=r;var o="/tiny-shop/v1/member/address/index";t.addressList=o;var s="/tiny-shop/v1/member/address/default";t.addressDefault=s;var c="/tiny-shop/v1/member/address/view";t.addressDetail=c;var u="/tiny-shop/v1/member/address/create";t.addressCreate=u;var v="/tiny-shop/v1/member/address/update";t.addressUpdate=v;var d="/tiny-shop/v1/member/address/delete";t.addressDelete=d;var l="/tiny-shop/v1/marketing/coupon-type/index";t.couponList=l;var p="/tiny-shop/v1/member/coupon/index";t.myCouponList=p;var f="/tiny-shop/v1/marketing/coupon-type/view";t.couponDetail=f;var h="/tiny-shop/v1/marketing/coupon-type/create";t.couponReceive=h;var m="/tiny-shop/v1/member/coupon/clear";t.couponClear=m;var y="/tiny-shop/v1/member/order/index";t.orderList=y;var b="/tiny-shop/v1/member/order/take-delivery";t.orderTakeDelivery=b;var g="/tiny-shop/v1/member/order-product/refund-apply";t.orderRefundApply=g;var w="/tiny-shop/v1/member/order-product/refund-sales-return";t.orderProductSalesReturn=w;var x="/tiny-shop/v1/member/order-product/refund-close";t.closeOrderRefundApply=x;var C="/tiny-shop/v1/member/order/view";t.orderDetail=C;var D="/tiny-shop/v1/member/order/delete";t.orderDelete=D;var k="/tiny-shop/v1/member/footprint/index";t.footPrintList=k;var L="/tiny-shop/v1/member/footprint/delete";t.footPrintDel=L;var _="/tiny-shop/v1/member/collect/index";t.collectList=_;var P="/tiny-shop/v1/member/credits-log/index";t.creditsLogList=P;var R="/tiny-shop/v1/member/evaluate/create";t.evaluateCreate=R;var O="/tiny-shop/v1/member/evaluate/again";t.evaluateAgain=O;var I="/tiny-shop/v1/member/invoice/index";t.invoiceList=I;var j="/tiny-shop/v1/member/invoice/create";t.invoiceCreate=j;var A="/tiny-shop/v1/member/invoice/update";t.invoiceUpdate=A;var $="/tiny-shop/v1/member/invoice/view";t.invoiceDetail=$;var T="/tiny-shop/v1/member/invoice/default";t.invoiceDefault=T;var U="/tiny-shop/v1/member/invoice/delete";t.invoiceDel=U;var E="/tiny-shop/v1/member/order-invoice/index";t.orderInvoiceList=E;var S="/tiny-shop/v1/member/opinion/index";t.opinionList=S;var z="/tiny-shop/v1/member/opinion/create";t.opinionCreate=z;var B="/tiny-shop/v1/member/opinion/view";t.opinionDetail=B;var M="/tiny-shop/v1/member/auth/index";t.thirdPartyAuthList=M;var J="/tiny-shop/v1/member/auth/delete";t.thirdPartyAuthDelete=J;var N="/tiny-shop/v1/member/recharge-config/index";t.rechargeConfigIndex=N;var V="/tiny-shop/v1/member/order-customer/apply";t.orderCustomerRefundApply=V;var X="/tiny-shop/v1/member/order-customer/sales-return";t.orderCustomerSalesReturn=X;var G="/tiny-shop/v1/member/order-customer/close";t.orderCustomerRefundClose=G;var q="".concat(a.baseUrl,"/tiny-shop/v1/common/file/images");t.uploadImage=q;var F="".concat(a.baseUrl,"/tiny-shop/v1/common/file/base64");t.uploadBase64Image=F},"8bff":function(e,t,n){"use strict";var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-uni-view",{staticClass:"content"},[n("v-uni-view",{staticClass:"row b-b"},[n("v-uni-text",{staticClass:"tit"},[e._v("发票类型")]),n("v-uni-radio-group",{staticClass:"invoice-type",on:{change:function(t){t=e.$handleEvent(t),e.handleInvoiceTypeChange(t)}}},e._l(e.invoiceType,(function(t,a){return n("v-uni-label",{key:a,staticClass:"invoice-type-item"},[n("v-uni-radio",{staticClass:"gender-item-radio",attrs:{color:"#fa436a",value:""+t.value,checked:t.value===e.invoiceData.type}}),n("v-uni-text",{staticClass:"gender-item-text"},[e._v(e._s(t.name))])],1)})),1)],1),n("v-uni-view",{staticClass:"row b-b"},[n("v-uni-text",{staticClass:"tit"},[e._v("发票抬头")]),n("v-uni-input",{staticClass:"input",attrs:{type:"text",placeholder:"请输入发票抬头","placeholder-class":"placeholder"},on:{blur:function(t){t=e.$handleEvent(t),e.handleTitleChange(t)}},model:{value:e.invoiceData.title,callback:function(t){e.$set(e.invoiceData,"title",t)},expression:"invoiceData.title"}})],1),n("v-uni-view",{directives:[{name:"show",rawName:"v-show",value:1===parseInt(e.invoiceData.type,10),expression:"parseInt(invoiceData.type, 10) === 1"}],staticClass:"row b-b"},[n("v-uni-text",{staticClass:"tit"},[e._v("发票税号")]),n("v-uni-input",{staticClass:"input",attrs:{type:"text",placeholder:"请输入发票税号","placeholder-class":"placeholder"},on:{blur:function(t){t=e.$handleEvent(t),e.handleDutyParagraphChange(t)}},model:{value:e.invoiceData.duty_paragraph,callback:function(t){e.$set(e.invoiceData,"duty_paragraph",t)},expression:"invoiceData.duty_paragraph"}})],1),n("v-uni-view",{staticClass:"row default-row"},[n("v-uni-text",{staticClass:"tit"},[e._v("设为默认")]),n("v-uni-switch",{attrs:{checked:!!e.invoiceData.is_default,color:"#fa436a"},on:{change:function(t){t=e.$handleEvent(t),e.switchChange(t)}}})],1),n("v-uni-button",{staticClass:"add-btn",on:{click:function(t){t=e.$handleEvent(t),e.confirm(t)}}},[e._v("提交")])],1)},i=[];n.d(t,"a",(function(){return a})),n.d(t,"b",(function(){return i}))},"9d59":function(e,t,n){"use strict";n.r(t);var a=n("fa8c"),i=n.n(a);for(var r in a)"default"!==r&&function(e){n.d(t,e,(function(){return a[e]}))}(r);t["default"]=i.a},acea:function(e,t,n){"use strict";n.r(t);var a=n("8bff"),i=n("9d59");for(var r in i)"default"!==r&&function(e){n.d(t,e,(function(){return i[e]}))}(r);n("21b2");var o=n("2877"),s=Object(o["a"])(i["default"],a["a"],a["b"],!1,null,"44454ea7",null);t["default"]=s.exports},ad41:function(e,t,n){var a=n("efb2");"string"===typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);var i=n("4f06").default;i("3c5882ef",a,!0,{sourceMap:!1,shadowMode:!1})},efb2:function(e,t,n){var a=n("24fb");t=a(!1),t.push([e.i,"uni-page-body[data-v-44454ea7]{background:#f8f8f8;padding-top:%?16?%}.row[data-v-44454ea7]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;position:relative;padding:0 %?30?%;height:%?110?%;background:#fff}.row .tit[data-v-44454ea7]{-webkit-flex-shrink:0;flex-shrink:0;width:%?140?%;font-size:%?30?%;color:#303133}.row .input[data-v-44454ea7]{-webkit-box-flex:1;-webkit-flex:1;flex:1;font-size:%?30?%;color:#303133}.row .icon-shouhuodizhi[data-v-44454ea7]{font-size:%?36?%;color:#909399}.default-row[data-v-44454ea7]{margin-top:%?16?%}.default-row .tit[data-v-44454ea7]{-webkit-box-flex:1;-webkit-flex:1;flex:1}.default-row uni-switch[data-v-44454ea7]{-webkit-transform:translateX(%?16?%) scale(.9);transform:translateX(%?16?%) scale(.9)}.add-btn[data-v-44454ea7]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;width:%?690?%;height:%?80?%;margin:%?60?% auto;font-size:%?32?%;color:#fff;background-color:#fa436a;border-radius:%?10?%;box-shadow:1px 2px 5px rgba(219,63,96,.4)}.invoice-type-item[data-v-44454ea7]{margin-right:%?20?%}body.?%PAGE?%[data-v-44454ea7]{background:#f8f8f8}",""]),e.exports=t},fa8c:function(e,t,n){"use strict";var a=n("4ea4");Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,n("8e6e"),n("ac6a"),n("456d");var i=a(n("bd86"));n("96cf");var r=a(n("3b8d")),o=n("802d");n("2b74");function s(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function c(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?s(Object(n),!0).forEach((function(t){(0,i.default)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):s(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var u={data:function(){return{invoiceData:{type:2,title:"",duty_paragraph:"",is_default:""},invoiceType:[{name:"公司",value:1},{name:"个人",value:2}]}},onLoad:function(e){this.initData(e)},methods:{initData:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(t){var n;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:if(n="新增发票","edit"!==t.type){e.next=5;break}return n="编辑发票",e.next=5,this.getInvoiceDetail(t.id);case 5:this.manageType=t.type,uni.setNavigationBarTitle({title:n});case 7:case"end":return e.stop()}}),e,this)})));function t(t){return e.apply(this,arguments)}return t}(),getInvoiceDetail:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(t){var n=this;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$get("".concat(o.invoiceDetail),{id:t}).then(function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(t){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:n.invoiceData=t.data;case 1:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}()).catch((function(e){console.log(e)}));case 2:case"end":return e.stop()}}),e,this)})));function t(t){return e.apply(this,arguments)}return t}(),handleTitleChange:function(e){this.invoiceData.title=e.detail.value},handleInvoiceTypeChange:function(e){this.invoiceData.type=e.detail.value},handleDutyParagraphChange:function(e){this.invoiceData.duty_paragraph=e.detail.value},switchChange:function(e){this.invoiceData.is_default=e.detail.value?"1":"0"},confirm:function(){var e=this.invoiceData;e.title?1!==e.type||e.duty_paragraph?"edit"===this.manageType?this.handleInvoiceUpdate(e):this.handleInvoiceCreate(e):this.$api.msg("请填写发票税号"):this.$api.msg("请填写发票抬头")},handleInvoiceUpdate:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(t){var n=this;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$put("".concat(o.invoiceUpdate,"?id=").concat(t.id),{type:t.type,title:t.title,duty_paragraph:t.duty_paragraph,is_default:t.is_default}).then((function(e){n.$api.msg("恭喜您, 发票修改成功！"),uni.navigateBack({url:"/pages/set/invoice/invoice"})})).catch((function(e){console.log(e)}));case 2:case"end":return e.stop()}}),e,this)})));function t(t){return e.apply(this,arguments)}return t}(),handleInvoiceCreate:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(t){var n=this;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$post("".concat(o.invoiceCreate),c({},t)).then((function(e){n.$api.msg("恭喜您, 发票添加成功！"),uni.navigateBack({url:"/pages/set/invoice/invoice"})})).catch((function(e){console.log(e)}));case 2:case"end":return e.stop()}}),e,this)})));function t(t){return e.apply(this,arguments)}return t}()}};t.default=u}}]);
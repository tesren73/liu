(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-order-item"],{"0aaa":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",{staticClass:"collection"},[a("v-uni-view",{staticClass:"uni-list"},[a("rf-swipe-action",t._l(t.orderItemList,(function(e,n){return a("rf-swipe-action-item",{key:n,staticClass:"uni-list-cell",attrs:{options:t.itemOptions(e.is_evaluate,e.refund_status),info:e},on:{action:function(e){e=t.$handleEvent(e),t.bindClick(e)}}},[a("v-uni-view",{staticClass:"uni-media-list"},[a("v-uni-image",{staticClass:"uni-media-list-logo",attrs:{mode:"aspectFill",src:e.product_picture}}),a("uni-tag",{staticClass:"evaluate-tag",attrs:{inverted:!0,mark:!0,text:t._f("filterProductStatus")(e),type:"primary",size:"small"}}),a("v-uni-view",{staticClass:"uni-media-list-body"},[a("v-uni-view",{staticClass:"uni-media-list-text-top"},[t._v(t._s(e.product_name))]),a("v-uni-view",{staticClass:"uni-media-list-text-second"},[t._v(t._s(e.sku_name||"基础款")+" * "+t._s(e.num))]),a("v-uni-view",{staticClass:"uni-media-list-text-bottom"},[a("v-uni-text",{staticClass:"price"},[t._v(t._s(e.price*e.num))]),a("v-uni-text",[t._v(t._s(t._f("time")(e.created_at)))])],1)],1)],1)],1)})),1)],1)],1)},i=[];a.d(e,"a",(function(){return n})),a.d(e,"b",(function(){return i}))},"10cb":function(t,e,a){"use strict";var n=a("359f"),i=a.n(n);i.a},"31aa":function(t,e,a){"use strict";a.r(e);var n=a("fc8d"),i=a.n(n);for(var r in n)"default"!==r&&function(t){a.d(e,t,(function(){return n[t]}))}(r);e["default"]=i.a},"359f":function(t,e,a){var n=a("502b");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var i=a("4f06").default;i("f058f630",n,!0,{sourceMap:!1,shadowMode:!1})},"43b6":function(t,e,a){"use strict";a.r(e);var n=a("0aaa"),i=a("f39e");for(var r in i)"default"!==r&&function(t){a.d(e,t,(function(){return i[t]}))}(r);a("bdf8");var o=a("2877"),u=Object(o["a"])(i["default"],n["a"],n["b"],!1,null,"c11e8834",null);e["default"]=u.exports},"502b":function(t,e,a){var n=a("24fb");e=n(!1),e.push([t.i,".uni-tag[data-v-7a3c60d4]{box-sizing:border-box;padding:0 %?32?%;height:%?60?%;line-height:calc(%?60?% - 2px);font-size:%?28?%;display:-webkit-inline-box;display:-webkit-inline-flex;display:inline-flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;color:#333;border-radius:%?6?%;background-color:#f8f8f8;border:1px solid #f8f8f8}.uni-tag--circle[data-v-7a3c60d4]{border-radius:%?30?%}.uni-tag--mark[data-v-7a3c60d4]{border-radius:0 %?30?% %?30?% 0}.uni-tag--disabled[data-v-7a3c60d4]{opacity:.5}.uni-tag--small[data-v-7a3c60d4]{height:%?40?%;padding:0 %?16?%;line-height:calc(%?40?% - 2px);font-size:%?24?%}.uni-tag--primary[data-v-7a3c60d4]{color:#fff;background-color:#007aff;border:1px solid #007aff}.uni-tag--primary.uni-tag--inverted[data-v-7a3c60d4]{color:#007aff;background-color:#fff;border:1px solid #007aff}.uni-tag--success[data-v-7a3c60d4]{color:#fff;background-color:#4cd964;border:1px solid #4cd964}.uni-tag--success.uni-tag--inverted[data-v-7a3c60d4]{color:#4cd964;background-color:#fff;border:1px solid #4cd964}.uni-tag--warning[data-v-7a3c60d4]{color:#fff;background-color:#f0ad4e;border:1px solid #f0ad4e}.uni-tag--warning.uni-tag--inverted[data-v-7a3c60d4]{color:#f0ad4e;background-color:#fff;border:1px solid #f0ad4e}.uni-tag--error[data-v-7a3c60d4]{color:#fff;background-color:#dd524d;border:1px solid #dd524d}.uni-tag--error.uni-tag--inverted[data-v-7a3c60d4]{color:#dd524d;background-color:#fff;border:1px solid #dd524d}.uni-tag--inverted[data-v-7a3c60d4]{color:#333;background-color:#fff;border:1px solid #f8f8f8}",""]),t.exports=e},"87db":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.text?a("v-uni-view",{staticClass:"uni-tag",class:[!0===t.disabled||"true"===t.disabled?"uni-tag--disabled":"",!0===t.inverted||"true"===t.inverted?"uni-tag--inverted":"",!0===t.circle||"true"===t.circle?"uni-tag--circle":"",!0===t.mark||"true"===t.mark?"uni-tag--mark":"","uni-tag--"+t.size,"uni-tag--"+t.type],on:{click:function(e){e=t.$handleEvent(e),t.onClick()}}},[t._v(t._s(t.text))]):t._e()},i=[];a.d(e,"a",(function(){return n})),a.d(e,"b",(function(){return i}))},bdf8:function(t,e,a){"use strict";var n=a("cf23"),i=a.n(n);i.a},c482:function(t,e,a){"use strict";var n=a("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,a("96cf");var i=n(a("3b8d")),r=n(a("f97d")),o=n(a("c7c7")),u=n(a("d719")),d=a("802d"),s=n(a("9b83")),c=n(a("5449")),l=n(a("8f09")),f={components:{rfSwipeAction:s.default,rfSwipeActionItem:c.default,rfLoadMore:r.default,uniTag:u.default},data:function(){return{orderItemList:[],errorImg:o.default,page:1,loadingType:"more",token:null,options:[],orderStatus:null}},filters:{time:function(t){return(0,l.default)(1e3*t).format("YYYY-MM-DD HH:mm:ss")},filterIsEvaluate:function(t){var e=["未评价","已评价","已追评"];return e[parseInt(t,10)]},filterProductStatus:function(t){var e=null;if(0!==parseInt(t.refund_status,10)){var a=[{key:1,value:"退款/退货申请"},{key:2,value:"等待退货"},{key:3,value:"等待确认收货"},{key:4,value:"等待确认退款"},{key:5,value:"同意退款"},{key:-1,value:"退款已拒绝"},{key:-2,value:"退款已关闭"},{key:-3,value:"退款不通过"}];a.forEach((function(a){a.key==t.refund_status&&(e=a.value)}))}else if(4===parseInt(t.order_status,10)){var n=[{key:0,value:"未评价"},{key:1,value:"已评价"},{key:2,value:"已追评"}];n.forEach((function(a){a.key==t.is_evaluate&&(e=a.value)}))}else{var i=[{key:0,value:"待付款"},{key:1,value:"待发货"},{key:2,value:"已发货"},{key:3,value:"已收货"},{key:4,value:"已完成"},{key:-1,value:"退货申请"},{key:-2,value:"退款中"},{key:-3,value:"退款完成"},{key:-4,value:"已关闭"},{key:-5,value:"撤销申请"}];i.forEach((function(a){a.key==t.order_status&&(e=a.value)}))}return e}},computed:{itemOptions:function(){return function(t,e){var a=[],n=this.orderStatus;if(1===parseInt(n,10))switch(e){case"0":a.push({text:"仅退款"});break;case"1":a.push({text:"取消",style:{backgroundColor:"rgb(254,156,1)"}});break;default:break}else if(2===parseInt(n,10))switch(e){case"0":a.push({text:"退款/退货"});break;case"1":a.push({text:"取消",style:{backgroundColor:"rgb(254,156,1)"}});break;case"2":a.push({text:"填写退货信息",style:{backgroundColor:"rgb(254,156,1)"}});break;default:break}else if(4===parseInt(n,10)){switch(t){case"0":a.push({text:"评价",style:{backgroundColor:"rgb(254,156,1)"}});break;case"1":a.push({text:"追加评价",style:{backgroundColor:"rgb(255,58,49)"}});break;case 2:break;default:break}switch(e){case"0":a.push({text:"退款/退货"});break;case"-3":a.push({text:"退款/退货"});break;case"1":a.push({text:"取消",style:{backgroundColor:"rgb(254,156,1)"}});break;case"2":a.push({text:"填写退货信息",style:{backgroundColor:"rgb(254,156,1)"}});break;default:break}}return a}}},onLoad:function(t){this.initData(t)},methods:{bindClick:function(t){if("仅退款"===t.content.text){if(0!==parseInt(t.data.refund_status,10))return void this.$api.msg("您已经提交了退款申请");this.goRefund(t.data,1)}else if("退款/退货"===t.content.text){if(0!==parseInt(t.data.refund_status,10))return void this.$api.msg("您已经提交了退货申请");2==t.data.order_status?this.goRefund(t.data,2):4==t.data.order_status&&this.goRefund(t.data,3)}else"取消"===t.content.text?(this.handleCloseOrderRefundApply(t.data.id),2==t.data.order_status?this.goRefund(t.data,2):4==t.data.order_status&&this.goRefund(t.data,3)):"取消"===t.content.text||"取消"===t.content.text?this.handleCloseOrderRefundApply(t.data.order_status,t.data.id):"评价"===t.content.text?this.goEvaluation(t.data):"追加评价"===t.content.text?this.goEvaluation(t.data,"add"):"填写退货信息"===t.content.text&&this.navTo("/pages/order/shipping/return?data=".concat(JSON.stringify(t.data)))},handleCloseOrderRefundApply:function(){var t=(0,i.default)(regeneratorRuntime.mark((function t(e,a){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return n=d.closeOrderRefundApply,4==e&&(n=d.orderCustomerRefundClose),t.next=4,this.$post("".concat(n),{id:a}).then((function(t){uni.navigateBack({delta:1})})).catch((function(t){console.log(t)}));case 4:case"end":return t.stop()}}),t,this)})));function e(e,a){return t.apply(this,arguments)}return e}(),initData:function(){var t=(0,i.default)(regeneratorRuntime.mark((function t(e){var a=this;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return this.token=uni.getStorageSync("accessToken")||void 0,t.next=3,this.$get("".concat(d.orderDetail),{id:e.id}).then((function(t){a.orderItemList=t.data.product,a.orderStatus=t.data.order_status})).catch((function(t){console.log(t)}));case 3:case"end":return t.stop()}}),t,this)})));function e(e){return t.apply(this,arguments)}return e}(),onImageError:function(t){this.orderItemList[t].picture=this.errorImg},goEvaluation:function(t,e){uni.navigateTo({url:"/pages/order/evaluation/evaluation?data=".concat(JSON.stringify(t),"&type=").concat(e)})},navTo:function(t){uni.navigateTo({url:t})},goRefund:function(t,e){uni.navigateTo({url:"/pages/order/refund/refund?data=".concat(JSON.stringify(t),"&refundType=").concat(e)})}}};e.default=f},cf23:function(t,e,a){var n=a("de74");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var i=a("4f06").default;i("7b4aa130",n,!0,{sourceMap:!1,shadowMode:!1})},d719:function(t,e,a){"use strict";a.r(e);var n=a("87db"),i=a("31aa");for(var r in i)"default"!==r&&function(t){a.d(e,t,(function(){return i[t]}))}(r);a("10cb");var o=a("2877"),u=Object(o["a"])(i["default"],n["a"],n["b"],!1,null,"7a3c60d4",null);e["default"]=u.exports},de74:function(t,e,a){var n=a("24fb");e=n(!1),e.push([t.i,'.uni-media-list-logo[data-v-c11e8834]{width:%?240?%;height:%?180?%}.uni-media-list[data-v-c11e8834]{position:relative}.evaluate-tag[data-v-c11e8834]{position:absolute;top:%?20?%;font-size:%?20?%}.uni-media-list-body[data-v-c11e8834]{height:auto;-webkit-justify-content:space-around;justify-content:space-around}.uni-media-list-text-top[data-v-c11e8834]{font-size:%?28?%;overflow:hidden}.uni-media-list-text-second[data-v-c11e8834]{height:%?50?%;font-size:%?24?%}.uni-media-list-text-bottom[data-v-c11e8834]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between}.price[data-v-c11e8834]{font-size:%?28?%;color:#303133}.price[data-v-c11e8834]:before{content:"￥";font-size:%?24?%;margin:0 %?2?% 0 %?8?%}',""]),t.exports=e},f39e:function(t,e,a){"use strict";a.r(e);var n=a("c482"),i=a.n(n);for(var r in n)"default"!==r&&function(t){a.d(e,t,(function(){return n[t]}))}(r);e["default"]=i.a},fc8d:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={name:"UniTag",props:{type:{type:String,default:"default"},size:{type:String,default:"normal"},text:{type:String,default:""},disabled:{type:[String,Boolean],defalut:!1},inverted:{type:[String,Boolean],defalut:!1},circle:{type:[String,Boolean],defalut:!1},mark:{type:[String,Boolean],defalut:!1}},methods:{onClick:function(){!0!==this.disabled&&"true"!==this.disabled&&this.$emit("click")}}};e.default=n}}]);
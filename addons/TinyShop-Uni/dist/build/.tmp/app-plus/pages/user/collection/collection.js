(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["pages/user/collection/collection"],{"09df":function(t,n,e){"use strict";e.r(n);var o=e("71a2"),i=e.n(o);for(var r in o)"default"!==r&&function(t){e.d(n,t,(function(){return o[t]}))}(r);n["default"]=i.a},"2d84":function(t,n,e){},"327a":function(t,n,e){"use strict";var o=function(){var t=this,n=t.$createElement,e=(t._self._c,t.__map(t.collectionList,(function(n,e){var o=t._f("time")(n.created_at);return{$orig:t.__get_orig(n),f0:o}})));t.$mp.data=Object.assign({},{$root:{l0:e}})},i=[];e.d(n,"a",(function(){return o})),e.d(n,"b",(function(){return i}))},"488e":function(t,n,e){"use strict";e.r(n);var o=e("327a"),i=e("09df");for(var r in i)"default"!==r&&function(t){e.d(n,t,(function(){return i[t]}))}(r);e("f6e9");var c=e("2877"),a=Object(c["a"])(i["default"],o["a"],o["b"],!1,null,null,null);n["default"]=a.exports},6905:function(t,n,e){"use strict";(function(t){e("6cdc"),e("921b");o(e("66fd"));var n=o(e("488e"));function o(t){return t&&t.__esModule?t:{default:t}}t(n.default)}).call(this,e("6e42")["createPage"])},"71a2":function(t,n,e){"use strict";(function(t){Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0;var o=u(e("a34a")),i=e("802d"),r=u(e("c7c7")),c=e("2b74"),a=u(e("8f09"));function u(t){return t&&t.__esModule?t:{default:t}}function l(t){return d(t)||f(t)||s()}function s(){throw new TypeError("Invalid attempt to spread non-iterable instance")}function f(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}function d(t){if(Array.isArray(t)){for(var n=0,e=new Array(t.length);n<t.length;n++)e[n]=t[n];return e}}function h(t,n,e,o,i,r,c){try{var a=t[r](c),u=a.value}catch(l){return void e(l)}a.done?n(u):Promise.resolve(u).then(o,i)}function p(t){return function(){var n=this,e=arguments;return new Promise((function(o,i){var r=t.apply(n,e);function c(t){h(r,o,i,c,a,"next",t)}function a(t){h(r,o,i,c,a,"throw",t)}c(void 0)}))}}var g=function(){return e.e("components/rf-load-more/rf-load-more").then(e.bind(null,"f97d"))},m=function(){return e.e("components/rf-swipe-action/rf-swipe-action").then(e.bind(null,"9b83"))},v=function(){return Promise.all([e.e("common/vendor"),e.e("components/rf-swipe-action-item/rf-swipe-action-item")]).then(e.bind(null,"5449"))},b={components:{rfLoadMore:g,rfSwipeAction:m,rfSwipeActionItem:v},data:function(){return{collectionList:[],errorImg:r.default,page:1,loadingType:"more",token:null,options:[{text:"取消收藏",style:{backgroundColor:"#fa436a"}}],loading:!0}},filters:{time:function(t){return(0,a.default)(1e3*t).format("YYYY-MM-DD HH:mm:ss")}},onLoad:function(){this.initData()},onPageScroll:function(t){},onPullDownRefresh:function(){this.page=1,this.collectionList=[],this.loading=!0,this.getCollectionList("refresh")},onReachBottom:function(){this.page++,this.getCollectionList()},methods:{bindClick:function(){var t=p(o.default.mark((function t(n){var e=this;return o.default.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if("取消收藏"!==n.content.text){t.next=3;break}return t.next=3,this.$del("".concat(c.collectDel,"?id=").concat(n.data.id),{page:this.page}).then((function(){e.$api.msg("取消收藏成功"),e.page=1,e.collectionList.length=0,e.getCollectionList()}));case 3:case"end":return t.stop()}}),t,this)})));function n(n){return t.apply(this,arguments)}return n}(),initData:function(){this.token=t.getStorageSync("accessToken")||void 0,this.token&&this.getCollectionList()},getCollectionList:function(){var n=p(o.default.mark((function n(e){var r=this;return o.default.wrap((function(n){while(1)switch(n.prev=n.next){case 0:return n.next=2,this.$get("".concat(i.collectList),{page:this.page}).then((function(n){r.loading=!1,"refresh"===e&&t.stopPullDownRefresh(),r.loadingType=10===n.data.length?"more":"nomore",r.collectionList=[].concat(l(r.collectionList),l(n.data))})).catch((function(){r.loading=!1,"refresh"===e&&t.stopPullDownRefresh()}));case 2:case"end":return n.stop()}}),n,this)})));function e(t){return n.apply(this,arguments)}return e}(),onImageError:function(t){this.collectionList[t].product.picture=this.errorImg},navTo:function(n){t.navigateTo({url:n})}}};n.default=b}).call(this,e("6e42")["default"])},f6e9:function(t,n,e){"use strict";var o=e("2d84"),i=e.n(o);i.a}},[["6905","common/runtime","common/vendor"]]]);
(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["pages/index/index"],{"04a2":function(t,e,n){"use strict";(function(t,a){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var r=u(n("a34a")),c=n("c4c8"),o=n("8492"),i=n("2b74");function u(t){return t&&t.__esModule?t:{default:t}}function s(t,e,n,a,r,c,o){try{var i=t[c](o),u=i.value}catch(s){return void n(s)}i.done?e(u):Promise.resolve(u).then(a,r)}function d(t){return function(){var e=this,n=arguments;return new Promise((function(a,r){var c=t.apply(e,n);function o(t){s(c,a,r,o,i,"next",t)}function i(t){s(c,a,r,o,i,"throw",t)}o(void 0)}))}}var f=function(){return n.e("components/rf-swipe-dot/rf-swipe-dot").then(n.bind(null,"3c94"))},l=function(){return n.e("components/rf-floor-index/rf-floor-index").then(n.bind(null,"a9e7"))},h=function(){return n.e("components/rf-search-bar/rf-search-bar").then(n.bind(null,"9f3a"))},p=function(){return n.e("components/rf-swiper-slide/rf-swiper-slide").then(n.bind(null,"7048"))},g={components:{rfFloorIndex:l,rfSwipeDot:f,rfSearchBar:h,rfSwiperSlide:p},data:function(){return{current:0,headerShow:!0,carouselList:{},hotProductList:[],recommendProductList:[],guessYouLikeProductList:[],newProductList:[],productCateList:[],brandList:[],config:{},index:0,merchantList:[],announceList:[],loading:!0,hotSearchDefault:"请输入关键字"}},onShow:function(){t.getStorageSync("accessToken")&&t.getStorageSync("cartNum")&&(0==t.getStorageSync("cartNum")?t.removeTabBarBadge({index:2}):t.setTabBarBadge({index:2,text:t.getStorageSync("cartNum").toString()})),this.loading=!0,this.initData()},onShareAppMessage:function(){return{title:"欢迎来到RageFrame商城",path:"/pages/index/index"}},onPullDownRefresh:function(){this.getIndexList("refresh")},methods:{bindPickerChange:function(e){t.setStorageSync("merchantId",this.merchantList[e.target.value].id),t.setStorageSync("merchantIndex",e.target.value),this.index=e.target.value,t.removeStorage({key:"userInfo"}),t.removeStorage({key:"accessToken"}),this.getIndexList()},handleDotChange:function(t){this.current=t.detail.current},initData:function(){t.removeStorageSync("cateTop"),this.getIndexList()},navToList:function(e){t.navigateTo({url:"/pages/product/list?cate_id=".concat(e)})},navTo:function(e){t.navigateTo({url:e})},indexTopToDetailPage:function(e,n){var a,r,c;switch(n?(c=n,r=e):(r=e.type,c=e.id),r){case"product_view":a="/pages/product/product?id=".concat(c);break;case"article_view":this.$api.msg("article_view");break;case"coupon_view":a="/pages/user/coupon/detail?id=".concat(c);break;case"helper_view":this.$api.msg("helper_view");break;case"product_list_for_cate":a="/pages/product/list?cate_id=".concat(c);break;default:break}a&&t.navigateTo({url:a})},toProductList:function(e){t.navigateTo({url:"/pages/product/list?params=".concat(JSON.stringify(e))})},getIndexList:function(){var e=d(r.default.mark((function e(n){var o=this;return r.default.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$get("".concat(c.indexList),{}).then(function(){var e=d(r.default.mark((function e(a){return r.default.wrap((function(e){while(1)switch(e.prev=e.next){case 0:o.loading=!1,o.getNotifyAnnounceIndex(),"refresh"===n&&t.stopPullDownRefresh(),o.productCateList=a.data.cate,o.carouselList=a.data.adv,o.search=a.data.search,t.setStorageSync("search",o.search),o.hotSearchDefault="请输入关键字"+(a.data.search.hot_search_default?"如:"+a.data.search.hot_search_default:""),t.setStorage({key:"hotSearchDefault",data:a.data.search.hot_search_default}),o.hotProductList=a.data.product_hot,o.recommendProductList=a.data.product_recommend,o.guessYouLikeProductList=a.data.guess_you_like,o.newProductList=a.data.product_new,o.config=a.data.config;case 14:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}()).catch((function(t){o.loading=!1,console.log(a(t," at pages/index/index.vue:286"))}));case 2:case"end":return e.stop()}}),e,this)})));function n(t){return e.apply(this,arguments)}return n}(),getMerchantIndex:function(){var e=d(r.default.mark((function e(){var n=this;return r.default.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$get("".concat(o.merchantIndex),{}).then((function(e){n.merchantList=e.data,n.index=t.getStorageSync("merchantIndex")||e.data.length-1}));case 2:case"end":return e.stop()}}),e,this)})));function n(){return e.apply(this,arguments)}return n}(),getNotifyAnnounceIndex:function(){var t=d(r.default.mark((function t(){var e=this;return r.default.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,this.$get("".concat(i.notifyAnnounceIndex),{}).then((function(t){e.announceList=t.data}));case 2:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),navToDetailPage:function(e){var n=e.id;n&&t.navigateTo({url:"/pages/product/product?id=".concat(n)})},toSearch:function(){t.navigateTo({url:"/pages/index/search/search?search=".concat(JSON.stringify(this.search))})},toCategory:function(){t.reLaunch({url:"/pages/category/category"})}}};e.default=g}).call(this,n("6e42")["default"],n("0de9")["default"])},"4a53":function(t,e,n){},8069:function(t,e,n){"use strict";n.r(e);var a=n("04a2"),r=n.n(a);for(var c in a)"default"!==c&&function(t){n.d(e,t,(function(){return a[t]}))}(c);e["default"]=r.a},a5cb:function(t,e,n){"use strict";var a=n("4a53"),r=n.n(a);r.a},d537:function(t,e,n){"use strict";(function(t){n("6cdc"),n("921b");a(n("66fd"));var e=a(n("f75a"));function a(t){return t&&t.__esModule?t:{default:t}}t(e.default)}).call(this,n("6e42")["createPage"])},e977:function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=(t._self._c,{title:"新品上市",desc:"New Products Listed"}),a={title:"推荐商品",desc:"Recommend Product"},r={title:"热门商品",desc:"Hot Product"},c={title:"猜你喜欢",desc:"Guess You Like It"};t.$mp.data=Object.assign({},{$root:{a0:n,a1:a,a2:r,a3:c}})},r=[];n.d(e,"a",(function(){return a})),n.d(e,"b",(function(){return r}))},f75a:function(t,e,n){"use strict";n.r(e);var a=n("e977"),r=n("8069");for(var c in r)"default"!==c&&function(t){n.d(e,t,(function(){return r[t]}))}(c);n("a5cb");var o=n("2877"),i=Object(o["a"])(r["default"],a["a"],a["b"],!1,null,"630e20a5",null);e["default"]=i.exports}},[["d537","common/runtime","common/vendor"]]]);
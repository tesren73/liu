(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-index-index"],{"0080":function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i("c5f6");var n={name:"UniSwiperDot",props:{info:{type:Array,default:function(){return[]}},current:{type:Number,default:0},dotsStyles:{type:Object,default:function(){return{}}},mode:{type:String,default:"default"},field:{type:String,default:""}},data:function(){return{dots:{width:8,height:8,bottom:10,color:"#fff",backgroundColor:"rgba(0, 0, 0, .3)",border:"1px rgba(0, 0, 0, .3) solid",selectedBackgroundColor:"#333",selectedBorder:"1px rgba(0, 0, 0, .9) solid"}}},watch:{dotsStyles:function(e){this.dots=Object.assign(this.dots,this.dotsStyles)},mode:function(e){"indexes"===e?(this.dots.width=20,this.dots.height=20):(this.dots.width=8,this.dots.height=8)}},created:function(){"indexes"===this.mode&&(this.dots.width=20,this.dots.height=20),this.dots=Object.assign(this.dots,this.dotsStyles)}};t.default=n},"0b3c":function(e,t,i){"use strict";i.r(t);var n=i("989c"),r=i("ca82");for(var o in r)"default"!==o&&function(e){i.d(t,e,(function(){return r[e]}))}(o);i("548f");var a,s=i("f0c5"),c=Object(s["a"])(r["default"],n["b"],n["c"],!1,null,"6c90c7f8",null,!1,n["a"],a);t["default"]=c.exports},"0e43":function(e,t,i){"use strict";i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return n}));var n={"rf-loading":i("a7c6").default},r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"rf-index"},[i("rf-search-bar",{attrs:{title:"分类",icon:"iconfenlei1",placeholder:e.hotSearchDefault},on:{link:function(t){arguments[0]=t=e.$handleEvent(t),e.toCategory.apply(void 0,arguments)},search:function(t){arguments[0]=t=e.$handleEvent(t),e.navToSearch.apply(void 0,arguments)}}}),i("v-uni-view",{staticClass:"swiper"},[i("v-uni-view",{staticClass:"swiper-box"},[i("rf-swipe-dot",{attrs:{info:e.carouselList.index_top,mode:"nav",current:e.current,field:"title"}},[i("v-uni-swiper",{attrs:{autoplay:"true"},on:{change:function(t){arguments[0]=t=e.$handleEvent(t),e.handleDotChange.apply(void 0,arguments)}}},e._l(e.carouselList.index_top,(function(t,n){return i("v-uni-swiper-item",{key:n,on:{click:function(i){arguments[0]=i=e.$handleEvent(i),e.indexTopToDetailPage(t.jump_type,t.jump_link)}}},[i("v-uni-view",{staticClass:"swiper-item"},[i("v-uni-image",{attrs:{src:t.cover,mode:"aspectFill"}})],1)],1)})),1)],1)],1)],1),i("v-uni-view",{staticClass:"category-list rf-skeleton"},e._l(e.productCateList,(function(t,n){return i("v-uni-view",{key:n,staticClass:"category",on:{click:function(i){i.preventDefault(),arguments[0]=i=e.$handleEvent(i),e.navTo("/pages/product/list?cate_id="+t.id)}}},[i("v-uni-view",{staticClass:"img"},[i("v-uni-image",{attrs:{src:t.cover||e.errorImage,mode:"aspectFill"}})],1),i("v-uni-view",{staticClass:"text"},[e._v(e._s(t.title))])],1)})),1),i("rf-swiper-slide",{staticClass:"rf-skeleton",attrs:{list:e.announceList}},[i("v-uni-view",{staticClass:"swiper-slide-header",attrs:{slot:"header"},slot:"header"},[i("v-uni-image",{staticClass:"swiper-slide-image",attrs:{src:e.newsBg}})],1)],1),i("rf-floor-index",{attrs:{list:e.newProductList,header:{title:"新品上市",desc:"New Products Listed"},banner:e.carouselList.index_new&&e.carouselList.index_new[0]},on:{toBanner:function(t){arguments[0]=t=e.$handleEvent(t),e.indexTopToDetailPage.apply(void 0,arguments)},toList:function(t){arguments[0]=t=e.$handleEvent(t),e.navTo("/pages/product/list?param="+JSON.stringify({is_new:1}))},detail:function(t){arguments[0]=t=e.$handleEvent(t),e.navToDetailPage.apply(void 0,arguments)}}}),i("rf-floor-index",{attrs:{list:e.recommendProductList,header:{title:"推荐商品",desc:"Recommend Product"},banner:e.carouselList.index_recommend&&e.carouselList.index_recommend[0]},on:{toBanner:function(t){arguments[0]=t=e.$handleEvent(t),e.indexTopToDetailPage.apply(void 0,arguments)},toList:function(t){arguments[0]=t=e.$handleEvent(t),e.navTo("/pages/product/list?param="+JSON.stringify({is_recommend:1}))},detail:function(t){arguments[0]=t=e.$handleEvent(t),e.navToDetailPage.apply(void 0,arguments)}}}),i("rf-floor-index",{attrs:{list:e.hotProductList,header:{title:"热门商品",desc:"Hot Product"},banner:e.carouselList.index_hot&&e.carouselList.index_hot[0]},on:{toBanner:function(t){arguments[0]=t=e.$handleEvent(t),e.indexTopToDetailPage.apply(void 0,arguments)},toList:function(t){arguments[0]=t=e.$handleEvent(t),e.navTo("/pages/product/list?param="+JSON.stringify({is_hot:1}))},detail:function(t){arguments[0]=t=e.$handleEvent(t),e.navToDetailPage.apply(void 0,arguments)}}}),i("rf-floor-index",{attrs:{list:e.guessYouLikeProductList,header:{title:"猜你喜欢",desc:"Guess You Like It"},bannerShow:!1},on:{toList:function(t){arguments[0]=t=e.$handleEvent(t),e.navTo("/pages/product/list?params="+JSON.stringify({guessYouLike:1}))},detail:function(t){arguments[0]=t=e.$handleEvent(t),e.navToDetailPage.apply(void 0,arguments)}}}),e.config.web_site_icp?i("v-uni-view",{staticClass:"copyright"},[e._v(e._s(e.config.copyright_desc)),i("a",{attrs:{href:"http://www.beian.miit.gov.cn"}},[e._v(e._s(e.config.web_site_icp))])]):e._e(),e.loading?i("rf-loading"):e._e()],1)},o=[]},"0e84":function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i("c5f6");var n={name:"rfCountDown",props:{showDay:{type:Boolean,default:!0},showColon:{type:Boolean,default:!0},backgroundColor:{type:String,default:"#FFFFFF"},borderColor:{type:String,default:"#000000"},color:{type:String,default:"#000000"},splitorColor:{type:String,default:"#000000"},day:{type:Number,default:0},hour:{type:Number,default:0},minute:{type:Number,default:0},second:{type:Number,default:0}},data:function(){return{timer:null,d:"00",h:"00",i:"00",s:"00",leftTime:0,seconds:0}},created:function(e){var t=this;this.seconds=this.toSeconds(this.day,this.hour,this.minute,this.second),this.countDown(),this.timer=setInterval((function(){t.seconds--,t.seconds<0?t.timeUp():t.countDown()}),1e3)},beforeDestroy:function(){clearInterval(this.timer)},methods:{toSeconds:function(e,t,i,n){return 60*e*60*24+60*t*60+60*i+n},timeUp:function(){clearInterval(this.timer),this.$emit("timeup")},countDown:function(){var e=this.seconds,t=0,i=0,n=0,r=0;e>0?(t=Math.floor(e/86400),i=Math.floor(e/3600)-24*t,n=Math.floor(e/60)-24*t*60-60*i,r=Math.floor(e)-24*t*60*60-60*i*60-60*n):this.timeUp(),t<10&&(t="0"+t),i<10&&(i="0"+i),n<10&&(n="0"+n),r<10&&(r="0"+r),this.d=t,this.h=i,this.i=n,this.s=r}}};t.default=n},"0f71":function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,".uni-countdown[data-v-c794120e]{padding:%?2?% 0;display:-webkit-inline-box;display:-webkit-inline-flex;display:inline-flex;-webkit-flex-wrap:nowrap;flex-wrap:nowrap;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.uni-countdown__splitor[data-v-c794120e]{-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;line-height:%?44?%;padding:0 %?5?%;font-size:%?28?%}.uni-countdown__number[data-v-c794120e]{line-height:%?44?%;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;height:%?44?%;border-radius:%?6?%;margin:0 %?5?%;font-size:%?28?%;border:1px solid #000;font-size:%?24?%;padding:0 %?10?%}",""]),e.exports=t},"18aa":function(e,t,i){"use strict";i.r(t);var n=i("bfdd"),r=i("3b59");for(var o in r)"default"!==o&&function(e){i.d(t,e,(function(){return r[e]}))}(o);i("d30f");var a,s=i("f0c5"),c=Object(s["a"])(r["default"],n["b"],n["c"],!1,null,"c794120e",null,!1,n["a"],a);t["default"]=c.exports},"268a":function(e,t,i){"use strict";i.r(t);var n=i("2daf"),r=i.n(n);for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);t["default"]=r.a},"2daf":function(e,t,i){"use strict";var n=i("4ea4");Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i("96cf");var r=n(i("3b8d")),o={props:{headerShow:{type:Boolean,default:!0},inputDisabled:{type:Boolean,default:!1},placeholder:{type:String,default:"请输入关键字"},icon:{type:String,default:null},title:{type:String,default:null}},data:function(){return{afterHeaderOpacity:1,headerPosition:"fixed",headerTop:null,statusTop:null,nVueTitle:null,searchValue:this.placeholder}},methods:{handleSearchValueChange:function(e){this.searchValue=e.detail.value},discard:function(){},link:function(){this.$emit("link")},toSearch:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$emit("search",{searchValue:this.searchValue});case 2:case"end":return e.stop()}}),e,this)})));function t(){return e.apply(this,arguments)}return t}()}};t.default=o},"3b59":function(e,t,i){"use strict";i.r(t);var n=i("0e84"),r=i.n(n);for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);t["default"]=r.a},"3d26":function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,".uni-swiper__warp[data-v-6c90c7f8]{position:relative;width:100%;box-sizing:border-box;overflow:hidden}.uni-swiper__dots-box[data-v-6c90c7f8]{position:absolute;bottom:%?20?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center;box-sizing:box-sizing;width:100%}.uni-swiper__dots-item[data-v-6c90c7f8]{-webkit-flex-shrink:0;flex-shrink:0;width:%?16?%;border-radius:50%;margin-left:%?12?%;background:rgba(0,0,0,.3);-webkit-transition:all .2s linear;transition:all .2s linear}.uni-swiper__dots-item[data-v-6c90c7f8]:first-child{margin:0}.uni-swiper__dots-default[data-v-6c90c7f8]{border-radius:50%}.uni-swiper__dots-long[data-v-6c90c7f8]{border-radius:%?100?%}.uni-swiper__dots-bar[data-v-6c90c7f8]{border-radius:%?100?%}.uni-swiper__dots-nav[data-v-6c90c7f8]{bottom:0;height:%?60?%;-webkit-box-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start;background:rgba(0,0,0,.2);box-sizing:box-sizing;overflow:hidden;z-index:10}.uni-swiper__dots-nav-item[data-v-6c90c7f8]{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:%?28?%;color:#fff;box-sizing:box-sizing;margin:0 %?30?%}.uni-swiper__dots-indexes[data-v-6c90c7f8]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center;color:#fff;font-size:%?24?%}",""]),e.exports=t},"4cfb":function(e,t,i){"use strict";var n=i("4ea4");Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i("386d"),i("6b54"),i("96cf");var r=n(i("3b8d")),o=i("c4c8"),a=n(i("0b3c")),s=n(i("854c")),c=n(i("b9cb")),d=n(i("6522")),l=i("2b74"),u=n(i("18aa")),f={components:{rfFloorIndex:s.default,rfSwipeDot:a.default,rfSearchBar:c.default,rfSwiperSlide:d.default,rfCountDown:u.default},data:function(){return{current:0,carouselList:{},hotProductList:[],recommendProductList:[],guessYouLikeProductList:[],newProductList:[],productCateList:[],config:{},announceList:[],loading:!0,hotSearchDefault:"请输入关键字",newsBg:this.$mAssetsPath.newsBg,errorImage:this.$mAssetsPath.errorImage}},onShow:function(){this.initData()},computed:{second:function(){return function(e){return Math.floor(900-(new Date/1e3-e))}}},onShareAppMessage:function(){return{title:"欢迎来到RageFrame商城",path:"/pages/index/index"}},filters:{filterDiscountPrice:function(e){var t=e.product&&e.product.price*e.discount/100;switch(e.decimal_reservation_number){case 0:return(Math.floor(100*t)/100).toFixed(2);case 1:return(Math.floor(100*t)/100).toFixed(0);case 2:return(Math.floor(100*t)/100).toFixed(1);default:return(Math.floor(100*t)/100).toFixed(2)}}},onPullDownRefresh:function(){this.getIndexList("refresh")},methods:{handleDotChange:function(e){this.current=e.detail.current},initData:function(){this.getIndexList(),this.initCartItemCount()},initCartItemCount:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:if(!(this.$mStore.getters.hasLogin&&parseInt(uni.getStorageSync("cartNum"),10)>0)){e.next=5;break}return e.next=3,uni.setTabBarBadge({index:this.$mConstDataConfig.cartIndex,text:uni.getStorageSync("cartNum").toString()});case 3:e.next=7;break;case 5:uni.removeStorageSync("cartNum"),uni.removeTabBarBadge({index:this.$mConstDataConfig.cartIndex});case 7:case"end":return e.stop()}}),e,this)})));function t(){return e.apply(this,arguments)}return t}(),navTo:function(e){this.$mRouter.push({route:e})},navToSearch:function(){this.$mRouter.push({route:"/pages/index/search/search?data=".concat(JSON.stringify(this.search))})},indexTopToDetailPage:function(e,t){var i,n,r;switch(isNaN(parseInt(e.id,10)),t?(r=t,n=e):(n=e.type,r=e.id),n){case"product_view":i="/pages/product/product?id=".concat(r);break;case"article_view":this.$mHelper.toast("article_view");break;case"coupon_view":i="/pages/user/coupon/detail?id=".concat(r);break;case"helper_view":this.$mHelper.toast("helper_view");break;case"product_list_for_cate":i="/pages/product/list?cate_id=".concat(r);break;default:break}i&&this.$mRouter.push({route:i})},getIndexList:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(t){var i=this;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$http.get("".concat(o.indexList),{}).then(function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(n){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return i.loading=!1,"refresh"===t&&uni.stopPullDownRefresh(),e.next=4,i.getNotifyAnnounceIndex();case 4:i.initIndexData(n.data);case 5:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}()).catch((function(){i.loading=!1,"refresh"===t&&uni.stopPullDownRefresh()}));case 2:case"end":return e.stop()}}),e,this)})));function t(t){return e.apply(this,arguments)}return t}(),initIndexData:function(e){this.productCateList=e.cate,this.carouselList=e.adv,this.search=e.search,uni.setStorageSync("search",this.search),this.hotSearchDefault="请输入关键字"+(e.search.hot_search_default?"如: ".concat(e.search.hot_search_default):""),uni.setStorage({key:"hotSearchDefault",data:e.search.hot_search_default}),this.hotProductList=e.product_hot,this.recommendProductList=e.product_recommend,this.guessYouLikeProductList=e.guess_you_like,this.newProductList=e.product_new,this.config=e.config},getNotifyAnnounceIndex:function(){var e=(0,r.default)(regeneratorRuntime.mark((function e(){var t=this;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$http.get("".concat(l.notifyAnnounceIndex)).then((function(e){t.announceList=e.data}));case 2:case"end":return e.stop()}}),e,this)})));function t(){return e.apply(this,arguments)}return t}(),navToDetailPage:function(e){var t=e.id;t&&this.$mRouter.push({route:"/pages/product/product?id=".concat(t)})},toCategory:function(){this.$mRouter.switchTab({route:"/pages/category/category"})}}};t.default=f},5228:function(e,t,i){var n=i("54fc");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("305b6591",n,!0,{sourceMap:!1,shadowMode:!1})},"548f":function(e,t,i){"use strict";var n=i("f429"),r=i.n(n);r.a},"54fc":function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,".rf-floor-index .banner[data-v-464e96f4]{width:92%;margin:%?20?% 4% 0}.rf-floor-index .banner uni-image[data-v-464e96f4]{width:100%;height:25vw;border-radius:%?20?%;box-shadow:%?0?% %?5?% %?25?% rgba(0,0,0,.05)}.rf-floor-index .f-header[data-v-464e96f4]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;height:%?120?%;padding:%?6?% %?20?%;margin:0 0 %?20?%;background:#fff;border-bottom:%?1?% solid rgba(0,0,0,.05)}.rf-floor-index .f-header .iconfont[data-v-464e96f4]{color:#fa436a;font-size:%?62?%;margin-right:%?20?%}.rf-floor-index .f-header .tit-box[data-v-464e96f4]{-webkit-box-flex:1;-webkit-flex:1;flex:1;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column}.rf-floor-index .f-header .tit[data-v-464e96f4]{font-size:%?34?%;color:#font-color-dark;line-height:1.3}.rf-floor-index .f-header .tit2[data-v-464e96f4]{font-size:%?24?%;color:#909399}.rf-floor-index .f-header .iconyou[data-v-464e96f4]{font-size:%?36?%;color:#909399}",""]),e.exports=t},5956:function(e,t,i){var n=i("97c7");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("9986f70e",n,!0,{sourceMap:!1,shadowMode:!1})},"5a9b":function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n={name:"rfFloorIndex",props:{list:{type:Array,default:function(){return[]}},banner:{type:Object,default:function(){return{}}},header:{type:Object,default:function(){return{}}},bannerShow:{type:Boolean,default:!0}},data:function(){return{}},methods:{detail:function(e){e&&this.$emit("detail",{id:e})},toBanner:function(e,t){this.$emit("toBanner",{type:e,id:t})},toList:function(){this.$emit("toList")}}};t.default=n},6522:function(e,t,i){"use strict";i.r(t);var n=i("d1b9"),r=i("d27a");for(var o in r)"default"!==o&&function(e){i.d(t,e,(function(){return r[e]}))}(o);i("9053");var a,s=i("f0c5"),c=Object(s["a"])(r["default"],n["b"],n["c"],!1,null,"fe034e48",null,!1,n["a"],a);t["default"]=c.exports},"753b":function(e,t,i){"use strict";var n;i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return n}));var r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"rf-search-bar"},[e.headerShow?i("v-uni-view",{staticClass:"status",style:{position:e.headerPosition,top:e.statusTop,opacity:e.afterHeaderOpacity}}):e._e(),e.headerShow?i("v-uni-view",{staticClass:"header",style:{position:e.headerPosition,top:e.headerTop,opacity:e.afterHeaderOpacity}},[i("v-uni-view",{staticClass:"addr",on:{click:function(t){t.stopPropagation(),arguments[0]=t=e.$handleEvent(t),e.link.apply(void 0,arguments)}}},[i("i",{staticClass:"iconfont",class:e.icon}),e._v(e._s(e.title))]),e.inputDisabled?i("v-uni-view",{staticClass:"input-box",on:{click:function(t){t.stopPropagation(),arguments[0]=t=e.$handleEvent(t),e.discard.apply(void 0,arguments)}}},[i("v-uni-input",{staticStyle:{color:"#888"},attrs:{value:e.placeholder,placeholder:e.placeholder?"":"请输入关键字","placeholder-style":"color:#ccc;"},on:{confirm:function(t){arguments[0]=t=e.$handleEvent(t),e.toSearch.apply(void 0,arguments)},input:function(t){arguments[0]=t=e.$handleEvent(t),e.handleSearchValueChange.apply(void 0,arguments)}}}),i("v-uni-view",{staticClass:"icon search",on:{click:function(t){t.stopPropagation(),arguments[0]=t=e.$handleEvent(t),e.toSearch.apply(void 0,arguments)}}})],1):i("v-uni-view",{staticClass:"input-box"},[i("v-uni-input",{attrs:{disabled:!0,value:e.placeholder,"placeholder-style":"color:#ccc;"},on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.toSearch.apply(void 0,arguments)}}}),i("v-uni-view",{staticClass:"icon search"})],1)],1):e._e(),e.headerShow?i("v-uni-view",{staticClass:"place"}):e._e()],1)},o=[]},7584:function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,".rf-search-bar[data-v-91cf924c]{background-color:#fff}.rf-search-bar .status[data-v-91cf924c]{width:100%;height:0;position:fixed;z-index:10;background-color:#fff;top:0}.rf-search-bar .header[data-v-91cf924c]{width:100%;height:%?100?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;position:fixed;top:0;z-index:10;background-color:#fff}.rf-search-bar .header .addr[data-v-91cf924c]{width:%?120?%;height:%?60?%;-webkit-flex-shrink:0;flex-shrink:0;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;font-size:%?28?%}.rf-search-bar .header .addr .iconfont[data-v-91cf924c]{height:%?60?%;margin-right:%?6?%;margin-left:%?15?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;font-size:%?35?%;color:#fa436a}.rf-search-bar .header .input-box[data-v-91cf924c]{width:100%;height:%?60?%;background-color:#f5f5f5;border-radius:%?30?%;position:relative;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;margin:0 %?20?% 0 %?10?%}.rf-search-bar .header .input-box .icon[data-v-91cf924c]{z-index:9;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;position:absolute;top:0;right:0;width:%?60?%;height:%?60?%;font-size:%?34?%;color:silver}.rf-search-bar .header .input-box uni-input[data-v-91cf924c]{width:100%;padding-left:%?28?%;height:%?28?%;color:#888;font-size:%?28?%}.rf-search-bar .place[data-v-91cf924c]{background-color:#fff;height:%?100?%}",""]),e.exports=t},7823:function(e,t,i){"use strict";var n;i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return n}));var r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"rf-floor-index"},[e.bannerShow?i("v-uni-view",{staticClass:"banner",on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.toBanner(e.banner.jump_type,e.banner.jump_link)}}},[i("v-uni-image",{attrs:{src:e.banner.cover,mode:"aspectFill"}})],1):e._e(),i("v-uni-view",{staticClass:"f-header",on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.toList.apply(void 0,arguments)}}},[i("i",{staticClass:"iconfont icontuijian"}),i("v-uni-view",{staticClass:"tit-box"},[i("v-uni-text",{staticClass:"tit"},[e._v(e._s(e.header.title))]),i("v-uni-text",{staticClass:"tit2"},[e._v(e._s(e.header.desc))])],1),i("i",{staticClass:"iconfont iconyou"})],1),i("v-uni-view",{staticClass:"rf-product-list"},e._l(e.list.length>0?e.list:[0,0],(function(t,n){return i("v-uni-view",{key:n,staticClass:"product-item",on:{click:function(i){i.stopPropagation(),arguments[0]=i=e.$handleEvent(i),e.detail(0===t?"":t.id)}}},[i("v-uni-view",{staticClass:"image-wrapper"},[i("v-uni-image",{attrs:{src:t.picture,mode:"aspectFill"}}),i("v-uni-text",{staticClass:"sketch in1line"},[e._v(e._s(t.sketch))])],1),t.name?i("v-uni-text",{staticClass:"title clamp in2line"},[e._v(e._s(t.name))]):e._e(),t.name?i("v-uni-view",{staticClass:"last-line"},[i("v-uni-text",{staticClass:"price in1line"},[e._v(e._s(t.price)),t.market_price>t.price?i("v-uni-text",{staticClass:"m-price"},[e._v("¥ "+e._s(t.market_price))]):e._e()],1),i("v-uni-text",{staticClass:"sales in1line"},[i("v-uni-text",{staticClass:"red"},[e._v(e._s(t.sales))]),e._v("付款")],1)],1):e._e()],1)})),1)],1)},o=[]},"7bc3":function(e,t,i){var n=i("f234");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("683a8d00",n,!0,{sourceMap:!1,shadowMode:!1})},8069:function(e,t,i){"use strict";i.r(t);var n=i("4cfb"),r=i.n(n);for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);t["default"]=r.a},"854c":function(e,t,i){"use strict";i.r(t);var n=i("7823"),r=i("f5c5");for(var o in r)"default"!==o&&function(e){i.d(t,e,(function(){return r[e]}))}(o);i("9ff8");var a,s=i("f0c5"),c=Object(s["a"])(r["default"],n["b"],n["c"],!1,null,"464e96f4",null,!1,n["a"],a);t["default"]=c.exports},9053:function(e,t,i){"use strict";var n=i("5956"),r=i.n(n);r.a},"97c7":function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,".rf-swiper-slide[data-v-fe034e48]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center;height:%?80?%;padding:0 %?30?%;border-bottom:solid %?2?% #f6f6f6}.rf-swiper-slide .rf-swiper[data-v-fe034e48]{height:100%;-webkit-box-flex:1;-webkit-flex:1;flex:1;margin-left:%?30?%}.rf-swiper-slide .rf-swiper .rf-swiper-item[data-v-fe034e48]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between}.rf-swiper-slide .rf-swiper .rf-swiper-item .text[data-v-fe034e48],.rf-swiper-slide .rf-swiper .rf-swiper-item .iconfont[data-v-fe034e48]{height:%?80?%;line-height:%?80?%}.rf-swiper-slide .rf-swiper .rf-swiper-item .iconfont[data-v-fe034e48]{color:#909399}",""]),e.exports=t},"989c":function(e,t,i){"use strict";var n;i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return n}));var r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"uni-swiper__warp"},[e._t("default"),"default"===e.mode?i("v-uni-view",{staticClass:"uni-swiper__dots-box",style:{bottom:e.dots.bottom+"px"}},e._l(e.info,(function(t,n){return i("v-uni-view",{key:n,staticClass:"uni-swiper__dots-item uni-swiper__dots-bar",style:{width:(n===e.current?2*e.dots.width:e.dots.width)+"px",height:e.dots.width/3+"px","background-color":n!==e.current?e.dots.backgroundColor:e.dots.selectedBackgroundColor,"border-radius":"0px"}})})),1):e._e(),"dot"===e.mode?i("v-uni-view",{staticClass:"uni-swiper__dots-box",style:{bottom:e.dots.bottom+"px"}},e._l(e.info,(function(t,n){return i("v-uni-view",{key:n,staticClass:"uni-swiper__dots-item",style:{width:e.dots.width+"px",height:e.dots.height+"px","background-color":n!==e.current?e.dots.backgroundColor:e.dots.selectedBackgroundColor,border:n!==e.current?e.dots.border:e.dots.selectedBorder}})})),1):e._e(),"round"===e.mode?i("v-uni-view",{staticClass:"uni-swiper__dots-box",style:{bottom:e.dots.bottom+"px"}},e._l(e.info,(function(t,n){return i("v-uni-view",{key:n,staticClass:"uni-swiper__dots-item ",class:[n===e.current&&"uni-swiper__dots-long"],style:{width:(n===e.current?3*e.dots.width:e.dots.width)+"px",height:e.dots.height+"px","background-color":n!==e.current?e.dots.backgroundColor:e.dots.selectedBackgroundColor,border:n!==e.current?e.dots.border:e.dots.selectedBorder}})})),1):e._e(),"nav"===e.mode?i("v-uni-view",{staticClass:"uni-swiper__dots-box uni-swiper__dots-nav",style:{"background-color":e.dotsStyles.backgroundColor}},[i("v-uni-view",{staticClass:"uni-swiper__dots-nav-item",style:{color:e.dotsStyles.color}},[e._v(e._s(e.current+1+"/"+e.info.length)+"\n\t\t\t\t"+e._s(e.info[e.current]&&e.info[e.current][e.field]))])],1):e._e(),"indexes"===e.mode?i("v-uni-view",{staticClass:"uni-swiper__dots-box",style:{bottom:e.dots.bottom+"px"}},e._l(e.info,(function(t,n){return i("v-uni-view",{key:n,staticClass:"uni-swiper__dots-item uni-swiper__dots-indexes",style:{width:e.dots.width+"px",height:e.dots.height+"px",color:n===e.current?e.dots.selectedColor:e.dots.color,"background-color":n!==e.current?e.dots.backgroundColor:e.dots.selectedBackgroundColor,border:n!==e.current?e.dots.border:e.dots.selectedBorder}},[e._v(e._s(n+1))])})),1):e._e()],2)},o=[]},"9cf3":function(e,t,i){var n=i("7584");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("332db882",n,!0,{sourceMap:!1,shadowMode:!1})},"9ff8":function(e,t,i){"use strict";var n=i("5228"),r=i.n(n);r.a},b9cb:function(e,t,i){"use strict";i.r(t);var n=i("753b"),r=i("268a");for(var o in r)"default"!==o&&function(e){i.d(t,e,(function(){return r[e]}))}(o);i("e709");var a,s=i("f0c5"),c=Object(s["a"])(r["default"],n["b"],n["c"],!1,null,"91cf924c",null,!1,n["a"],a);t["default"]=c.exports},bfdd:function(e,t,i){"use strict";var n;i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return n}));var r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"uni-countdown"},[e.showDay?i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:e.borderColor,color:e.color,background:e.backgroundColor}},[e._v(e._s(e.d))]):e._e(),e.showDay?i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:e.splitorColor}},[e._v("天")]):e._e(),i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:e.borderColor,color:e.color,background:e.backgroundColor}},[e._v(e._s(e.h))]),i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:e.splitorColor}},[e._v(e._s(e.showColon?":":"时"))]),i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:e.borderColor,color:e.color,background:e.backgroundColor}},[e._v(e._s(e.i))]),i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:e.splitorColor}},[e._v(e._s(e.showColon?":":"分"))]),i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:e.borderColor,color:e.color,background:e.backgroundColor}},[e._v(e._s(e.s))]),e.showColon?e._e():i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:e.splitorColor}},[e._v("秒")])],1)},o=[]},c152:function(e,t,i){var n=i("0f71");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("629afbd1",n,!0,{sourceMap:!1,shadowMode:!1})},c958:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n={name:"rf-swiper-slide",data:function(){return{indicatorDots:!1,autoplay:!0,interval:2e3,duration:500}},props:{list:{type:Array,default:function(){return[]}}},methods:{navTo:function(e){uni.navigateTo({url:e})}}};t.default=n},ca82:function(e,t,i){"use strict";i.r(t);var n=i("0080"),r=i.n(n);for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);t["default"]=r.a},d1b9:function(e,t,i){"use strict";var n;i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return n}));var r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"rf-swiper-slide"},[e.list.length>0?e._t("header"):e._e(),i("v-uni-swiper",{staticClass:"rf-swiper",attrs:{"indicator-dots":e.indicatorDots,autoplay:e.autoplay,interval:e.interval,duration:e.duration,vertical:"true"}},e._l(e.list,(function(t,n){return i("v-uni-swiper-item",{key:n,staticClass:"rf-swiper-item",on:{click:function(t){t.stopPropagation(),arguments[0]=t=e.$handleEvent(t),e.navTo("/pages/index/notice/notice")}}},[i("v-uni-view",{staticClass:"text in1line"},[i("v-uni-text",{staticClass:"newsTitle"},[e._v(e._s(t.title||t.member_nickname+" 拼团成功"))])],1),i("v-uni-text",{staticClass:"iconfont iconyou"})],1)})),1)],2)},o=[]},d27a:function(e,t,i){"use strict";i.r(t);var n=i("c958"),r=i.n(n);for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);t["default"]=r.a},d30f:function(e,t,i){"use strict";var n=i("c152"),r=i.n(n);r.a},d3b6:function(e,t,i){"use strict";var n=i("7bc3"),r=i.n(n);r.a},e709:function(e,t,i){"use strict";var n=i("9cf3"),r=i.n(n);r.a},f234:function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,'.rf-index[data-v-6351c59e]{background-color:#fff}.rf-index .wrapper[data-v-6351c59e]{background:#fff;border-radius:%?10?%}.rf-index .wrapper .sec-header[data-v-6351c59e]{padding:%?10?% 0;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center;line-height:%?40?%;margin:0 %?30?%;font-size:%?32?%;font-weight:600;border-bottom:%?1?% solid rgba(0,0,0,.05)}.rf-index .wrapper .sec-header .more[data-v-6351c59e]{font-size:%?24?%;color:#909399;font-weight:400}.rf-index .wrapper .h-list[data-v-6351c59e]{white-space:nowrap;margin:%?20?% 0;height:%?290?%}.rf-index .wrapper .h-list .h-item[data-v-6351c59e]{display:inline-block;font-size:%?24?%;width:%?220?%;height:%?180?%;margin-right:%?20?%;border-radius:%?10?%}.rf-index .wrapper .h-list .h-item .h-item-img[data-v-6351c59e]{width:100%;height:100%;border-top-left-radius:%?12?%;border-top-right-radius:%?12?%}.rf-index .wrapper .h-list .h-item .h-item-text[data-v-6351c59e]{margin:%?10?% 0 %?5?%}.rf-index .wrapper .h-list .h-item .last-line[data-v-6351c59e]{margin-bottom:%?5?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.rf-index .wrapper .h-list .h-item .last-line .red[data-v-6351c59e]{color:#fa436a;font-size:%?24?%;margin-right:%?4?%}.rf-index .wrapper .h-list .h-item .price[data-v-6351c59e]{font-size:%?28?%;color:#fa436a;line-height:1}.rf-index .wrapper .h-list .h-item .price[data-v-6351c59e]:before{content:"￥";font-size:%?26?%}.rf-index .wrapper .h-list .h-item .price .m-price[data-v-6351c59e]{margin-left:%?8?%;color:#909399;font-size:%?24?%;text-decoration:line-through}.rf-index .wrapper-pt[data-v-6351c59e]{padding:0 %?30?%}.rf-index .wrapper-pt .sec-header[data-v-6351c59e]{margin:0}.rf-index .swiper[data-v-6351c59e]{width:100%;margin-top:%?10?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.rf-index .swiper .swiper-box[data-v-6351c59e]{width:92%;height:40vw;overflow:hidden;border-radius:%?15?%;box-shadow:%?0?% %?8?% %?25?% rgba(0,0,0,.2);position:relative;z-index:1}.rf-index .swiper .swiper-box uni-swiper[data-v-6351c59e]{width:100%;height:40vw}.rf-index .swiper .swiper-box uni-swiper uni-swiper-item uni-image[data-v-6351c59e]{width:100%;height:40vw}.rf-index .swiper-item-text[data-v-6351c59e]{position:absolute;bottom:%?16?%;left:%?30?%;height:%?48?%;line-height:%?48?%;background:rgba(0,0,0,.2);width:90%;color:#fff;border-bottom-left-radius:%?12?%;padding-left:%?20?%}.rf-index .swiper-slide-header[data-v-6351c59e]{width:%?120?%;height:%?80?%;line-height:%?88?%}.rf-index .swiper-slide-header .swiper-slide-image[data-v-6351c59e]{width:100%;height:%?30?%}.rf-index .category-list[data-v-6351c59e]{width:100%;padding:%?20?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-flex-wrap:wrap;flex-wrap:wrap;min-height:%?80?%}.rf-index .category-list .category[data-v-6351c59e]{width:calc(20% - %?20?%);display:-webkit-box;display:-webkit-flex;display:flex;-webkit-flex-wrap:wrap;flex-wrap:wrap}.rf-index .category-list .category .img[data-v-6351c59e]{width:100%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.rf-index .category-list .category .img uni-image[data-v-6351c59e]{width:9vw;height:9vw}.rf-index .category-list .category .text[data-v-6351c59e]{margin-top:%?16?%;width:100%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;font-size:%?24?%;color:#3c3c3c}.rf-index .copyright[data-v-6351c59e]{margin:%?10?% 0;width:100%;text-align:center;color:#666}.rf-index .copyright a[data-v-6351c59e]{display:block;color:#666;text-decoration:none}.rf-index .order-item[data-v-6351c59e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column;background:#fff;padding:0 %?30?%;margin-bottom:%?20?%}.rf-index .order-item .goods-box-single[data-v-6351c59e]{display:-webkit-box;display:-webkit-flex;display:flex;padding:%?40?% %?10?% %?10?%;height:%?330?%;border-radius:%?12?%;margin-top:%?20?%;box-shadow:2px 2px 10px rgba(66,135,193,.2);border-bottom:1px solid rgba(0,0,0,.05);position:relative}.rf-index .order-item .goods-box-single .goods-img[data-v-6351c59e]{display:block;border-radius:%?12?%;width:%?190?%;height:%?200?%}.rf-index .order-item .goods-box-single .right[data-v-6351c59e]{-webkit-box-flex:1;-webkit-flex:1;flex:1;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column;padding:0 %?30?% 0 %?24?%;overflow:hidden}.rf-index .order-item .goods-box-single .right .title[data-v-6351c59e]{font-weight:700;line-height:1.2;margin:%?10?% 0}.rf-index .order-item .goods-box-single .right .attr-box[data-v-6351c59e]{line-height:1.2;margin-bottom:%?8?%;margin-left:%?10?%}.rf-index .order-item .goods-box-single .right .last-line[data-v-6351c59e]{margin-top:%?3?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.rf-index .order-item .goods-box-single .right .last-line .red[data-v-6351c59e]{color:#fa436a;margin-right:%?4?%}.rf-index .order-item .goods-box-single .right .price[data-v-6351c59e]{font-size:%?32?%;color:#dd524d;line-height:1}.rf-index .order-item .goods-box-single .right .price[data-v-6351c59e]:before{content:"￥";font-size:%?26?%}.rf-index .order-item .goods-box-single .right .price .m-price[data-v-6351c59e]{margin-left:%?8?%;color:#909399;font-size:%?24?%;text-decoration:line-through}.rf-index .order-item .goods-box-single .right .triangle-wrapper[data-v-6351c59e]{position:absolute;overflow:hidden;top:0;right:0;border-radius:%?12?%}.rf-index .order-item .goods-box-single .right .triangle-wrapper .triangle[data-v-6351c59e]{color:#5eba8f;width:0;height:0;border-top:%?120?% solid #fa436a;opacity:.8;border-left:%?120?% solid transparent}.rf-index .order-item .goods-box-single .right .triangle-wrapper .triangle-content[data-v-6351c59e]{position:absolute;top:%?28?%;right:0;-webkit-transform:rotate(45deg);transform:rotate(45deg);font-size:%?22?%;color:#fff}.rf-index .order-item .action-box[data-v-6351c59e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end;-webkit-box-align:center;-webkit-align-items:center;align-items:center;height:%?90?%;position:relative}.rf-index .order-item .action-box .discount-time[data-v-6351c59e]{font-size:%?24?%;color:#4cd964;margin-right:%?20?%}.rf-index .order-item .action-btn[data-v-6351c59e]{height:%?50?%;margin-left:%?10?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center;padding:%?10?% %?24?%;font-size:%?26?%}.rf-index .order-item .action-btn.recom[data-v-6351c59e]{background:#fa436a;color:#fff}.rf-index .order-item .action-btn.recom[data-v-6351c59e]:after{border-color:#f7bcc8}',""]),e.exports=t},f429:function(e,t,i){var n=i("3d26");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("6b4a5794",n,!0,{sourceMap:!1,shadowMode:!1})},f5c5:function(e,t,i){"use strict";i.r(t);var n=i("5a9b"),r=i.n(n);for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);t["default"]=r.a},f75a:function(e,t,i){"use strict";i.r(t);var n=i("0e43"),r=i("8069");for(var o in r)"default"!==o&&function(e){i.d(t,e,(function(){return r[e]}))}(o);i("d3b6");var a,s=i("f0c5"),c=Object(s["a"])(r["default"],n["b"],n["c"],!1,null,"6351c59e",null,!1,n["a"],a);t["default"]=c.exports}}]);
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-set-about-about"],{"0938":function(t,e,i){"use strict";i.r(e);var n=i("dc98"),a=i("8f1f");for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);i("3980");var r=i("2877"),c=Object(r["a"])(a["default"],n["a"],n["b"],!1,null,"7959cb41",null);e["default"]=c.exports},"0b62":function(t,e,i){"use strict";i.r(e);var n=i("d389"),a=i.n(n);for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);e["default"]=a.a},"1c50":function(t,e,i){"use strict";var n=i("7586"),a=i.n(n);a.a},"20ae":function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("c5f6");var n={name:"UniBadge",props:{type:{type:String,default:"default"},inverted:{type:Boolean,default:!1},text:{type:[String,Number],default:""},size:{type:String,default:"normal"}},data:function(){return{badgeStyle:""}},watch:{text:function(){this.setStyle()}},mounted:function(){this.setStyle()},methods:{setStyle:function(){this.badgeStyle="width: ".concat(8*String(this.text).length+12,"px")},onClick:function(){this.$emit("click")}}};e.default=n},3970:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={name:"UniList"};e.default=n},3980:function(t,e,i){"use strict";var n=i("94b6"),a=i.n(n);a.a},"4c2b":function(t,e,i){"use strict";i.r(e);var n=i("594c"),a=i("0b62");for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);i("1c50");var r=i("2877"),c=Object(r["a"])(a["default"],n["a"],n["b"],!1,null,"b8ec9074",null);e["default"]=c.exports},"594c":function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"uni-list-item",class:t.disabled?"uni-list-item--disabled":"",attrs:{"hover-class":t.disabled||t.showSwitch?"":"uni-list-item--hover"},on:{click:function(e){e=t.$handleEvent(e),t.onClick(e)}}},[i("v-uni-view",{staticClass:"uni-list-item__container"},[t.thumb?i("v-uni-view",{staticClass:"uni-list-item__icon"},[i("v-uni-image",{staticClass:"uni-list-item__icon-img",attrs:{src:t.thumb}})],1):t.showExtraIcon?i("v-uni-view",{staticClass:"uni-list-item__icon"}):t._e(),i("v-uni-view",{staticClass:"uni-list-item__content"},[i("v-uni-view",{staticClass:"uni-list-item__content-title"},[t._v(t._s(t.title))]),t.note?i("v-uni-view",{staticClass:"uni-list-item__content-note"},[t._v(t._s(t.note))]):t._e()],1),t.showBadge||t.showArrow||t.showSwitch?i("v-uni-view",{staticClass:"uni-list-item__extra"},[t.showBadge?i("uni-badge",{attrs:{type:t.badgeType,text:t.badgeText}}):t._e(),t.showSwitch?i("v-uni-switch",{attrs:{disabled:t.disabled,checked:t.switchChecked},on:{change:function(e){e=t.$handleEvent(e),t.onSwitchChange(e)}}}):t._e(),t.showArrow?i("uni-icons",{staticClass:"uni-icon-wrapper",attrs:{size:20,color:"#bbb",type:"arrowright"}}):t._e()],1):t._e()],1)],1)},a=[];i.d(e,"a",(function(){return n})),i.d(e,"b",(function(){return a}))},7586:function(t,e,i){var n=i("9ac8");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("3df72f34",n,!0,{sourceMap:!1,shadowMode:!1})},"776a":function(t,e,i){var n=i("7dab");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("7a03e9e8",n,!0,{sourceMap:!1,shadowMode:!1})},"7dab":function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,".uni-badge[data-v-02cf7dfe]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;height:20px;line-height:20px;color:#333;border-radius:100px;background-color:#f1f1f1;background-color:initial;text-align:center;font-family:Helvetica Neue,Helvetica,sans-serif;font-size:12px;padding:0 6px}.uni-badge--inverted[data-v-02cf7dfe]{padding:0 5px 0 0;color:#f1f1f1}.uni-badge--default[data-v-02cf7dfe]{color:#333;background-color:#f1f1f1}.uni-badge--default-inverted[data-v-02cf7dfe]{color:#999;background-color:initial}.uni-badge--primary[data-v-02cf7dfe]{color:#fff;background-color:#fa436a}.uni-badge--primary-inverted[data-v-02cf7dfe]{color:#fa436a;background-color:initial}.uni-badge--success[data-v-02cf7dfe]{color:#fff;background-color:#4cd964}.uni-badge--success-inverted[data-v-02cf7dfe]{color:#4cd964;background-color:initial}.uni-badge--warning[data-v-02cf7dfe]{color:#fff;background-color:#f0ad4e}.uni-badge--warning-inverted[data-v-02cf7dfe]{color:#f0ad4e;background-color:initial}.uni-badge--error[data-v-02cf7dfe]{color:#fff;background-color:#fa436a}.uni-badge--error-inverted[data-v-02cf7dfe]{color:#fa436a;background-color:initial}.uni-badge--small[data-v-02cf7dfe]{-webkit-transform:scale(.8);transform:scale(.8);-webkit-transform-origin:center center;transform-origin:center center}",""]),t.exports=e},"7dcd":function(t,e,i){"use strict";var n=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("96cf");var a=n(i("3b8d")),o=n(i("7f33")),r=n(i("b19a")),c=n(i("4c2b")),l=i("8492"),s={data:function(){return{aboutInfo:{},navList:[{title:"商城介绍",url:""},{title:"注册协议",url:"protocol_register"},{title:"充值协议",url:"protocol_recharge"},{title:"隐私协议",url:"protocol_privacy"}]}},components:{uniList:o.default,uniListItem:c.default,rfImage:r.default},onLoad:function(){this.initData()},methods:{initData:function(){this.token=uni.getStorageSync("accessToken")||void 0,this.token&&this.getConfigList()},getConfigList:function(){var t=(0,a.default)(regeneratorRuntime.mark((function t(){var e,i=this;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(e=uni.getStorageSync("userInfo"),e){t.next=3;break}return t.abrupt("return");case 3:return t.next=5,this.$get("".concat(l.merchantView),{id:e.merchant_id,field:"web_qrcode"}).then((function(t){i.aboutInfo=t.data})).catch((function(t){console.log(t)}));case 5:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),navTo:function(t){uni.navigateTo({url:t})}}};e.default=s},"7f33":function(t,e,i){"use strict";i.r(e);var n=i("e6b6"),a=i("d1cb");for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);i("a7ad");var r=i("2877"),c=Object(r["a"])(a["default"],n["a"],n["b"],!1,null,"5626d82e",null);e["default"]=c.exports},8492:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.merchantIndex=e.merchantView=void 0;var n="/merchants/v1/merchant/view";e.merchantView=n;var a="/merchants/v1/merchant/index";e.merchantIndex=a},"8f1f":function(t,e,i){"use strict";i.r(e);var n=i("7dcd"),a=i.n(n);for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);e["default"]=a.a},"94b6":function(t,e,i){var n=i("ecbb");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("e9a3a80a",n,!0,{sourceMap:!1,shadowMode:!1})},"95ad":function(t,e,i){var n=i("d29f");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("1617f44c",n,!0,{sourceMap:!1,shadowMode:!1})},"9ac8":function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,'.uni-list-item[data-v-b8ec9074]{font-size:%?32?%;position:relative;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.uni-list-item--disabled[data-v-b8ec9074]{opacity:.3}.uni-list-item--hover[data-v-b8ec9074]{background-color:#f1f1f1}.uni-list-item__container[data-v-b8ec9074]{padding:%?24?% %?30?%;width:100%;box-sizing:border-box;-webkit-box-flex:1;-webkit-flex:1;flex:1;position:relative;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.uni-list-item__container[data-v-b8ec9074]:after{position:absolute;z-index:3;right:0;bottom:0;left:%?30?%;height:1px;content:"";-webkit-transform:scaleY(.5);transform:scaleY(.5);background-color:#e5e5e5}.uni-list-item__content[data-v-b8ec9074]{-webkit-box-flex:1;-webkit-flex:1;flex:1;overflow:hidden;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column;color:#3b4144}.uni-list-item__content-title[data-v-b8ec9074]{\n\t/*font-size: 24upx;*/text-overflow:ellipsis;white-space:nowrap;color:inherit;line-height:1.5;overflow:hidden}.uni-list-item__content-note[data-v-b8ec9074]{margin-top:%?6?%;color:#999;font-size:%?28?%;white-space:normal;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;overflow:hidden}.uni-list-item__extra[data-v-b8ec9074]{width:25%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;-webkit-box-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.uni-list-item__icon[data-v-b8ec9074]{margin-right:%?18?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.uni-list-item__icon-img[data-v-b8ec9074]{height:%?52?%;width:%?52?%}.uni-list>.uni-list-item:last-child .uni-list-item-container[data-v-b8ec9074]:after{height:0}',""]),t.exports=e},a7ad:function(t,e,i){"use strict";var n=i("95ad"),a=i.n(n);a.a},ad71:function(t,e,i){"use strict";var n=i("776a"),a=i.n(n);a.a},bf8c:function(t,e,i){"use strict";i.r(e);var n=i("d698"),a=i("d9e4");for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);i("ad71");var r=i("2877"),c=Object(r["a"])(a["default"],n["a"],n["b"],!1,null,"02cf7dfe",null);e["default"]=c.exports},d1cb:function(t,e,i){"use strict";i.r(e);var n=i("3970"),a=i.n(n);for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);e["default"]=a.a},d29f:function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,'.uni-list[data-v-5626d82e]{background-color:#fff;position:relative;width:100%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column}.uni-list[data-v-5626d82e]:after{position:absolute;z-index:10;right:0;bottom:0;left:0;height:1px;content:"";-webkit-transform:scaleY(.5);transform:scaleY(.5);background-color:#e5e5e5}.uni-list[data-v-5626d82e]:before{position:absolute;z-index:10;right:0;top:0;left:0;height:1px;content:"";-webkit-transform:scaleY(.5);transform:scaleY(.5);background-color:#e5e5e5}',""]),t.exports=e},d389:function(t,e,i){"use strict";var n=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a=n(i("bf8c")),o={name:"UniListItem",components:{rfBadge:a.default},props:{title:{type:String,default:""},note:{type:String,default:""},disabled:{type:[Boolean,String],default:!1},showArrow:{type:[Boolean,String],default:!0},showBadge:{type:[Boolean,String],default:!1},showSwitch:{type:[Boolean,String],default:!1},switchChecked:{type:[Boolean,String],default:!1},badgeText:{type:String,default:""},badgeType:{type:String,default:"success"},thumb:{type:String,default:""},showExtraIcon:{type:[Boolean,String],default:!1},extraIcon:{type:Object,default:function(){return{type:"contact",color:"#000000",size:20}}}},data:function(){return{}},methods:{onClick:function(){this.$emit("click")},onSwitchChange:function(t){this.$emit("switchChange",t.detail)}}};e.default=o},d698:function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return t.text?i("v-uni-text",{staticClass:"uni-badge",class:t.inverted?"uni-badge--"+t.type+" uni-badge--"+t.size+" uni-badge--"+t.type+"-inverted":"uni-badge--"+t.type+" uni-badge--"+t.size,style:t.badgeStyle,on:{click:function(e){e=t.$handleEvent(e),t.onClick()}}},[t._v(t._s(t.text))]):t._e()},a=[];i.d(e,"a",(function(){return n})),i.d(e,"b",(function(){return a}))},d9e4:function(t,e,i){"use strict";i.r(e);var n=i("20ae"),a=i.n(n);for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);e["default"]=a.a},dc98:function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"about"},[i("uni-list",t._l(t.navList,(function(e){return i("uni-list-item",{key:e.title,attrs:{title:e.title},on:{click:function(i){i=t.$handleEvent(i),t.navTo("/pages/set/about/detail?field="+e.url+"&title="+e.title)}}})})),1),i("v-uni-view",{staticClass:"history-section icon"},[i("v-uni-view",{staticClass:"sec-header"},[i("i",{staticClass:"iconfont iconshare"}),i("v-uni-text",[t._v("分享商城二维码给好友")])],1),i("v-uni-view",{staticClass:"qrcode-wrapper"},[i("v-uni-view",{staticClass:"qrcode-section"},[i("rf-image",{staticClass:"qrcode",attrs:{src:t.aboutInfo.qrcode}}),i("v-uni-text",{staticClass:"info"},[t._v("商城二维码")])],1)],1)],1)],1)},a=[];i.d(e,"a",(function(){return n})),i.d(e,"b",(function(){return a}))},e6b6:function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"uni-list"},[t._t("default")],2)},a=[];i.d(e,"a",(function(){return n})),i.d(e,"b",(function(){return a}))},ecbb:function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,"uni-page-body[data-v-7959cb41]{position:relative;background-color:#f5f5f5}.about[data-v-7959cb41]{padding:%?20?% 0}.about .history-section[data-v-7959cb41]{padding:%?30?% 0 0;margin-top:%?20?%;background:#fff;border-radius:%?10?%}.about .history-section .sec-header[data-v-7959cb41]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;font-size:%?28?%;color:#303133;line-height:%?40?%;margin-left:%?30?%}.about .history-section .sec-header .iconfont[data-v-7959cb41]{font-size:%?44?%;color:#5eba8f;margin-right:%?16?%;line-height:%?40?%}.about .history-section .qrcode-wrapper[data-v-7959cb41]{margin:%?40?% auto;display:-webkit-box;display:-webkit-flex;display:flex}.about .history-section .qrcode-wrapper .qrcode-section[data-v-7959cb41]{-webkit-box-flex:1;-webkit-flex:1;flex:1;overflow:hidden;text-align:center}.about .history-section .qrcode-wrapper .qrcode-section .qrcode[data-v-7959cb41]{width:%?280?%;height:%?280?%}.about .history-section .qrcode-wrapper .qrcode-section .qrcode uni-image[data-v-7959cb41]{width:%?280?%;height:%?280?%}.about .history-section .qrcode-wrapper .qrcode-section .info[data-v-7959cb41]{display:block;margin-bottom:%?40?%}body.?%PAGE?%[data-v-7959cb41]{background-color:#f5f5f5}",""]),t.exports=e}}]);
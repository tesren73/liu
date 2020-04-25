// H5地址(前端运行地址)
const hostUrl = "http://localhost:8080";

// 充值页面地址 用作微信H5获取code
const rechargeUrl = `${hostUrl}/pages/user/account/recharge`;

// 后台接口请求地址
const baseUrl = "http://localhost/api";

// websocket服务端地址
const websocketUrl = "";

// 微信公众号appid
const weixinAppId = "";

export {
    rechargeUrl,
    baseUrl,
    hostUrl,
    weixinAppId,
    websocketUrl
}

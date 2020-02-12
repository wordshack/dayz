const secure='http';
const URLTrader=secure+'://'+window.location.host+'/api/v1/trader';
const URLCategoria=secure+'://'+window.location.host+'/api/v1/trader/categoria';
const URLUpdateTrade=secure+'://'+window.location.host+'/api/v1/trader/update';
const URLDeleteTrade=secure+'://'+window.location.host+'/api/v1/trader/delete';
const URLAllItem=secure+'://'+window.location.host+'/api/v1/allitem';
const URLFindItem=secure+'://'+window.location.host+'/api/v1/finditem';

function getTrader () {
    return fetch(URLTrader)
        .then(res=> res.json())
        .then(json=> json)
}
function getCategoria () {
    return fetch(URLCategoria)
        .then(res=> res.json())
        .then(json=> json)
}
function getAllItem() {
    return fetch(URLAllItem)
        .then(res=> res.json())
        .then(json=> json)
}
function getFindItem(item) {
    return fetch(URLFindItem+"/"+item)
        .then(res=> res.json())
        .then(json=> json)
}

export default {
    getTrader,
    getCategoria,
    URLUpdateTrade,
    URLDeleteTrade,
    getAllItem,
    getFindItem
}

'use strict';
function getConfig(v) {
    try {
        return JSON.parse(v)
    } catch (error) {
        return JSON.parse({});
    }
}
window.onload = function() {
	const e = React.createElement;
    const gazprices_div = document.getElementById('gazprices');
    const config = gazprices_div.getAttribute("config");
    ReactDOM.render(e(Gazpricesumd, {config:getConfig(config)}), gazprices_div);
};
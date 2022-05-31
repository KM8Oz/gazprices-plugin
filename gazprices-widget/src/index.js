import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import reportWebVitals from './reportWebVitals';
const gazprices_div = document.getElementById('gazprices');
const root = ReactDOM.createRoot(gazprices_div);
// var observer = new MutationObserver(function(mutations) {
//   mutations.forEach(function(mutation) {
//     if (mutation.type === "attributes") {
//       App?.forceUpdate(()=>{
//         console.log("rerender");
//       })
//     }
//   });
// });

// observer.observe(gazprices_div, {
//   attributes: true //configure it to listen to attribute changes
// });
function getConfig(){
  try {
    const config = gazprices_div.getAttribute("config");
    return JSON.parse(config)
  } catch (error) {
    return null
  }
}
root.render(
  <React.StrictMode>
    <App config={getConfig()} />
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();

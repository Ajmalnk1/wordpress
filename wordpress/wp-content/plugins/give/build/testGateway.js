(()=>{"use strict";var t={};function e(t){return e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},e(t)}function r(t,e,r,n,o,i,a){try{var c=t[i](a),u=c.value}catch(t){return void r(t)}c.done?e(u):Promise.resolve(u).then(n,o)}t.n=e=>{var r=e&&e.__esModule?()=>e.default:()=>e;return t.d(r,{a:r}),r},t.d=(e,r)=>{for(var n in r)t.o(r,n)&&!t.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:r[n]})},t.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e);const n=window.React;var o=t.n(n);const i=window.wp.i18n;function a(){a=function(){return t};var t={},r=Object.prototype,n=r.hasOwnProperty,o=Object.defineProperty||function(t,e,r){t[e]=r.value},i="function"==typeof Symbol?Symbol:{},c=i.iterator||"@@iterator",u=i.asyncIterator||"@@asyncIterator",l=i.toStringTag||"@@toStringTag";function s(t,e,r){return Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{s({},"")}catch(t){s=function(t,e,r){return t[e]=r}}function f(t,e,r,n){var i=e&&e.prototype instanceof y?e:y,a=Object.create(i.prototype),c=new j(n||[]);return o(a,"_invoke",{value:x(t,r,c)}),a}function h(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}t.wrap=f;var p={};function y(){}function v(){}function d(){}var g={};s(g,c,(function(){return this}));var C=Object.getPrototypeOf,m=C&&C(C(P([])));m&&m!==r&&n.call(m,c)&&(g=m);var w=d.prototype=y.prototype=Object.create(g);function L(t){["next","throw","return"].forEach((function(e){s(t,e,(function(t){return this._invoke(e,t)}))}))}function b(t,r){function i(o,a,c,u){var l=h(t[o],t,a);if("throw"!==l.type){var s=l.arg,f=s.value;return f&&"object"==e(f)&&n.call(f,"__await")?r.resolve(f.__await).then((function(t){i("next",t,c,u)}),(function(t){i("throw",t,c,u)})):r.resolve(f).then((function(t){s.value=t,c(s)}),(function(t){return i("throw",t,c,u)}))}u(l.arg)}var a;o(this,"_invoke",{value:function(t,e){function n(){return new r((function(r,n){i(t,e,r,n)}))}return a=a?a.then(n,n):n()}})}function x(t,e,r){var n="suspendedStart";return function(o,i){if("executing"===n)throw new Error("Generator is already running");if("completed"===n){if("throw"===o)throw i;return{value:void 0,done:!0}}for(r.method=o,r.arg=i;;){var a=r.delegate;if(a){var c=E(a,r);if(c){if(c===p)continue;return c}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if("suspendedStart"===n)throw n="completed",r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);n="executing";var u=h(t,e,r);if("normal"===u.type){if(n=r.done?"completed":"suspendedYield",u.arg===p)continue;return{value:u.arg,done:r.done}}"throw"===u.type&&(n="completed",r.method="throw",r.arg=u.arg)}}}function E(t,e){var r=e.method,n=t.iterator[r];if(void 0===n)return e.delegate=null,"throw"===r&&t.iterator.return&&(e.method="return",e.arg=void 0,E(t,e),"throw"===e.method)||"return"!==r&&(e.method="throw",e.arg=new TypeError("The iterator does not provide a '"+r+"' method")),p;var o=h(n,t.iterator,e.arg);if("throw"===o.type)return e.method="throw",e.arg=o.arg,e.delegate=null,p;var i=o.arg;return i?i.done?(e[t.resultName]=i.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=void 0),e.delegate=null,p):i:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,p)}function _(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function O(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function j(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(_,this),this.reset(!0)}function P(t){if(t){var e=t[c];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var r=-1,o=function e(){for(;++r<t.length;)if(n.call(t,r))return e.value=t[r],e.done=!1,e;return e.value=void 0,e.done=!0,e};return o.next=o}}return{next:S}}function S(){return{value:void 0,done:!0}}return v.prototype=d,o(w,"constructor",{value:d,configurable:!0}),o(d,"constructor",{value:v,configurable:!0}),v.displayName=s(d,l,"GeneratorFunction"),t.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===v||"GeneratorFunction"===(e.displayName||e.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,d):(t.__proto__=d,s(t,l,"GeneratorFunction")),t.prototype=Object.create(w),t},t.awrap=function(t){return{__await:t}},L(b.prototype),s(b.prototype,u,(function(){return this})),t.AsyncIterator=b,t.async=function(e,r,n,o,i){void 0===i&&(i=Promise);var a=new b(f(e,r,n,o),i);return t.isGeneratorFunction(r)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},L(w),s(w,l,"Generator"),s(w,c,(function(){return this})),s(w,"toString",(function(){return"[object Generator]"})),t.keys=function(t){var e=Object(t),r=[];for(var n in e)r.push(n);return r.reverse(),function t(){for(;r.length;){var n=r.pop();if(n in e)return t.value=n,t.done=!1,t}return t.done=!0,t}},t.values=P,j.prototype={constructor:j,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(O),!t)for(var e in this)"t"===e.charAt(0)&&n.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function r(r,n){return a.type="throw",a.arg=t,e.next=r,n&&(e.method="next",e.arg=void 0),!!n}for(var o=this.tryEntries.length-1;o>=0;--o){var i=this.tryEntries[o],a=i.completion;if("root"===i.tryLoc)return r("end");if(i.tryLoc<=this.prev){var c=n.call(i,"catchLoc"),u=n.call(i,"finallyLoc");if(c&&u){if(this.prev<i.catchLoc)return r(i.catchLoc,!0);if(this.prev<i.finallyLoc)return r(i.finallyLoc)}else if(c){if(this.prev<i.catchLoc)return r(i.catchLoc,!0)}else{if(!u)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return r(i.finallyLoc)}}}},abrupt:function(t,e){for(var r=this.tryEntries.length-1;r>=0;--r){var o=this.tryEntries[r];if(o.tryLoc<=this.prev&&n.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var i=o;break}}i&&("break"===t||"continue"===t)&&i.tryLoc<=e&&e<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=t,a.arg=e,i?(this.method="next",this.next=i.finallyLoc,p):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),p},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),O(r),p}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var n=r.completion;if("throw"===n.type){var o=n.arg;O(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,r){return this.delegate={iterator:P(t),resultName:e,nextLoc:r},"next"===this.method&&(this.arg=void 0),p}},t}var c={id:"test-gateway",beforeCreatePayment:function(t){return(e=a().mark((function e(){return a().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("error"!==t.firstName){e.next=2;break}throw new Error("Failed in some way");case 2:return e.abrupt("return",{testGatewayIntent:"test-gateway-intent"});case 3:case"end":return e.stop()}}),e)})),function(){var t=this,n=arguments;return new Promise((function(o,i){var a=e.apply(t,n);function c(t){r(a,o,i,c,u,"next",t)}function u(t){r(a,o,i,c,u,"throw",t)}c(void 0)}))})();var e},Fields:function(){return o().createElement("fieldset",{className:"no-fields"},o().createElement("div",{style:{display:"flex",justifyContent:"center",marginTop:"20px"}},o().createElement("svg",{width:"84",height:"67",viewBox:"0 0 84 67",fill:"none",xmlns:"http://www.w3.org/2000/svg"},o().createElement("g",{clipPath:"url(#clip0)"},o().createElement("path",{d:"M67.0133 24.9951L65.9403 26.8663C65.5477 27.5599 64.7102 27.8478 63.9643 27.573C62.4202 26.9972 61.0069 26.1728 59.7637 25.139C59.1618 24.6417 59.0047 23.765 59.3973 23.0845L60.4704 21.2132C59.5674 20.1663 58.8608 18.9494 58.3897 17.6277H56.2305C55.4454 17.6277 54.7649 17.065 54.634 16.2798C54.3723 14.7095 54.3592 13.0607 54.634 11.4249C54.7649 10.6398 55.4454 10.064 56.2305 10.064H58.3897C58.8608 8.74232 59.5674 7.52533 60.4704 6.47846L59.3973 4.60717C59.0047 3.9267 59.1487 3.04994 59.7637 2.55268C61.0069 1.51889 62.4333 0.694473 63.9643 0.118692C64.7102 -0.156113 65.5477 0.131778 65.9403 0.825333L67.0133 2.69662C68.3874 2.44799 69.7876 2.44799 71.1616 2.69662L72.2346 0.825333C72.6272 0.131778 73.4647 -0.156113 74.2106 0.118692C75.7547 0.694473 77.168 1.51889 78.4112 2.55268C79.0131 3.04994 79.1702 3.9267 78.7776 4.60717L77.7046 6.47846C78.6075 7.52533 79.3141 8.74232 79.7852 10.064H81.9444C82.7296 10.064 83.41 10.6267 83.5409 11.4119C83.8026 12.9822 83.8157 14.631 83.5409 16.2667C83.41 17.0519 82.7296 17.6277 81.9444 17.6277H79.7852C79.3141 18.9494 78.6075 20.1663 77.7046 21.2132L78.7776 23.0845C79.1702 23.765 79.0262 24.6417 78.4112 25.139C77.168 26.1728 75.7417 26.9972 74.2106 27.573C73.4647 27.8478 72.6272 27.5599 72.2346 26.8663L71.1616 24.9951C69.8006 25.2437 68.3874 25.2437 67.0133 24.9951ZM65.6393 17.3005C70.6774 21.174 76.4221 15.4292 72.5487 10.3912C67.5106 6.50463 61.7659 12.2624 65.6393 17.3005ZM50.5512 37.4398L54.9612 39.6382C56.2829 40.3972 56.8587 42.0068 56.3352 43.4462C55.1706 46.613 52.8805 49.5181 50.7606 52.0568C49.7922 53.2214 48.1172 53.5093 46.7956 52.7503L42.9876 50.5519C40.8938 52.3447 38.4598 53.771 35.8034 54.7001V59.097C35.8034 60.615 34.7172 61.9236 33.2254 62.1853C30.0063 62.7349 26.6301 62.7611 23.2932 62.1853C21.7883 61.9236 20.676 60.6281 20.676 59.097V54.7001C18.0196 53.7579 15.5856 52.3447 13.4919 50.5519L9.68385 52.7372C8.37525 53.4962 6.68717 53.2083 5.71881 52.0437C3.59889 49.505 1.36119 46.5999 0.196541 43.4462C-0.326896 42.0199 0.248885 40.4103 1.57056 39.6382L5.92818 37.4398C5.41783 34.7048 5.41783 31.8913 5.92818 29.1433L1.57056 26.9318C0.248885 26.1728 -0.339982 24.5632 0.196541 23.1369C1.36119 19.9701 3.59889 17.065 5.71881 14.5263C6.68717 13.3617 8.36217 13.0738 9.68385 13.8328L13.4919 16.0312C15.5856 14.2384 18.0196 12.8121 20.676 11.883V7.47299C20.676 5.96811 21.7491 4.65951 23.2409 4.39779C26.46 3.84818 29.8493 3.82201 33.1862 4.38471C34.6911 4.64643 35.8034 5.94193 35.8034 7.47299V11.8699C38.4598 12.8121 40.8938 14.2253 42.9876 16.0181L46.7956 13.8197C48.1042 13.0607 49.7922 13.3486 50.7606 14.5132C52.8805 17.0519 55.1051 19.957 56.2698 23.1238C56.7932 24.5501 56.2829 26.1597 54.9612 26.9318L50.5512 29.1302C51.0616 31.8783 51.0616 34.6917 50.5512 37.4398ZM35.1622 40.2009C42.909 30.1247 31.4065 18.6222 21.3303 26.3691C13.5835 36.4453 25.086 47.9478 35.1622 40.2009ZM67.0133 64.1089L65.9403 65.9802C65.5477 66.6738 64.7102 66.9617 63.9643 66.6869C62.4202 66.1111 61.0069 65.2867 59.7637 64.2529C59.1618 63.7556 59.0047 62.8788 59.3973 62.1984L60.4704 60.3271C59.5674 59.2802 58.8608 58.0632 58.3897 56.7415H56.2305C55.4454 56.7415 54.7649 56.1788 54.634 55.3937C54.3723 53.8234 54.3592 52.1746 54.634 50.5388C54.7649 49.7537 55.4454 49.1779 56.2305 49.1779H58.3897C58.8608 47.8562 59.5674 46.6392 60.4704 45.5923L59.3973 43.721C59.0047 43.0406 59.1487 42.1638 59.7637 41.6665C61.0069 40.6328 62.4333 39.8083 63.9643 39.2326C64.7102 38.9578 65.5477 39.2456 65.9403 39.9392L67.0133 41.8105C68.3874 41.5619 69.7876 41.5619 71.1616 41.8105L72.2346 39.9392C72.6272 39.2456 73.4647 38.9578 74.2106 39.2326C75.7547 39.8083 77.168 40.6328 78.4112 41.6665C79.0131 42.1638 79.1702 43.0406 78.7776 43.721L77.7046 45.5923C78.6075 46.6392 79.3141 47.8562 79.7852 49.1779H81.9444C82.7296 49.1779 83.41 49.7406 83.5409 50.5257C83.8026 52.096 83.8157 53.7449 83.5409 55.3806C83.41 56.1658 82.7296 56.7415 81.9444 56.7415H79.7852C79.3141 58.0632 78.6075 59.2802 77.7046 60.3271L78.7776 62.1984C79.1702 62.8788 79.0262 63.7556 78.4112 64.2529C77.168 65.2867 75.7417 66.1111 74.2106 66.6869C73.4647 66.9617 72.6272 66.6738 72.2346 65.9802L71.1616 64.1089C69.8006 64.3576 68.3874 64.3576 67.0133 64.1089ZM65.6393 56.4013C70.6774 60.2747 76.4221 54.53 72.5487 49.4919C67.5106 45.6185 61.7659 51.3632 65.6393 56.4013Z",fill:"#989898"})),o().createElement("defs",null,o().createElement("clipPath",{id:"clip0"},o().createElement("rect",{width:"83.75",height:"67",fill:"white"}))))),o().createElement("p",{style:{textAlign:"center"}},o().createElement("b",null,(0,i.__)("Test GiveWP with the Test Donation Gateway","give"))),o().createElement("p",{style:{textAlign:"center"}},o().createElement("b",null,(0,i.__)("How it works:","give"))," ",(0,i.__)("There are no fields for this gateway and you will not be charged. This payment option is only for you to test the donation experience.","give")))}};window.givewp.gateways.register(c)})();
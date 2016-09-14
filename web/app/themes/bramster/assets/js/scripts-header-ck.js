window.Modernizr=function(e,t,n){function r(e){y.cssText=e}function i(e,t){return r(x.join(e+";")+(t||""))}function o(e,t){return typeof e===t}function a(e,t){return!!~(""+e).indexOf(t)}function s(e,t){for(var r in e){var i=e[r];if(!a(i,"-")&&y[i]!==n)return"pfx"==t?i:!0}return!1}function c(e,t,r){for(var i in e){var a=t[e[i]];if(a!==n)return r===!1?e[i]:o(a,"function")?a.bind(r||t):a}return!1}function l(e,t,n){var r=e.charAt(0).toUpperCase()+e.slice(1),i=(e+" "+C.join(r+" ")+r).split(" ");return o(t,"string")||o(t,"undefined")?s(i,t):(i=(e+" "+S.join(r+" ")+r).split(" "),c(i,t,n))}function u(){f.inputtypes=function(e){for(var r=0,i,o,a,s=e.length;s>r;r++)v.setAttribute("type",o=e[r]),i="text"!==v.type,i&&(v.value=b,v.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(o)&&v.style.WebkitAppearance!==n?(m.appendChild(v),a=t.defaultView,i=a.getComputedStyle&&"textfield"!==a.getComputedStyle(v,null).WebkitAppearance&&0!==v.offsetHeight,m.removeChild(v)):/^(search|tel)$/.test(o)||(i=/^(url|email)$/.test(o)?v.checkValidity&&v.checkValidity()===!1:v.value!=b)),k[e[r]]=!!i;return k}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.6.2",f={},p=!0,m=t.documentElement,h="modernizr",g=t.createElement(h),y=g.style,v=t.createElement("input"),b=":)",E={}.toString,x=" -webkit- -moz- -o- -ms- ".split(" "),w="Webkit Moz O ms",C=w.split(" "),S=w.toLowerCase().split(" "),T={svg:"http://www.w3.org/2000/svg"},j={},k={},N={},M=[],O=M.slice,$,F=function(e,n,r,i){var o,a,s,c,l=t.createElement("div"),u=t.body,d=u||t.createElement("body");if(parseInt(r,10))for(;r--;)s=t.createElement("div"),s.id=i?i[r]:h+(r+1),l.appendChild(s);return o=["&#173;",'<style id="s',h,'">',e,"</style>"].join(""),l.id=h,(u?l:d).innerHTML+=o,d.appendChild(l),u||(d.style.background="",d.style.overflow="hidden",c=m.style.overflow,m.style.overflow="hidden",m.appendChild(d)),a=n(l,e),u?l.parentNode.removeChild(l):(d.parentNode.removeChild(d),m.style.overflow=c),!!a},L=function(t){var n=e.matchMedia||e.msMatchMedia;if(n)return n(t).matches;var r;return F("@media "+t+" { #"+h+" { position: absolute; } }",function(t){r="absolute"==(e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).position}),r},R={}.hasOwnProperty,z;z=o(R,"undefined")||o(R.call,"undefined")?function(e,t){return t in e&&o(e.constructor.prototype[t],"undefined")}:function(e,t){return R.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=O.call(arguments,1),r=function(){if(this instanceof r){var i=function(){};i.prototype=t.prototype;var o=new i,a=t.apply(o,n.concat(O.call(arguments)));return Object(a)===a?a:o}return t.apply(e,n.concat(O.call(arguments)))};return r}),j.flexbox=function(){return l("flexWrap")},j.flexboxlegacy=function(){return l("boxDirection")},j.webgl=function(){return!!e.WebGLRenderingContext},j.rgba=function(){return r("background-color:rgba(150,255,150,.5)"),a(y.backgroundColor,"rgba")},j.backgroundsize=function(){return l("backgroundSize")},j.borderradius=function(){return l("borderRadius")},j.boxshadow=function(){return l("boxShadow")},j.opacity=function(){return i("opacity:.55"),/^0.55$/.test(y.opacity)},j.cssanimations=function(){return l("animationName")},j.csscolumns=function(){return l("columnCount")},j.cssgradients=function(){var e="background-image:",t="gradient(linear,left top,right bottom,from(#9f9),to(white));",n="linear-gradient(left top,#9f9, white);";return r((e+"-webkit- ".split(" ").join(t+e)+x.join(n+e)).slice(0,-e.length)),a(y.backgroundImage,"gradient")},j.csstransitions=function(){return l("transition")},j.fontface=function(){var e;return F('@font-face {font-family:"font";src:url("https://")}',function(n,r){var i=t.getElementById("smodernizr"),o=i.sheet||i.styleSheet,a=o?o.cssRules&&o.cssRules[0]?o.cssRules[0].cssText:o.cssText||"":"";e=/src/i.test(a)&&0===a.indexOf(r.split(" ")[0])}),e},j.generatedcontent=function(){var e;return F(["#",h,"{font:0/0 a}#",h,':after{content:"',b,'";visibility:hidden;font:3px/1 a}'].join(""),function(t){e=t.offsetHeight>=3}),e},j.svg=function(){return!!t.createElementNS&&!!t.createElementNS(T.svg,"svg").createSVGRect},j.inlinesvg=function(){var e=t.createElement("div");return e.innerHTML="<svg/>",(e.firstChild&&e.firstChild.namespaceURI)==T.svg},j.svgclippaths=function(){return!!t.createElementNS&&/SVGClipPath/.test(E.call(t.createElementNS(T.svg,"clipPath")))};for(var P in j)z(j,P)&&($=P.toLowerCase(),f[$]=j[P](),M.push((f[$]?"":"no-")+$));return f.input||u(),f.addTest=function(e,t){if("object"==typeof e)for(var r in e)z(e,r)&&f.addTest(r,e[r]);else{if(e=e.toLowerCase(),f[e]!==n)return f;t="function"==typeof t?t():t,"undefined"!=typeof p&&p&&(m.className+=" "+(t?"":"no-")+e),f[e]=t}return f},r(""),g=v=null,function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=y.elements;return"string"==typeof e?e.split(" "):e}function i(e){var t=h[e[p]];return t||(t={},m++,e[p]=m,h[m]=t),t}function o(e,n,r){if(n||(n=t),g)return n.createElement(e);r||(r=i(n));var o;return o=r.cache[e]?r.cache[e].cloneNode():d.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),o.canHaveChildren&&!u.test(e)?r.frag.appendChild(o):o}function a(e,n){if(e||(e=t),g)return e.createDocumentFragment();n=n||i(e);for(var o=n.frag.cloneNode(),a=0,s=r(),c=s.length;c>a;a++)o.createElement(s[a]);return o}function s(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return y.shivMethods?o(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/\w+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(y,t.frag)}function c(e){e||(e=t);var r=i(e);return y.shivCSS&&!f&&!r.hasCSS&&(r.hasCSS=!!n(e,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),g||s(e,r),e}var l=e.html5||{},u=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,d=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,p="_html5shiv",m=0,h={},g;!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",f="hidden"in e,g=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){f=!0,g=!0}}();var y={elements:l.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:l.shivCSS!==!1,supportsUnknownElements:g,shivMethods:l.shivMethods!==!1,type:"default",shivDocument:c,createElement:o,createDocumentFragment:a};e.html5=y,c(t)}(this,t),f._version=d,f._prefixes=x,f._domPrefixes=S,f._cssomPrefixes=C,f.mq=L,f.testProp=function(e){return s([e])},f.testAllProps=l,f.testStyles=F,m.className=m.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(p?" js "+M.join(" "):""),f}(this,this.document),function(e,t,n){function r(e){return"[object Function]"==m.call(e)}function i(e){return"string"==typeof e}function o(){}function a(e){return!e||"loaded"==e||"complete"==e||"uninitialized"==e}function s(){var e=h.shift();g=1,e?e.t?f(function(){("c"==e.t?k.injectCss:k.injectJs)(e.s,0,e.a,e.x,e.e,1)},0):(e(),s()):g=0}function c(e,n,r,i,o,c,l){function u(t){if(!m&&a(d.readyState)&&(E.r=m=1,!g&&s(),d.onload=d.onreadystatechange=null,t)){"img"!=e&&f(function(){b.removeChild(d)},50);for(var r in S[n])S[n].hasOwnProperty(r)&&S[n][r].onload()}}var l=l||k.errorTimeout,d=t.createElement(e),m=0,y=0,E={t:r,s:n,e:o,a:c,x:l};1===S[n]&&(y=1,S[n]=[]),"object"==e?d.data=n:(d.src=n,d.type=e),d.width=d.height="0",d.onerror=d.onload=d.onreadystatechange=function(){u.call(this,y)},h.splice(i,0,E),"img"!=e&&(y||2===S[n]?(b.insertBefore(d,v?null:p),f(u,l)):S[n].push(d))}function l(e,t,n,r,o){return g=0,t=t||"j",i(e)?c("c"==t?x:E,e,t,this.i++,n,r,o):(h.splice(this.i++,0,e),1==h.length&&s()),this}function u(){var e=k;return e.loader={load:l,i:0},e}var d=t.documentElement,f=e.setTimeout,p=t.getElementsByTagName("script")[0],m={}.toString,h=[],g=0,y="MozAppearance"in d.style,v=y&&!!t.createRange().compareNode,b=v?d:p.parentNode,d=e.opera&&"[object Opera]"==m.call(e.opera),d=!!t.attachEvent&&!d,E=y?"object":d?"script":"img",x=d?"script":E,w=Array.isArray||function(e){return"[object Array]"==m.call(e)},C=[],S={},T={timeout:function(e,t){return t.length&&(e.timeout=t[0]),e}},j,k;k=function(e){function t(e){var e=e.split("!"),t=C.length,n=e.pop(),r=e.length,n={url:n,origUrl:n,prefixes:e},i,o,a;for(o=0;r>o;o++)a=e[o].split("="),(i=T[a.shift()])&&(n=i(n,a));for(o=0;t>o;o++)n=C[o](n);return n}function a(e,i,o,a,s){var c=t(e),l=c.autoCallback;c.url.split(".").pop().split("?").shift(),c.bypass||(i&&(i=r(i)?i:i[e]||i[a]||i[e.split("/").pop().split("?")[0]]),c.instead?c.instead(e,i,o,a,s):(S[c.url]?c.noexec=!0:S[c.url]=1,o.load(c.url,c.forceCSS||!c.forceJS&&"css"==c.url.split(".").pop().split("?").shift()?"c":n,c.noexec,c.attrs,c.timeout),(r(i)||r(l))&&o.load(function(){u(),i&&i(c.origUrl,s,a),l&&l(c.origUrl,s,a),S[c.url]=2})))}function s(e,t){function n(e,n){if(e){if(i(e))n||(l=function(){var e=[].slice.call(arguments);u.apply(this,e),d()}),a(e,l,t,0,s);else if(Object(e)===e)for(p in f=function(){var t=0,n;for(n in e)e.hasOwnProperty(n)&&t++;return t}(),e)e.hasOwnProperty(p)&&(!n&&!--f&&(r(l)?l=function(){var e=[].slice.call(arguments);u.apply(this,e),d()}:l[p]=function(e){return function(){var t=[].slice.call(arguments);e&&e.apply(this,t),d()}}(u[p])),a(e[p],l,t,p,s))}else!n&&d()}var s=!!e.test,c=e.load||e.both,l=e.callback||o,u=l,d=e.complete||o,f,p;n(s?e.yep:e.nope,!!c),c&&n(c)}var c,l,d=this.yepnope.loader;if(i(e))a(e,0,d,0);else if(w(e))for(c=0;c<e.length;c++)l=e[c],i(l)?a(l,0,d,0):w(l)?k(l):Object(l)===l&&s(l,d);else Object(e)===e&&s(e,d)},k.addPrefix=function(e,t){T[e]=t},k.addFilter=function(e){C.push(e)},k.errorTimeout=1e4,null==t.readyState&&t.addEventListener&&(t.readyState="loading",t.addEventListener("DOMContentLoaded",j=function(){t.removeEventListener("DOMContentLoaded",j,0),t.readyState="complete"},0)),e.yepnope=u(),e.yepnope.executeStack=s,e.yepnope.injectJs=function(e,n,r,i,c,l){var u=t.createElement("script"),d,m,i=i||k.errorTimeout;u.src=e;for(m in r)u.setAttribute(m,r[m]);n=l?s:n||o,u.onreadystatechange=u.onload=function(){!d&&a(u.readyState)&&(d=1,n(),u.onload=u.onreadystatechange=null)},f(function(){d||(d=1,n(1))},i),c?u.onload():p.parentNode.insertBefore(u,p)},e.yepnope.injectCss=function(e,n,r,i,a,c){var i=t.createElement("link"),l,n=c?s:n||o;i.href=e,i.rel="stylesheet",i.type="text/css";for(l in r)i.setAttribute(l,r[l]);a||(p.parentNode.insertBefore(i,p),f(n,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))},window.matchMedia=window.matchMedia||function(e,t){"use strict";var n,r=e.documentElement,i=r.firstElementChild||r.firstChild,o=e.createElement("body"),a=e.createElement("div");return a.id="mq-test-1",a.style.cssText="position:absolute;top:-100em",o.style.background="none",o.appendChild(a),function(e){return a.innerHTML='&shy;<style media="'+e+'"> #mq-test-1 { width: 42px; }</style>',r.insertBefore(o,i),n=42===a.offsetWidth,r.removeChild(o),{matches:n,media:e}}}(document),function(e){"use strict";function t(){x(!0)}var n={};if(e.respond=n,n.update=function(){},n.mediaQueriesSupported=e.matchMedia&&e.matchMedia("only all").matches,!n.mediaQueriesSupported){var r=e.document,i=r.documentElement,o=[],a=[],s=[],c={},l=30,u=r.getElementsByTagName("head")[0]||i,d=r.getElementsByTagName("base")[0],f=u.getElementsByTagName("link"),p=[],m=function(){for(var t=0;t<f.length;t++){var n=f[t],r=n.href,i=n.media,o=n.rel&&"stylesheet"===n.rel.toLowerCase();r&&o&&!c[r]&&(n.styleSheet&&n.styleSheet.rawCssText?(g(n.styleSheet.rawCssText,r,i),c[r]=!0):(!/^([a-zA-Z:]*\/\/)/.test(r)&&!d||r.replace(RegExp.$1,"").split("/")[0]===e.location.host)&&p.push({href:r,media:i}))}h()},h=function(){if(p.length){var t=p.shift();w(t.href,function(n){g(n,t.href,t.media),c[t.href]=!0,e.setTimeout(function(){h()},0)})}},g=function(e,t,n){var r=e.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),i=r&&r.length||0;t=t.substring(0,t.lastIndexOf("/"));var s=function(e){return e.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+t+"$2$3")},c=!i&&n;t.length&&(t+="/"),c&&(i=1);for(var l=0;i>l;l++){var u,d,f,p;c?(u=n,a.push(s(e))):(u=r[l].match(/@media *([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1,a.push(RegExp.$2&&s(RegExp.$2))),f=u.split(","),p=f.length;for(var m=0;p>m;m++)d=f[m],o.push({media:d.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/)&&RegExp.$2||"all",rules:a.length-1,hasquery:d.indexOf("(")>-1,minw:d.match(/\(\s*min\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:d.match(/\(\s*max\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}x()},y,v,b=function(){var e,t=r.createElement("div"),n=r.body,o=!1;return t.style.cssText="position:absolute;font-size:1em;width:1em",n||(n=o=r.createElement("body"),n.style.background="none"),n.appendChild(t),i.insertBefore(n,i.firstChild),e=t.offsetWidth,o?i.removeChild(n):n.removeChild(t),e=E=parseFloat(e)},E,x=function(t){var n="clientWidth",c=i[n],d="CSS1Compat"===r.compatMode&&c||r.body[n]||c,p={},m=f[f.length-1],h=(new Date).getTime();if(t&&y&&l>h-y)return e.clearTimeout(v),void(v=e.setTimeout(x,l));y=h;for(var g in o)if(o.hasOwnProperty(g)){var w=o[g],C=w.minw,S=w.maxw,T=null===C,j=null===S,k="em";C&&(C=parseFloat(C)*(C.indexOf(k)>-1?E||b():1)),S&&(S=parseFloat(S)*(S.indexOf(k)>-1?E||b():1)),w.hasquery&&(T&&j||!(T||d>=C)||!(j||S>=d))||(p[w.media]||(p[w.media]=[]),p[w.media].push(a[w.rules]))}for(var N in s)s.hasOwnProperty(N)&&s[N]&&s[N].parentNode===u&&u.removeChild(s[N]);for(var M in p)if(p.hasOwnProperty(M)){var O=r.createElement("style"),$=p[M].join("\n");O.type="text/css",O.media=M,u.insertBefore(O,m.nextSibling),O.styleSheet?O.styleSheet.cssText=$:O.appendChild(r.createTextNode($)),s.push(O)}},w=function(e,t){var n=C();n&&(n.open("GET",e,!0),n.onreadystatechange=function(){4!==n.readyState||200!==n.status&&304!==n.status||t(n.responseText)},4!==n.readyState&&n.send(null))},C=function(){var t=!1;try{t=new e.XMLHttpRequest}catch(n){t=new e.ActiveXObject("Microsoft.XMLHTTP")}return function(){return t}}();m(),n.update=m,e.addEventListener?e.addEventListener("resize",t,!1):e.attachEvent&&e.attachEvent("onresize",t)}}(this);
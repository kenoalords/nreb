!function(t){var e={};function o(i){if(e[i])return e[i].exports;var n=e[i]={i:i,l:!1,exports:{}};return t[i].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=t,o.c=e,o.d=function(t,e,i){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(o.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)o.d(i,n,function(e){return t[e]}.bind(null,n));return i},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="/",o(o.s=0)}([function(t,e,o){o(1),t.exports=o(5)},function(t,e,o){!function(t){o(2);var e=Array.prototype.slice.call(document.querySelectorAll(".navbar-burger"),0);e.length>0&&e.forEach(function(t){t.addEventListener("click",function(){var e=t.dataset.target,o=document.getElementById(e);t.classList.toggle("is-active"),o.classList.toggle("is-active")})}),null===localStorage.getItem("is-cookie-ok")&&(t(".cookie-notes").show(),t("body").on("click","#ok-cookie",function(e){e.preventDefault(),t(".cookie-notes").hide(),localStorage.setItem("is-cookie-ok",!0)})),"function"!=typeof String.prototype.trimLeft&&(String.prototype.trimLeft=function(){return this.replace(/^\s+/,"")}),"function"!=typeof String.prototype.trimRight&&(String.prototype.trimRight=function(){return this.replace(/\s+$/,"")}),"function"!=typeof Array.prototype.map&&(Array.prototype.map=function(t,e){for(var o=0,i=this.length,n=[];o<i;o++)o in this&&(n[o]=t.call(e,this[o]));return n}),null===localStorage.getItem("sms-notification")&&t("body").hasClass("single")&&t.get(wp.api+"/check-subscription",function(e){if(0==e&&null===sessionStorage.getItem("modal-close"))t("#comments").waypoint({handler:function(e){"down"===e&&t(".is-sms-modal").addClass("is-active")}})}),t("body").on("submit","#subscription-form",function(e){e.preventDefault();var o=t(this).find("#phone").val(),i=t(this).find("input[type=checkbox]:checked"),n=t(this),r=[];if(i.map(function(e,o){r.push(t(o).val())}),""!==o){n.find("button").addClass("is-loading").attr("disabled","disabled");var s={phone:o,interests:r};t.ajax({url:wp.api+"/post-subscription",method:"POST",data:s,success:function(t){n.find("button").removeClass("is-loading").removeAttr("disabled"),n.closest(".modal").fadeOut(600),n.trigger("reset"),alert("Thank you for subscribing"),fbq("track","Lead")},error:function(t,e,o){"error"===e&&alert(t.responseJSON.message),n.find("button").removeClass("is-loading").removeAttr("disabled")}})}else alert("Please enter your phone number")}),t("body").on("click",".is-sms-modal",function(e){var o=e.target;(t(o).hasClass("modal-close")||t(o).hasClass("modal-background"))&&(t(this).removeClass("is-active"),sessionStorage.setItem("modal-close",!0))}),t("body").on("submit",".email-nreblog-leadform",function(e){e.preventDefault();var o=t(".email-nreblog-leadform"),i=o.find("#email").val(),n=o.find("button");if(n.addClass("is-loading").attr("disabled","disabled"),!function(t){return/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(t)}(i))return alert("Please enter a valid email address"),void n.removeClass("is-loading").removeAttr("disabled","disabled");var r={email:i,page:window.location.href};t.ajax({method:"POST",url:wp.api+"/email-subscription",data:r,success:function(t){!0===t&&(alert("Thank you for subscribing"),fbq("track","Lead"),n.removeClass("is-loading").removeAttr("disabled","disabled"),o.trigger("reset"))},error:function(t,e,o){alert("An error occured while signing you up"),n.removeClass("is-loading").removeAttr("disabled","disabled")}})}),window.addEventListener("offline",function(e){t(".offline-notice").addClass("is-active")}),window.addEventListener("online",function(e){t(".offline-notice").removeClass("is-active")})}(jQuery),"serviceWorker"in navigator&&navigator.serviceWorker.register("/service-worker.js").then(function(t){console.log("Service Worker installed")}).catch(function(t){return console.log(t)})},function(t,e){!function(){"use strict";var t=0,e={};function o(i){if(!i)throw new Error("No options passed to Waypoint constructor");if(!i.element)throw new Error("No element option passed to Waypoint constructor");if(!i.handler)throw new Error("No handler option passed to Waypoint constructor");this.key="waypoint-"+t,this.options=o.Adapter.extend({},o.defaults,i),this.element=this.options.element,this.adapter=new o.Adapter(this.element),this.callback=i.handler,this.axis=this.options.horizontal?"horizontal":"vertical",this.enabled=this.options.enabled,this.triggerPoint=null,this.group=o.Group.findOrCreate({name:this.options.group,axis:this.axis}),this.context=o.Context.findOrCreateByElement(this.options.context),o.offsetAliases[this.options.offset]&&(this.options.offset=o.offsetAliases[this.options.offset]),this.group.add(this),this.context.add(this),e[this.key]=this,t+=1}o.prototype.queueTrigger=function(t){this.group.queueTrigger(this,t)},o.prototype.trigger=function(t){this.enabled&&this.callback&&this.callback.apply(this,t)},o.prototype.destroy=function(){this.context.remove(this),this.group.remove(this),delete e[this.key]},o.prototype.disable=function(){return this.enabled=!1,this},o.prototype.enable=function(){return this.context.refresh(),this.enabled=!0,this},o.prototype.next=function(){return this.group.next(this)},o.prototype.previous=function(){return this.group.previous(this)},o.invokeAll=function(t){var o=[];for(var i in e)o.push(e[i]);for(var n=0,r=o.length;n<r;n++)o[n][t]()},o.destroyAll=function(){o.invokeAll("destroy")},o.disableAll=function(){o.invokeAll("disable")},o.enableAll=function(){for(var t in o.Context.refreshAll(),e)e[t].enabled=!0;return this},o.refreshAll=function(){o.Context.refreshAll()},o.viewportHeight=function(){return window.innerHeight||document.documentElement.clientHeight},o.viewportWidth=function(){return document.documentElement.clientWidth},o.adapters=[],o.defaults={context:window,continuous:!0,enabled:!0,group:"default",horizontal:!1,offset:0},o.offsetAliases={"bottom-in-view":function(){return this.context.innerHeight()-this.adapter.outerHeight()},"right-in-view":function(){return this.context.innerWidth()-this.adapter.outerWidth()}},window.Waypoint=o}(),function(){"use strict";function t(t){window.setTimeout(t,1e3/60)}var e=0,o={},i=window.Waypoint,n=window.onload;function r(t){this.element=t,this.Adapter=i.Adapter,this.adapter=new this.Adapter(t),this.key="waypoint-context-"+e,this.didScroll=!1,this.didResize=!1,this.oldScroll={x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()},this.waypoints={vertical:{},horizontal:{}},t.waypointContextKey=this.key,o[t.waypointContextKey]=this,e+=1,i.windowContext||(i.windowContext=!0,i.windowContext=new r(window)),this.createThrottledScrollHandler(),this.createThrottledResizeHandler()}r.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t,this.refresh()},r.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal),e=this.Adapter.isEmptyObject(this.waypoints.vertical),i=this.element==this.element.window;t&&e&&!i&&(this.adapter.off(".waypoints"),delete o[this.key])},r.prototype.createThrottledResizeHandler=function(){var t=this;function e(){t.handleResize(),t.didResize=!1}this.adapter.on("resize.waypoints",function(){t.didResize||(t.didResize=!0,i.requestAnimationFrame(e))})},r.prototype.createThrottledScrollHandler=function(){var t=this;function e(){t.handleScroll(),t.didScroll=!1}this.adapter.on("scroll.waypoints",function(){t.didScroll&&!i.isTouch||(t.didScroll=!0,i.requestAnimationFrame(e))})},r.prototype.handleResize=function(){i.Context.refreshAll()},r.prototype.handleScroll=function(){var t={},e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var o in e){var i=e[o],n=i.newScroll>i.oldScroll?i.forward:i.backward;for(var r in this.waypoints[o]){var s=this.waypoints[o][r];if(null!==s.triggerPoint){var a=i.oldScroll<s.triggerPoint,l=i.newScroll>=s.triggerPoint;(a&&l||!a&&!l)&&(s.queueTrigger(n),t[s.group.id]=s.group)}}}for(var c in t)t[c].flushTriggers();this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}},r.prototype.innerHeight=function(){return this.element==this.element.window?i.viewportHeight():this.adapter.innerHeight()},r.prototype.remove=function(t){delete this.waypoints[t.axis][t.key],this.checkEmpty()},r.prototype.innerWidth=function(){return this.element==this.element.window?i.viewportWidth():this.adapter.innerWidth()},r.prototype.destroy=function(){var t=[];for(var e in this.waypoints)for(var o in this.waypoints[e])t.push(this.waypoints[e][o]);for(var i=0,n=t.length;i<n;i++)t[i].destroy()},r.prototype.refresh=function(){var t,e=this.element==this.element.window,o=e?void 0:this.adapter.offset(),n={};for(var r in this.handleScroll(),t={horizontal:{contextOffset:e?0:o.left,contextScroll:e?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:e?0:o.top,contextScroll:e?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}}){var s=t[r];for(var a in this.waypoints[r]){var l,c,u,d,p=this.waypoints[r][a],h=p.options.offset,f=p.triggerPoint,g=0,y=null==f;p.element!==p.element.window&&(g=p.adapter.offset()[s.offsetProp]),"function"==typeof h?h=h.apply(p):"string"==typeof h&&(h=parseFloat(h),p.options.offset.indexOf("%")>-1&&(h=Math.ceil(s.contextDimension*h/100))),l=s.contextScroll-s.contextOffset,p.triggerPoint=Math.floor(g+l-h),c=f<s.oldScroll,u=p.triggerPoint>=s.oldScroll,d=!c&&!u,!y&&(c&&u)?(p.queueTrigger(s.backward),n[p.group.id]=p.group):!y&&d?(p.queueTrigger(s.forward),n[p.group.id]=p.group):y&&s.oldScroll>=p.triggerPoint&&(p.queueTrigger(s.forward),n[p.group.id]=p.group)}}return i.requestAnimationFrame(function(){for(var t in n)n[t].flushTriggers()}),this},r.findOrCreateByElement=function(t){return r.findByElement(t)||new r(t)},r.refreshAll=function(){for(var t in o)o[t].refresh()},r.findByElement=function(t){return o[t.waypointContextKey]},window.onload=function(){n&&n(),r.refreshAll()},i.requestAnimationFrame=function(e){(window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||t).call(window,e)},i.Context=r}(),function(){"use strict";function t(t,e){return t.triggerPoint-e.triggerPoint}function e(t,e){return e.triggerPoint-t.triggerPoint}var o={vertical:{},horizontal:{}},i=window.Waypoint;function n(t){this.name=t.name,this.axis=t.axis,this.id=this.name+"-"+this.axis,this.waypoints=[],this.clearTriggerQueues(),o[this.axis][this.name]=this}n.prototype.add=function(t){this.waypoints.push(t)},n.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}},n.prototype.flushTriggers=function(){for(var o in this.triggerQueues){var i=this.triggerQueues[o],n="up"===o||"left"===o;i.sort(n?e:t);for(var r=0,s=i.length;r<s;r+=1){var a=i[r];(a.options.continuous||r===i.length-1)&&a.trigger([o])}}this.clearTriggerQueues()},n.prototype.next=function(e){this.waypoints.sort(t);var o=i.Adapter.inArray(e,this.waypoints);return o===this.waypoints.length-1?null:this.waypoints[o+1]},n.prototype.previous=function(e){this.waypoints.sort(t);var o=i.Adapter.inArray(e,this.waypoints);return o?this.waypoints[o-1]:null},n.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)},n.prototype.remove=function(t){var e=i.Adapter.inArray(t,this.waypoints);e>-1&&this.waypoints.splice(e,1)},n.prototype.first=function(){return this.waypoints[0]},n.prototype.last=function(){return this.waypoints[this.waypoints.length-1]},n.findOrCreate=function(t){return o[t.axis][t.name]||new n(t)},i.Group=n}(),function(){"use strict";var t=window.jQuery,e=window.Waypoint;function o(e){this.$element=t(e)}t.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(t,e){o.prototype[e]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[e].apply(this.$element,t)}}),t.each(["extend","inArray","isEmptyObject"],function(e,i){o[i]=t[i]}),e.adapters.push({name:"jquery",Adapter:o}),e.Adapter=o}(),function(){"use strict";var t=window.Waypoint;function e(e){return function(){var o=[],i=arguments[0];return e.isFunction(arguments[0])&&((i=e.extend({},arguments[1])).handler=arguments[0]),this.each(function(){var n=e.extend({},i,{element:this});"string"==typeof n.context&&(n.context=e(this).closest(n.context)[0]),o.push(new t(n))}),o}}window.jQuery&&(window.jQuery.fn.waypoint=e(window.jQuery)),window.Zepto&&(window.Zepto.fn.waypoint=e(window.Zepto))}()},,,function(t,e){}]);
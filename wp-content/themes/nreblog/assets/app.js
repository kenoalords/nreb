!function(e){var t={};function o(n){if(t[n])return t[n].exports;var r=t[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,o),r.l=!0,r.exports}o.m=e,o.c=t,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)o.d(n,r,function(t){return e[t]}.bind(null,r));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=0)}([function(e,t,o){o(1),e.exports=o(2)},function(e,t){!function(e){var t=Array.prototype.slice.call(document.querySelectorAll(".navbar-burger"),0);t.length>0&&t.forEach(function(e){e.addEventListener("click",function(){var t=e.dataset.target,o=document.getElementById(t);e.classList.toggle("is-active"),o.classList.toggle("is-active")})}),null===localStorage.getItem("is-cookie-ok")&&(e(".cookie-notes").show(),e("body").on("click","#ok-cookie",function(t){t.preventDefault(),e(".cookie-notes").hide(),localStorage.setItem("is-cookie-ok",!0)})),"function"!=typeof String.prototype.trimLeft&&(String.prototype.trimLeft=function(){return this.replace(/^\s+/,"")}),"function"!=typeof String.prototype.trimRight&&(String.prototype.trimRight=function(){return this.replace(/\s+$/,"")}),"function"!=typeof Array.prototype.map&&(Array.prototype.map=function(e,t){for(var o=0,n=this.length,r=[];o<n;o++)o in this&&(r[o]=e.call(t,this[o]));return r}),null===localStorage.getItem("sms-notification")&&e("body").hasClass("single")&&e.get(wp.api+"/check-subscription",function(t){0==t&&null===sessionStorage.getItem("modal-close")&&e(".is-sms-modal").addClass("is-active")}),e("body").on("submit","#subscription-form",function(t){t.preventDefault();var o=e(this).find("#phone").val(),n=e(this).find("input[type=checkbox]:checked"),r=e(this),i=[];if(n.map(function(t,o){i.push(e(o).val())}),""!==o){r.find("button").addClass("is-loading").attr("disabled","disabled");var a={phone:o,interests:i};e.ajax({url:wp.api+"/post-subscription",method:"POST",data:a,success:function(e){r.find("button").removeClass("is-loading").removeAttr("disabled"),r.closest(".modal").fadeOut(600),r.trigger("reset"),alert("Thank you for subscribing")},error:function(e,t,o){"error"===t&&alert(e.responseJSON.message),r.find("button").removeClass("is-loading").removeAttr("disabled")}})}else alert("Please enter your phone number")}),e("body").on("click",".is-sms-modal",function(t){var o=t.target;(e(o).hasClass("modal-close")||e(o).hasClass("modal-background"))&&(e(this).removeClass("is-active"),sessionStorage.setItem("modal-close",!0))}),e("body").on("submit",".email-nreblog-leadform",function(t){t.preventDefault();var o=e(".email-nreblog-leadform"),n=o.find("#email").val(),r=o.find("button");if(r.addClass("is-loading").attr("disabled","disabled"),!function(e){return/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e)}(n))return alert("Please enter a valid email address"),void r.removeClass("is-loading").removeAttr("disabled","disabled");var i={email:n,page:window.location.href};e.ajax({method:"POST",url:wp.api+"/email-subscription",data:i,success:function(e){!0===e&&(alert("Thank you for subscribing"),r.removeClass("is-loading").removeAttr("disabled","disabled"),o.trigger("reset"))},error:function(e,t,o){alert("An error occured while signing you up"),r.removeClass("is-loading").removeAttr("disabled","disabled")}})}),window.addEventListener("offline",function(t){e(".offline-notice").addClass("is-active")}),window.addEventListener("online",function(t){e(".offline-notice").removeClass("is-active")})}(jQuery),"serviceWorker"in navigator&&navigator.serviceWorker.register("/service-worker.js").then(function(e){console.log("Service Worker installed")}).catch(function(e){return console.log(e)})},function(e,t){}]);
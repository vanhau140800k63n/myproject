/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/domain.js":
/*!********************************!*\
  !*** ./resources/js/domain.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "domain": () => (/* binding */ domain)
/* harmony export */ });
// export const domain = 'http://localhost:8003/';
var domain = window.location.origin + '/';

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************************!*\
  !*** ./resources/js/template.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _domain__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./domain */ "./resources/js/domain.js");

$(document).ready(function () {
  $('.template_item_download').click(function () {
    if ($(this).attr('check') == 'download') {
      location.href = $(this).attr('href');
    } else {
      location.href = _domain__WEBPACK_IMPORTED_MODULE_0__.domain + 'login';
    }
  });
  $('.template_item_run').click(function (event) {
    event.preventDefault();
    var content = $(this).attr('value');
    var newForm = $('<form>', {
      'action': _domain__WEBPACK_IMPORTED_MODULE_0__.domain + 'compile_html',
      'target': '_blank',
      'method': 'POST'
    }).append($('<input>', {
      'name': 'text',
      'value': content,
      'type': 'hidden'
    }));
    var csrfVar = $('meta[name="csrf-token"]').attr('content');
    newForm.append("<input name='_token' value='" + csrfVar + "' type='hidden'>");
    $('body').append(newForm);
    newForm.submit();
  });
  $('video').hover(function () {
    this.muted = true;
    this.play();
  }, function () {
    this.pause();
  });
  var icon_ads_lists_width = $('.icon_ads_lists').width();
  var icon_ads_item_width = $('.icon_ads_item').width();
  var icon_ads_item_num = Math.floor(icon_ads_lists_width / (icon_ads_item_width + 20));
  var icon_ads_item_margin = (icon_ads_lists_width / icon_ads_item_num - icon_ads_item_width) / 2;
  $('.icon_ads_lists img').css('margin', '5px ' + icon_ads_item_margin + 'px');
});
})();

/******/ })()
;
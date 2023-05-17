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
/*!*******************************************!*\
  !*** ./resources/js/auto_add_template.js ***!
  \*******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _domain__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./domain */ "./resources/js/domain.js");

$(document).ready(function () {
  var page_url_index = $('.url_content').attr('page');
  var index = 0;
  function addUrl(p_url_index) {
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url: _domain__WEBPACK_IMPORTED_MODULE_0__.domain + "admin/post/get_content_url",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      type: "POST",
      dataType: 'json',
      data: {
        url: 'https://plantillashtmlgratis.com/en/categoria/css-code/page/' + page_url_index + '/',
        _token: _token
      }
    }).done(function (data) {
      $('.url_content').html(data);
      $('.url_content article').each(function () {
        var url = $(this).find('iframe').attr('src');
        var download = $(this).find('.botondescargar').attr('href');
        var title = $(this).find('h2 a').html();
        $.ajax({
          url: _domain__WEBPACK_IMPORTED_MODULE_0__.domain + "admin/template/auto/post_add",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          type: "POST",
          dataType: 'json',
          data: {
            url: url,
            download: download,
            title: title,
            _token: _token
          }
        }).done(function (data) {
          index += 1;
          if (index == 20) {
            location.href = _domain__WEBPACK_IMPORTED_MODULE_0__.domain + "admin/template/auto/add?page=" + ++page_url_index;
          }
          return true;
        }).fail(function (e) {
          return false;
        });
      });
      return true;
    }).fail(function (e) {
      return false;
    });
  }
  addUrl(page_url_index);
  // setTimeout(function () {
  //     location.href = domain + "admin/post/auto_add_url?page=" + ++page_url_index;
  // }, 10000)
});
})();

/******/ })()
;
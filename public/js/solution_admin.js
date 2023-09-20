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
/*!****************************************!*\
  !*** ./resources/js/solution_admin.js ***!
  \****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _domain__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./domain */ "./resources/js/domain.js");

$(document).ready(function () {
  $('.auto_add').html($('#content').html());
  var solution_title = $('#question-header h1 a').html();
  var question = $('.question .s-prose.js-post-body').html();
  var question_comments = [];
  $('.question .comment-body.js-comment-edit-hide .comment-copy').each(function () {
    question_comments.push($(this).html());
  });
  var answers = [];
  $('.answer .post-layout').each(function () {
    var answer = $(this).find('.s-prose.js-post-body').html();
    var answer_comments = [];
    $(this).find('.comment-copy').each(function () {
      answer_comments.push($(this).html());
    });
    answers.push({
      answer: answer,
      answer_comments: answer_comments
    });
  });
  var _token = $('input[name="_token"]').val();
  var data = {
    solution_title: solution_title,
    question: question,
    question_comments: question_comments,
    answers: answers,
    _token: _token
  };

  // console.log(data);
  // alert($('.question .comment-body.js-comment-edit-hide .comment-copy').length)

  $.ajax({
    url: _domain__WEBPACK_IMPORTED_MODULE_0__.domain + "admin/solution/add_solution",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    type: "POST",
    dataType: 'json',
    data: data
  }).done(function (data) {
    location.reload();
    return false;
  }).fail(function (e) {
    location.reload();
    return false;
  });

  // $('.adfa').each(function() {

  // })
});
})();

/******/ })()
;
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/divi4-module/index.jsx"
/*!***********************************************!*\
  !*** ./src/components/divi4-module/index.jsx ***!
  \***********************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ \"react\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);\n// External Dependencies\n\nclass Divi4Module extends react__WEBPACK_IMPORTED_MODULE_0__.Component {\n  static slug = 'd4_module';\n  render() {\n    const HeaderLevel = this.props.header_level ? this.props.header_level : 'h2';\n    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"div\", {\n      className: \"example_d4_module_inner\"\n    }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(HeaderLevel, {\n      className: \"example_d4_module_title\"\n    }, this.props.title), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"div\", {\n      className: \"example_d4_module_content\"\n    }, this.props.content()));\n  }\n}\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Divi4Module);\n\n//# sourceURL=webpack://infinity-tnc-divi-modules-divi4/./src/components/divi4-module/index.jsx?\n}");

/***/ },

/***/ "./src/components/divi4-only-module/index.jsx"
/*!****************************************************!*\
  !*** ./src/components/divi4-only-module/index.jsx ***!
  \****************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ \"react\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);\n// External Dependencies\n\nclass Divi4OnlyModule extends react__WEBPACK_IMPORTED_MODULE_0__.Component {\n  static slug = 'd4_only_module';\n  render() {\n    const HeaderLevel = this.props.header_level ? this.props.header_level : 'h2';\n    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"div\", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(HeaderLevel, {\n      className: \"d4_only_module_title\"\n    }, this.props.title), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"div\", {\n      className: \"d4_only_module_content\"\n    }, this.props.content()));\n  }\n}\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Divi4OnlyModule);\n\n//# sourceURL=webpack://infinity-tnc-divi-modules-divi4/./src/components/divi4-only-module/index.jsx?\n}");

/***/ },

/***/ "./src/components/embed-map/index.jsx"
/*!********************************************!*\
  !*** ./src/components/embed-map/index.jsx ***!
  \********************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ \"react\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);\n// External Dependencies\n\nclass EmbedMap extends react__WEBPACK_IMPORTED_MODULE_0__.Component {\n  static slug = 'inftnc_embed_map';\n  render() {\n    const {\n      source_type,\n      latitude_longitude,\n      map_zoom,\n      embed_code\n    } = this.props;\n    let tncIframe;\n    if (source_type === 'emebed_code') {\n      tncIframe = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"div\", {\n        dangerouslySetInnerHTML: {\n          __html: embed_code\n        }\n      });\n    } else if (source_type === 'latitude_longitude') {\n      const iframeSrc = `https://maps.google.com/maps?q=${latitude_longitude}&z=${map_zoom}&output=embed`;\n      tncIframe = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"iframe\", {\n        src: iframeSrc\n      });\n    }\n    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(\"div\", {\n      className: \"inftnc_embed_map_wrapper\"\n    }, tncIframe);\n  }\n}\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (EmbedMap);\n\n//# sourceURL=webpack://infinity-tnc-divi-modules-divi4/./src/components/embed-map/index.jsx?\n}");

/***/ },

/***/ "./src/index.js"
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"jquery\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _components_divi4_module__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/divi4-module */ \"./src/components/divi4-module/index.jsx\");\n/* harmony import */ var _components_divi4_only_module__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/divi4-only-module */ \"./src/components/divi4-only-module/index.jsx\");\n/* harmony import */ var _components_embed_map__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/embed-map */ \"./src/components/embed-map/index.jsx\");\n\n\n\n\n\n/**\n * Register modules to Visual Builder once the API is ready.\n *\n * @since 1.0.0\n */\njquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on('et_builder_api_ready', (event, API) => {\n  // Register modules.\n  API.registerModules([_components_divi4_module__WEBPACK_IMPORTED_MODULE_1__[\"default\"], _components_divi4_only_module__WEBPACK_IMPORTED_MODULE_2__[\"default\"], _components_embed_map__WEBPACK_IMPORTED_MODULE_3__[\"default\"]]);\n});\n\n//# sourceURL=webpack://infinity-tnc-divi-modules-divi4/./src/index.js?\n}");

/***/ },

/***/ "react"
/*!************************!*\
  !*** external "React" ***!
  \************************/
(module) {

module.exports = React;

/***/ },

/***/ "jquery"
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
(module) {

module.exports = jQuery;

/***/ }

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
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;
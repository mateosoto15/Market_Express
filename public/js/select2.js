/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/select2.js":
/*!*********************************!*\
  !*** ./resources/js/select2.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.ajaxSelect').select2({
    placeholder: $('.ajaxSelect').data('placeholder'),
    ajax: {
      url: $('.ajaxSelect').data('url'),
      processResults: function processResults(data) {
        return {
          results: data
        };
      }
    }
  }); //if isset a old or default value we search the value and then append to the select

  var preselected = $('.ajaxSelect');

  if (preselected.data('preselected')) {
    $.ajax({
      type: 'GET',
      url: preselected.data('preselected')
    }).then(function (data) {
      // create the option and append to Select2
      data = JSON.parse(data);
      var option = new Option(data.text, data.id, true, true);
      preselected.append(option).trigger('change'); // manually trigger the `select2:select` event

      preselected.trigger({
        type: 'select2:select',
        params: {
          data: data
        }
      });
    });
  }
  /**************************************************************
  
  		THIS SECTION IS IN CASE THERE ARE MORE THAN ONE AJAX SELECT
  	**************************************************************/


  $('.ajaxSelect2').select2({
    placeholder: $('.ajaxSelect2').data('placeholder'),
    ajax: {
      url: $('.ajaxSelect2').data('url'),
      processResults: function processResults(data) {
        return {
          results: data
        };
      }
    }
  }); //if isset a old or default value we search the value and then append to the select

  var preselected2 = $('.ajaxSelect2');

  if (preselected2.data('preselected')) {
    $.ajax({
      type: 'GET',
      url: preselected2.data('preselected')
    }).then(function (data) {
      // create the option and append to Select2
      data = JSON.parse(data);
      var option = new Option(data.text, data.id, true, true);
      preselected2.append(option).trigger('change'); // manually trigger the `select2:select` event

      preselected2.trigger({
        type: 'select2:select',
        params: {
          data: data
        }
      });
    });
  } // ******************************************************


  $('.products').select2({
    placeholder: $('.products').data('placeholder'),
    ajax: {
      url: $('.products').data('url'),
      processResults: function processResults(data) {
        return {
          results: data
        };
      }
    }
  }); //normal select

  $('.normalSelect').select2({
    placeholder: $('.normalSelect').data('placeholder')
  });
});

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/select2.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ccss/Market_Express/resources/js/select2.js */"./resources/js/select2.js");


/***/ })

/******/ });
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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dataTables.js":
/*!************************************!*\
  !*** ./resources/js/dataTables.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  //dataTable
  $('#table').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
  }); // markets Table

  $('#markets_table').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "ajax": $('#markets_table').data('url'),
    "columns": [{
      "data": "id"
    }, {
      "data": "name"
    }, {
      "data": "description"
    }, {
      "data": ''
    }],
    columnDefs: [{
      targets: -1,
      render: function render(data, type, row, meta) {
        data = '<a href="#" data-url="/admin/markets/delete/' + row.id + '" class="btn btn-outline-danger" onclick="Delete($(this));">Eliminar</a> <a href="/admin/markets/edit/' + row.id + '" class="btn btn-outline-info" >Editar</a>';
        return data;
      }
    }]
  });
  $('#markets_table_without_actions').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "ajax": $('#markets_table_without_actions').data('url'),
    "columns": [{
      "data": "name"
    }, {
      "data": "description"
    }, {
      "data": 'address'
    }]
  }); // permissions Table

  $('#permissions_table').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "ajax": $('#permissions_table').data('url'),
    "columns": [{
      "data": "name"
    }, {
      "data": "description"
    }, {
      "data": ''
    }],
    columnDefs: [{
      targets: -1,
      render: function render(data, type, row, meta) {
        data = '<a href="#" data-url="/admin/permissions/delete/' + row.id + '" class="btn btn-outline-danger" onclick="Delete($(this));">Eliminar</a> <a href="/admin/permissions/edit/' + row.id + '" class="btn btn-outline-info" >Editar</a>';
        return data;
      }
    }]
  }); // products Table

  $('#products_table').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "ajax": $('#products_table').data('url'),
    "columns": [{
      "data": "id"
    }, {
      "data": "name"
    }, {
      "data": "description",
      "defaultContent": ""
    }, {
      "data": ''
    }],
    columnDefs: [{
      targets: -1,
      render: function render(data, type, row, meta) {
        data = '<a href="#" data-url="/admin/products/delete/' + row.id + '" class="btn btn-outline-danger" onclick="Delete($(this));">Eliminar</a> <a href="/admin/products/edit/' + row.id + '" class="btn btn-outline-info" >Editar</a>';
        return data;
      }
    }]
  }); // assign permissions Table

  $('#assign_permissions').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
  }); // users table

  $('#users_table').DataTable({
    "oLanguage": {
      "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "ajax": $('#users_table').data('url'),
    "columns": [{
      "data": "name"
    }, {
      "data": "email"
    }, {
      "data": "role.name"
    }, {
      "data": ''
    }],
    columnDefs: [{
      targets: -1,
      render: function render(data, type, row, meta) {
        data = '';

        if (row.role.name !== 'Admin') {
          data = data + '<a href="#" data-url="users/' + row.id + '/makeAdmin" class="btn btn-outline-danger" onclick="MakeAdmin($(this));" > Hacer Admin </a>';
        } else {
          data = data + '<a href="users/' + row.id + '/assignPermissions" class="btn btn-outline-warning" > Asignar Permisos </a>';
        }

        return data;
      }
    }]
  });
});

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/js/dataTables.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ccss/Market_Express/resources/js/dataTables.js */"./resources/js/dataTables.js");


/***/ })

/******/ });
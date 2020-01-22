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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/leaflet-geosearch/lib/constants.js":
/*!*********************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/constants.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var ENTER_KEY = exports.ENTER_KEY = 13;
var ESCAPE_KEY = exports.ESCAPE_KEY = 27;
var ARROW_DOWN_KEY = exports.ARROW_DOWN_KEY = 40;
var ARROW_UP_KEY = exports.ARROW_UP_KEY = 38;
var ARROW_LEFT_KEY = exports.ARROW_LEFT_KEY = 37;
var ARROW_RIGHT_KEY = exports.ARROW_RIGHT_KEY = 39;

var SPECIAL_KEYS = exports.SPECIAL_KEYS = [ENTER_KEY, ESCAPE_KEY, ARROW_DOWN_KEY, ARROW_UP_KEY, ARROW_LEFT_KEY, ARROW_RIGHT_KEY];

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/domUtils.js":
/*!********************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/domUtils.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
/* eslint-disable import/prefer-default-export */
var createElement = exports.createElement = function createElement(element) {
  var classNames = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var parent = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

  var el = document.createElement(element);
  el.className = classNames;

  if (parent) {
    parent.appendChild(el);
  }

  return el;
};

var createScriptElement = exports.createScriptElement = function createScriptElement(url, cb) {
  var script = createElement('script', null, document.body);
  script.setAttribute('type', 'text/javascript');

  return new Promise(function (resolve) {
    window[cb] = function (json) {
      script.remove();
      delete window[cb];
      resolve(json);
    };

    script.setAttribute('src', url);
  });
};

var addClassName = exports.addClassName = function addClassName(element, className) {
  if (element && !element.classList.contains(className)) {
    element.classList.add(className);
  }
};

var removeClassName = exports.removeClassName = function removeClassName(element, className) {
  if (element && element.classList.contains(className)) {
    element.classList.remove(className);
  }
};

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _leafletControl = __webpack_require__(/*! ./leafletControl */ "./node_modules/leaflet-geosearch/lib/leafletControl.js");

Object.defineProperty(exports, 'GeoSearchControl', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_leafletControl).default;
  }
});

var _searchElement = __webpack_require__(/*! ./searchElement */ "./node_modules/leaflet-geosearch/lib/searchElement.js");

Object.defineProperty(exports, 'SearchElement', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_searchElement).default;
  }
});

var _bingProvider = __webpack_require__(/*! ./providers/bingProvider */ "./node_modules/leaflet-geosearch/lib/providers/bingProvider.js");

Object.defineProperty(exports, 'BingProvider', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_bingProvider).default;
  }
});

var _esriProvider = __webpack_require__(/*! ./providers/esriProvider */ "./node_modules/leaflet-geosearch/lib/providers/esriProvider.js");

Object.defineProperty(exports, 'EsriProvider', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_esriProvider).default;
  }
});

var _googleProvider = __webpack_require__(/*! ./providers/googleProvider */ "./node_modules/leaflet-geosearch/lib/providers/googleProvider.js");

Object.defineProperty(exports, 'GoogleProvider', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_googleProvider).default;
  }
});

var _openStreetMapProvider = __webpack_require__(/*! ./providers/openStreetMapProvider */ "./node_modules/leaflet-geosearch/lib/providers/openStreetMapProvider.js");

Object.defineProperty(exports, 'OpenStreetMapProvider', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_openStreetMapProvider).default;
  }
});

var _provider = __webpack_require__(/*! ./providers/provider */ "./node_modules/leaflet-geosearch/lib/providers/provider.js");

Object.defineProperty(exports, 'Provider', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_provider).default;
  }
});

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/leafletControl.js":
/*!**************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/leafletControl.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _nodentRuntime = __webpack_require__(/*! nodent-runtime */ "./node_modules/nodent-runtime/runtime.js");

var _nodentRuntime2 = _interopRequireDefault(_nodentRuntime);

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

exports.default = LeafletControl;

var _lodash = __webpack_require__(/*! lodash.debounce */ "./node_modules/lodash.debounce/index.js");

var _lodash2 = _interopRequireDefault(_lodash);

var _searchElement = __webpack_require__(/*! ./searchElement */ "./node_modules/leaflet-geosearch/lib/searchElement.js");

var _searchElement2 = _interopRequireDefault(_searchElement);

var _resultList = __webpack_require__(/*! ./resultList */ "./node_modules/leaflet-geosearch/lib/resultList.js");

var _resultList2 = _interopRequireDefault(_resultList);

var _domUtils = __webpack_require__(/*! ./domUtils */ "./node_modules/leaflet-geosearch/lib/domUtils.js");

var _constants = __webpack_require__(/*! ./constants */ "./node_modules/leaflet-geosearch/lib/constants.js");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var defaultOptions = function defaultOptions() {
  return {
    position: 'topleft',
    style: 'button',
    showMarker: true,
    showPopup: false,
    popupFormat: function popupFormat(_ref) {
      var result = _ref.result;
      return '' + result.label;
    },
    marker: {
      icon: new L.Icon.Default(),
      draggable: false
    },
    maxMarkers: 1,
    retainZoomLevel: false,
    animateZoom: true,
    searchLabel: 'Enter address',
    notFoundMessage: 'Sorry, that address could not be found.',
    messageHideDelay: 3000,
    zoomLevel: 18,
    classNames: {
      container: 'leaflet-bar leaflet-control leaflet-control-geosearch',
      button: 'leaflet-bar-part leaflet-bar-part-single',
      resetButton: 'reset',
      msgbox: 'leaflet-bar message',
      form: '',
      input: ''
    },
    autoComplete: true,
    autoCompleteDelay: 250,
    autoClose: false,
    keepResult: false
  };
};

var wasHandlerEnabled = {};
var mapHandlers = ['dragging', 'touchZoom', 'doubleClickZoom', 'scrollWheelZoom', 'boxZoom', 'keyboard'];

var Control = {
  initialize: function initialize(options) {
    var _this = this;

    this.markers = new L.FeatureGroup();
    this.handlersDisabled = false;

    this.options = _extends({}, defaultOptions(), options);

    var _options = this.options,
        style = _options.style,
        classNames = _options.classNames,
        searchLabel = _options.searchLabel,
        autoComplete = _options.autoComplete,
        autoCompleteDelay = _options.autoCompleteDelay;

    if (style !== 'button') {
      this.options.classNames.container += ' ' + options.style;
    }

    this.searchElement = new _searchElement2.default(_extends({}, this.options, {
      handleSubmit: function handleSubmit(query) {
        return _this.onSubmit(query);
      }
    }));

    var _searchElement$elemen = this.searchElement.elements,
        container = _searchElement$elemen.container,
        form = _searchElement$elemen.form,
        input = _searchElement$elemen.input;


    var button = (0, _domUtils.createElement)('a', classNames.button, container);
    button.title = searchLabel;
    button.href = '#';

    button.addEventListener('click', function (e) {
      _this.onClick(e);
    }, false);

    var resetButton = (0, _domUtils.createElement)('a', classNames.resetButton, form);
    resetButton.innerHTML = 'X';
    button.href = '#';
    resetButton.addEventListener('click', function () {
      _this.clearResults(null, true);
    }, false);

    if (autoComplete) {
      this.resultList = new _resultList2.default({
        handleClick: function handleClick(_ref2) {
          var result = _ref2.result;

          input.value = result.label;
          _this.onSubmit({ query: result.label, data: result });
        }
      });

      form.appendChild(this.resultList.elements.container);

      input.addEventListener('keyup', (0, _lodash2.default)(function (e) {
        return _this.autoSearch(e);
      }, autoCompleteDelay), true);
      input.addEventListener('keydown', function (e) {
        return _this.selectResult(e);
      }, true);
      input.addEventListener('keydown', function (e) {
        return _this.clearResults(e, true);
      }, true);
    }

    form.addEventListener('mouseenter', function (e) {
      return _this.disableHandlers(e);
    }, true);
    form.addEventListener('mouseleave', function (e) {
      return _this.restoreHandlers(e);
    }, true);

    this.elements = { button: button, resetButton: resetButton };
  },
  onAdd: function onAdd(map) {
    var _options2 = this.options,
        showMarker = _options2.showMarker,
        style = _options2.style;


    this.map = map;
    if (showMarker) {
      this.markers.addTo(map);
    }

    if (style === 'bar') {
      var form = this.searchElement.elements.form;

      var root = map.getContainer().querySelector('.leaflet-control-container');

      var container = (0, _domUtils.createElement)('div', 'leaflet-control-geosearch bar');
      container.appendChild(form);
      root.appendChild(container);
      this.elements.container = container;
    }

    return this.searchElement.elements.container;
  },
  onRemove: function onRemove() {
    var container = this.elements.container;

    if (container) {
      container.remove();
    }

    return this;
  },
  onClick: function onClick(event) {
    event.preventDefault();

    var _searchElement$elemen2 = this.searchElement.elements,
        container = _searchElement$elemen2.container,
        input = _searchElement$elemen2.input;


    if (container.classList.contains('active')) {
      (0, _domUtils.removeClassName)(container, 'active');
      this.clearResults();
    } else {
      (0, _domUtils.addClassName)(container, 'active');
      input.focus();
    }
  },
  disableHandlers: function disableHandlers(e) {
    var _this2 = this;

    var form = this.searchElement.elements.form;


    if (this.handlersDisabled || e && e.target !== form) {
      return;
    }

    this.handlersDisabled = true;
    mapHandlers.forEach(function (handler) {
      if (_this2.map[handler]) {
        wasHandlerEnabled[handler] = _this2.map[handler].enabled();
        _this2.map[handler].disable();
      }
    });
  },
  restoreHandlers: function restoreHandlers(e) {
    var _this3 = this;

    var form = this.searchElement.elements.form;


    if (!this.handlersDisabled || e && e.target !== form) {
      return;
    }

    this.handlersDisabled = false;
    mapHandlers.forEach(function (handler) {
      if (wasHandlerEnabled[handler]) {
        _this3.map[handler].enable();
      }
    });
  },
  selectResult: function selectResult(event) {
    if (![_constants.ENTER_KEY, _constants.ARROW_DOWN_KEY, _constants.ARROW_UP_KEY].includes(event.keyCode)) {
      return;
    }

    event.preventDefault();

    var input = this.searchElement.elements.input;


    var list = this.resultList;

    if (event.keyCode === _constants.ENTER_KEY) {
      var _item = list.select(list.selected);
      this.onSubmit({ query: input.value, data: _item });
      return;
    }

    var max = list.count() - 1;
    if (max < 0) {
      return;
    }

    // eslint-disable-next-line no-bitwise
    var next = event.code === 'ArrowDown' ? ~~list.selected + 1 : ~~list.selected - 1;
    // eslint-disable-next-line no-nested-ternary
    var idx = next < 0 ? max : next > max ? 0 : next;

    var item = list.select(idx);
    input.value = item.label;
  },
  clearResults: function clearResults(event) {
    var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

    if (event && event.keyCode !== _constants.ESCAPE_KEY) {
      return;
    }

    var input = this.searchElement.elements.input;
    var _options3 = this.options,
        keepResult = _options3.keepResult,
        autoComplete = _options3.autoComplete;


    if (force || !keepResult) {
      input.value = '';
      this.markers.clearLayers();
    }

    if (autoComplete) {
      this.resultList.clear();
    }
  },
  autoSearch: function autoSearch(event) {
    return new Promise(function ($return, $error) {
      var query, provider, results;

      if (_constants.SPECIAL_KEYS.includes(event.keyCode)) {
        return $return();
      }

      query = event.target.value;
      provider = this.options.provider;


      if (query.length) {
        return provider.search({ query: query }).then(function ($await_2) {
          results = $await_2;
          this.resultList.render(results);
          return $If_1.call(this);
        }.$asyncbind(this, $error), $error);
      } else {
        this.resultList.clear();
        return $If_1.call(this);
      }

      function $If_1() {
        return $return();
      }
    }.$asyncbind(this));
  },
  onSubmit: function onSubmit(query) {
    return new Promise(function ($return, $error) {
      var provider, results;
      provider = this.options.provider;
      return provider.search(query).then(function ($await_3) {

        results = $await_3;

        if (results && results.length > 0) {
          this.showResult(results[0], query);
        }
        return $return();
      }.$asyncbind(this, $error), $error);
    }.$asyncbind(this));
  },
  showResult: function showResult(result, _ref3) {
    var query = _ref3.query;
    var autoClose = this.options.autoClose;


    var markers = Object.keys(this.markers._layers);
    if (markers.length >= this.options.maxMarkers) {
      this.markers.removeLayer(markers[0]);
    }

    var marker = this.addMarker(result, query);
    this.centerMap(result);

    this.map.fireEvent('geosearch/showlocation', {
      location: result,
      marker: marker
    });

    if (autoClose) {
      this.closeResults();
    }
  },
  closeResults: function closeResults() {
    var container = this.searchElement.elements.container;


    if (container.classList.contains('active')) {
      (0, _domUtils.removeClassName)(container, 'active');
    }

    this.restoreHandlers();
    this.clearResults();
  },
  addMarker: function addMarker(result, query) {
    var _this4 = this;

    var _options4 = this.options,
        options = _options4.marker,
        showPopup = _options4.showPopup,
        popupFormat = _options4.popupFormat;

    var marker = new L.Marker([result.y, result.x], options);
    var popupLabel = result.label;

    if (typeof popupFormat === 'function') {
      popupLabel = popupFormat({ query: query, result: result });
    }

    marker.bindPopup(popupLabel);

    this.markers.addLayer(marker);

    if (showPopup) {
      marker.openPopup();
    }

    if (options.draggable) {
      marker.on('dragend', function (args) {
        _this4.map.fireEvent('geosearch/marker/dragend', {
          location: marker.getLatLng(),
          event: args
        });
      });
    }

    return marker;
  },
  centerMap: function centerMap(result) {
    var _options5 = this.options,
        retainZoomLevel = _options5.retainZoomLevel,
        animateZoom = _options5.animateZoom;


    var resultBounds = new L.LatLngBounds(result.bounds);
    var bounds = resultBounds.isValid() ? resultBounds : this.markers.getBounds();

    if (!retainZoomLevel && resultBounds.isValid()) {
      this.map.fitBounds(bounds, { animate: animateZoom });
    } else {
      this.map.setView(bounds.getCenter(), this.getZoom(), { animate: animateZoom });
    }
  },
  getZoom: function getZoom() {
    var _options6 = this.options,
        retainZoomLevel = _options6.retainZoomLevel,
        zoomLevel = _options6.zoomLevel;

    return retainZoomLevel ? this.map.getZoom() : zoomLevel;
  }
};

function LeafletControl() {
  if (!L || !L.Control || !L.Control.extend) {
    throw new Error('Leaflet must be loaded before instantiating the GeoSearch control');
  }

  var LControl = L.Control.extend(Control);

  for (var _len = arguments.length, options = Array(_len), _key = 0; _key < _len; _key++) {
    options[_key] = arguments[_key];
  }

  return new (Function.prototype.bind.apply(LControl, [null].concat(options)))();
}

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/providers/bingProvider.js":
/*!**********************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/providers/bingProvider.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _nodentRuntime = __webpack_require__(/*! nodent-runtime */ "./node_modules/nodent-runtime/runtime.js");

var _nodentRuntime2 = _interopRequireDefault(_nodentRuntime);

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _provider = __webpack_require__(/*! ./provider */ "./node_modules/leaflet-geosearch/lib/providers/provider.js");

var _provider2 = _interopRequireDefault(_provider);

var _domUtils = __webpack_require__(/*! ../domUtils */ "./node_modules/leaflet-geosearch/lib/domUtils.js");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Provider = function (_BaseProvider) {
  _inherits(Provider, _BaseProvider);

  function Provider() {
    _classCallCheck(this, Provider);

    return _possibleConstructorReturn(this, (Provider.__proto__ || Object.getPrototypeOf(Provider)).apply(this, arguments));
  }

  _createClass(Provider, [{
    key: 'endpoint',
    value: function endpoint() {
      var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
          query = _ref.query,
          protocol = _ref.protocol,
          jsonp = _ref.jsonp;

      var params = this.options.params;


      var paramString = this.getParamString(_extends({}, params, {
        query: query,
        jsonp: jsonp
      }));

      return protocol + '//dev.virtualearth.net/REST/v1/Locations?' + paramString;
    }
  }, {
    key: 'parse',
    value: function parse(_ref2) {
      var data = _ref2.data;

      if (data.resourceSets.length === 0) {
        return [];
      }

      return data.resourceSets[0].resources.map(function (r) {
        return {
          x: r.point.coordinates[1],
          y: r.point.coordinates[0],
          label: r.address.formattedAddress,
          bounds: [[r.bbox[0], r.bbox[1]], // s, w
          [r.bbox[2], r.bbox[3]]],
          raw: r
        };
      });
    }
  }, {
    key: 'search',
    value: function search(_ref3) {
      return new Promise(function ($return, $error) {
        var query, protocol, jsonp, url, json;
        query = _ref3.query;

        protocol = ~location.protocol.indexOf('http') ? location.protocol : 'https:';

        jsonp = 'BING_JSONP_CB_' + Date.now();
        url = this.endpoint({ query: query, protocol: protocol, jsonp: jsonp });

        return (0, _domUtils.createScriptElement)(url, jsonp).then(function ($await_1) {
          json = $await_1;
          return $return(this.parse({ data: json }));
        }.$asyncbind(this, $error), $error);
      }.$asyncbind(this));
    }
  }]);

  return Provider;
}(_provider2.default);

exports.default = Provider;

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/providers/esriProvider.js":
/*!**********************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/providers/esriProvider.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _provider = __webpack_require__(/*! ./provider */ "./node_modules/leaflet-geosearch/lib/providers/provider.js");

var _provider2 = _interopRequireDefault(_provider);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Provider = function (_BaseProvider) {
  _inherits(Provider, _BaseProvider);

  function Provider() {
    _classCallCheck(this, Provider);

    return _possibleConstructorReturn(this, (Provider.__proto__ || Object.getPrototypeOf(Provider)).apply(this, arguments));
  }

  _createClass(Provider, [{
    key: 'endpoint',
    value: function endpoint() {
      var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
          query = _ref.query,
          protocol = _ref.protocol;

      var params = this.options.params;


      var paramString = this.getParamString(_extends({}, params, {
        f: 'json',
        text: query
      }));

      return protocol + '//geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/find?' + paramString;
    }
  }, {
    key: 'parse',
    value: function parse(_ref2) {
      var data = _ref2.data;

      return data.locations.map(function (r) {
        return {
          x: r.feature.geometry.x,
          y: r.feature.geometry.y,
          label: r.name,
          bounds: [[r.extent.ymin, r.extent.xmin], // s, w
          [r.extent.ymax, r.extent.xmax]],
          raw: r
        };
      });
    }
  }]);

  return Provider;
}(_provider2.default);

exports.default = Provider;

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/providers/googleProvider.js":
/*!************************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/providers/googleProvider.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _provider = __webpack_require__(/*! ./provider */ "./node_modules/leaflet-geosearch/lib/providers/provider.js");

var _provider2 = _interopRequireDefault(_provider);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Provider = function (_BaseProvider) {
  _inherits(Provider, _BaseProvider);

  function Provider() {
    _classCallCheck(this, Provider);

    return _possibleConstructorReturn(this, (Provider.__proto__ || Object.getPrototypeOf(Provider)).apply(this, arguments));
  }

  _createClass(Provider, [{
    key: 'endpoint',
    value: function endpoint() {
      var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
          query = _ref.query,
          protocol = _ref.protocol;

      var params = this.options.params;


      var paramString = this.getParamString(_extends({}, params, {
        address: query
      }));

      // google requires a secure connection when using api keys
      var proto = params && params.key ? 'https:' : protocol;
      return proto + '//maps.googleapis.com/maps/api/geocode/json?' + paramString;
    }
  }, {
    key: 'parse',
    value: function parse(_ref2) {
      var data = _ref2.data;

      return data.results.map(function (r) {
        return {
          x: r.geometry.location.lng,
          y: r.geometry.location.lat,
          label: r.formatted_address,
          bounds: [[r.geometry.viewport.southwest.lat, r.geometry.viewport.southwest.lng], // s, w
          [r.geometry.viewport.northeast.lat, r.geometry.viewport.northeast.lng]],
          raw: r
        };
      });
    }
  }]);

  return Provider;
}(_provider2.default);

exports.default = Provider;

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/providers/openStreetMapProvider.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/providers/openStreetMapProvider.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _nodentRuntime = __webpack_require__(/*! nodent-runtime */ "./node_modules/nodent-runtime/runtime.js");

var _nodentRuntime2 = _interopRequireDefault(_nodentRuntime);

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _provider = __webpack_require__(/*! ./provider */ "./node_modules/leaflet-geosearch/lib/providers/provider.js");

var _provider2 = _interopRequireDefault(_provider);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Provider = function (_BaseProvider) {
  _inherits(Provider, _BaseProvider);

  function Provider() {
    _classCallCheck(this, Provider);

    return _possibleConstructorReturn(this, (Provider.__proto__ || Object.getPrototypeOf(Provider)).apply(this, arguments));
  }

  _createClass(Provider, [{
    key: 'endpoint',
    value: function endpoint() {
      var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
          query = _ref.query;

      var params = this.options.params;


      var paramString = this.getParamString(_extends({}, params, {
        format: 'json',
        q: query
      }));

      return 'https://nominatim.openstreetmap.org/search?' + paramString;
    }
  }, {
    key: 'endpointReverse',
    value: function endpointReverse() {
      var _ref2 = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
          data = _ref2.data;

      var params = this.options.params;


      var paramString = this.getParamString(_extends({}, params, {
        format: 'json',
        // eslint-disable-next-line camelcase
        osm_id: data.raw.osm_id,
        // eslint-disable-next-line camelcase
        osm_type: this.translateOsmType(data.raw.osm_type)
      }));

      return 'https://nominatim.openstreetmap.org/reverse?' + paramString;
    }
  }, {
    key: 'parse',
    value: function parse(_ref3) {
      var data = _ref3.data;

      return data.map(function (r) {
        return {
          x: r.lon,
          y: r.lat,
          label: r.display_name,
          bounds: [[parseFloat(r.boundingbox[0]), parseFloat(r.boundingbox[2])], // s, w
          [parseFloat(r.boundingbox[1]), parseFloat(r.boundingbox[3])]],
          raw: r
        };
      });
    }
  }, {
    key: 'search',
    value: function search(_ref4) {
      return new Promise(function ($return, $error) {
        var query, data, protocol, url, request, json;
        query = _ref4.query, data = _ref4.data;

        protocol = ~location.protocol.indexOf('http') ? location.protocol : 'https:';

        url = data ? this.endpointReverse({ data: data, protocol: protocol }) : this.endpoint({ query: query, protocol: protocol });

        return fetch(url).then(function ($await_1) {
          request = $await_1;
          return request.json().then(function ($await_2) {
            json = $await_2;
            return $return(this.parse({ data: data ? [json] : json }));
          }.$asyncbind(this, $error), $error);
        }.$asyncbind(this, $error), $error);
      }.$asyncbind(this));
    }
  }, {
    key: 'translateOsmType',
    value: function translateOsmType(type) {
      if (type === 'node') return 'N';
      if (type === 'way') return 'W';
      if (type === 'relation') return 'R';
      return ''; // Unknown
    }
  }]);

  return Provider;
}(_provider2.default);

exports.default = Provider;

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/providers/provider.js":
/*!******************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/providers/provider.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _nodentRuntime = __webpack_require__(/*! nodent-runtime */ "./node_modules/nodent-runtime/runtime.js");

var _nodentRuntime2 = _interopRequireDefault(_nodentRuntime);

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Provider = function () {
  function Provider() {
    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    _classCallCheck(this, Provider);

    this.options = options;
  }

  _createClass(Provider, [{
    key: 'getParamString',
    value: function getParamString(params) {
      return Object.keys(params).map(function (key) {
        return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
      }).join('&');
    }
  }, {
    key: 'search',
    value: function search(_ref) {
      return new Promise(function ($return, $error) {
        var query, protocol, url, request, json;
        query = _ref.query;

        protocol = ~location.protocol.indexOf('http') ? location.protocol : 'https:';
        url = this.endpoint({ query: query, protocol: protocol });

        return fetch(url).then(function ($await_1) {
          request = $await_1;
          return request.json().then(function ($await_2) {
            json = $await_2;
            return $return(this.parse({ data: json }));
          }.$asyncbind(this, $error), $error);
        }.$asyncbind(this, $error), $error);
      }.$asyncbind(this));
    }
  }]);

  return Provider;
}();

exports.default = Provider;

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/resultList.js":
/*!**********************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/resultList.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _domUtils = __webpack_require__(/*! ./domUtils */ "./node_modules/leaflet-geosearch/lib/domUtils.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var cx = function cx() {
  for (var _len = arguments.length, classnames = Array(_len), _key = 0; _key < _len; _key++) {
    classnames[_key] = arguments[_key];
  }

  return classnames.join(' ').trim();
};

var ResultList = function () {
  function ResultList() {
    var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
        _ref$handleClick = _ref.handleClick,
        handleClick = _ref$handleClick === undefined ? function () {} : _ref$handleClick,
        _ref$classNames = _ref.classNames,
        classNames = _ref$classNames === undefined ? {} : _ref$classNames;

    _classCallCheck(this, ResultList);

    _initialiseProps.call(this);

    this.props = { handleClick: handleClick, classNames: classNames };
    this.selected = -1;

    var container = (0, _domUtils.createElement)('div', cx('results', classNames.container));
    var resultItem = (0, _domUtils.createElement)('div', cx(classNames.item));

    container.addEventListener('click', this.onClick, true);
    this.elements = { container: container, resultItem: resultItem };
  }

  _createClass(ResultList, [{
    key: 'render',
    value: function render() {
      var results = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
      var _elements = this.elements,
          container = _elements.container,
          resultItem = _elements.resultItem;

      this.clear();

      results.forEach(function (result, idx) {
        var child = resultItem.cloneNode(true);
        child.setAttribute('data-key', idx);
        child.innerHTML = result.label;
        container.appendChild(child);
      });

      if (results.length > 0) {
        (0, _domUtils.addClassName)(container, 'active');
      }

      this.results = results;
    }
  }, {
    key: 'select',
    value: function select(index) {
      var container = this.elements.container;

      // eslint-disable-next-line no-confusing-arrow

      Array.from(container.children).forEach(function (child, idx) {
        return idx === index ? (0, _domUtils.addClassName)(child, 'active') : (0, _domUtils.removeClassName)(child, 'active');
      });

      this.selected = index;
      return this.results[index];
    }
  }, {
    key: 'count',
    value: function count() {
      return this.results ? this.results.length : 0;
    }
  }, {
    key: 'clear',
    value: function clear() {
      var container = this.elements.container;

      this.selected = -1;

      while (container.lastChild) {
        container.removeChild(container.lastChild);
      }

      (0, _domUtils.removeClassName)(container, 'active');
    }
  }]);

  return ResultList;
}();

var _initialiseProps = function _initialiseProps() {
  var _this = this;

  this.onClick = function () {
    var _ref2 = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
        target = _ref2.target;

    var handleClick = _this.props.handleClick;
    var container = _this.elements.container;


    if (target.parentNode !== container || !target.hasAttribute('data-key')) {
      return;
    }

    var idx = target.getAttribute('data-key');
    var result = _this.results[idx];
    handleClick({ result: result });
  };
};

exports.default = ResultList;

/***/ }),

/***/ "./node_modules/leaflet-geosearch/lib/searchElement.js":
/*!*************************************************************!*\
  !*** ./node_modules/leaflet-geosearch/lib/searchElement.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _nodentRuntime = __webpack_require__(/*! nodent-runtime */ "./node_modules/nodent-runtime/runtime.js");

var _nodentRuntime2 = _interopRequireDefault(_nodentRuntime);

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _domUtils = __webpack_require__(/*! ./domUtils */ "./node_modules/leaflet-geosearch/lib/domUtils.js");

var _constants = __webpack_require__(/*! ./constants */ "./node_modules/leaflet-geosearch/lib/constants.js");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var SearchElement = function () {
  function SearchElement() {
    var _this = this;

    var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
        _ref$handleSubmit = _ref.handleSubmit,
        handleSubmit = _ref$handleSubmit === undefined ? function () {} : _ref$handleSubmit,
        _ref$searchLabel = _ref.searchLabel,
        searchLabel = _ref$searchLabel === undefined ? 'search' : _ref$searchLabel,
        _ref$classNames = _ref.classNames,
        classNames = _ref$classNames === undefined ? {} : _ref$classNames;

    _classCallCheck(this, SearchElement);

    var container = (0, _domUtils.createElement)('div', ['geosearch', classNames.container].join(' '));
    var form = (0, _domUtils.createElement)('form', ['', classNames.form].join(' '), container);
    var input = (0, _domUtils.createElement)('input', ['glass', classNames.input].join(' '), form);

    input.type = 'text';
    input.placeholder = searchLabel;

    input.addEventListener('input', function (e) {
      _this.onInput(e);
    }, false);
    input.addEventListener('keyup', function (e) {
      _this.onKeyUp(e);
    }, false);
    input.addEventListener('keypress', function (e) {
      _this.onKeyPress(e);
    }, false);
    input.addEventListener('focus', function (e) {
      _this.onFocus(e);
    }, false);
    input.addEventListener('blur', function (e) {
      _this.onBlur(e);
    }, false);

    this.elements = { container: container, form: form, input: input };
    this.handleSubmit = handleSubmit;
  }

  _createClass(SearchElement, [{
    key: 'onFocus',
    value: function onFocus() {
      (0, _domUtils.addClassName)(this.elements.form, 'active');
    }
  }, {
    key: 'onBlur',
    value: function onBlur() {
      (0, _domUtils.removeClassName)(this.elements.form, 'active');
    }
  }, {
    key: 'onSubmit',
    value: function onSubmit(event) {
      return new Promise(function ($return, $error) {
        var _elements, input, container;

        event.preventDefault();
        event.stopPropagation();

        _elements = this.elements, input = _elements.input, container = _elements.container;

        (0, _domUtils.removeClassName)(container, 'error');
        (0, _domUtils.addClassName)(container, 'pending');

        return this.handleSubmit({ query: input.value }).then(function ($await_1) {
          (0, _domUtils.removeClassName)(container, 'pending');
          return $return();
        }.$asyncbind(this, $error), $error);
      }.$asyncbind(this));
    }
  }, {
    key: 'onInput',
    value: function onInput() {
      var container = this.elements.container;


      if (this.hasError) {
        (0, _domUtils.removeClassName)(container, 'error');
        this.hasError = false;
      }
    }
  }, {
    key: 'onKeyUp',
    value: function onKeyUp(event) {
      var _elements2 = this.elements,
          container = _elements2.container,
          input = _elements2.input;


      if (event.keyCode === _constants.ESCAPE_KEY) {
        (0, _domUtils.removeClassName)(container, 'pending');
        (0, _domUtils.removeClassName)(container, 'active');

        input.value = '';

        document.body.focus();
        document.body.blur();
      }
    }
  }, {
    key: 'onKeyPress',
    value: function onKeyPress(event) {
      if (event.keyCode === _constants.ENTER_KEY) {
        this.onSubmit(event);
      }
    }
  }, {
    key: 'setQuery',
    value: function setQuery(query) {
      var input = this.elements.input;

      input.value = query;
    }
  }]);

  return SearchElement;
}();

exports.default = SearchElement;

/***/ }),

/***/ "./node_modules/lodash.debounce/index.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash.debounce/index.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/**
 * lodash (Custom Build) <https://lodash.com/>
 * Build: `lodash modularize exports="npm" -o ./`
 * Copyright jQuery Foundation and other contributors <https://jquery.org/>
 * Released under MIT license <https://lodash.com/license>
 * Based on Underscore.js 1.8.3 <http://underscorejs.org/LICENSE>
 * Copyright Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
 */

/** Used as the `TypeError` message for "Functions" methods. */
var FUNC_ERROR_TEXT = 'Expected a function';

/** Used as references for various `Number` constants. */
var NAN = 0 / 0;

/** `Object#toString` result references. */
var symbolTag = '[object Symbol]';

/** Used to match leading and trailing whitespace. */
var reTrim = /^\s+|\s+$/g;

/** Used to detect bad signed hexadecimal string values. */
var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;

/** Used to detect binary string values. */
var reIsBinary = /^0b[01]+$/i;

/** Used to detect octal string values. */
var reIsOctal = /^0o[0-7]+$/i;

/** Built-in method references without a dependency on `root`. */
var freeParseInt = parseInt;

/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof global == 'object' && global && global.Object === Object && global;

/** Detect free variable `self`. */
var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

/** Used as a reference to the global object. */
var root = freeGlobal || freeSelf || Function('return this')();

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var objectToString = objectProto.toString;

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeMax = Math.max,
    nativeMin = Math.min;

/**
 * Gets the timestamp of the number of milliseconds that have elapsed since
 * the Unix epoch (1 January 1970 00:00:00 UTC).
 *
 * @static
 * @memberOf _
 * @since 2.4.0
 * @category Date
 * @returns {number} Returns the timestamp.
 * @example
 *
 * _.defer(function(stamp) {
 *   console.log(_.now() - stamp);
 * }, _.now());
 * // => Logs the number of milliseconds it took for the deferred invocation.
 */
var now = function() {
  return root.Date.now();
};

/**
 * Creates a debounced function that delays invoking `func` until after `wait`
 * milliseconds have elapsed since the last time the debounced function was
 * invoked. The debounced function comes with a `cancel` method to cancel
 * delayed `func` invocations and a `flush` method to immediately invoke them.
 * Provide `options` to indicate whether `func` should be invoked on the
 * leading and/or trailing edge of the `wait` timeout. The `func` is invoked
 * with the last arguments provided to the debounced function. Subsequent
 * calls to the debounced function return the result of the last `func`
 * invocation.
 *
 * **Note:** If `leading` and `trailing` options are `true`, `func` is
 * invoked on the trailing edge of the timeout only if the debounced function
 * is invoked more than once during the `wait` timeout.
 *
 * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
 * until to the next tick, similar to `setTimeout` with a timeout of `0`.
 *
 * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
 * for details over the differences between `_.debounce` and `_.throttle`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to debounce.
 * @param {number} [wait=0] The number of milliseconds to delay.
 * @param {Object} [options={}] The options object.
 * @param {boolean} [options.leading=false]
 *  Specify invoking on the leading edge of the timeout.
 * @param {number} [options.maxWait]
 *  The maximum time `func` is allowed to be delayed before it's invoked.
 * @param {boolean} [options.trailing=true]
 *  Specify invoking on the trailing edge of the timeout.
 * @returns {Function} Returns the new debounced function.
 * @example
 *
 * // Avoid costly calculations while the window size is in flux.
 * jQuery(window).on('resize', _.debounce(calculateLayout, 150));
 *
 * // Invoke `sendMail` when clicked, debouncing subsequent calls.
 * jQuery(element).on('click', _.debounce(sendMail, 300, {
 *   'leading': true,
 *   'trailing': false
 * }));
 *
 * // Ensure `batchLog` is invoked once after 1 second of debounced calls.
 * var debounced = _.debounce(batchLog, 250, { 'maxWait': 1000 });
 * var source = new EventSource('/stream');
 * jQuery(source).on('message', debounced);
 *
 * // Cancel the trailing debounced invocation.
 * jQuery(window).on('popstate', debounced.cancel);
 */
function debounce(func, wait, options) {
  var lastArgs,
      lastThis,
      maxWait,
      result,
      timerId,
      lastCallTime,
      lastInvokeTime = 0,
      leading = false,
      maxing = false,
      trailing = true;

  if (typeof func != 'function') {
    throw new TypeError(FUNC_ERROR_TEXT);
  }
  wait = toNumber(wait) || 0;
  if (isObject(options)) {
    leading = !!options.leading;
    maxing = 'maxWait' in options;
    maxWait = maxing ? nativeMax(toNumber(options.maxWait) || 0, wait) : maxWait;
    trailing = 'trailing' in options ? !!options.trailing : trailing;
  }

  function invokeFunc(time) {
    var args = lastArgs,
        thisArg = lastThis;

    lastArgs = lastThis = undefined;
    lastInvokeTime = time;
    result = func.apply(thisArg, args);
    return result;
  }

  function leadingEdge(time) {
    // Reset any `maxWait` timer.
    lastInvokeTime = time;
    // Start the timer for the trailing edge.
    timerId = setTimeout(timerExpired, wait);
    // Invoke the leading edge.
    return leading ? invokeFunc(time) : result;
  }

  function remainingWait(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime,
        result = wait - timeSinceLastCall;

    return maxing ? nativeMin(result, maxWait - timeSinceLastInvoke) : result;
  }

  function shouldInvoke(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime;

    // Either this is the first call, activity has stopped and we're at the
    // trailing edge, the system time has gone backwards and we're treating
    // it as the trailing edge, or we've hit the `maxWait` limit.
    return (lastCallTime === undefined || (timeSinceLastCall >= wait) ||
      (timeSinceLastCall < 0) || (maxing && timeSinceLastInvoke >= maxWait));
  }

  function timerExpired() {
    var time = now();
    if (shouldInvoke(time)) {
      return trailingEdge(time);
    }
    // Restart the timer.
    timerId = setTimeout(timerExpired, remainingWait(time));
  }

  function trailingEdge(time) {
    timerId = undefined;

    // Only invoke if we have `lastArgs` which means `func` has been
    // debounced at least once.
    if (trailing && lastArgs) {
      return invokeFunc(time);
    }
    lastArgs = lastThis = undefined;
    return result;
  }

  function cancel() {
    if (timerId !== undefined) {
      clearTimeout(timerId);
    }
    lastInvokeTime = 0;
    lastArgs = lastCallTime = lastThis = timerId = undefined;
  }

  function flush() {
    return timerId === undefined ? result : trailingEdge(now());
  }

  function debounced() {
    var time = now(),
        isInvoking = shouldInvoke(time);

    lastArgs = arguments;
    lastThis = this;
    lastCallTime = time;

    if (isInvoking) {
      if (timerId === undefined) {
        return leadingEdge(lastCallTime);
      }
      if (maxing) {
        // Handle invocations in a tight loop.
        timerId = setTimeout(timerExpired, wait);
        return invokeFunc(lastCallTime);
      }
    }
    if (timerId === undefined) {
      timerId = setTimeout(timerExpired, wait);
    }
    return result;
  }
  debounced.cancel = cancel;
  debounced.flush = flush;
  return debounced;
}

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return !!value && (type == 'object' || type == 'function');
}

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return !!value && typeof value == 'object';
}

/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */
function isSymbol(value) {
  return typeof value == 'symbol' ||
    (isObjectLike(value) && objectToString.call(value) == symbolTag);
}

/**
 * Converts `value` to a number.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to process.
 * @returns {number} Returns the number.
 * @example
 *
 * _.toNumber(3.2);
 * // => 3.2
 *
 * _.toNumber(Number.MIN_VALUE);
 * // => 5e-324
 *
 * _.toNumber(Infinity);
 * // => Infinity
 *
 * _.toNumber('3.2');
 * // => 3.2
 */
function toNumber(value) {
  if (typeof value == 'number') {
    return value;
  }
  if (isSymbol(value)) {
    return NAN;
  }
  if (isObject(value)) {
    var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
    value = isObject(other) ? (other + '') : other;
  }
  if (typeof value != 'string') {
    return value === 0 ? value : +value;
  }
  value = value.replace(reTrim, '');
  var isBinary = reIsBinary.test(value);
  return (isBinary || reIsOctal.test(value))
    ? freeParseInt(value.slice(2), isBinary ? 2 : 8)
    : (reIsBadHex.test(value) ? NAN : +value);
}

module.exports = debounce;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/nodent-runtime/runtime.js":
/*!************************************************!*\
  !*** ./node_modules/nodent-runtime/runtime.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

/*
 * $asyncbind has multiple uses, depending on the parameter list. It is in Function.prototype, so 'this' is always a function
 *
 * 1) If called with a single argument (this), it is used when defining an async function to ensure when
 *      it is invoked, the correct 'this' is present, just like "bind". For legacy reasons, 'this' is given
 *      a memeber 'then' which refers to itself.
 * 2) If called with a second parameter ("catcher") and catcher!==true it is being used to invoke an async
 *      function where the second parameter is the error callback (for sync exceptions and to be passed to
 *      nested async calls)
 * 3) If called with the second parameter===true, it is the same use as (1), but the function is wrapped
 *      in an 'Promise' as well bound to 'this'.
 *      It is the same as calling 'new Promise(this)', where 'this' is the function being bound/wrapped
 * 4) If called with the second parameter===0, it is the same use as (1), but the function is wrapped
 *      in a 'LazyThenable', which executes lazily and can resolve synchronously.
 *      It is the same as calling 'new LazyThenable(this)' (if such a type were exposed), where 'this' is
 *      the function being bound/wrapped
 */

function processIncludes(includes,input) {
    var src = input.toString() ;
    var t = "return "+src ;
    var args = src.match(/.*\(([^)]*)\)/)[1] ;
    var re = /['"]!!!([^'"]*)['"]/g ;
    var m = [] ;
    while (1) {
        var mx = re.exec(t) ;
        if (mx)
            m.push(mx) ;
        else break ;
    }
    m.reverse().forEach(function(e){
        t = t.slice(0,e.index)+includes[e[1]]+t.substr(e.index+e[0].length) ;
    }) ;
    t = t.replace(/\/\*[^*]*\*\//g,' ').replace(/\s+/g,' ') ;
    return new Function(args,t)() ;
}

var $asyncbind = processIncludes({
    zousan:__webpack_require__(/*! ./zousan */ "./node_modules/nodent-runtime/zousan.js").toString(),
    thenable:__webpack_require__(/*! ./thenableFactory */ "./node_modules/nodent-runtime/thenableFactory.js").toString()
},
function $asyncbind(self,catcher) {
    "use strict";
    if (!Function.prototype.$asyncbind) {
        Object.defineProperty(Function.prototype,"$asyncbind",{value:$asyncbind,enumerable:false,configurable:true,writable:true}) ;
    }

    if (!$asyncbind.trampoline) {
      $asyncbind.trampoline = function trampoline(t,x,s,e,u){
        return function b(q) {
                while (q) {
                    if (q.then) {
                        q = q.then(b, e) ;
                        return u?undefined:q;
                    }
                    try {
                        if (q.pop) {
                            if (q.length)
                              return q.pop() ? x.call(t) : q;
                            q = s;
                         } else
                            q = q.call(t)
                    } catch (r) {
                        return e(r);
                    }
                }
            }
        };
    }
    if (!$asyncbind.LazyThenable) {
        $asyncbind.LazyThenable = '!!!thenable'();
        $asyncbind.EagerThenable = $asyncbind.Thenable = ($asyncbind.EagerThenableFactory = '!!!zousan')();
    }

    function boundThen() {
        return resolver.apply(self,arguments);
    }

    var resolver = this;
    switch (catcher) {
    case true:
        return new ($asyncbind.Thenable)(boundThen);
    case 0:
        return new ($asyncbind.LazyThenable)(boundThen);
    case undefined:
        /* For runtime compatibility with Nodent v2.x, provide a thenable */
        boundThen.then = boundThen ;
        return boundThen ;
    default:
        return function(){
            try {
                return resolver.apply(self,arguments);
            } catch(ex) {
                return catcher(ex);
            }
        }
    }

}) ;

function $asyncspawn(promiseProvider,self) {
    if (!Function.prototype.$asyncspawn) {
        Object.defineProperty(Function.prototype,"$asyncspawn",{value:$asyncspawn,enumerable:false,configurable:true,writable:true}) ;
    }
    if (!(this instanceof Function)) return ;

    var genF = this ;
    return new promiseProvider(function enough(resolve, reject) {
        var gen = genF.call(self, resolve, reject);
        function step(fn,arg) {
            var next;
            try {
                next = fn.call(gen,arg);
                if(next.done) {
                    if (next.value !== resolve) {
                        if (next.value && next.value===next.value.then)
                            return next.value(resolve,reject) ;
                        resolve && resolve(next.value);
                        resolve = null ;
                    }
                    return;
                }

                if (next.value.then) {
                    next.value.then(function(v) {
                        step(gen.next,v);
                    }, function(e) {
                        step(gen.throw,e);
                    });
                } else {
                    step(gen.next,next.value);
                }
            } catch(e) {
                reject && reject(e);
                reject = null ;
                return;
            }
        }
        step(gen.next);
    });
}

// Initialize async bindings
$asyncbind() ;
$asyncspawn() ;

// Export async bindings
module.exports = {
    $asyncbind:$asyncbind,
    $asyncspawn:$asyncspawn
};


/***/ }),

/***/ "./node_modules/nodent-runtime/thenableFactory.js":
/*!********************************************************!*\
  !*** ./node_modules/nodent-runtime/thenableFactory.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function() {
    function isThenable(obj) {
        return obj && (obj instanceof Object) && typeof obj.then==="function";
    }

    function resolution(p,r,how) {
        try {
            /* 2.2.7.1 */
            var x = how ? how(r):r ;

            if (p===x) /* 2.3.1 */
                return p.reject(new TypeError("Promise resolution loop")) ;

            if (isThenable(x)) {
                /* 2.3.3 */
                x.then(function(y){
                    resolution(p,y);
                },function(e){
                    p.reject(e)
                }) ;
            } else {
                p.resolve(x) ;
            }
        } catch (ex) {
            /* 2.2.7.2 */
            p.reject(ex) ;
        }
    }

    function _unchained(v){}
    function thenChain(res,rej){
        this.resolve = res;
        this.reject = rej;
    }

    function Chained() {};
    Chained.prototype = {
        resolve:_unchained,
        reject:_unchained,
        then:thenChain
    };
    
    function then(res,rej){
        var chain = new Chained() ;
        try {
            this._resolver(function(value) {
                return isThenable(value) ? value.then(res,rej) : resolution(chain,value,res);
            },function(ex) {
                resolution(chain,ex,rej) ;
            }) ;
        } catch (ex) {
            resolution(chain,ex,rej);
        }
        return chain ;
    }

    function Thenable(resolver) {
        this._resolver = resolver ;
        this.then = then ;
    };

    Thenable.resolve = function(v){
        return Thenable.isThenable(v) ? v : {then:function(resolve){return resolve(v)}};
    };

    Thenable.isThenable = isThenable ;

    return Thenable ;
} ;


/***/ }),

/***/ "./node_modules/nodent-runtime/zousan.js":
/*!***********************************************!*\
  !*** ./node_modules/nodent-runtime/zousan.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(process, setImmediate) {/* This code is based on:
zousan - A Lightning Fast, Yet Very Small Promise A+ Compliant Implementation
https://github.com/bluejava/zousan
Author: Glenn Crownover <glenn@bluejava.com> (http://www.bluejava.com)
Version 2.3.3
License: MIT */

module.exports = function(tick){
    tick = tick || (typeof process==="object" && process.nextTick) || (typeof setImmediate==="function" && setImmediate) || function(f){setTimeout(f,0)};
    var soon = (function () {
        var fq = [], fqStart = 0, bufferSize = 1024;
        function callQueue() {
            while (fq.length - fqStart) {
                try { fq[fqStart]() } catch(ex) { /* console.error(ex) */ }
                fq[fqStart++] = undefined;
                if (fqStart === bufferSize) {
                    fq.splice(0, bufferSize);
                    fqStart = 0;
                }
            }
        }

        return function (fn) {
            fq.push(fn);
            if (fq.length - fqStart === 1)
                tick(callQueue);
        };
    })();

    function Zousan(func) {
        if (func) {
            var me = this;
            func(function (arg) {
                me.resolve(arg);
            }, function (arg) {
                me.reject(arg);
            });
        }
    }

    Zousan.prototype = {
        resolve: function (value) {
            if (this.state !== undefined)
                return;
            if (value === this)
                return this.reject(new TypeError("Attempt to resolve promise with self"));
            var me = this;
            if (value && (typeof value === "function" || typeof value === "object")) {
                try {
                    var first = 0;
                    var then = value.then;
                    if (typeof then === "function") {
                        then.call(value, function (ra) {
                            if (!first++) {
                                me.resolve(ra);
                            }
                        }, function (rr) {
                            if (!first++) {
                                me.reject(rr);
                            }
                        });
                        return;
                    }
                } catch (e) {
                    if (!first)
                        this.reject(e);
                    return;
                }
            }
            this.state = STATE_FULFILLED;
            this.v = value;
            if (me.c)
                soon(function () {
                    for (var n = 0, l = me.c.length;n < l; n++)
                        STATE_FULFILLED(me.c[n], value);
                });
        },
        reject: function (reason) {
            if (this.state !== undefined)
                return;
            this.state = STATE_REJECTED;
            this.v = reason;
            var clients = this.c;
            if (clients)
                soon(function () {
                    for (var n = 0, l = clients.length;n < l; n++)
                        STATE_REJECTED(clients[n], reason);
                });
        },
        then: function (onF, onR) {
            var p = new Zousan();
            var client = {
                y: onF,
                n: onR,
                p: p
            };
            if (this.state === undefined) {
                if (this.c)
                    this.c.push(client);
                else
                    this.c = [client];
            } else {
                var s = this.state, a = this.v;
                soon(function () {
                    s(client, a);
                });
            }
            return p;
        }
    };

    function STATE_FULFILLED(c, arg) {
        if (typeof c.y === "function") {
            try {
                var yret = c.y.call(undefined, arg);
                c.p.resolve(yret);
            } catch (err) {
                c.p.reject(err);
            }
        } else
            c.p.resolve(arg);
    }

    function STATE_REJECTED(c, reason) {
        if (typeof c.n === "function") {
            try {
                var yret = c.n.call(undefined, reason);
                c.p.resolve(yret);
            } catch (err) {
                c.p.reject(err);
            }
        } else
            c.p.reject(reason);
    }

    Zousan.resolve = function (val) {
        if (val && (val instanceof Zousan))
            return val ;
        var z = new Zousan();
        z.resolve(val);
        return z;
    };
    Zousan.reject = function (err) {
        if (err && (err instanceof Zousan))
            return err ;
        var z = new Zousan();
        z.reject(err);
        return z;
    };

    Zousan.version = "2.3.3-nodent" ;
    return Zousan ;
};

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../process/browser.js */ "./node_modules/process/browser.js"), __webpack_require__(/*! ./../timers-browserify/main.js */ "./node_modules/timers-browserify/main.js").setImmediate))

/***/ }),

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),

/***/ "./node_modules/setimmediate/setImmediate.js":
/*!***************************************************!*\
  !*** ./node_modules/setimmediate/setImmediate.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global, process) {(function (global, undefined) {
    "use strict";

    if (global.setImmediate) {
        return;
    }

    var nextHandle = 1; // Spec says greater than zero
    var tasksByHandle = {};
    var currentlyRunningATask = false;
    var doc = global.document;
    var registerImmediate;

    function setImmediate(callback) {
      // Callback can either be a function or a string
      if (typeof callback !== "function") {
        callback = new Function("" + callback);
      }
      // Copy function arguments
      var args = new Array(arguments.length - 1);
      for (var i = 0; i < args.length; i++) {
          args[i] = arguments[i + 1];
      }
      // Store and register the task
      var task = { callback: callback, args: args };
      tasksByHandle[nextHandle] = task;
      registerImmediate(nextHandle);
      return nextHandle++;
    }

    function clearImmediate(handle) {
        delete tasksByHandle[handle];
    }

    function run(task) {
        var callback = task.callback;
        var args = task.args;
        switch (args.length) {
        case 0:
            callback();
            break;
        case 1:
            callback(args[0]);
            break;
        case 2:
            callback(args[0], args[1]);
            break;
        case 3:
            callback(args[0], args[1], args[2]);
            break;
        default:
            callback.apply(undefined, args);
            break;
        }
    }

    function runIfPresent(handle) {
        // From the spec: "Wait until any invocations of this algorithm started before this one have completed."
        // So if we're currently running a task, we'll need to delay this invocation.
        if (currentlyRunningATask) {
            // Delay by doing a setTimeout. setImmediate was tried instead, but in Firefox 7 it generated a
            // "too much recursion" error.
            setTimeout(runIfPresent, 0, handle);
        } else {
            var task = tasksByHandle[handle];
            if (task) {
                currentlyRunningATask = true;
                try {
                    run(task);
                } finally {
                    clearImmediate(handle);
                    currentlyRunningATask = false;
                }
            }
        }
    }

    function installNextTickImplementation() {
        registerImmediate = function(handle) {
            process.nextTick(function () { runIfPresent(handle); });
        };
    }

    function canUsePostMessage() {
        // The test against `importScripts` prevents this implementation from being installed inside a web worker,
        // where `global.postMessage` means something completely different and can't be used for this purpose.
        if (global.postMessage && !global.importScripts) {
            var postMessageIsAsynchronous = true;
            var oldOnMessage = global.onmessage;
            global.onmessage = function() {
                postMessageIsAsynchronous = false;
            };
            global.postMessage("", "*");
            global.onmessage = oldOnMessage;
            return postMessageIsAsynchronous;
        }
    }

    function installPostMessageImplementation() {
        // Installs an event handler on `global` for the `message` event: see
        // * https://developer.mozilla.org/en/DOM/window.postMessage
        // * http://www.whatwg.org/specs/web-apps/current-work/multipage/comms.html#crossDocumentMessages

        var messagePrefix = "setImmediate$" + Math.random() + "$";
        var onGlobalMessage = function(event) {
            if (event.source === global &&
                typeof event.data === "string" &&
                event.data.indexOf(messagePrefix) === 0) {
                runIfPresent(+event.data.slice(messagePrefix.length));
            }
        };

        if (global.addEventListener) {
            global.addEventListener("message", onGlobalMessage, false);
        } else {
            global.attachEvent("onmessage", onGlobalMessage);
        }

        registerImmediate = function(handle) {
            global.postMessage(messagePrefix + handle, "*");
        };
    }

    function installMessageChannelImplementation() {
        var channel = new MessageChannel();
        channel.port1.onmessage = function(event) {
            var handle = event.data;
            runIfPresent(handle);
        };

        registerImmediate = function(handle) {
            channel.port2.postMessage(handle);
        };
    }

    function installReadyStateChangeImplementation() {
        var html = doc.documentElement;
        registerImmediate = function(handle) {
            // Create a <script> element; its readystatechange event will be fired asynchronously once it is inserted
            // into the document. Do so, thus queuing up the task. Remember to clean up once it's been called.
            var script = doc.createElement("script");
            script.onreadystatechange = function () {
                runIfPresent(handle);
                script.onreadystatechange = null;
                html.removeChild(script);
                script = null;
            };
            html.appendChild(script);
        };
    }

    function installSetTimeoutImplementation() {
        registerImmediate = function(handle) {
            setTimeout(runIfPresent, 0, handle);
        };
    }

    // If supported, we should attach to the prototype of global, since that is where setTimeout et al. live.
    var attachTo = Object.getPrototypeOf && Object.getPrototypeOf(global);
    attachTo = attachTo && attachTo.setTimeout ? attachTo : global;

    // Don't get fooled by e.g. browserify environments.
    if ({}.toString.call(global.process) === "[object process]") {
        // For Node.js before 0.9
        installNextTickImplementation();

    } else if (canUsePostMessage()) {
        // For non-IE10 modern browsers
        installPostMessageImplementation();

    } else if (global.MessageChannel) {
        // For web workers, where supported
        installMessageChannelImplementation();

    } else if (doc && "onreadystatechange" in doc.createElement("script")) {
        // For IE 6–8
        installReadyStateChangeImplementation();

    } else {
        // For older browsers
        installSetTimeoutImplementation();
    }

    attachTo.setImmediate = setImmediate;
    attachTo.clearImmediate = clearImmediate;
}(typeof self === "undefined" ? typeof global === "undefined" ? this : global : self));

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js"), __webpack_require__(/*! ./../process/browser.js */ "./node_modules/process/browser.js")))

/***/ }),

/***/ "./node_modules/timers-browserify/main.js":
/*!************************************************!*\
  !*** ./node_modules/timers-browserify/main.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var scope = (typeof global !== "undefined" && global) ||
            (typeof self !== "undefined" && self) ||
            window;
var apply = Function.prototype.apply;

// DOM APIs, for completeness

exports.setTimeout = function() {
  return new Timeout(apply.call(setTimeout, scope, arguments), clearTimeout);
};
exports.setInterval = function() {
  return new Timeout(apply.call(setInterval, scope, arguments), clearInterval);
};
exports.clearTimeout =
exports.clearInterval = function(timeout) {
  if (timeout) {
    timeout.close();
  }
};

function Timeout(id, clearFn) {
  this._id = id;
  this._clearFn = clearFn;
}
Timeout.prototype.unref = Timeout.prototype.ref = function() {};
Timeout.prototype.close = function() {
  this._clearFn.call(scope, this._id);
};

// Does not start the time, just sets up the members needed.
exports.enroll = function(item, msecs) {
  clearTimeout(item._idleTimeoutId);
  item._idleTimeout = msecs;
};

exports.unenroll = function(item) {
  clearTimeout(item._idleTimeoutId);
  item._idleTimeout = -1;
};

exports._unrefActive = exports.active = function(item) {
  clearTimeout(item._idleTimeoutId);

  var msecs = item._idleTimeout;
  if (msecs >= 0) {
    item._idleTimeoutId = setTimeout(function onTimeout() {
      if (item._onTimeout)
        item._onTimeout();
    }, msecs);
  }
};

// setimmediate attaches itself to the global object
__webpack_require__(/*! setimmediate */ "./node_modules/setimmediate/setImmediate.js");
// On some exotic environments, it's not clear which object `setimmediate` was
// able to install onto.  Search each possibility in the same order as the
// `setimmediate` library.
exports.setImmediate = (typeof self !== "undefined" && self.setImmediate) ||
                       (typeof global !== "undefined" && global.setImmediate) ||
                       (this && this.setImmediate);
exports.clearImmediate = (typeof self !== "undefined" && self.clearImmediate) ||
                         (typeof global !== "undefined" && global.clearImmediate) ||
                         (this && this.clearImmediate);

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./resources/js/placeAutocomplete.js":
/*!*******************************************!*\
  !*** ./resources/js/placeAutocomplete.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var leaflet_geosearch__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! leaflet-geosearch */ "./node_modules/leaflet-geosearch/lib/index.js");
/* harmony import */ var leaflet_geosearch__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(leaflet_geosearch__WEBPACK_IMPORTED_MODULE_0__);

var provider = new leaflet_geosearch__WEBPACK_IMPORTED_MODULE_0__["OpenStreetMapProvider"]();
var types = ['needrooms', 'offerrooms', 'needapartments', 'offerapartments'];
var type = types.includes(window.location.href.substring(window.location.href.lastIndexOf('/') + 1)) ? window.location.href.substring(window.location.href.lastIndexOf('/') + 1) : 'needrooms';
$('.searchtype').click(function (e) {
  e.preventDefault();

  if ($('#placesearch').val()) {
    $('.searchtype').removeClass('gr-active');
    $(this).addClass('gr-active');
    type = $(this).data('type');
  } else {
    window.location.href = $(this).attr('href');
  }
});
$('#placesearch').keyup(function (event) {
  var value = $(this).val();

  if (value.length >= 3) {
    provider.search({
      query: value
    }).then(function (result) {
      var dom = generateDom(result);
      $('#place-content').html(dom);
      $('#place-content').removeClass('d-none');
    });
  } else {
    $('#place-content').innerHTML = '';
    $('#place-content').addClass('d-none');
  }
});
$(document).on('click', '.address-item', function () {
  var location = $(this).text();
  var lat = $(this).data('lat');
  var lng = $(this).data('lng');
  $('#place-content').addClass('d-none');
  window.location.href = "/lists/".concat(type, "?loc=").concat(location, "&lat=").concat(lat, "&lng=").concat(lng);
});

function generateDom(result) {
  var html = "<ul class=\"list-group\">";

  if (result.length > 0) {
    result.forEach(function (element) {
      html += "\n                 <li class=\"list-group-item address-item\" data-lat=\"".concat(element.y, "\" data-lng=\"").concat(element.x, "\">").concat(element.label, "</li>\n            ");
    });
  } else {
    html += "\n                 <li class=\"list-group-item\">No result found</li>\n            ";
  }

  html += "</ul>";
  return html;
}

/***/ }),

/***/ 1:
/*!*************************************************!*\
  !*** multi ./resources/js/placeAutocomplete.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/itbd/www/getting-room/resources/js/placeAutocomplete.js */"./resources/js/placeAutocomplete.js");


/***/ })

/******/ });
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

/***/ "./resources/js/charts.js":
/*!********************************!*\
  !*** ./resources/js/charts.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.addEventListener("load", function () {
  var myChart = new Vue({
    el: '#charts',
    data: {
      monthsForQuery: ['2021-01', '2021-02', '2021-03', '2021-04', '2021-05', '2021-06', '2021-07', '2021-08'],
      months: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago'],
      userId: '',
      datesReviewArray: [],
      dataX_1: [],
      dataY_1: [],
      dataX_2: [],
      dataY_2: [],
      dataY_3: [],
      reviewsCounts: [],
      messagesChart: {}
    },
    methods: {
      chart1: function chart() {
        var myChart = document.getElementById('reviewsMonths').getContext('2d');
        var reviewsChart = new Chart(myChart, {
          type: 'bar',
          data: {
            labels: this.dataX_1,
            datasets: [{
              label: 'reviews',
              data: this.dataY_1,
              backgroundColor: ["#347ede90"],
              responsive: true,
              maintainAspectRatio: false
            }]
          },
          options: {}
        });
      },
      chart2: function chart() {
        var myChart = document.getElementById('voteMonths').getContext('2d');
        var votesChart = new Chart(myChart, {
          type: 'bar',
          data: {
            labels: this.dataX_2,
            datasets: [{
              label: 'vote',
              data: this.dataY_2,
              backgroundColor: ["#28B0ee90"]
            }]
          },
          options: {}
        });
      },
      chart3: function chart() {
        var myChart = document.getElementById('messagesMonths').getContext('2d');
        this.messagesChart = new Chart(myChart, {
          type: 'bar',
          data: {
            labels: this.months,
            datasets: [{
              label: 'messages',
              data: this.dataY_3,
              backgroundColor: ["#00C3A5"],
              responsive: true,
              maintainAspectRatio: false
            }]
          },
          options: {}
        });
      },
      getReviews: function getReviews() {
        var _this = this;

        axios.get("http://127.0.0.1:8000/api/reviews?user_id=".concat(this.userId)).then(function (resp) {
          resp.data.results.reviews.sort(function (a, b) {
            return moment(a.created_at).format('YYYYMMDD') - moment(b.created_at).format('YYYYMMDD');
          });
          console.log(resp.data.results);

          _this.getDates(resp.data.results);

          _this.getDates2(resp.data.results);

          _this.getMessagesByDate();

          _this.chart1(_this.dataX_1, _this.dataY_1);

          _this.chart2(_this.dataX_2, _this.dataY_2);
        })["catch"](function (er) {
          console.error(er);
          alert("Errore in fase di filtraggio dati.");
        });
      },
      getDates: function getDates(data) {
        var _this2 = this;

        reviews = data.reviews;
        reviews.forEach(function (review) {
          data = moment(review.created_at).format('M-y');

          _this2.datesReviewArray.push(data);
        });

        for (var i = 0; i < this.datesReviewArray.length; i++) {
          count = 0;

          for (var j = 0; j < this.datesReviewArray.length; j++) {
            if (this.datesReviewArray[i] == this.datesReviewArray[j]) {
              count++;
            }
          }

          if (!this.dataX_1.includes(this.datesReviewArray[i])) {
            this.dataY_1.push(count);
            this.dataX_1.push(this.datesReviewArray[i]);
          }
        }
      },
      getElementsCount: function getElementsCount(array, value) {
        return array.filter(function (v) {
          return v === value;
        }).length;
      },
      getDates2: function getDates2(data) {
        var _this3 = this;

        data.reviews.forEach(function (element) {
          _this3.dataX_2.push(moment(element.created_at).format('D-M-y'));

          _this3.dataY_2.push(element.vote);
        });
      },
      getMessagesByDate: function getMessagesByDate() {
        var _this4 = this;

        this.monthsForQuery.forEach(function (month) {
          axios.get("http://127.0.0.1:8000/api/messages?user_id=".concat(_this4.userId, "&date=").concat(month)).then(function (resp) {
            console.log(resp.data.results);

            _this4.dataY_3.push(resp.data.results.message_count);

            _this4.messagesChart.update();
          })["catch"](function (er) {
            console.error(er);
            alert("Errore in fase di filtraggio dati.");
          });
        });
      }
    },
    mounted: function mounted() {
      console.log("CHART!");
      this.userId = document.querySelector("meta[name='user-id']").getAttribute('content');
      this.getReviews();
      this.chart3();
    }
  });
});

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/charts.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\salva\Desktop\Boolean\BDoctors\resources\js\charts.js */"./resources/js/charts.js");


/***/ })

/******/ });
'use strict';

/**
 * @ngdoc overview
 * @name angularApp
 * @description
 * # angularApp
 *
 * Main module of the application.
 */
angular
  .module('angularApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .when('/polls', {
        templateUrl: 'views/pollsList.html',
        controller: 'PollsListCtrl'
      })
      .when('/polls/:id/edit', {
        templateUrl: 'views/editPoll.html',
        controller: 'EditPollCtrl'
      })
      .when('/polls/:id/take', {
        templateUrl: 'views/takePoll.html',
        controller: 'TakePollCtrl'
      })
      .when('/polls/:id/results', {
        templateUrl: 'views/pollResults.html',
        controller: 'PollResultsCtrl'
      })
      .when('/thank', {
        templateUrl: 'views/thank.html',
        controller: 'ThankCtrl'
      })
      .otherwise({
        redirectTo: '/polls'
      });
  });

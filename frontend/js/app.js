// JavaScript Document
var firstapp = angular.module('firstapp', [
  'ngRoute',
  'phonecatControllers',
  'templateservicemod',
    'navigationservice'
]);

firstapp.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/home', {
            templateUrl: 'views/template.html',
            controller: 'home'
        }).
        when('/confirmation', {
            templateUrl: 'views/template.html',
            controller: 'confirmationCtrl'
        }).
        when('/pdf', {
            templateUrl: 'views/template.html',
            controller: 'pdfCtrl'
        }).
        when('/portfolio', {
            templateUrl: 'views/template.html',
            controller: 'portfolio'
        }).
        when('/contact', {
            templateUrl: 'views/template.html',
            controller: 'contact'
        }).
        otherwise({
            redirectTo: '/home'
        });
  }]);
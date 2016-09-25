'use strict';

angular.module('angularApp').controller('PollResultsCtrl', function ($scope, $location, $http, $routeParams) {

  $scope.loadPoll = function () {
    $http.get('../../index.php/polls/read?id=' + $routeParams.id).then(function (resp) {
      $scope.poll = resp.data;
    });
  };

  $scope.loadPoll();
});

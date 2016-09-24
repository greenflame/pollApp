'use strict';

angular.module('angularApp').controller('PollsListCtrl', function ($scope, $location, $http) {

    $scope.loadPolls = function() {
        $http.get('../../index.php/polls/all').then(function(resp) {
            $scope.polls = resp.data;
        });
    };

    $scope.deletePoll = function($id) {
        $http.get('../../index.php/polls/delete?id=' + $id).then(function(resp) {
            $scope.loadPolls();
        });
    };

    $scope.createPoll = function() {
        var poll = {
            name: $scope.name,
            description: $scope.description
        };

        $http.get('../../index.php/polls/create?json=' + angular.toJson(poll)).then(function() {
            $scope.loadPolls();
        });
    };

    $scope.editPoll = function($id) {
        $location.path('polls/' + $id + '/edit');
    };

    $scope.loadPolls();
});

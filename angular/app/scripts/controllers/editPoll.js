'use strict';

angular.module('angularApp').controller('EditPollCtrl', function ($scope, $location, $http, $routeParams) {

    $scope.pollId = $routeParams.id;

    $scope.loadQuestions = function() {
        $http.get('../index.php/polls/read?id=' + $scope.pollId).then(function(resp) {
            $scope.questions = resp.data.Questions;
        });
    }
    
    $scope.loadQuestions();
});

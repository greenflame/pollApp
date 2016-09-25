'use strict';

angular.module('angularApp').controller('TakePollCtrl', function ($scope, $location, $http, $routeParams) {

  $scope.submitQuestions = function () {
    var total = 0;
    var finished = 0;

    var questions = $scope.poll.Questions;

    for (var q in questions) {
      if (questions[q].Answer) {
        total++;

        (function (question) {
          var answer = {
            Question: question.Id,
            Body: question.Answer
          };

          $http.get('../../index.php/answers/create?json=' + angular.toJson(answer)).then(function () {
            finished++;
            if (finished == total) {
              $location.path('thank');
            }
          });
        })(questions[q]);

      }
    }
  };

  $scope.loadPoll = function () {
    $http.get('../../index.php/polls/read?id=' + $routeParams.id).then(function (resp) {
      $scope.poll = resp.data;
    });
  };

  $scope.loadPoll();
});

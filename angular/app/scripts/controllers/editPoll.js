'use strict';

angular.module('angularApp').controller('EditPollCtrl', function ($scope, $location, $http, $routeParams) {

  function getMaxOfArray(numArray) {
    numArray.push(0);
    return Math.max.apply(null, numArray);
  }

  $scope.moveUp = function(index) {
    if (index > 0) {
      var tmp = $scope.poll.Questions[index - 1];
      $scope.poll.Questions[index - 1] = $scope.poll.Questions[index];
      $scope.poll.Questions[index] = tmp;
    }
  };

  $scope.moveDown = function(index) {
    if (index < $scope.poll.Questions.length - 1) {
      var tmp = $scope.poll.Questions[index + 1];
      $scope.poll.Questions[index + 1] = $scope.poll.Questions[index];
      $scope.poll.Questions[index] = tmp;
    }
  };

  $scope.deleteQuestion = function(id) {
    $http.get('../../index.php/questions/delete?id=' + id).then(function() {
      $scope.loadPoll();
    });
  };

  $scope.createQuestion = function() {
    var nextNum = getMaxOfArray($scope.poll.Questions.map(function (q) {
      return q.Number;
    })) + 1;

    var newQuestion = {
      Poll: $scope.poll.Id,
      Number: nextNum,
      Caption: "New question",
      Body: "Question body"
    };

    $http.get('../../index.php/questions/create?json=' + angular.toJson(newQuestion)).then(function() {
    $scope.loadPoll();
  });
};

  $scope.updateQuestions = function() {
    var finished = 0;

    for (var q in $scope.poll.Questions) {
      $scope.poll.Questions[q].Number = q;

      (function(question) {
        $http.get('../../index.php/questions/update?json=' + angular.toJson(question)).then(function() {
          finished++;
          if (finished == $scope.poll.Questions.length) {
            $scope.loadPoll();
          }
        });
      })($scope.poll.Questions[q]);
    }
  };

  $scope.loadPoll = function() {
    $http.get('../../index.php/polls/read?id=' + $routeParams.id).then(function(resp) {
      $scope.poll = resp.data;
    });
  };

  $scope.loadPoll();
});

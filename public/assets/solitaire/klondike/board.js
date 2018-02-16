(function () {
  "use strict";

  angular.module("klondike.board", ["ngRoute", "klondike.game"])
    .config(["$routeProvider", function ($routeProvider) {
      $routeProvider
        .when("/board", {
          templateUrl: "assets/solitaire/klondike/board.html",
          controller: "KlondikeController"
        })
        .otherwise({redirectTo: "/board"});
    }])
    .controller("KlondikeController", ["$scope", "klondikeGame", "scoring", function KlondikeController($scope, klondikeGame, scoring) {
      klondikeGame.newGame();
      $scope.game = klondikeGame;
      $scope.scoring = scoring;
    }])
    .directive("sNoPile", function () {
      return {
        restrict: "E",
        template: "<div class=\"no-pile\"></div>"
      };
    })
    .directive("sTableau", function () {
      return {
        restrict: "E",
        templateUrl: "assets/solitaire/klondike/piles/tableau.html"
      };
    })
    .directive("sFoundation", function () {
      return {
        restrict: "E",
        templateUrl: "assets/solitaire/klondike/piles/foundation.html"
      };
    })
    .directive("sCard", function () {
      return {
        restrict: "A",
        templateUrl: "assets/solitaire/cards/card.html",
        scope: {
          card: "="
        }
      };
    })
    .directive("sRemainder", function () {
      return {
        restrict: "E",
        templateUrl: "assets/solitaire/klondike/piles/remainder.html"
      };
    })
    .directive("sWaste", function () {
      return {
        restrict: "E",
        templateUrl: "assets/solitaire/klondike/piles/waste.html"
      };
    });
})();

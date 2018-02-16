<!DOCTYPE html>
<html lang="en" ng-app="solitaire" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Solitaire</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/solitaire/klondike/game.css')}}">
</head>
<body>

<div ng-view></div>

<script src="{{asset('assets/solitaire/bower_components/angular/angular.js')}}"></script>
<script src="{{asset('assets/solitaire/bower_components/angular-route/angular-route.js')}}"></script>
<script src="{{asset('assets/solitaire/bower_components/underscore/underscore.js')}}"></script>
<script src="{{asset('assets/solitaire/bower_components/ngDraggable/ngDraggable.js')}}"></script>
<script src="{{asset('assets/solitaire/app.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/piles/pile.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/piles/remainderPile.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/piles/tableauPile.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/piles/foundationPile.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/scoring.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/klondike.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/board.js')}}"></script>
<script src="{{asset('assets/solitaire/klondike/game.js')}}"></script>
<script src="{{asset('assets/solitaire/cards/cards.js')}}"></script>
</body>
</html>

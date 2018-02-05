@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Guess number</title>
@endsection
@section('content')
@include('pages.headers.js')
<div id="custom-html-52" custom-code="true" data-rv-view="48" style="margin: 50px 0 160px 0;">
  <div class="container">
      <h2>Number Guesser</h2>
      <div id="game">
        <p>Guess a number between <span class="min-num"></span> and <span class="max-num"></span></p>
        <input type="number" id="guess-input" placeholder="Enter your guess...">
        <input type="submit" value="Submit" id="guess-btn">
        <p class="message"></p>
      </div>
  </div>
</div>
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
let min = 1,
    max = 10,
    winningNum = getRandomNum(min, max),
    guessesLeft = 3;

const game = document.querySelector('#game'),
      minNum = document.querySelector('.min-num'),
      maxNum = document.querySelector('.max-num'),
      guessBtn = document.querySelector('#guess-btn'),
      guessInput = document.querySelector('#guess-input'),
      message = document.querySelector('.message');

minNum.textContent = min;
maxNum.textContent = max;

game.addEventListener('mousedown', function(e){
  if(e.target.className === 'play-again'){
    window.location.reload();
  }
});

guessBtn.addEventListener('click', function(){
    let guess = parseInt(guessInput.value);

    if(isNaN(guess) || guess < min || guess > max){
        setMessage(`Please enter a number between ${min} and ${max}`, 'red');
        return false;
    }
    if(guess === winningNum){
        gameOver(true, `${winningNum} is correct, YOU WIN!`);
     } else {
        guessesLeft -= 1;
        if(guessesLeft === 0){
            gameOver(false, `Game Over, you lost. The correct number was ${winningNum}`);
        } else {
            guessInput.style.borderColor = 'red';
            guessInput.value = '';
            setMessage(`${guess} is not correct, ${guessesLeft} guesses left`, 'red');
        }
    }
});

function gameOver(won, msg){
    let color;
    won === true ? color = 'green' : color = 'red';
    // Disable input
    guessInput.disabled = true;
    // Change border color
    guessInput.style.borderColor = color;
    // Set text color
    message.style.color = color;
    // Set message
    setMessage(msg);
    // PLay Again?
    guessBtn.value = 'Play Again';
    guessBtn.className += 'play-again';
}

function getRandomNum(min, max){
    return Math.floor(Math.random()*(max-min+1)+min);
}

function setMessage(msg, color){
    message.style.color = color;
    message.textContent = msg;
}
</script>
@endsection

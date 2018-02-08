@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Weather</title>
@endsection
@section('content')
@include('pages.headers.js')
<div id="custom-html-52" custom-code="true" data-rv-view="48" class="mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center bg-primary mt-5 p-5 rounded">
        <h1 id="w-location" class="text-white"></h1>
        <h3 class="text-dark" id="w-desc"></h3>
        <h3 id="w-string" class="text-white"></h3>
        <img id="w-icon">
        <ul id="w-details" class="list-group mt-3">
          <li class="list-group-item" id="w-humidity"></li>
          <li class="list-group-item" id="w-dewpoint"></li>
          <li class="list-group-item" id="w-feels-like"></li>
          <li class="list-group-item" id="w-wind"></li>
        </ul>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locModal">
            Change Location
          </button>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="locModal" tabindex="-1" role="dialog" aria-labelledby="locModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="locModalLabel">Choose Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="w-form">
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" class="form-control">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" class="form-control">
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="w-change-btn" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
@include('pages.partials.get-code-btn', ['segment' => request()->segment(1)])
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
class Storage {
    constructor() {
        this.city;
        this.state;
        this.defaultCity = 'North York';
        this.defaultState = 'Canada';
    }

    getLocationData() {
        if(localStorage.getItem('city') === null) {
            this.city = this.defaultCity;
        } else {
            this.city = localStorage.getItem('city');
        }

        if(localStorage.getItem('state') === null) {
            this.state = this.defaultState;
        } else {
            this.state = localStorage.getItem('state');
        }

        return {
            city: this.city,
            state: this.state
        }
    }

    setLocationData(city, state) {
        localStorage.setItem('city', city);
        localStorage.setItem('state', state);
    }
}

class Weather {
    constructor(city, state) {
        this.apiKey = '0ddd4c17fdc49b0e';
        this.city = city;
        this.state = state;
    }

    async getWeather() {
        const response = await fetch(`https://api.wunderground.com/api/${this.apiKey}/conditions/q/${this.state}/${this.city}.json`);

        const responseData = await response.json();

        return responseData.current_observation;
    }

    changeLocation(city, state) {
      this.city = city;
      this.state = state;
    }
}

class UI {
    constructor() {
        this.location = document.getElementById('w-location');
        this.desc = document.getElementById('w-desc');
        this.string = document.getElementById('w-string');
        this.details = document.getElementById('w-details');
        this.icon = document.getElementById('w-icon');
        this.humidity = document.getElementById('w-humidity');
        this.feelsLike = document.getElementById('w-feels-like');
        this.dewpoint= document.getElementById('w-dewpoint');
        this.wind = document.getElementById('w-wind');
    }

    paint(weather) {
        this.location.textContent = weather.display_location.full;
        this.desc.textContent = weather.weather;
        this.string.textContent = weather.temperature_string;
        this.icon.setAttribute('src', weather.icon_url);
        this.humidity.textContent = `Relative Humidity: ${weather.relative_humidity}`;
        this.feelsLike.textContent = `Feels Like: ${weather.feelslike_string}`;
        this.dewpoint.textContent = `DewPoint: ${weather.dewpoint_string}`;
        this.wind.textContent = `Wind: ${weather.wind_string}`;
    }
}

const storage = new Storage();
const weatherLocation = storage.getLocationData();
const weather = new Weather(weatherLocation.city, weatherLocation.state);
const ui = new UI();

document.addEventListener('DOMContentLoaded', getWeather);


document.getElementById('w-change-btn').addEventListener('click', (e) => {
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    weather.changeLocation(city, state);
    storage.setLocationData(city, state);
    getWeather();
    $('#locModal').modal('hide');
});

function getWeather(){
    weather.getWeather()
        .then(results => {
          ui.paint(results);
        })
        .catch(err => console.log(err));
}
</script>
@endsection

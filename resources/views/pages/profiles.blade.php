@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Profiles</title>
@endsection
@section('content')
@include('pages.headers.js')
<div id="custom-html-52" custom-code="true" data-rv-view="48" class="mt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
          <h3 class="mb-3">Profile Scroller</h3>
          <div id="imageDisplay"></div>
          <br>
          <div id="profileDisplay"></div>
          <br>
          <button id="next" class="btn btn-dark btn-block">Next</button>
        </div>
    </div>
  </div>
</div>
@include('pages.partials.get-code-btn', ['segment' => request()->segment(1)])
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
async function getProfiles() {
    const response = await fetch(`https://randomuser.me/api/`);
    const responseData = await response.json();
    return responseData.results;
}

nextProfile();
document.getElementById('next').addEventListener('click', nextProfile);

function nextProfile() {
  getProfiles()
      .then(results => {
        const profiles = profileIterator(results);
        const currentProfile = profiles.next().value;
        if(currentProfile !== undefined) {
          document.getElementById('profileDisplay').innerHTML = `
            <ul class="list-group">
              <li class="list-group-item">Name: ${currentProfile.name.first} ${currentProfile.name.last}</li>
              <li class="list-group-item">Email: ${currentProfile.email}</li>
              <li class="list-group-item">Location: ${currentProfile.location.street}</li>
              <li class="list-group-item">Cell: ${currentProfile.cell}</li>
            </ul>
          `;
          document.getElementById('imageDisplay').innerHTML = `<img src="${currentProfile.picture.large}">`;
        } else {
          window.location.reload();
        }
      })
      .catch(err => console.log(err));
  }

function profileIterator(profiles) {
  let nextIndex = 0;
  return {
    next: function() {
      return nextIndex < profiles.length ?
      { value: profiles[nextIndex++], done: false } :
      { done: true }
    }
  };
}
</script>
@endsection

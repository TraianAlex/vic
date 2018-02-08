@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Jokes</title>
@endsection
@section('content')
@include('pages.headers.js')
<div id="custom-html-52" custom-code="true" data-rv-view="48" style="margin: 40px 0 100px 0;">
  <nav class="navbar navbar-dark bg-primary mb-3">
    <div class="container">
      <a href="#" class="navbar-brand">GitHub Finder</a>
    </div>
  </nav>
  <div class="container searchContainer">
    <div class="search card card-body">
      <h2>Search GitHub Users</h2>
      <p class="lead">Enter a username to fetch a user profile and repos</p>
      <input type="text" id="searchUser" class="form-control" placeholder="GitHub Username...">
    </div>
    <br>
    <div id="profile"></div>
  </div>
  <footer class="mt-5 p-3 text-center bg-light">
    GitHub Finder &copy;
  </footer>
</div>
<section class="mbr-section content8 cid-qwPzbpLJTt" id="content8-19" data-rv-view="74">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center"><a class="btn btn-warning display-4" href="https://github.com/TraianAlex/vic/blob/master/resources/views/pages/github-finder.blade.php" target="_blank">Get Code</a></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
class Github {
    constructor() {
        this.client_id = 'd9308aacf8b204d361fd';
        this.client_secret = '84969aeef73956f4ec9e8716d1840532802bb81b';
        this.repos_count = 5;
        this.repos_sort = 'created: asc';
    }

    async getUser(user) {
        const profileResponse = await fetch(`https://api.github.com/users/${user}?client_id=${this.client_id}&client_secret=${this.client_secret}`);

        const repoResponse = await fetch(`https://api.github.com/users/${user}/repos?per_page=${this.repos_count}&sort=${this.repos_sort}&client_id=${this.client_id}&client_secret=${this.client_secret}`);

        const profile = await profileResponse.json();
        const repos = await repoResponse.json();

        return {
            profile,
            repos
        }
    }
}

class UI {
    constructor() {
        this.profile = document.getElementById('profile');
    }

    // Display profile in UI
    showProfile(user) {
        this.profile.innerHTML = `
          <div class="card card-body mb-3">
            <div class="row">
              <div class="col-md-3">
                <img class="img-fluid mb-2" src="${user.avatar_url}">
                <a href="${user.html_url}" target="_blank" class="btn btn-primary btn-block mb-4">View Profile</a>
              </div>
              <div class="col-md-9">
                <span class="badge badge-primary">Public Repos: ${user.public_repos}</span>
                <span class="badge badge-secondary">Public Gists: ${user.public_gists}</span>
                <span class="badge badge-success">Followers: ${user.followers}</span>
                <span class="badge badge-info">Following: ${user.following}</span>
                <br><br>
                <ul class="list-group">
                  <li class="list-group-item">Company: ${user.company}</li>
                  <li class="list-group-item">Website/Blog: ${user.blog}</li>
                  <li class="list-group-item">Location: ${user.location}</li>
                  <li class="list-group-item">Member Since: ${user.created_at}</li>
                </ul>
              </div>
            </div>
          </div>
          <h3 class="page-heading mb-3">Latest Repos</h3>
          <div id="repos"></div>
        `;
    }

    // Show user repos
    showRepos(repos) {
        let output = '';

        repos.forEach(function(repo) {
            output += `
              <div class="card card-body mb-2">
                <div class="row">
                  <div class="col-md-6">
                    <a href="${repo.html_url}" target="_blank">${repo.name}</a>
                  </div>
                  <div class="col-md-6">
                  <span class="badge badge-primary">Stars: ${repo.stargazers_count}</span>
                  <span class="badge badge-secondary">Watchers: ${repo.watchers_count}</span>
                  <span class="badge badge-success">Forks: ${repo.forms_count}</span>
                  </div>
                </div>
              </div>
            `;
        });

        // Output repos
        document.getElementById('repos').innerHTML = output;
    }

    // Show alert message
    showAlert(message, className) {
        // Clear any remaining alerts
        this.clearAlert();
        // Create div
        const div  =  document.createElement('div');
        // Add classes
        div.className = className;
        // Add text
        div.appendChild(document.createTextNode(message));
        // Get parent
        const container =  document.querySelector('.searchContainer');
        // Get search box
        const search = document.querySelector('.search');
        // Insert alert
        container.insertBefore(div, search);

        // Timeout after 3 sec
        setTimeout(() => {
          this.clearAlert();
        }, 3000);
    }

    // Clear alert message
    clearAlert() {
        const currentAlert = document.querySelector('.alert');

        if(currentAlert){
            currentAlert.remove();
        }
    }

    // Clear profile
    clearProfile() {
        this.profile.innerHTML = '';
    }
}

// Init Github
const github = new Github;
// Init UI
const ui = new UI;

// Search input
const searchUser = document.getElementById('searchUser');

// Search input event listener
searchUser.addEventListener('keyup', (e) => {
    // Get input text
    const userText = e.target.value;

    if(userText !== ''){
       // Make http call
       github.getUser(userText)
        .then(data => {
          if(data.profile.message === 'Not Found') {
            // Show alert
            ui.showAlert('User not found', 'alert alert-danger');
          } else {
            // Show profile
            ui.showProfile(data.profile);
            ui.showRepos(data.repos);
          }
        })
    } else {
        // Clear profile
        ui.clearProfile();
    }
});
</script>
@endsection

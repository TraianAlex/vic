@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Todo</title>
@endsection
@section('content')
<div id="custom-html-4o" custom-code="true" data-rv-view="503"><nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top:120px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Loan Calculator</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Next</a>
      </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#!">Disabled</a>
      </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#!">Disabled</a>
      </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#!">Disabled</a>
      </li>
    </ul>
  </div>
</nav></div>
<section class="mbr-section content4 cid-qIr5xvTYnx" id="content4-4p">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">
                    to do list</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">
                    using local storage</h3>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section form1 cid-qIrxolxeaL" id="form1-4s">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">
                <form class="mbr-form" id="task-form">
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4s">New Task</label>
                                <input type="text" class="form-control" name="task" id="task" required>
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">ADD TASK</button></span>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section form1 cid-qIrygrYWXM" id="form1-4t">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Tasks</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">
                <div class="row row-sm-offset">
                    <div class="col-md-4 multi-horizontal">
                        <div class="form-group">
                            <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Filter Tasks</label>
                            <input type="text" class="form-control" name="filter" id="filter" required="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section article content12 cid-qIrzdLA5DJ" id="content12-4u">
    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text counter-container col-12 col-md-8 mbr-fonts-style display-7">
                <ul class="collection">
                    {{-- <li class="collection-item"><strong>MOBILE FRIENDLY</strong><a href="#" class="text-primary float-right delete-item"><i class="fa fa-remove"></i></a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section content8 cid-qIr5Tq05A5" id="content8-4q">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center"><a class="btn btn-secondary display-4 clear-tasks" href="#">CLEAR TASKS</a></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
const form = document.querySelector('#task-form');
const taskInput = document.querySelector('#task');
const taskList = document.querySelector('.collection');
const filter = document.querySelector('#filter');
const clearBtn = document.querySelector('.clear-tasks');

loadEventListeners();

function loadEventListeners() {
  document.addEventListener('DOMContentLoaded', getTasks);
  form.addEventListener('submit', addTask);
  taskList.addEventListener('click', removeTask);
  clearBtn.addEventListener('click', clearTasks);
  filter.addEventListener('keyup', filterTasks);
}

function getTasks() {
  tasks = extractTasksFromLS();

  tasks.forEach(function(task){
    createItem(task);
  });
}

function addTask(e) {
  if(taskInput.value === '') {
    alert('Add a task');
    return false;
  }

  createItem(taskInput.value);

  storeTaskInLocalStorage(taskInput.value);

  taskInput.value = '';

  e.preventDefault();
}

function createItem(task){
    // Create li element
    const li = document.createElement('li');
    // Add class
    li.className = 'collection-item';
    // Create text node and append to li
    li.appendChild(document.createTextNode(task));
    // Create new link element
    const link = document.createElement('a');
    // Add class
    link.className = 'text-primary float-right delete-item';
    // Add icon html
    link.innerHTML = '<i class="fa fa-remove"></i>';
    // Append the link to li
    li.appendChild(link);
    // Append li to ul
    taskList.appendChild(li);
}

function storeTaskInLocalStorage(task) {
  tasks = extractTasksFromLS();

  tasks.push(task);

  localStorage.setItem('tasks', JSON.stringify(tasks));
}

function extractTasksFromLS(){
    let tasks;
    if(localStorage.getItem('tasks') === null){
        tasks = [];
    } else {
        tasks = JSON.parse(localStorage.getItem('tasks'));
    }
    return tasks;
}

function removeTask(e) {
  if(e.target.parentElement.classList.contains('delete-item')) {
    if(confirm('Are You Sure?')) {
      e.target.parentElement.parentElement.remove();

      removeTaskFromLocalStorage(e.target.parentElement.parentElement);
    }
  }
}

function removeTaskFromLocalStorage(taskItem) {
  tasks = extractTasksFromLS();

  tasks.forEach(function(task, index){
    if(taskItem.textContent === task){
      tasks.splice(index, 1);
    }
  });

  localStorage.setItem('tasks', JSON.stringify(tasks));
}

function clearTasks() {
  // taskList.innerHTML = '';
  while(taskList.firstChild) {
    taskList.removeChild(taskList.firstChild);
  }

  clearTasksFromLocalStorage();
}

function clearTasksFromLocalStorage() {
  localStorage.clear();
}

function filterTasks(e) {
  const text = e.target.value.toLowerCase();

  document.querySelectorAll('.collection-item').forEach(function(task){
    const item = task.firstChild.textContent;
    if(item.toLowerCase().indexOf(text) != -1){
      task.style.display = 'block';
    } else {
      task.style.display = 'none';
    }
  });
}
</script>
@endsection

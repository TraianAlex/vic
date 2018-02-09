@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Todo</title>
@endsection
@section('content')
@include('pages.headers.js')
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
            <div class="media-container-column col-lg-8">
                <form class="mbr-form" id="task-form">
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal">
                            <div class="form-group">
                                <input type="text" class="form-control" name="task" id="task" placeholder="New Task" required>
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4" id="add">ADD TASK</button></span>
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
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">
                <div class="row row-sm-offset">
                    <div class="col-md-4 multi-horizontal">
                        <div class="form-group">
                            <input type="text" class="form-control" name="filter" id="filter" placeholder="Filter Tasks" required="">
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
@include('pages.partials.get-code-btn', ['segment' => request()->segment(1)])
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
const form = document.querySelector('#task-form');
const taskInput = document.querySelector('#task');
const taskList = document.querySelector('.collection');
const filter = document.querySelector('#filter');
const clearBtn = document.querySelector('.clear-tasks');
const addBtn = document.querySelector('#add');
const title = document.querySelector('.mbr-section-title');

addBtn.style.visibility = 'hidden';
loadEventListeners();

function loadEventListeners() {
  document.addEventListener('DOMContentLoaded', getTasks);
  form.addEventListener('submit', addTask);
  taskList.addEventListener('click', removeTask);
  clearBtn.addEventListener('click', clearTasks);
  filter.addEventListener('keyup', filterTasks);
  taskInput.addEventListener('focus', () => addBtn.style.visibility = 'visible');
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
    addBtn.style.visibility = 'hidden';

    toggleList();

    e.preventDefault();
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
    toggleList(tasks);
    return tasks;
}

function removeTask(e) {
  if(e.target.parentElement.classList.contains('delete-item')) {
    if(confirm('Are You Sure?')) {
      e.target.parentElement.parentElement.remove();
      removeTaskFromLocalStorage(e.target.parentElement.parentElement);
    }
  }
  taskListarray = Array.from(taskList.children);
  toggleList(taskListarray);
}

function toggleList(tasks = [1]) {
    visibility = tasks.length === 0 ? 'hidden' : 'visible';
    title.style.visibility = visibility;
    filter.style.visibility = visibility;
    clearBtn.style.visibility = visibility;
    filter.value = '';
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
</script>
@endsection

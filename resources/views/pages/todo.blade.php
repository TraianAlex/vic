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
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4" id="edit">Update TASK</button></span>
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
const editBtn = document.querySelector('#edit');
const title = document.querySelector('.mbr-section-title');

loadEventListeners();
var addEL = getAddEventListener();

function loadEventListeners() {
  document.addEventListener('DOMContentLoaded', initDisp);
  addBtn.addEventListener('click', addTask);
  editBtn.addEventListener('click', updateTask);
  taskList.addEventListener('click', removeTask);
  clearBtn.addEventListener('click', clearTasks);
  filter.addEventListener('keyup', filterTasks);
}
// app
function getTasks() {
  while(taskList.firstChild) {
    taskList.removeChild(taskList.firstChild);
  }
  tasks = extractTasksFromLS();
  tasks.forEach(function(task){
    createItem(task);
  });
  toggleList(tasks);
  editBtn.style.visibility = 'hidden';
  taskInput.value = '';
}

function addTask(e) {
    if(taskInput.value === '') {
        alert('Add a task');
        return false;
    }
    createItem(taskInput.value);
    storeTaskInLocalStorage(taskInput.value);

    taskInput.value = '';
    toggleList();
    e.preventDefault();
}

function editTask(e) {
  toEdit = e.target.parentElement.parentElement.textContent;
  taskInput.value = toEdit;
  addBtn.style.visibility = 'hidden';
  editBtn.style.visibility = 'visible';
}

function updateTask(e) {
  if(taskInput.value === '') {
    alert('Add a task');
    return false;
  }
  editTaskLS(toEdit, taskInput.value);
  addBtn.style.visibility = 'visible';
  editBtn.style.visibility = 'hidden';
}

function removeTask(e) {
    if(e.target.parentElement.classList.contains('delete-item')) {
        if(confirm('Are You Sure?')) {
            e.target.parentElement.parentElement.remove();
            removeTaskFromLocalStorage(e.target.parentElement.parentElement.textContent);
        }
    }else if(e.target.parentElement.classList.contains('edit-item')){
        editTask(e);
    }
    taskListarray = Array.from(taskList.children);
    toggleList(taskListarray);
}

function clearTasks() {
  while(taskList.firstChild) {
    taskList.removeChild(taskList.firstChild);
  }
  clearTasksFromLocalStorage();
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
// local storage
function extractTasksFromLS(){
    let tasks = [];
    if(localStorage.getItem('tasks') !== null){
        tasks = JSON.parse(localStorage.getItem('tasks'));
    }
    return tasks;
}

function storeTaskInLocalStorage(task) {
  tasks = extractTasksFromLS();
  tasks.push(task);
  localStorage.setItem('tasks', JSON.stringify(tasks));
}

function editTaskLS(toEdit, taskItem) {
  let tasks = JSON.parse(localStorage.getItem('tasks'));
  tasks.forEach(function(task, index){
    if(toEdit === task){
      tasks.splice(index, 1, taskItem);
    }
  });
  localStorage.setItem('tasks', JSON.stringify(tasks));
}

function removeTaskFromLocalStorage(taskItem) {
    tasks = extractTasksFromLS();
    tasks.forEach(function(task, index){
        if(taskItem === task){
            tasks.splice(index, 1);
        }
    });
    localStorage.setItem('tasks', JSON.stringify(tasks));
}

function clearTasksFromLocalStorage() {
  localStorage.clear();
}
// ui
function toggleList(tasks = [1]) {
    visibility = tasks.length === 0 ? 'hidden' : 'visible';
    title.style.visibility = visibility;
    filter.style.visibility = visibility;
    clearBtn.style.visibility = visibility;
    filter.value = '';
}

function createItem(task){
    const li = document.createElement('li');
    li.className = 'collection-item';
    li.appendChild(document.createTextNode(task));
    const link = document.createElement('a');
    link.className = 'text-primary float-right delete-item';
    link.innerHTML = '<i class="fa fa-remove"></i>';
    const linkEdit = document.createElement('a');
    linkEdit.className = 'text-primary float-right edit-item';
    linkEdit.innerHTML = '<i class="fa fa-pencil mr-1"></i>';
    li.appendChild(link);
    li.appendChild(linkEdit);
    taskList.appendChild(li);
}
// sync browser
function getAddEventListener() {
    try {
        if( !! window.addEventListener ) return window.addEventListener;
    } catch(e) {
        return undefined;
    }
}

function initDisp() {
    if(addEL) {
        addEL('storage', getTasks, false);
    }
    getTasks();
}
</script>
@endsection

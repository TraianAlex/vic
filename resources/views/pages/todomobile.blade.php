@extends('layouts.app-js')
@section('title')
MobileToDo
@endsection
@section('css')
<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
<style type="text/css">
fa.fa-calendar { padding-right: 15px;}
li.done { background: #CCFF99;}
#tasks span { color: #ccc; float: right; font-size: 90%;}
</style>
@endsection
@section('content')
<div data-role="page" id="home">
    <header data-role="header">
        <a href="budget" rel="external">Back</a>
        <h1><i class="fa fa-calendar"></i></h1>
        <a href="https://github.com/TraianAlex/vic/blob/master/resources/views/pages/todomobile.blade.php" target="_blank" rel="external">Get Code</a>
    </header>
    <div data-role="content" id="content">
        <p><a href="#add" data-role="button" data-icon="plus" data-theme="b">Add task</a></p>
        <p><a href="todomobile" data-ajax="false" data-role="button" id="clear_btn" data-theme="a" data-icon="delete">Clear All</a></p>
        <ul id="tasks" data-role="listview" data-filter="true" data-filter-placeholder="Search ToDos..." data-inset="true"></ul>
    </div>
    <div data-role="footer" id="footer">
        <h4>MobileToDo &copy; 2018</h4>
    </div>
</div>

<div data-role="page" id="add">
    <header data-role="header">
        <a href="todomobile" id="cancel_btn" data-icon="delete">Cancel</a>
        <h1><i class="fa fa-calendar"></i></h1>
        <a href="todomobile" id="add_btn" data-icon="check" data-theme="b" onclick="$('#add_form').submit();">Save</a>
    </header>
    <div data-role="content" id="content">
        <form id="add_form" data-todo>
            <input type="text" id="todo_name" placeholder="Write description">
            <input type="date" id="todo_date" name="todo_date">
        </form>
    </div>
    <div data-role="footer" id="footer">
        <h4>MobileToDo &copy; 2018</h4>
    </div>
</div>

<div data-role="page" id="edit">
    <header data-role="header">
        <a href="todomobile" id="cancel_btn" data-icon="delete">Cancel</a>
        <h1><i class="fa fa-calendar"></i></h1>
        <a href="todomobile" id="edit_btn" data-icon="check" data-theme="b" onclick="$('#edit_form').submit();">Save</a>
    </header>
    <div data-role="content" id="content">
        <form id="edit_form">
            <input type="text" name="todo_name" placeholder="Write description">
            <input type="date" name="todo_date">
            <a href="#" id="delete" data-role="button" data-theme="a" data-icon="delete">Delete</a>
        </form>
    </div>
    <div data-role="footer" id="footer">
        <h4>MobileToDo &copy; 2018</h4>
    </div>
</div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
<script type="text/javascript">
var main = () => {
    var today = new Date().toDateString();
    $('h1').append(` My tasks for today, ${today}`);
    var myTasks = Store.getItems('tasks');
    $.each(myTasks, function(key, task){
        let classAdd = task.isCompleted === true ? "done item-"+ task.id : "item-"+ task.id;
        $('#tasks').prepend(`<li data-role="list-divider"><i class="fa fa-check"></i> <i class="fa fa-times"></i><span>${task.entryDate}</span></li><li class="${classAdd}"><a href="#edit" id="todo_link" data-todo_id="${task.id}" data-todo_description="${task.description}" data-todo_entryDate="${task.entryDate}"> ${task.description}</a></li>`);
        $('#tasks').listview('refresh');
    });

    // Add tasks to the list
    $('#add_form').submit((event) => {
        var description = $('#todo_name').val();
        var todo_date = $('#todo_date').val();
        if (description != "" && todo_date != ""){
            currentTaskCount = myTasks.length > 0 ? myTasks[myTasks.length - 1].id : 0;
            task = new Task(currentTaskCount + 1, description, todo_date, false);
            myTasks.push(task);
            //$('#tasks').prepend(`<li class="item-${task.id}"><i class="fa fa-check"></i> <i class="fa fa-times"></i><a href="#edit" id="todo_link" data-todo_id="${task.id}" data-todo_description="${task.description}" data-todo_entryDate="${task.entryDate}"> ${task.description} <span>${task.entryDate}</span></a></li>`);
            $('#tasks').prepend(`<li data-role="list-divider"><i class="fa fa-check"></i> <i class="fa fa-times"></i><span>${task.entryDate}</span></li><li class="item-${task.id}"><a href="#edit" id="todo_link"> ${task.description}</a></li>`);
            $('#todo_link').data(task);
            $('form[data-todo]')[0].reset();
            Store.addItem(task, 'tasks');
        }
        return false;
    });

    // remove task direct from home page
    $('#tasks').on('click', '.fa.fa-times', function(event) {
        var li = $(this).closest("li");
        var selectedTask = li.next().index();
        myTasks.splice(selectedTask, 1);

        const listId = li.next().attr('class');
        const listIdArr = listId.split('-');
        const id = parseInt(listIdArr[1]);
        Store.removeItem(id, 'tasks');

        li.next().remove();
        li.remove();
    });

    // update complete
    $('#tasks').on('click', '.fa.fa-check', function(event) {
        $(this).closest("li").next().toggleClass('done');

        const listId = $(this).closest("li").next().attr('class');
        const listIdArr = listId.split('-');
        const id = parseInt(listIdArr[1]);

        myTasks.forEach(function(item){
            if(item.id === id){
                  currentTask = item;
              }
        });
        currentTask.isCompleted = $(this).closest("li").next().hasClass('done') ? true : false;
        Store.updateItem(currentTask, 'tasks');
    });

    // get data for edit
    $('#tasks').on('click', '#todo_link', function(event) {
        const listId = $(this).closest("li").attr('class');
        const listIdArr = listId.split('-');
        const id = parseInt(listIdArr[1]);
        //$(this).closest("li").remove();

        myTasks.forEach(function(item){
            if(item.id === id){
                currentTask = item;
            }
        });

        $(document).on('pageshow', '#edit', function(){
            $('#edit_form input[name=todo_name]', this).val(currentTask.description);
            $('#edit_form input[name=todo_date]', this).val(currentTask.entryDate);
        });
    });

    // update data
    $('#edit_form').on('submit', function(event) {
        var description = $('#edit_form input[name=todo_name]').val();
        var todo_date = $('#edit_form input[name=todo_date]').val();
        const updatedTask = new Task(currentTask.id, description, todo_date, false);
        if (description != "" && todo_date != ""){
            //$('#tasks').prepend(`<li class="item-${updatedTask.id}"><i class="fa fa-check"></i> <i class="fa fa-times"></i><a href="#edit" id="todo_link" data-todo_id="${updatedTask.id}" data-todo_description="${updatedTask.description}" data-todo_entryDate="${updatedTask.entryDate}"> ${updatedTask.description} <span>${updatedTask.entryDate}</span></a></li>`);
            $('#tasks').prepend(`<li data-role="list-divider"><i class="fa fa-check"></i> <i class="fa fa-times"></i><span>${updatedTask.entryDate}</span></li><li class="item-${updatedTask.id}"><a href="#edit" id="todo_link"> ${updatedTask.description}</a></li>`);
            $('#todo_link').data(updatedTask);
            Store.updateItem(updatedTask, 'tasks');
          }
        return false;
    });

    // delete task from edit page
    $('#edit_form').on('click', '#delete', function(){
        Store.removeItem(currentTask.id, 'tasks');
        $.mobile.changePage($('#home'), 'pop');
    });

    $(document).on('pageshow', '#home', function(){
        window.location.reload();
    });

    // clear all tasks
    $('#clear_btn').click(function(){
      Store.clearItems('tasks');
    });
};

$(document).ready(main);

class Task {
    constructor(id, description, entryDate, isCompleted) {
        this.id = id;
        this.description = description;
        this.entryDate = entryDate;
        this.isCompleted = isCompleted;
    }
}

class Store {
  static getItems(name) {
      return localStorage.getItem(name) !== null
             ? JSON.parse(localStorage.getItem(name)) : [];
  }

  static addItem(item, name) {
      const items = Store.getItems(name);
      items.push(item);
      localStorage.setItem(name, JSON.stringify(items));
  }

  static updateItem(updatedItem, name){
      let items = JSON.parse(localStorage.getItem(name));
      items.forEach(function(item, index){
          if(updatedItem.id === item.id){
            items.splice(index, 1, updatedItem);
          }
      });
      localStorage.setItem(name, JSON.stringify(items));
  }

  static removeItem(id, name) {
      const items = Store.getItems(name);
      items.forEach(function(item, index){
          if(item.id === id) {
             items.splice(index, 1);
          }
      });
      localStorage.setItem(name, JSON.stringify(items));
  }

  static clearItems(name){
      localStorage.removeItem(name);//localStorege.clear()
  }
}
</script>
@endsection

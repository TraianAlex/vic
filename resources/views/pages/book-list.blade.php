@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Book List</title>
@endsection
@section('css')
<style>
  .success, .error {color: white;padding: 5px;margin: 5px 0 15px 0;}
  .success {background: green;}
  .error {background: red;}
  #book-form {display: none;}
</style>
@endsection
@section('content')
@include('pages.headers.js')
<div id="custom-html-52" custom-code="true" data-rv-view="48" class="mt-5 mb-5">
  <div class="container">
    <div class="form-group" style="margin: 0 10px 0 -15px;">
      <button type="button" id="showForm" class="btn btn-primary btn-lg btn-block">Add Book</button>
    </div>
    <form id="book-form">
      <div class="form-group">
        <input type="text" class="form-control" id="title" placeholder="Title" required>
        <div class="invalid-feedback">Enter a valid title</div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="author" placeholder="Author" required>
        <div class="invalid-feedback">Enter a valid name</div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="isbn" placeholder="ISBN#" required>
        <div class="invalid-feedback">Enter a valid isbn</div>
      </div>
      <div class="form-group" style="margin: 0 10px 20px -15px;">
        <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block" id="add">
        <input type="submit" value="Update" class="btn btn-primary btn-lg btn-block" id="edit">
      </div>
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>ISBN</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="book-list"></tbody>
    </table>
  </div>
</div>
@include('pages.partials.get-code-btn', ['segment' => request()->segment(1)])
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
class Book {
    constructor(title, author, isbn) {
        this.title = title;
        this.author = author;
        this.isbn = isbn;
    }
}

class UI {
  constructor() {
        this.title = document.getElementById('title');
        this.author = document.getElementById('author');
        this.isbn = document.getElementById('isbn');
        this.bookList = document.getElementById('book-list');
        this.showFormBtn = document.getElementById('showForm');
        this.bookForm = document.getElementById('book-form');
        this.table = document.querySelector('.table');
        this.addBtn = document.getElementById('add');
        this.edit = document.getElementById('edit');
    }

  addBookToList(book) {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.isbn}</td>
        <td>
          <a href="#" class="delete float-right"><i class="fa fa-remove"></i><a>
          <a href="#" class="edit float-right"><i class="fa fa-pencil mr-1"></i><a>
        </td>
      `;
      this.bookList.appendChild(row);
  }

  updateBookUI(isbn, book) {
      let list = document.querySelectorAll('#book-list tr');
      console.log(list);
      list = Array.from(list);
      list.forEach((item, index) => {
          if(item.children[2].textContent === isbn){
              document.getElementById('book-list').children[index].innerHTML = `
                  <td>${book.title}</td>
                  <td>${book.author}</td>
                  <td>${book.isbn}</td>
                  <td>
                    <a href="#" class="delete float-right"><i class="fa fa-remove"></i><a>
                    <a href="#" class="edit float-right"><i class="fa fa-pencil mr-1"></i><a>
                  </td>
                `;
          }
      });
  }

  showAlert(message, className) {
      const div = document.createElement('div');
      div.className = `alert ${className}`;
      div.appendChild(document.createTextNode(message));
      // Get parent
      const container = document.querySelector('.container');
      // Insert alert
      container.insertBefore(div, this.bookForm);
      setTimeout(() => document.querySelector('.alert').remove(), 3000);
  }

  deleteBook(target) {
      if(target.parentElement.className === 'delete float-right') {
          target.parentElement.parentElement.parentElement.remove();//fa a td tr
      }
  }

  clearFields() {
      this.title.value = '';
      this.author.value = '';
      this.isbn.value = '';
  }

  clearAddState() {
      this.showFormBtn.style.display = 'block';
      this.bookForm.style.display = 'none';
      this.table.style.visibility = 'visible';
  }

  hideTable() {
      this.table.style.visibility = 'hidden';
  }

  hideEditBtn() {
      this.edit.style.visibility = 'hidden';
  }

  showEditBtn() {
      this.edit.style.visibility = 'visible';
  }

  hideAddBtn() {
      this.addBtn.style.visibility = 'hidden';
  }

  showAddBtn() {
    this.addBtn.style.visibility = 'visible';
  }

  showForm() {
      this.showFormBtn.style.display = 'none';
      this.bookForm.style.display = 'block';
  }
}

class Store {
    static getBooks() {
        let books = [];
        if(localStorage.getItem('books') !== null) {
            books = JSON.parse(localStorage.getItem('books'));
        }
        return books;
    }

    static addBook(book) {
        const books = Store.getBooks();
        books.push(book);
        localStorage.setItem('books', JSON.stringify(books));
    }

    static updateBook(isbn, obj) {
        const books = JSON.parse(localStorage.getItem('books'));
        books.forEach((book, index) => {
           if(book.isbn === isbn) {
              books.splice(index, 1, obj);
           }
        });
        localStorage.setItem('books', JSON.stringify(books));
    }

    static removeBook(isbn) {
        const books = Store.getBooks();

        books.forEach((book, index) => {
           if(book.isbn === isbn) {
              books.splice(index, 1);
           }
        });
        localStorage.setItem('books', JSON.stringify(books));
    }
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
        addEL('storage', displayBooks, false);
    }
    displayBooks();
}
// validation
function validateTitle() {
    const title = document.getElementById('title');
    const re = /^[a-zA-Z0-9\-\s]{2,100}$/;
    !re.test(title.value) ? title.classList.add('is-invalid') : title.classList.remove('is-invalid');
    return re.test(title.value);
}

function validateAuthor() {
    const author = document.getElementById('author');
    const re = /^[a-zA-Z\-\s]{2,50}$/;
    !re.test(author.value) ? author.classList.add('is-invalid') : author.classList.remove('is-invalid');
    return re.test(author.value);
}

function validateIsbn() {
    const isbn = document.getElementById('isbn');
    const re = /^[\d+\-]+?$/;
    !re.test(isbn.value) ? isbn.classList.add('is-invalid') : isbn.classList.remove('is-invalid');
    return re.test(isbn.value);
}
// app
function displayBooks() {
    const books = Store.getBooks();
    const ui  = new UI;
    const bookArr = Array.from(ui.bookList.children);
    bookArr.forEach(book => book.remove());
    books.forEach(book => ui.addBookToList(book));
    if(books.length === 0){
      ui.hideTable();
    }
    ui.hideEditBtn();
}

var addEL = getAddEventListener();
document.addEventListener('DOMContentLoaded', initDisp);
const ui = new UI();
ui.showFormBtn.addEventListener('click', (e) => {
    ui.showForm();
    ui.hideEditBtn();
    ui.showAddBtn();
});
ui.title.addEventListener('blur', validateTitle);
ui.author.addEventListener('blur', validateAuthor);
ui.isbn.addEventListener('blur', validateIsbn);

ui.addBtn.addEventListener('click', (e) => {
    const book = new Book(ui.title.value, ui.author.value, ui.isbn.value);

    if(ui.title.value === '' || ui.author.value === '' || ui.isbn.value === '') {
        ui.showAlert('Please fill in all fields', 'error');
    } else if(validateTitle() === false || validateAuthor() === false || validateIsbn() === false) {
        ui.showAlert('Please fill all fields correctly!', 'error');
    } else {
        ui.addBookToList(book);
        Store.addBook(book);
        ui.clearFields();
        ui.clearAddState();
        ui.showAlert('Book Added!', 'success');
    }
    e.preventDefault();
});

ui.bookList.addEventListener('click', (e) => {
    if(e.target.parentElement.className === 'edit float-right') {
        ui.showForm();
        const path = e.target.parentElement.parentElement;
        ui.title.value = path.parentElement.children[0].textContent;
        ui.author.value = path.parentElement.children[1].textContent;
        isbn = ui.isbn.value = path.previousElementSibling.textContent;
        ui.showEditBtn();
        ui.hideAddBtn();
    }else if(e.target.parentElement.className === 'delete float-right'){
        ui.deleteBook(e.target);
        Store.removeBook(e.target.parentElement.parentElement.previousElementSibling.textContent);
        bookListArray = Array.from(ui.bookList.children);
        if(bookListArray.length === 0) ui.hideTable();
        ui.showAlert('Book Removed!', 'success');
    }
    e.preventDefault();
});

ui.edit.addEventListener('click', (e) => {
    const book = new Book(ui.title.value, ui.author.value, ui.isbn.value);

    if(ui.title.value === '' || ui.author.value === '' || ui.isbn.value === '') {
          ui.showAlert('Please fill in all fields', 'error');
    } else if(validateTitle() === false || validateAuthor() === false || validateIsbn() === false) {
          ui.showAlert('Please fill all fields correctly!', 'error');
    } else {
        ui.updateBookUI(isbn, book);
        Store.updateBook(isbn, book);
        ui.clearFields();
        ui.clearAddState();
        ui.showAlert('Book updated!', 'success');
    }
    e.preventDefault();
});
</script>
@endsection

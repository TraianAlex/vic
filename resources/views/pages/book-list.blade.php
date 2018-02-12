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
    <div class="form-group">
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
      <div class="form-group" style="margin: 0 0 20px -15px;">
        <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
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
  getSelectors() {
    return {
        title: document.getElementById('title'),
        author: document.getElementById('author'),
        isbn: document.getElementById('isbn'),
        bookList: document.getElementById('book-list')
      };
    }

  addBookToList(book) {
      const list = document.getElementById('book-list');
      // Create tr element
      const row = document.createElement('tr');
      // Insert cols
      row.innerHTML = `
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.isbn}</td>
        <td><a href="#" class="delete">X<a></td>
      `;
      list.appendChild(row);
  }

  showAlert(message, className) {
      // Create div
      const div = document.createElement('div');
      // Add classes
      div.className = `alert ${className}`;
      // Add text
      div.appendChild(document.createTextNode(message));
      // Get parent
      const container = document.querySelector('.container');
      // Get form
      const form = document.querySelector('#book-form');
      // Insert alert
      container.insertBefore(div, form);
      // Timeout after 3 sec
      setTimeout(function(){
        document.querySelector('.alert').remove();
      }, 3000);
  }

  deleteBook(target) {
      if(target.className === 'delete') {
          target.parentElement.parentElement.remove();
      }
  }

  clearFields() {
      document.getElementById('title').value = '';
      document.getElementById('author').value = '';
      document.getElementById('isbn').value = '';
  }

  clearAddState() {
      document.getElementById('showForm').style.display = 'block';
      document.getElementById('book-form').style.display = 'none';
      document.querySelector('.table').style.visibility = 'visible';
  }

  hideTable() {
      document.querySelector('.table').style.visibility = 'hidden';
  }
}

class Store {
  static getBooks() {
      let books;
      if(localStorage.getItem('books') === null) {
          books = [];
      } else {
          books = JSON.parse(localStorage.getItem('books'));
      }
      return books;
  }

  static addBook(book) {
      const books = Store.getBooks();
      books.push(book);
      localStorage.setItem('books', JSON.stringify(books));
  }

  static removeBook(isbn) {
      const books = Store.getBooks();

      books.forEach(function(book, index){
         if(book.isbn === isbn) {
            books.splice(index, 1);
         }
      });
      localStorage.setItem('books', JSON.stringify(books));
    }
}

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
    isbn = document.getElementById('isbn');
    const re = /^[\d+\-]+?$/;
    !re.test(isbn.value) ? isbn.classList.add('is-invalid') : isbn.classList.remove('is-invalid');
    return re.test(isbn.value);
}

document.addEventListener('DOMContentLoaded', function(){
      const books = Store.getBooks();
      const ui  = new UI;
      books.forEach(function(book){
          ui.addBookToList(book);
      });
      if(books.length === 0){
        ui.hideTable();
      }
});

document.getElementById('showForm').addEventListener('click', function(e){
    document.getElementById('showForm').style.display = 'none';
    document.getElementById('book-form').style.display = 'block';
});

document.getElementById('title').addEventListener('blur', validateTitle);
document.getElementById('author').addEventListener('blur', validateAuthor);
document.getElementById('isbn').addEventListener('blur', validateIsbn);

document.getElementById('book-form').addEventListener('submit', function(e){
    const ui = new UI();
    const selectors = ui.getSelectors();
    const book = new Book(selectors.title.value, selectors.author.value, selectors.isbn.value);

    if(selectors.title.value === '' || selectors.author.value === '' || selectors.isbn.value === '') {
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

document.getElementById('book-list').addEventListener('click', function(e){
    const ui = new UI();
    const selectors = ui.getSelectors();
    ui.deleteBook(e.target);
    Store.removeBook(e.target.parentElement.previousElementSibling.textContent);
    bookListArray = Array.from(selectors.bookList.children);
    if(bookListArray.length === 0) ui.hideTable();
    ui.showAlert('Book Removed!', 'success');
    e.preventDefault();
});
</script>
@endsection

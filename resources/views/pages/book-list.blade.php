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
  getSelectors() {
    return {
        title: document.getElementById('title'),
        author: document.getElementById('author'),
        isbn: document.getElementById('isbn'),
        bookList: document.getElementById('book-list'),
        showForm: document.getElementById('showForm'),
        bookForm: document.getElementById('book-form'),
        table: document.querySelector('.table'),
        addBtn: document.getElementById('add'),
        edit: document.getElementById('edit')
      };
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
      this.getSelectors().bookList.appendChild(row);
  }

  updateBookUI(isbn, book) {
      let list = document.querySelectorAll('#book-list tr');
      console.log(list);
      list = Array.from(list);
      list.forEach(function(item, index){
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
      container.insertBefore(div, this.getSelectors().bookForm);
      setTimeout(function(){
          document.querySelector('.alert').remove();
      }, 3000);
  }

  deleteBook(target) {
      if(target.parentElement.className === 'delete float-right') {
          target.parentElement.parentElement.parentElement.remove();//fa a td tr
      }
  }

  clearFields() {
      this.getSelectors().title.value = '';
      this.getSelectors().author.value = '';
      this.getSelectors().isbn.value = '';
  }

  clearAddState() {
      this.getSelectors().showForm.style.display = 'block';
      this.getSelectors().bookForm.style.display = 'none';
      this.getSelectors().table.style.visibility = 'visible';
  }

  hideTable() {
      this.getSelectors().table.style.visibility = 'hidden';
  }

  hideEditBtn() {
      this.getSelectors().edit.style.visibility = 'hidden';
  }

  showEditBtn() {
      this.getSelectors().edit.style.visibility = 'visible';
  }

  hideAddBtn() {
      this.getSelectors().addBtn.style.visibility = 'hidden';
  }

  showForm() {
      this.getSelectors().showForm.style.display = 'none';
      this.getSelectors().bookForm.style.display = 'block';
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

    static updateBook(isbn, obj) {
        const books = JSON.parse(localStorage.getItem('books'));
        books.forEach(function(book, index){
           if(book.isbn === isbn) {
              books.splice(index, 1, obj);
           }
        });
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
    const selectors = ui.getSelectors();
    const bookArr = Array.from(selectors.bookList.children);
    bookArr.forEach(function(book){
        book.remove();
    });
    books.forEach(function(book){
        ui.addBookToList(book);
    });
    if(books.length === 0){
      ui.hideTable();
    }
    ui.hideEditBtn();
}

var addEL = getAddEventListener();
document.addEventListener('DOMContentLoaded', initDisp);
const ui = new UI();
const selectors = ui.getSelectors();
selectors.showForm.addEventListener('click', function(e){
    ui.showForm()
});
selectors.title.addEventListener('blur', validateTitle);
selectors.author.addEventListener('blur', validateAuthor);
selectors.isbn.addEventListener('blur', validateIsbn);

selectors.addBtn.addEventListener('click', function(e){
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

selectors.bookList.addEventListener('click', function(e){
    if(e.target.parentElement.className === 'edit float-right') {
        ui.showForm();
        const path = e.target.parentElement.parentElement;
        selectors.title.value = path.parentElement.children[0].textContent;
        selectors.author.value = path.parentElement.children[1].textContent;
        isbn = selectors.isbn.value = path.previousElementSibling.textContent;
        ui.showEditBtn();
        ui.hideAddBtn();
    }else if(e.target.parentElement.className === 'delete float-right'){
        ui.deleteBook(e.target);
        Store.removeBook(e.target.parentElement.parentElement.previousElementSibling.textContent);
        bookListArray = Array.from(selectors.bookList.children);
        if(bookListArray.length === 0) ui.hideTable();
        ui.showAlert('Book Removed!', 'success');
    }
    e.preventDefault();
});

selectors.edit.addEventListener('click', function(e) {
    const book = new Book(selectors.title.value, selectors.author.value, selectors.isbn.value);

    if(selectors.title.value === '' || selectors.author.value === '' || selectors.isbn.value === '') {
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

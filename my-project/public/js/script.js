/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
document.getElementById('putComment').addEventListener('click', putComment);
getArticle();
getComments();

function getArticle() {
  var httpRequest;

  if (window.XMLHttpRequest) {
    // Mozilla, Safari, ...
    httpRequest = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    // IE
    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  httpRequest.onreadystatechange = function () {
    fillArticle(httpRequest);
  };

  httpRequest.open('POST', 'article/get', true);
  var data = {
    _token: document.getElementsByName('_token')[0].value
  };
  var FD = new FormData();

  for (name in data) {
    FD.append(name, data[name]);
  }

  httpRequest.send(FD);
}

function getComments() {
  var httpRequest;

  if (window.XMLHttpRequest) {
    // Mozilla, Safari, ...
    httpRequest = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    // IE
    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  httpRequest.onreadystatechange = function () {
    fillComments(httpRequest);
  };

  httpRequest.open('POST', 'comment/get', true);
  var data = {
    _token: document.getElementsByName('_token')[0].value
  };
  var FD = new FormData();

  for (name in data) {
    FD.append(name, data[name]);
  }

  httpRequest.send(FD);
}

function fillArticle(httpRequest) {
  if (httpRequest.readyState === 4) {
    if (httpRequest.status === 200) {
      var content = JSON.parse(httpRequest.responseText);
      document.getElementById('article-title').innerText = content.title;
      document.getElementById('article-content').innerHTML = content.content;
    } else {
      alert('Filling article problem! Call me!');
    }
  }
}

function fillComments(httpRequest) {
  if (httpRequest.readyState === 4) {
    if (httpRequest.status === 200) {
      var commentContainer = document.getElementById('comments-content');
      commentContainer.innerHTML = '';
      JSON.parse(httpRequest.responseText).forEach(function (item) {
        insertComment(item.created_at, item.user_name, item.content);
      });
    } else {
      alert('Filling comments problem! Call me!');
    }
  }
}

function putComment() {
  var httpRequest;

  if (window.XMLHttpRequest) {
    // Mozilla, Safari, ...
    httpRequest = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    // IE
    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  httpRequest.open('POST', 'comment/post', true);
  var data = {
    _token: document.getElementsByName('_token')[0].value,
    name: document.getElementById('inputName').value,
    email: document.getElementById('inputEmail').value,
    content: document.getElementById('textareaContent').value
  };
  var FD = new FormData();

  for (name in data) {
    FD.append(name, data[name]);
  }

  httpRequest.addEventListener('load', function (event) {
    var httpResponse = JSON.parse(httpRequest.responseText);
    insertComment(httpResponse.created_at, httpResponse.user_name, httpResponse.content);
  });
  httpRequest.addEventListener(' error', function (event) {
    alert('Commenting problem. Call me!');
  });
  httpRequest.send(FD);
}

function insertComment(createdAt, name, content) {
  var commentContainer = document.getElementById('comments-content');
  var li = document.createElement('li');
  li.innerHTML = '<small class="fw-light">' + createdAt + ' ' + name + '</small>' + ' ' + content;
  commentContainer.prepend(li);
}
/******/ })()
;
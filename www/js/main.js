/** Main **/
var form = document.getElementById('window');
var bg = document.getElementById('gray');

function show_popup() {
  bg.style.display = 'block';
  bg.classList.remove('fadeout');
  bg.classList.add('fadein');
  form.style.display = 'block';
  form.classList.remove('scaleout');
  form.classList.add('scalein');
}

function close_popup() {
  bg.classList.remove('fadein');
  bg.classList.add('fadeout');
  setTimeout(()=>{ bg.style.display = 'none'; }, 200);
  form.classList.remove('scalein');
  form.classList.add('scaleout');
  setTimeout(()=>{ form.style.display = 'none'; }, 100);
}

/** Control-panel **/
var tests = document.getElementById('tests');
var editor = document.getElementById('editor');
var users = document.getElementById('users');
var groups = document.getElementById('groups');
var results = document.getElementById('results');
var p_stage = 1;

var show_page = function(pg) {
  setTimeout(()=>{ pg.style.display = 'block';
  pg.classList.remove('fadeout');
  pg.classList.add('fadein'); }, 100);
};

var close_page = function(pg) {
  pg.classList.remove('fadein');
  pg.classList.add('fadeout');
  setTimeout(()=>{ pg.style.display = 'none'; }, 100);
};

function switch_page(n) {
  if (p_stage != n) {
    switch (n) {
      case 1:
        close_page(editor);
        close_page(users);
        close_page(groups);
        close_page(results);
        show_page(tests);
        break;
      case 2:
        close_page(tests);
        close_page(users);
        close_page(groups);
        close_page(results);
        show_page(editor);
        break;
      case 3:
        close_page(editor);
        close_page(tests);
        close_page(groups);
        close_page(results);
        show_page(users);
        break;
      case 4:
        show_page(groups);
        close_page(editor);
        close_page(users);
        close_page(tests);
        close_page(results);
        break;
      case 5:
        close_page(editor);
        close_page(users);
        close_page(groups);
        close_page(tests);
        show_page(results);
        break;
      default:
        close_page(editor);
        close_page(users);
        close_page(groups);
        close_page(results);
        show_page(tests);
    }
    p_stage = n;
  }
}

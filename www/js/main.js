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

/** Control/test-panel **/
var doc = document;
var tests = doc.getElementById('tests');
var editor_newtest = doc.getElementById('editor_newtest');
var editor_edittest = doc.getElementById('editor_edittest');
var editor_editquestion = doc.getElementById('editor_editquestion');
var editor_newquestion = doc.getElementById('editor_newquestion');
var editor_newanswer = doc.getElementById('editor_newanswer');
var editor_newuser = doc.getElementById('editor_newuser');
var editor_newgroup = doc.getElementById('editor_newgroup');
var editor_results = doc.getElementById('editor_results');
var users = doc.getElementById('users');
var groups = doc.getElementById('groups');
var results = doc.getElementById('results');
var testlist = doc.getElementById('testlist');
var opentest = doc.getElementById('opentest');
var starttest = doc.getElementById('starttest');
var endtest = doc.getElementById('endtest');
var p_stage = 1;
var p_stage_tp = 1;

var show_page = function(pg) {
  setTimeout(()=>{ pg.style.display = 'flex';
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
        close_page(editor_newtest); close_page(editor_edittest); close_page(editor_editquestion);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(tests);
        break;
      case 2:
        close_page(editor_edittest); close_page(editor_editquestion); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(editor_newtest);
        break;
      case 3:
        close_page(editor_newtest); close_page(editor_edittest); close_page(editor_editquestion);
        close_page(tests); close_page(groups); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(users);
        break;
      case 4:
        close_page(editor_newtest); close_page(editor_edittest); close_page(editor_editquestion);
        close_page(users); close_page(tests); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(groups);
        break;
      case 5:
        close_page(editor_newtest); close_page(editor_edittest); close_page(editor_editquestion);
        close_page(users); close_page(groups); close_page(tests);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(results);
        break;
      case 6:
        close_page(editor_newtest); close_page(editor_editquestion); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(editor_edittest);
        break;
      case 7:
        close_page(editor_newtest); close_page(editor_edittest); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(editor_editquestion);
        break;
      case 8:
        close_page(editor_newtest); close_page(editor_edittest); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_editquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(editor_newquestion);
        break;
      case 9:
        close_page(editor_newtest); close_page(editor_edittest); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_editquestion); close_page(editor_newquestion);
        close_page(editor_newuser); close_page(editor_newgroup);
        close_page(editor_results);
        show_page(editor_newanswer);
        break;
      case 10:
        close_page(editor_newtest); close_page(editor_edittest); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_editquestion); close_page(editor_newquestion);
        close_page(editor_newanswer); close_page(editor_newgroup);
        close_page(editor_results);
        close_page(editor_results);
        show_page(editor_newuser);
        break;
      case 11:
        close_page(editor_newtest); close_page(editor_edittest); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_editquestion); close_page(editor_newquestion);
        close_page(editor_newanswer); close_page(editor_newuser);
        close_page(editor_results);
        show_page(editor_newgroup);
        break;
      case 12:
        close_page(editor_newtest); close_page(editor_edittest); close_page(tests);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_editquestion); close_page(editor_newquestion);
        close_page(editor_newanswer); close_page(editor_newuser);
        close_page(editor_newgroup);
        show_page(editor_results);
        break;
      default:
        close_page(editor_newtest); close_page(editor_edittest); close_page(editor_editquestion);
        close_page(users); close_page(groups); close_page(results);
        close_page(editor_newquestion); close_page(editor_newanswer);
        close_page(editor_newuser); close_page(editor_newgroup);
        show_page(tests);
        break;
    }
    p_stage = n;
  }
}

function $_GET(key) { //найти определенный get-параметр
    var p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}

function $_GET_ARR() { //массив get-параметров
  var a = window.location.search;
  var b = new Object();
  a = a.substring(1).split("&");
  for (var i = 0; i < a.length; i++) {
	c = a[i].split("=");
      b[c[0]] = c[1];
  }
  return b;
}

function js_getParam() {
  var getArr = $_GET_ARR();
  var lastGET;
  for (var x in getArr) { //находим последный get-параметр, чтобы определить на какой странице остаться
    lastGET = x;
  }
    switch (x) {
      case 'edit_t': switch_page(6); break;
      case 'edit_q': switch_page(7); break;
      case 'edit_u': switch_page(3); break;
      case 'edit_g': switch_page(4); break;
      case 'edit_r': switch_page(12); break;

      case 'del_t': switch_page(1); break;
      case 'del_q': switch_page(6); break;
      case 'del_a': switch_page(7); break;
      case 'del_u': switch_page(3); break;
      case 'del_g': switch_page(4); break;
      case 'del_r': switch_page(5); break;
      case 'del_cr': switch_page(12); break;

      case 'new_t': switch_page(2); break;
      case 'new_q': switch_page(8); break;
      case 'new_a': switch_page(9); break;
      case 'new_u': switch_page(10); break;
      case 'new_g': switch_page(11); break;
    default:
    }
    console.log(lastGET+'='+$_GET(lastGET));
}

function js_getParamTP() {
  var getArr = $_GET_ARR();
  var lastGET;
  for (var x in getArr) {
    lastGET = x;
  }
  switch (x) {
    case 'test': switch_page_tp(2); break;
    case 'question': switch_page_tp(3); break;
    case 'end': switch_page_tp(4); break;
    default: break;
  }
    console.log(lastGET+'='+$_GET(lastGET));
}

function switch_page_tp(n) {
  if (p_stage_tp != n) {
    switch (n) {
      case 1: close_page(opentest); close_page(starttest); close_page(endtest); show_page(testlist); break;
      case 2: close_page(testlist); close_page(starttest); close_page(endtest); show_page(opentest); break;
      case 3: close_page(opentest); close_page(testlist); close_page(endtest); show_page(starttest); break;
      case 4: close_page(opentest); close_page(testlist); close_page(starttest); show_page(endtest); break;
    }
  }
}

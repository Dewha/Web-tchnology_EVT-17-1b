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

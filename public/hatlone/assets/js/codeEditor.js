/* editor code file */
const editor = document.querySelector('#editor')
const result = document.querySelector('.result')
const save = document.querySelector('#save')

editor.addEventListener('keyup',()=>{
  var html = editor.textContent;
  result.srcdoc = html
})

// save event
save.addEventListener('click',()=>{
  var html = editor.innerHTML
  var link = document.createElement('a');
  link.setAttribute('download','index.html')
  link.setAttribute('href','data:text/html;charset=utf-8,'+ encodeURIComponent(html))
  link.click()
})

/* editor code homework */
const editorHomework = document.querySelector('#editorHomework')
const resultHomework = document.querySelector('.resultHomework')
const saveHomework = document.querySelector('#saveHomework')

editorHomework.addEventListener('keyup',()=>{
  var html = editorHomework.textContent;
  resultHomework.srcdoc = html
})

// save event
saveHomework.addEventListener('click',()=>{
  var html = editorHomework.innerHTML
  var link = document.createElement('a');
  link.setAttribute('download','index.html')
  link.setAttribute('href','data:text/html;charset=utf-8,'+ encodeURIComponent(html))
  link.click()
})
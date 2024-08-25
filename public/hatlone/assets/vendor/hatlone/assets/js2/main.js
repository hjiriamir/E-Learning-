const divContent = document.querySelector('#showIcon');

let show = function() {
    divContent.style.display = 'block';
}

/* Show Hide Vd */
const divContainer = document.querySelector('#element');
let isClicked = true;

let showOrHide = function() {
  if(isClicked){
    divContainer.style.display = 'block';
    isClicked = false;
  }else{
    divContainer.style.display = 'none';
    isClicked = true;
  }
}
/* add section 
const addItemToList = () => {
  const list = document.querySelector('.section');
  
  const listItem = document.createElement('p');
  listItem.innerText = 'Section 2';
  
  list.append(listItem);
};

const listAdderButton = document.querySelector('.sectionBtn');
listAdderButton.addEventListener('click', addItemToList);*/

/* add input 
const inputText = document.querySelector('#txt');
const myButton = document.querySelector('.btn-list');
const list = document.querySelector('.addList ul');

myButton.addEventListener('click', (e)=> {
  if(inputText.value != ""){
    e.preventDefault();
    // create li
    const myLi = document.createElement('li');
    myLi.innerHTML = inputText.value;
    list.appendChild(myLi);
  }
});*/





const tagsInput = document.getElementById('tags-input');
const tagsList = document.getElementById('tags-list');
const selectedTagsList = document.getElementById('selected-tags-list');
const tags = ['Book', 'Linux', 'Art', 'JavaScript', 'Development', 'Software', 'PHP', 'Design'];
let selectedTags = [];

tagsInput.addEventListener('input', () => {
  const query = tagsInput.value.trim().toLowerCase();
  const filteredTags = tags.filter(tag => tag.toLowerCase().startsWith(query));
  displayTags(filteredTags);
});

tagsInput.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    event.preventDefault();
    const newTag = tagsInput.value.trim();
    if (newTag !== '' && !selectedTags.includes(newTag)) {
      addTag(newTag);
    }
  }
});

function displayTags(filteredTags) {
  if (filteredTags.length === 0) {
    tagsList.style.display = 'none';
    return;
  }
  tagsList.innerHTML = '';
  filteredTags.forEach(tag => {
    const tagElem = document.createElement('li');
    tagElem.textContent = tag;
    tagElem.addEventListener('click', () => {
      addTag(tag);
    });
    tagsList.appendChild(tagElem);
  });
  tagsList.style.display = 'block';
}

/*function addTag(tag) {
  selectedTags.push(tag);
  const tagElem = document.createElement('li');
  const tagText = document.createElement('span');
  tagText.textContent = tag;
  const closeBtn = document.createElement('span');
  closeBtn.classList.add('close-btn');
  closeBtn.textContent = 'x';
  closeBtn.addEventListener('click', () => {
    removeTag(tagElem);
  });
  tagElem.appendChild(tagText);
  tagElem.appendChild(closeBtn);
  selectedTagsList.appendChild(tagElem);
  tagsInput.value = '';
  tagsList.style.display = 'none';
  selectedTagsList.style.display = 'block';
}

function removeTag(tagElem) {
  const tag = tagElem.textContent;
  selectedTags = selectedTags.filter(t => t !== tag);
  tagElem.parentNode.removeChild(tagElem);
  if (selectedTags.length === 0) {
    selectedTagsList.style.display = 'none';
  }
}

/* select skills 
const buttonsContainer = document.getElementById("buttonsContainer");
const addedButtonsContainer = document.getElementById("addedButtonsContainer"); // Nouveau conteneur
const buttonNames = [];

for (let i = 0; i < buttonNames.length; i++) {
  const button = document.createElement("button");
  button.innerHTML = buttonNames[i];
  button.classList.add("my-button");
  buttonsContainer.appendChild(button);

  let buttonAdded = false;

  button.onclick = function(event) {
    event.preventDefault(); 
    if (!buttonAdded) {
      const newButton = document.createElement("button");
      newButton.innerHTML = buttonNames[i] + " <span class='my-button delete'>x</span>";
      newButton.classList.add("my-button", "added");
      addedButtonsContainer.insertBefore(newButton, addedButtonsContainer.firstChild);

      const deleteButton = newButton.querySelector(".my-button.delete");
      deleteButton.onclick = function() {
        addedButtonsContainer.removeChild(newButton);
        buttonAdded = false;
      };

      buttonAdded = true;
    }
  };
}*/
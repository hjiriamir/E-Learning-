/* homework */
let optionsButtonsHomework = document.querySelectorAll(".option-button-homework");
let advancedOptionButtonHomework = document.querySelectorAll(".adv-option-button-homework");
let writingAreaHomework = document.getElementById("text-input");
let linkButtonHomework = document.getElementById("createLink");
let alignButtonsHomework = document.querySelectorAll(".align");
let spacingButtonsHomework = document.querySelectorAll(".spacing");
let formatButtonsHomework = document.querySelectorAll(".format");
let scriptButtonsHomework = document.querySelectorAll(".script");

//Initial Settings
const initializerHomework = () => {
  //Highlighting buttons
  highlighterHomework(alignButtonsHomework, true);
  highlighterHomework(spacingButtonsHomework, true);
  highlighterHomework(formatButtonsHomework, false);
  highlighterHomework(scriptButtonsHomework, true);

};


const modifyTextHomework = (command, defaultUi, value) => {
  document.execCommand(command, defaultUi, value);
};

//For basic operations which don't need value parameter
optionsButtonsHomework.forEach((button) => {
  button.addEventListener("click", () => {
    modifyTextHomework(button.id, false, null);
  });
});

//options that require value parameter (e.g colors, fonts)
advancedOptionButtonHomework.forEach((button) => {
  button.addEventListener("change", () => {
    modifyTextHomework(button.id, false, button.value);
  });
});

//link
/*linkButtonHomework.addEventListener("click", () => {
  let userLink = prompt("Enter a URL");

  if (/http/i.test(userLink)) {
    modifyTextHomework(linkButtonHomework.id, false, userLink);
  } else {
    userLink = "http://" + userLink;
    modifyTextHomework(linkButtonHomework.id, false, userLink);
  }
});*/

//Highlight clicked button
const highlighterHomework = (className, needsRemoval) => {
  className.forEach((button) => {
    button.addEventListener("click", () => {

      if (needsRemoval) {
        let alreadyActive = false;

        if (button.classList.contains("active")) {
          alreadyActive = true;
        }

        highlighterRemoverHomework(className);
        if (!alreadyActive) {
          button.classList.add("active");
        }
      } else {
        button.classList.toggle("active");
      }
    });
  });
};

const highlighterRemoverHomework = (className) => {
  className.forEach((button) => {
    button.classList.remove("active");
  });
};

window.onload = initializerHomework();
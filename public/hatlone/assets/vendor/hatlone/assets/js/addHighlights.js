var addHighlights = document.getElementById("moreHighlights");
var inputHighlights = document.getElementById("inputHighlights");
var count = 0;

addHighlights.addEventListener("click", function() {
  count++;
  var myInput = document.createElement("input");
  myInput.classList.add("input-" + count);
  myInput.setAttribute("placeholder", "Enter your highlight...");
  var highlight = document.createElement("div");
  highlight.classList.add("addInputs");
  highlight.appendChild(myInput);

  var deleteHighlights = document.createElement("i");
  deleteHighlights.classList.add("bi", "bi-trash", "btn-delete");
  deleteHighlights.addEventListener("click", function() {
    highlight.remove();
  });
  highlight.appendChild(deleteHighlights);

  inputHighlights.appendChild(highlight);
});
let rangeMinWebinars = 0;
const rangeWebinars = document.querySelector(".range-selected-webinars");
const rangeInputWebinars = document.querySelectorAll(".range-input-webinars input");
const rangePriceWebinars = document.querySelectorAll(".range-price-webinars input");

rangeInputWebinars.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minRange = parseInt(rangeInputWebinars[0].value);
    let maxRange = parseInt(rangeInputWebinars[1].value);
    if (maxRange - minRange < rangeMinWebinars) {     
      if (e.target.className === "min") {
        rangeInputWebinars[0].value = maxRange - rangeMinWebinars;        
      } else {
        rangeInputWebinars[1].value = minRange + rangeMinWebinars;        
      }
    } else {
      rangePriceWebinars[0].value = minRange;
      rangePriceWebinars[1].value = maxRange;
      rangeWebinars.style.left = (minRange / rangeInputWebinars[0].max) * 100 + "%";
      rangeWebinars.style.right = 100 - (maxRange / rangeInputWebinars[1].max) * 100 + "%";
    }
  });
});
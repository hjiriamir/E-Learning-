let rangeMinCoachings = 0;
const rangeCoachings = document.querySelector(".range-selected-coachings");
const rangeInputCoachings = document.querySelectorAll(".range-input-coachings input");
const rangePriceCoachings = document.querySelectorAll(".range-price-coachings input");

rangeInputCoachings.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minRange = parseInt(rangeInputCoachings[0].value);
    let maxRange = parseInt(rangeInputCoachings[1].value);
    if (maxRange - minRange < rangeMinCoachings) {     
      if (e.target.className === "min") {
        rangeInputCoachings[0].value = maxRange - rangeMinCoachings;        
      } else {
        rangeInputCoachings[1].value = minRange + rangeMinCoachings;        
      }
    } else {
      rangePriceCoachings[0].value = minRange;
      rangePriceCoachings[1].value = maxRange;
      rangeCoachings.style.left = (minRange / rangeInputCoachings[0].max) * 100 + "%";
      rangeCoachings.style.right = 100 - (maxRange / rangeInputCoachings[1].max) * 100 + "%";
    }
  });
});
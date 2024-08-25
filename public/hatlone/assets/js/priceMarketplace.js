let rangeMinMarketplace = 0;
const rangeMarketplace = document.querySelector(".range-selected-marketplace");
const rangeInputMarketplace = document.querySelectorAll(".range-input-marketplace input");
const rangePriceMarketplace = document.querySelectorAll(".range-price-marketplace input");

rangeInputMarketplace.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minRange = parseInt(rangeInputMarketplace[0].value);
    let maxRange = parseInt(rangeInputMarketplace[1].value);
    if (maxRange - minRange < rangeMinMarketplace) {     
      if (e.target.className === "min") {
        rangeInputMarketplace[0].value = maxRange - rangeMinMarketplace;        
      } else {
        rangeInputMarketplace[1].value = minRange + rangeMinMarketplace;        
      }
    } else {
      rangePriceMarketplace[0].value = minRange;
      rangePriceMarketplace[1].value = maxRange;
      rangeMarketplace.style.left = (minRange / rangeInputMarketplace[0].max) * 100 + "%";
      rangeMarketplace.style.right = 100 - (maxRange / rangeInputMarketplace[1].max) * 100 + "%";
    }
  });
});
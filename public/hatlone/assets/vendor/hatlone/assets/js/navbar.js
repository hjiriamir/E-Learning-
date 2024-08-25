/* button-backTotop */
window.onscroll = function() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("backTotop").style.display = "block";
  } else {
    document.getElementById("backTotop").style.display = "none";
  }
};
document.getElementById("backTotop").addEventListener("click", function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});
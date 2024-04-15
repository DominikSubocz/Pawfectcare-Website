const navButton = document.querySelector("#nav-button");
const navList = document.querySelector("#nav-list");

/// Show/hide navigation on mobile if button is clicked
navButton.addEventListener("click", function() {
  navList.classList.toggle("show-on-mobile");
});

/*
  Hide the navigation if a link is clicked.
  Useful if the navigation contains links to 
  locations on the same page.
*/
navList.addEventListener("click", function() {
  if (navList.classList.contains("show-on-mobile")) {
    navList.classList.remove("show-on-mobile");
  }
});
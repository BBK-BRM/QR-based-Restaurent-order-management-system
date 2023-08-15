links = document.querySelectorAll(".link");
links.forEach(link => {
  link.addEventListener('click', () => {
    if (link.classList == "active") {
      link.classList.remove();
    }
    else {
      link.classList.add("active");
    }
  })
});

function dropmenu() {
  document.getElementById("dropdown").classList.toggle("show");
}

window.onclick = function (event) {
  if (!event.target.matches('#user')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function loadSection(section) {
    let url = '';
  
    switch (section) {
      case 'members':
        url = '../php/memberlist.php';
        break;
      case 'insert':
        url = '../php/additem.php';
        break;
      case 'profile':
        url = '../php/updateprofile.php';
        break;
      default:
        url = '';
    }
  
    if (url) {
      fetch(url)
        .then(response => response.text())
        .then(html => {
          document.getElementById('main-content').innerHTML = html;
        })
        .catch(error => {
          console.error('Error loading section:', error);
          document.getElementById('main-content').innerHTML = "<div class='alert alert-danger'>Failed to load section.</div>";
        });
    }
  }
  
  function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
  
    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("admin-theme", "dark");
    } else {
      localStorage.setItem("admin-theme", "light");
    }
  }
  
  // Apply saved theme on page load
  window.addEventListener("DOMContentLoaded", () => {
    if (localStorage.getItem("admin-theme") === "dark") {
      document.body.classList.add("dark-mode");
    }
  });
  
const header = document.querySelector("header");

window.addEventListener("scroll" , function(){
    header.classList.toggle ("sticky", this.window.scrollY > 0);
})
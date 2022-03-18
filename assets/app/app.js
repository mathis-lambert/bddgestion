// Bouton du mode nuit présent dans la NAVBAR
const nightBtn = document.getElementById("night-mode");
const body = document.querySelector("body");

nightBtn.addEventListener("click", nightModeSwitch);

function nightModeSwitch() {
  console.log("click");
  if (body.className == "dark") {
    body.className = "";
    body.className += "white";
  } else {
    body.className = "";
    body.className += "dark";
  }
}

var actualPage = window.document.location.pathname;
console.log(actualPage);

const index = document.getElementById("index");
const connect = document.getElementById("connect");

if (actualPage == "/index.php" || actualPage == "/") {
  index.className += "active";
} else if (actualPage == "/controllers/connect.php") {
  connect.className += "active";
}

function connectNormal() {
  window.location.pathname = "/controllers/connect-normal.php";
}
function letInscription() {
  window.location.pathname = "/controllers/let-inscription.php";
}
function connectAdmin() {
  window.location.pathname = "/controllers/connect-admin.php";
}

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

// toggle l'état actif ou inactif des bouttons de la side nav
var actualPage = window.document.location.pathname;
console.log(actualPage);

const indexButton = document.getElementById("index");
const connectButton = document.getElementById("connect");

if (actualPage == "/SAE/index.php" || actualPage == "/SAE/") {
  indexButton.className += "active";
} else if (
  actualPage == "/SAE/controllers/connect.php" ||
  actualPage == "/SAE/controllers/connect-normal.php" ||
  actualPage == "/SAE/controllers/connect-admin.php"
) {
  connectButton.className += "active";
}

function connectNormal() {
  window.location.pathname = "/SAE/controllers/connect-normal.php";
}
function connectAdmin() {
  window.location.pathname = "/SAE/controllers/connect-admin.php";
}
function letInscription() {
  window.location.pathname = "/SAE/controllers/let-inscription.php";
}

// Modal pour les boutons qui servent à éditer les tables
const addButton = document.getElementById("add");
const editButton = document.getElementById("update");
const deleteButton = document.getElementById("delete");
const addBgModal = document.getElementById("add-bg-modal");
const editBgModal = document.getElementById("edit-bg-modal");
const deleteBgModal = document.getElementById("delete-bg-modal");
const addModal = document.getElementById("add-modal");
const editModal = document.getElementById("edit-modal");
const deleteModal = document.getElementById("delete-modal");

addButton.addEventListener("click", () => {
  addModal.style.visibility = "visible";
  addModal.style.opacity = "1";
  body.style.overflow = "hidden";
});
editButton.addEventListener("click", () => {
  editModal.style.visibility = "visible";
  editModal.style.opacity = "1";
  body.style.overflow = "hidden";
});
deleteButton.addEventListener("click", () => {
  deleteModal.style.visibility = "visible";
  deleteModal.style.opacity = "1";
  body.style.overflow = "hidden";
});
addBgModal.addEventListener("click", () => {
  body.style.overflow = "";
  addModal.style.opacity = "0";
  addModal.style.visibility = "hidden";
  console.log("click");
});
editBgModal.addEventListener("click", () => {
  body.style.overflow = "";
  editModal.style.opacity = "0";
  editModal.style.visibility = "hidden";
  console.log("click");
});
deleteBgModal.addEventListener("click", () => {
  body.style.overflow = "";
  deleteModal.style.opacity = "0";
  deleteModal.style.visibility = "hidden";
  console.log("click");
});

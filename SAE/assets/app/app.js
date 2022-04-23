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

// selection des boutons de la side nav
const indexButton = document.getElementById("index");
const connectButton = document.getElementById("connect");
const reserverButton = document.getElementById("resa");
const voirResaButton = document.getElementById("seeresa");
const paimCotButton = document.getElementById("paimcot");
const gestAdhButton = document.getElementById("gestadh");
const gestCotButton = document.getElementById("gestcots");
const gestResaButton = document.getElementById("gestresa");

if (actualPage == "/SAE/index.php" || actualPage == "/SAE/") {
  indexButton.className += "active";
} else if (
  actualPage == "/SAE/controllers/connect.php" ||
  actualPage == "/SAE/controllers/connect-normal.php" ||
  actualPage == "/SAE/controllers/connect-admin.php"
) {
  connectButton.className += "active";
} else if (actualPage == "/SAE/pages/reservations.php") {
  reserverButton.className += "active";
} else if (actualPage == "/SAE/pages/voir-mes-reservations.php") {
  voirResaButton.className += "active";
} else if (actualPage == "/SAE/pages/paiement-cotisation.php") {
  paimCotButton.className += "active";
} else if (actualPage == "/SAE/pages/gestion-des-reservations.php") {
  gestResaButton.className += "active";
} else if (actualPage == "/SAE/pages/gestion-des-donnees.php") {
  gestAdhButton.className += "active";
} else if (actualPage == "/SAE/pages/gestion-des-cotisations.php") {
  gestCotButton.className += "active";
}

// lorsqu'on clique sur les cartes, la cartes concernée execute une des fonctions suivante
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

// OUVRE LE MODAL LORSQUON CLICK SUR UN BOUTON
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

// FERME LE MODAL LORSQUE ON CLICK SUR L'ARRIERE PLAN
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

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
const embButton = document.getElementById("emb");
/* const menuItems = Array(document.querySelectorAll(".sn-items a"));

console.log(menuItems);

menuItems['']?.ariaSelected = "false";
 */
if (actualPage == "/SAE/index.php" || actualPage == "/SAE/") {
  indexButton.className += "active";
  indexButton.ariaSelected = "true";
} else if (
  actualPage == "/SAE/controllers/connect.php" ||
  actualPage == "/SAE/controllers/connect-normal.php" ||
  actualPage == "/SAE/controllers/connect-admin.php"
) {
  connectButton.className += "active";
  connectButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/reservations.php") {
  reserverButton.className += "active";
  reserverButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/voir-mes-reservations.php") {
  voirResaButton.className += "active";
  voirResaButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/paiement-cotisation.php") {
  paimCotButton.className += "active";
  paimCotButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/gestion-des-reservations.php") {
  gestResaButton.className += "active";
  gestResaButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/gestion-des-donnees.php") {
  gestAdhButton.className += "active";
  gestAdhButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/gestion-des-cotisations.php") {
  gestCotButton.className += "active";
  gestCotButton.ariaSelected = "true";
} else if (actualPage == "/SAE/pages/nos-embarcations.php") {
  embButton.className += "active";
  embButton.ariaSelected = "true";
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
function reservation() {
  window.location.pathname = "/SAE/pages/reservations.php";
}
function seeResa() {
  window.location.pathname = "/SAE/pages/voir-mes-reservations.php";
}
function paimCot() {
  window.location.pathname = "/SAE/pages/paiement-cotisation.php";
}
function gestCot() {
  window.location.pathname = "/SAE/pages/gestion-des-cotisations.php";
}
function gestAdh() {
  window.location.pathname = "/SAE/pages/gestion-des-donnees.php";
}
function gestResa() {
  window.location.pathname = "/SAE/pages/gestion-des-reservations.php";
}
function embarcation() {
  window.location.pathname = "/SAE/pages/nos-embarcations.php";
}
function profil() {
  window.location.pathname = "/SAE/pages/profil.php";
}

// pick les modal
const modal = document.querySelectorAll(".modal");
const bgModal = document.querySelectorAll(".bg-modal");
// ----------------------------------

//fonction qui établi les comparaisons
const myGreatFunction = (isVisible, index) => {
  /* modal[index].style.visibility = isVisible ? "visible" : "hidden";
  modal[index].style.opacity = isVisible ? 1 : 0; */
  modal[index].classList.contains("active")
    ? modal[index].classList.remove("active")
    : modal[index].classList.add("active");
  document.body.style.overflow = isVisible ? "hidden" : "";
};
// ---------------------

// pour chaque arrière plan de modal
// => onclick
// {Fermer la modal}
bgModal.forEach((bgmod, index) =>
  bgmod.addEventListener("click", () => myGreatFunction(false, index))
);
// ---------------------

const buttons = document.querySelectorAll(".edit-menu-button"); // Boutons add et edit

// pour chaque arrière plan de modal
// => onclick
// {Ouvrir la modal}
buttons.forEach((button, index) => {
  button.addEventListener("click", () => {
    myGreatFunction(true, index);
  });
});
// ---------------------

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
  window.location.pathname = "/SAE/pages/gestion-des-donnees.php";
}
function embarcation() {
  window.location.pathname = "/SAE/pages/nos-embarcations.php";
}

if (actualPage == "/SAE/pages/paiement-cotisation.php") {
  // pick les modal
  const modal = document.querySelectorAll(".modal");
  const bgModal = document.querySelectorAll(".bg-modal");
  console.log(modal, bgModal);
  // ----------------------------------

  bgModal["0"].addEventListener("click", () => {
    document.body.style.overflow = "";
    modal["0"].style.opacity = "0";
    modal["0"].style.visibility = "hidden";
    console.log("click");
  });

  if (bgModal["1"]) {
    bgModal["1"].addEventListener("click", () => {
      document.body.style.overflow = "";
      modal["1"].style.opacity = "0";
      modal["1"].style.visibility = "hidden";
      modal["1"].className = "modal";
      console.log("click");
    });
  }

  const cotisButton = document.getElementById("cotiser");
  if (cotisButton) {
    cotisButton.addEventListener("click", () => {
      console.log("click");
      modal["0"].style.visibility = "visible";
      modal["0"].style.opacity = "1";
      document.body.style.overflow = "hidden";
    });
  }
}
if (
  actualPage == "/SAE/pages/gestion-des-donnees.php" ||
  actualPage == "/SAE/pages/gestion-des-cotisations.php" ||
  actualPage == "/SAE/pages/gestion-des-reservations.php" ||
  actualPage == "/SAE/pages/nos-embarcations.php"
) {
  // pick les modal
  const modal = document.querySelectorAll(".modal");
  const bgModal = document.querySelectorAll(".bg-modal");
  // ----------------------------------

  // modal d'ajout
  const addButton = document.getElementById("add");
  addButton.addEventListener("click", () => {
    modal["0"].style.visibility = "visible";
    modal["0"].style.opacity = "1";
    document.body.style.overflow = "hidden";
  });
  bgModal["0"].addEventListener("click", () => {
    document.body.style.overflow = "";
    modal["0"].style.opacity = "0";
    modal["0"].style.visibility = "hidden";
  });
  // ----------------------------------

  // modal de modification
  const editButton = document.getElementById("update");
  editButton.addEventListener("click", () => {
    modal["1"].style.visibility = "visible";
    modal["1"].style.opacity = "1";
    document.body.style.overflow = "hidden";
  });
  bgModal["1"].addEventListener("click", () => {
    document.body.style.overflow = "";
    modal["1"].style.opacity = "0";
    modal["1"].style.visibility = "hidden";
    console.log("lick");
    modal["1"].className = "modal";
  });
  // ----------------------------------

  // modal de suppression
  const deleteButton = document.getElementById("delete");
  deleteButton.addEventListener("click", () => {
    modal["2"].style.visibility = "visible";
    modal["2"].style.opacity = "1";
    document.body.style.overflow = "hidden";
  });
  bgModal["2"].addEventListener("click", () => {
    document.body.style.overflow = "";
    modal["2"].style.opacity = "0";
    modal["2"].style.visibility = "hidden";
  });
  // ----------------------------------
}
function closeForm() {
  const form = document.getElementById("inscription-form");

  form.className += " hide";
}

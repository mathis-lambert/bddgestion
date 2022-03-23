let pathname = window.location.pathname;
console.log(pathname);

if (pathname == "/TP_LE_DRUILLENEC/index.php") {
  document.getElementById("index").className = "";
  document.getElementById("index").className = "active";
}
if (pathname == "/TP_LE_DRUILLENEC/afficherTable.php") {
  document.getElementById("display").className = "";
  document.getElementById("display").className = "active";
}
if (pathname == "/TP_LE_DRUILLENEC/ajouterInfo.php") {
  document.getElementById("add").className = "";
  document.getElementById("add").className = "active";
}
if (pathname == "/TP_LE_DRUILLENEC/modifierTable.php") {
  document.getElementById("update").className = "";
  document.getElementById("update").className = "active";
}
if (pathname == "/TP_LE_DRUILLENEC/supprimer.php") {
  document.getElementById("delete").className = "";
  document.getElementById("delete").className = "active";
}

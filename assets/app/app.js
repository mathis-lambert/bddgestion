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

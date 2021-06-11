const caseElements = document.querySelectorAll(".col-1");
const nbrBateau = document.querySelectorAll(".bateau").length;

caseElements.forEach((caseElement) => {
  caseElement.addEventListener("click", (e) => {
    if (e.target.classList.contains("bateau")) {
      e.target.innerHTML = "<span class='material-icons'>done</span>";
      e.target.style.background = "green";
      e.target.classList.add("touch");
      if (document.querySelectorAll(".touch").length === nbrBateau) {
        alert("gagné !");
      }
    } else {
      e.target.innerHTML = "<span class='material-icons'>close</span>";
      e.target.style.background = "red";
    }
  });
});

const cursor = document.querySelector("#cursor");
const navale = document.querySelector(".navale");

navale.addEventListener("mouseenter", () => {
  cursor.style.display = "block";
  navale.style.cursor = "none";
});
navale.addEventListener("mouseleave", () => {
  cursor.style.display = "none";
});

window.addEventListener("mousemove", (e) => {
  cursor.style.top = e.clientY + "px";
  cursor.style.left = e.clientX + "px";
});

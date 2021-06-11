const burgerSpanElement = document.querySelector(".burger");
const burgerDivElement = document.querySelector(".burger-btn");

export function toggleMenu() {
  burgerDivElement.addEventListener("click", () => {
    burgerSpanElement.classList.toggle("open");
  });
}

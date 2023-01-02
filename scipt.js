// FAQ
const buttons = document.querySelectorAll("button");

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    const para = button.nextElementSibling;
    const icon = button.children[1];

    para.classList.toggle("show");
    icon.classList.toggle("rotate");
  });
});

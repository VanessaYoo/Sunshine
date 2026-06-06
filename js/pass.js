document.querySelectorAll(".password-container").forEach((container) => {
  const input = container.querySelector(".toggle-password");
  const icon = container.querySelector(".eye-icon");

  if (input && icon) {
    icon.addEventListener("click", () => {
      input.type = input.type === "password" ? "text" : "password";

      icon.classList.toggle("fa-eye");
      icon.classList.toggle("fa-eye-slash");
    });
  }
});

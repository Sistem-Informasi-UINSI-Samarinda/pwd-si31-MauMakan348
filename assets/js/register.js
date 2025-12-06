document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("register");
  const emailInput = document.getElementById("email");
  const passwordInput = document.querySelector("input[name='password']");
  const erroremail = document.getElementById("erroremail");
  const errorpw = document.getElementById("errorpw");

  form.addEventListener("submit", function (e) {
    let email = emailInput.value;
    let password = passwordInput.value;

    //error
    erroremail.textContent = "";
    errorpw.textContent = "";

    let valid = true;

    //email
    if (!email.endsWith("@gmail.com")) {
      e.preventDefault();
      erroremail.textContent = "Email harus menggunakan @gmail.com";
      valid = false;
    }

    //password
    if (password.length < 7) {
      e.preventDefault();
      errorpw.textContent = "Password minimal 7 karakter";
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
    }
  });
});

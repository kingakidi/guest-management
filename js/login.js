let loginForm = _("login-form");
let username = _("username");
let password = _("password");
let showStatus = _("show-status");
let btnLogin = _("btn-login");

loginForm.addEventListener("submit", function (event) {
  event.preventDefault();
  // VALIDATE FIELDS
  if (clean(username) > 0 && clean(password) > 0) {
    //    SEND AJAX REQUEST
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        username: username.value,
        password: password.value,
        loginRequest: true,
      },
      beforeSend: function () {
        btnLogin.disabled = true;
      },
      success: function (data) {
        showStatus.innerHTML = data;
        btnLogin.disabled = false;
        if (
          data.trim() === "<span class='text-success'>Login Successfully</span>"
        ) {
          window.location.reload();
          
        }
      },
    });
  } else {
    showStatus.innerHTML = error("All field(s) required");
  }
});

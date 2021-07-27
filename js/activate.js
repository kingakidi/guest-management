let email = _("email");
let dob = _("dob");
let showStatus = _("show-status");
let btnVerify = _("btn-verify");
let verifyForm = _("verify-form");
let verifyContainer = _("verify-container");

verifyForm.onsubmit = function (event) {
  event.preventDefault();

  //   CHECK FOR EMPTY FIELD
  if (clean(email) > 0 && clean(dob) > 0) {
    // SEND IT TO DB
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        email: email.value,
        dob: dob.value,
        activateForm: true,
      },
      beforeSend: function () {
        showStatus.innerHTML = success("Loading...");
        btnVerify.disabled = true;
      },
      success: function (data) {
        if (data.trim()[0] === "<") {
          btnVerify.style.display = "none";
          verifyContainer.innerHTML += data;
          showStatus.innerHTML = "";
          email.disabled = true;
          dob.disabled = true;
          globalThis.aPForm = _("add-password");
        } else {
          showStatus.innerHTML = data;
        }
        btnVerify.disabled = false;
      },
      complete: function () {
        let addPassForm = _("add-password");
        addPassForm.onsubmit = function (event) {
          event.preventDefault();
          //   CHECK FOR EMPTY FIELDS
          let password = _("password");
          let pShowStatus = _("show-password-status");
          if (clean(email) > 0 && clean(password) > 0 && clean(dob) > 0) {
            $.ajax({
              url: "./control/action.php",
              method: "POST",
              data: {
                email: email.value,
                password: password.value,
                dob: dob.value,
                addPasswordRequest: true,
              },
              beforeSend: function () {},
              success: function (data) {
                if (data.trim()[0] === "<") {
                  pShowStatus.innerHTML = data;
                  password.disabled = true;
                } else {
                  pShowStatus.innerHTML = data;
                }
              },
            });
          } else {
            showStatus.innerHTML = error("Enter Password");
          }
        };
      },
    });
  } else {
    showStatus.innerHTML = error("All fields required");
  }
};

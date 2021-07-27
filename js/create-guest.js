function _(x) {
  return document.getElementById(x);
}
// CHECK FOR EMPTY
function checkEmpty(data) {
  data.forEach((element) => {
    if (clean(element) < 0) {
      return false;
    }
    return true;
  });
}

// DIABLE ALL
function disableAll(data) {
  data.forEach(function (element) {
    element.disabled = true;
  });
}
let guestLinks = document.querySelectorAll(".guest-link");
let sGActions = _("show-guest-link-action");

guestLinks.forEach((element) => {
  element.onclick = function (event) {
    event.preventDefault();
    sGActions.innerHTML = success("Loading....");
    if (element.id === "add-new-guest") {
      $.ajax({
        url: "./control/forms.php",
        method: "POST",
        data: {
          newGuestForm: true,
        },
        beforeSend: function () {
          sGActions.innerHTML = "Loading....";
        },
        success: function (data) {
          sGActions.innerHTML = data;
        },
        complete: function () {
          let guestForm = _("add-guest");
          let email = _("email");
          let fullname = _("fullname");
          let phone = _("phone");
          let gender = _("gender");
          let address = _("address");
          let dob = _("dob");
          let state = _("state");
          let lga = _("lga");
          let showGuestAddStatus = _("show-add-guest-status");
          let btnAddGuest = _("btn-add-guest");
          // console.log(fullname, phone, gender, address, dob, state, lga);
          guestForm.onsubmit = function (event) {
            event.preventDefault();
            if (
              clean(fullname) > 0 &&
              clean(phone) > 0 &&
              clean(gender) > 0 &&
              clean(address) > 0 &&
              clean(dob) > 0 &&
              clean(state) > 0 &&
              clean(lga) > 0
            ) {
              //   SEND DATA TO BACKEND
              $.ajax({
                url: "./control/action.php",
                method: "POST",
                data: {
                  email: email.value,
                  fullname: fullname.value,
                  phone: phone.value,
                  gender: gender.value,
                  dob: dob.value,
                  state: state.value,
                  lga: lga.value,
                  address: address.value,
                  addGuestDetails: true,
                },
                beforeSend: function () {
                  btnAddGuest.disabled = true;
                },
                success: function (data) {
                  showGuestAddStatus.innerHTML = data;
                  if (
                    data.trim() ===
                    "<span class='text-success'>Guest Registered Successfully</span>"
                  ) {
                    btnAddGuest.disabled = true;
                    disableAll([
                      email,
                      fullname,
                      phone,
                      address,
                      state,
                      lga,
                      gender,
                      dob,
                    ]);
                  } else {
                    btnAddGuest.disabled = false;
                  }
                },
              });
            } else {
              showGuestAddStatus.innerHTML = error(
                "Kindly Fill all required field"
              );
            }
          };
        },
      });
    } else if (element.id === "show-guest-list") {
      $.ajax({
        url: "./control/forms.php",
        method: "POST",
        data: {
          showGuestList: true,
        },
        beforeSend: function () {
          sGActions.innerHTML = "Loading....";
        },
        success: function (data) {
          sGActions.innerHTML = data;
        },
        complete: function () {},
      });
    } else if (element.id === "guest-requests") {
      $.ajax({
        url: "./control/forms.php",
        method: "POST",
        data: {
          showGuestRequest: true,
        },
        beforeSend: function () {
          sGActions.innerHTML = "Loading....";
        },
        success: function (data) {
          sGActions.innerHTML = data;
        },
        complete: function () {},
      });
    }
  };
});
// ADD GUEST

let formRequest = _("form-request");
let phone = _("phone");
let request = _("request");
let requestShow = _("show-request-status");
let btnRequestSubmit = _("submit-request");
console.log(formRequest, phone, request, requestShow);
formRequest.onsubmit = function (event) {
  event.preventDefault();
  console.log(event);
  if (checkEmpty([phone, request])) {
    // SEND AJAX REQUEST
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        phone: phone.value,
        requestMsg: request.value,
        submitRequest: true,
      },
      beforeSend: function () {
        // btnRequestSubmit.disabled = false;
      },
      success: function (data) {
        console.log(data);
        requestShow.innerHTML = data;
        // btnRequestSubmit.disabled = true;
      },
    });
  }
};

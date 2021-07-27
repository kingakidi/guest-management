let staffForm = _("staff-form");
let fullname = _("fullname");
let email = _("email");
let phone = _("phone");
let dob = _("dob");
let gender = _("gender");
let address = _("address");
let showStatus = _("show-status");
let btnStaff = _("btn-staff");

function disabledAll(datas) {
  datas.forEach(element => {
    element.disabled = true;
  });
}
staffForm.onsubmit = function(event) {
  event.preventDefault();
  if (
    clean(fullname) > 0 &&
    clean(email) > 0 &&
    clean(phone) > 0 &&
    clean(dob) > 0 &&
    clean(gender) > 0 &&
    clean(address) > 0
  ) {
    // showStatus.innerHTML = success("GOOD TO GO");
    // SEND DATA BACK
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        fullname: fullname.value,
        email: email.value,
        phone: phone.value,
        dob: dob.value,
        gender: gender.value,
        address: address.value,
        staffRegister: true
      },
      beforeSend: function() {
        showStatus.innerHTML = "";
        btnStaff.disabled = true;
      },
      success: data => {
        showStatus.innerHTML = data;

        if (
          data.trim() ===
          "<span class='text-success'>Staff Account Created Successfully</span>"
        ) {
          btnStaff.disabled = true;
          disabledAll([email, phone, gender, fullname, dob, address]);
        } else {
          btnStaff.disabled = false;
        }
      }
    });
  } else {
    showStatus.innerHTML = error("All fields required");
  }
};

btnSubmit.onclick = function (event) {
  event.preventDefault();
  //   CHECK FOR EMPTY FIELDS
  if (clean(email) > 0 && clean(password) > 0 && clean(dob) > 0) {
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        email: email.value,
        password: password.value,
        dob: dob.value,
      },
      beforeSend: function () {},
      success: function (data) {
        console.log(data);
      },
    });
  } else {
    showStatus.innerHTML = error("Enter Password");
  }
};

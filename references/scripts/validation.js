"use strict";

document.getElementById("DOB").addEventListener("change", function () {
  var dob = this.value;
  var dateEntered = new Date(dob);
  var diff_ms = Date.now() - dateEntered;
  var age_dt = new Date(diff_ms);
  if (Math.abs(age_dt.getUTCFullYear() - 1970) < 18) {
    this.classList.add("is-invalid");
  } else {
    this.classList.add("is-valid");
  }
});

bootstrapValidate(
  ["#FirstName", "#MiddleName", "#LastName", "#Suburb"],
  "required: Please commplete this field|min:5:Enter at least 5 characters|max:25:Enter less than 25 characters"
);
bootstrapValidate(
  ["#StreetAddress"],
  "required: Please commplete this field|min:5:Enter at least 5 characters|max:40:Enter less than 40 characters"
);
bootstrapValidate(
  ["#Email"],
  "required: Please commplete this field|email:Please enter a valid email"
);

function validate() {
  console.log("here");
  var flag = true;
  var inputs = Array.from(document.getElementsByTagName("input"));
  //console.log(inputs);
  for (let i = 0; i < inputs.length; i++) {
    console.log(inputs[i]);
    if (inputs[i].value == "" && inputs[i].type != "date") {
      inputs[i].classList.add("is-invalid");
      flag = false;
    }
  }

  var state = document.getElementById("State");
  console.log(state.value);
  if (state.value == "0") {
    state.classList.add("is-invalid");
    flag = false;
  }
  if (!flag) {
    document.getElementById("noteError").hidden = false;
  } else {
    document.getElementById("noteError").hidden = true;
  }
  var inputsInvalid = Array.from(
    document.forms["memberaddform"].getElementsByClassName("is-invalid")
  );
  if (inputsInvalid.length > 0) {
    flag = false;
  }
  return flag;
}
const form = document.getElementById("memberaddform");
form.onsubmit = validate;

"use strict";

document.getElementById("DOB").addEventListener("change", function () {
  var dob = this.value;
  var dateEntered = new Date(dob);
  var diff_ms = Date.now() - dateEntered;
  var age_dt = new Date(diff_ms);
  if(Math.abs(age_dt.getUTCFullYear() - 1970)<18){
    this.classList.add('is-invalid');
  }else{
    this.classList.add('is-valid');
  }
});

bootstrapValidate(
  ["#FirstName", "#MiddleName", "#LastName", "#Suburb"],
  "required:Please fill out this field|min:5:Enter at least 5 characters|max:25:Enter less than 25 characters"
);
bootstrapValidate(
  ["#StreetAddress"],
  "required:Please fill out this field|min:5:Enter at least 5 characters|max:40:Enter less than 40 characters"
);
bootstrapValidate(
  ["#Email"],
  "required:Please fill out this field|email:Please enter a valid email"
);

document.getElementById("memberaddform").addEventListener("submit", function(){
 
});
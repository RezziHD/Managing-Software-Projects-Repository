"use strict";

function personValidate() {

  var fname = document.getElementById("FirstName").value;
  var mname = document.getElementById("MiddleName").value;
  var lname = document.getElementById("LastName").value;
  var dob = document.getElementById("DOB").value;
  var saddress = document.getElementById("LastName").value;
  var suburb = document.getElementById("LastName").value;
  var state = document.getElementById("state").value;
  var postcode = document.getElementById("pcode").value;

  var submit = true;

  if(fname.lenght==0){

  }

  //validate date
  if (
    !dob.match(
      /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[13578]|1[02])|(0[1-9]|[1-2][0-9]|30)\/0[469]|11|0[1-9]|[1-2][0-9]\/02)\/((19[0-9][0-9])|(20[0-9][0-9]))$/
    )
  ) {
    console.log("no match");
    dobErrMsg = "The date is not valid, please enter a valid date";
  } else {
    let year = dob.slice(6, 10);
    let month = dob.slice(3, 5);
    let day = dob.slice(0, 2);

    if (today.getFullYear() - year < 15) {
      console.log("less than 15");
      dobErrMsg =
        "Sorry, You cannot register if you are less than 15 Years Old!";
    } else if (today.getFullYear() - year > 80) {
      console.log("more than 80");
      dobErrMsg =
        "Sorry, You cannot register if you have more than 80 Years Old!";
    } else if (today.getFullYear() - year == 15) {
      console.log("15 years");
      if (today.getMonth() + 1 < month) {
        console.log("less than 15");
        dobErrMsg =
          "Sorry, You cannot register if you are less than 15 Years Old!";
      } else if (today.getMonth() + 1 == month) {
        if (today.getDate() < day) {
          console.log("less than 15");
          dobErrMsg =
            "Sorry, You cannot register if you are less than 15 Years Old!";
        } else if (today.getDate() == day) {
          console.log("Happy Birthday");
          dobErrMsg = "Happy Birthday to you!!";
          submit = true;
        }
      }
    } else if (today.getFullYear() - year == 80) {
      if (today.getMonth() + 1 > month) {
        console.log("more than 80");
        dobErrMsg =
          "Sorry, You cannot register if you have more than 80 Years Old!";
      } else if (today.getMonth() + 1 == month) {
        if (today.getDate() > day) {
          console.log("more than 80");
          dobErrMsg =
            "Sorry, You cannot register if you have more than 80 Years Old!";
        } else if (today.getDate() == day) {
          console.log("Happy Birthday");
          dobErrMsg =
            "Happy Birthday!! However, You cannot register if you are older than 80 Years Old!";
        }
      }
    }
  }

  //validate postcode
  var startOfPost = postcode.slice(0, 1);
  console.log(startOfPost);
  switch (state) {
    case "vic":
      if (startOfPost != "3" && startOfPost != "8") {
        pcodeErrMsg = "Post codes for VIC need to start with 3 or 8";
      }
      break;
    case "nsw":
      if (startOfPost != "1" && startOfPost != "2") {
        pcodeErrMsg = "Post codes for NSW need to start with 1 or 2";
      }
      break;
    case "qld":
      if (startOfPost != "4" && startOfPost != "9") {
        pcodeErrMsg = "Post codes for QLD need to start with 4 or 9";
      }
      break;
    case "nt":
      if (startOfPost != "0") {
        pcodeErrMsg = "Post codes for NT need to start with 0";
      }
      break;
    case "wa":
      if (startOfPost != "6") {
        pcodeErrMsg = "Post codes for WA need to start with 6";
      }
      break;
    case "sa":
      if (startOfPost != "5") {
        pcodeErrMsg = "Post codes for SA need to start with 5";
      }
      break;
    case "tas":
      if (startOfPost != "7") {
        pcodeErrMsg = "Post codes for TAS need to start with 7";
      }
      break;
    case "act":
      if (startOfPost != "0") {
        pcodeErrMsg = "Post codes for ACT need to start with 0";
      }
      break;
    default:
      break;
  }

  //validate other skills
  if (otherskills && otherdesc == "") {
    skillsErrMsg =
      "You have seleted other skills so you need to describe them in the above textbox";
  }
  document.getElementById("doberror").innerHTML = dobErrMsg;
  document.getElementById("pcodeerror").innerHTML = pcodeErrMsg;
  document.getElementById("skillerror").innerHTML = skillsErrMsg;
  if (dobErrMsg != "" || pcodeErrMsg != "" || skillsErrMsg != "")
    submit = false;
  else storeFormInfo();
  return submit;
}

function init() {
  console.log("init");
  var addForm = document.getElementById("memberaddform");
  if (addForm !== undefined && addForm !== null) {
    //addForm.onsubmit = personValidate;
  }else{
    addForm = document.getElementById("staffaddform");
    if (addForm !== undefined && addForm !== null) {
        //addForm.onsubmit = personValidate;
      }
  }
}

window.onload = init;

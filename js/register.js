import {
  COLLEGES as collegeArray,
  YEAR_LEVEL as yearLevelArray,
} from './colleges-courses.js';
// import { postRequest } from './post-request.js';

const studentId = document.getElementById('student-id');
const firstName = document.getElementById('first-name');
const middleName = document.getElementById('middle-name');
const lastName = document.getElementById('last-name');
const email = document.getElementById('university-email');
const phone = document.getElementById('phone');
const gender = document.getElementsByName('gender');
const password = document.getElementById('password');
const college = document.getElementById('college');
const course = document.getElementById('course');
const yearLevel = document.getElementById('year-level');

const registerForm = document.getElementById('registration-form');

registerForm.addEventListener('submit', (e) => {
  // e.preventDefault();
  // let data = {
  //   studentId: parseInt(studentId.value),
  //   firstName: firstName.value,
  //   middleName: middleName.value,
  //   lastName: lastName.value,
  //   email: email.value,
  //   phone: phone.value,
  //   gender: genderValue(),
  //   password: password.value,
  //   college: college.value,
  //   course: course.value,
  //   yearLevel: parseInt(yearLevel.value),
  // };
  // postRequest(data);
  // window.location = 'login.html';
});

function genderValue() {
  let genderValue = '';
  gender.forEach((gender) => {
    if (gender.checked) genderValue = gender.value;
  });
  return genderValue;
}

// This function will population the options but if user select one of colleges,
// it will also affects the list options of the courses
collegeArray.forEach((colleges) => {
  const optionCollege = document.createElement('option');
  optionCollege.appendChild(document.createTextNode(colleges.college));
  optionCollege.value = colleges.id;
  college.appendChild(optionCollege);
});

// This will be executed if user select a college
college.addEventListener('change', () => {
  changeCourses(college.value);
});

// This will populate the selection base on college selection
// It has the same functionality of functions in login.js
function changeCourses(value) {
  let courseOptions = '';
  collegeArray.forEach((college) => {
    college.courses.filter((courses) => {
      if (college.id == value) {
        courseOptions += `<option value="${courses.id}">${courses.course}</option>`;
      }
    });
  });
  course.innerHTML = courseOptions;
}

// Populate the year level selection
yearLevelArray.forEach((year) => {
  const optionYearLevel = document.createElement('option');
  optionYearLevel.appendChild(document.createTextNode(year.year));
  optionYearLevel.value = year.id;
  yearLevel.appendChild(optionYearLevel);
});

// Show and hide icon in password button
const passwordIcon = document.querySelector('.password-icon');
document.querySelector('.password-button').addEventListener('click', (e) => {
  e.preventDefault();
  if (password.type == 'password') {
    password.type = 'text';
    passwordIcon.src = 'assets/images/eye-regular.svg';
  } else {
    password.type = 'password';
    passwordIcon.src = 'assets/images/eye-slash-regular.svg';
  }
});

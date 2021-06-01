export default class User {
  // Since this is a static website, i set some default values to test the program
  constructor(
    studentID = '1901101401',
    email = '1901101401@student.buksu.edu.ph',
    password = 'ivangemota123',
    { firstName = 'Ivan', middleName = 'Pasulohan', lastName = 'Gemota' } = {},
    phone = '09652158043',
    gender = 'female',
    { college = 'COT', course = 'BSIT', yearLevel = '2' } = {}
  ) {
    this.studentID = studentID;
    this.email = email;
    this.password = password;
    this.fullName = { firstName, middleName, lastName };
    this.phone = phone;
    this.gender = gender;
    this.college = { college, course, yearLevel };
  }

  setStudentID(studentID) {
    this.studentID = studentID;
  }

  getStudentID() {
    return this.studentID;
  }

  setEmail(email) {
    this.email = email;
  }

  getEmail() {
    return this.email;
  }

  setPassword(password) {
    this.password = password;
  }

  getPassword() {
    return this.password;
  }

  setFirstName(firstName) {
    this.fullName.firstName = firstName;
  }

  getFirstName() {
    return this.fullName.firstName;
  }

  setMiddleName(middleName) {
    this.fullName.middleName = middleName;
  }

  getMiddleName() {
    return this.fullName.middleName;
  }

  setLastName(lastName) {
    this.fullName.lastName = lastName;
  }

  getLastName() {
    return this.fullName.lastName;
  }

  setPhone(phone) {
    this.phone = phone;
  }

  getPhone() {
    return this.phone;
  }

  setGender(gender) {
    this.gender = gender;
  }

  getGender() {
    return this.gender;
  }

  setCollege(college) {
    this.college.college = college;
  }

  getCollege() {
    return this.college.college;
  }

  setCourse(course) {
    this.college.course = course;
  }

  getCourse() {
    return this.college.course;
  }

  setYearLevel(yearLevel) {
    this.college.yearLevel = yearLevel;
  }

  getYearLevel() {
    return this.college.yearLevel;
  }
}

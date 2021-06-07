const modalElement = document.querySelector('.modal-container');
const deleteModalElement = document.querySelector('.delete-modal-container');
const overlayElement = document.querySelector('#overlay');
const editBtn = document.querySelector('.edit-btn');
const deleteBtn = document.querySelectorAll('.delete-btn');
const addBtn = document.querySelector('.add-btn');
const cancelBtn = document.querySelector('.action-cancel-btn');
const modalHeaderElement = document.querySelector('.modal-header');
const passwordElement = document.querySelector('.password');
const talbleRow = document.querySelectorAll('.table-row');
const talbleData = document.querySelector('.table-data');

const emailData = document.querySelector('[data-email]').innerText;
const passwordData = document.querySelector('[data-password]').innerText;
const firstNameData = document.querySelector('[data-first-name]').innerText;
const middleNameData = document.querySelector('[data-middle-name]').innerText;
const lastNameData = document.querySelector('[data-last-name]').innerText;
const phoneData = document.querySelector('[data-phone]').innerText;
const genderData = document.querySelector('[data-gender]').innerText;
const courseIdData = document.querySelector('[data-course-id]').innerText;
const yearLevelData = document.querySelector('[data-year-level]').innerText;
const roleData = document.querySelector('[data-role]').innerText;

const idPrompt = document.querySelector('.prompt-id');
const emailPrompt = document.querySelector('.prompt-email');
const passwordPrompt = document.querySelector('.prompt-password');
const firstNamePrompt = document.querySelector('.prompt-first-name');
const middleNamePrompt = document.querySelector('.prompt-middle-name');
const lastNamePrompt = document.querySelector('.prompt-last-name');
const phonePrompt = document.querySelector('.prompt-phone');
const genderPrompt = document.querySelector('.prompt-gender');
const courseIdPrompt = document.querySelector('.prompt-course');
const yearLevelPrompt = document.querySelector('.prompt-year-level');
const rolePrompt = document.querySelector('.prompt-role');

// Event Listener
cancelBtn.addEventListener('click', cancelAction);
deleteBtn.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    deleteAction();
  });
  showRowDetails();
});

function deleteAction() {
  showDeleteModal();
}

function cancelAction() {
  hideModal();
}

function showRowDetails() {
  idPrompt.innerText = document.querySelector('#delete-id').value;
  emailPrompt.innerText = emailData;
  passwordPrompt.innerText = passwordData;
  firstNamePrompt.innerText = firstNameData;
  middleNamePrompt.innerText = middleNameData;
  lastNamePrompt.innerText = lastNameData;
  phonePrompt.innerText = phoneData;
  genderPrompt.innerText = genderData;
  courseIdPrompt.innerText = courseIdData;
  yearLevelPrompt.innerText = yearLevelData;
  rolePrompt.innerText = roleData;
}

function showDeleteModal(e) {
  deleteModalElement.style.display = 'flex';
  overlayElement.classList.add('active');
}

function hideModal() {
  overlayElement.classList.remove('active');
  deleteModalElement.style.display = 'none';
}

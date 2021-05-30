const modalElement = document.querySelector('.modal-container');
const deleteModalElement = document.querySelector('.delete-modal-container');
const overlayElement = document.querySelector('#overlay');
const editBtn = document.querySelector('.edit-btn');
const deleteBtn = document.querySelector('.delete-btn');
const addBtn = document.querySelector('.add-btn');
const cancelBtn = document.querySelector('.action-cancel-btn');
const modalHeaderElement = document.querySelector('.modal-header');
const passwordElement = document.querySelector('.password');
const talbleRowData = document.querySelector('.table-row-data');
const talbleData = document.querySelector('.table-data');

// Event Listener
editBtn.addEventListener('click', editAction);
addBtn.addEventListener('click', addAction);
cancelBtn.addEventListener('click', cancelAction);
talbleRowData.addEventListener('click', (e) => {
  if (e.target.classList.contains('delete-btn')) {
    deleteBtn.addEventListener('click', deletetAction);
    // let tr = e.target.parentElement;
    // talbleRowData.removeChild(tr);
  }
});

function editAction() {
  showModal();
  passwordElement.style.display = 'none';
  modalHeaderElement.innerText = 'Edit';
}

function deletetAction() {
  console.log('delete');
  showDeleteModal();
}

function addAction() {
  showModal();
  modalHeaderElement.innerText = 'Add';
}

function cancelAction() {
  hideModal();
  passwordElement.style.display = 'block';
}

function showModal() {
  modalElement.style.display = 'flex';
  overlayElement.classList.add('active');
}

function showDeleteModal() {
  deleteModalElement.style.display = 'flex';
  overlayElement.classList.add('active');
}

function hideModal() {
  modalElement.style.display = 'none';
  overlayElement.classList.remove('active');
}

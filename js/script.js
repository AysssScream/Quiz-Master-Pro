function showModal() {
  var modal = document.getElementById('logoutModal');
  if (modal) {
    modal.style.display = 'block';
  }
}

function closeModal() {
  var modal = document.getElementById('logoutModal');
  if (modal) {
    modal.style.display = 'none';
  }
}

function logout() {
  window.location.href = 'index.html';
}

function toggleDropdown() {
  var dropdown = document.getElementById('user-dropdown');
  if (dropdown) {
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
  }
}
document.getElementById("quizForm").onsubmit = function (event) {
  event.preventDefault();
  alert("Form submitted! Implement AJAX request here.");
}
function confirmDelete() {
  return confirm('Are you sure you want to delete this quiz?');
}

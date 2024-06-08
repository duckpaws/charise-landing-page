'use strict';

/**
 * Navbar toggle
 */
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");

const navElemArr = [navOpenBtn, navCloseBtn];

for (let i = 0; i < navElemArr.length; i++) {
  navElemArr[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
  });
}

/**
 * Toggle navbar when click any navbar link
 */
const navbarLinks = document.querySelectorAll("[data-nav-link]");

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", function () {
    navbar.classList.remove("active");
  });
}

/**
 * Header active when window scrolled down
 */
const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {
  window.scrollY >= 50 ? header.classList.add("active")
    : header.classList.remove("active");
});

/**
 * Tab content toggle
 */
function showContent(tab, button) {
  const textElement = document.getElementById('content-text');
  const buttons = document.querySelectorAll('.tab-btn');

  // Remove active class from all buttons
  buttons.forEach(btn => btn.classList.remove('active'));

  // Add active class to the clicked button
  button.classList.add('active');
  
  // Update text content based on the tab
  if (tab === 'vision') {
    textElement.textContent = "This is the vision text. It provides insights and future aspirations.";
  } else if (tab === 'mission') {
    textElement.textContent = "Our mission is to provide excellent services and improve quality of life.";
  } else if (tab === 'plan') {
    textElement.textContent = "The next plan involves expansion and increased outreach to various communities.";
  }
}

// Fungsi untuk menampilkan atau menyembunyikan form donasi
function toggleForm(id) {
  var form = document.getElementById('donationForm_' + id);
  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
}

// Fungsi untuk menutup form setelah submit
function closeForm(id) {
  var form = document.getElementById('donationForm_' + id);
  form.style.display = 'none';
}

// Fungsi untuk submit form dan menyimpan data
function submitForm(event, id) {
  event.preventDefault();
  var form = document.getElementById('donationForm-' + id);
  var formData = new FormData(form);

  fetch('process_donation.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          document.getElementById('success-message-' + id).style.display = 'block';
          document.getElementById('error-message-' + id).style.display = 'none';
          closeForm(id);
          setTimeout(function() {
              location.reload();
          }, 1000); // Reload the page after 1 second
      } else {
          document.getElementById('success-message-' + id).style.display = 'none';
          document.getElementById('error-message-' + id).style.display = 'block';
      }
  })
  .catch(error => {
      console.error('Error:', error);
      document.getElementById('success-message-' + id).style.display = 'none';
      document.getElementById('error-message-' + id).style.display = 'block';
  });
}

function closeForm(id) {
  document.getElementById('donationForm-' + id).style.display = 'none';
}

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
    textElement.textContent = "We envision a world where everyone has daily access to nutritious food, every child has the opportunity to learn and thrive, every individual enjoys clean water and adequate sanitation, and every community is healthy with full access to quality healthcare.";
  } else if (tab === 'mission') {
    textElement.textContent = " Our mission is to provide essential food supplies to communities in need, ensuring no one goes hungry. We aim to deliver emergency education support for children and young people, guaranteeing uninterrupted access to learning. We strive to ensure access to clean and safe water for underserved communities, enhancing their health and well-being. Additionally, we are committed to offering vital healthcare assistance to those in need, ensuring everyone has access to quality medical services.";
  } else if (tab === 'plan') {
    textElement.textContent = "We plan to launch sustainable food distribution programs involving local communities to ensure continuous food supplies. We will develop emergency learning centers in disaster-affected areas to provide immediate and quality education. Our efforts will expand clean water treatment and distribution projects to more remote areas in need. Finally, we will establish mobile clinics to deliver healthcare services directly to remote and underserved communities.";
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

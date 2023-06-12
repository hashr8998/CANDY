const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
  link.addEventListener('click', function(event) {
    event.preventDefault();

    const targetId = link.getAttribute('href');
    const targetElement = document.querySelector(targetId);
    const offsetTop = targetElement.offsetTop;

    window.scrollTo({
      top: offsetTop,
      behavior: 'smooth'
    });
  });
});

// Define an array of image URLs
const imageUrls = [];

// Set the interval time (in milliseconds) for automatic image rotation
const intervalTime = 3000; // 3 seconds

// Get the image slider container element
const imageSlider = document.getElementById("image-slider");

// Create an image element for each URL in the array
imageUrls.forEach((imageUrl) => {
  const image = document.createElement("img");
  image.src = imageUrl;
  image.style.display = "none"; // Hide the images initially
  imageSlider.appendChild(image);
});

// Get all the images inside the slider container
const images = imageSlider.getElementsByTagName("img");

let currentIndex = 0;

// Function to show the current image
function showImage(index) {
  // Hide all the images
  for (let i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  
  // Show the image at the specified index
  images[index].style.display = "block";
}

// Function to switch to the next image
function nextImage() {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  showImage(currentIndex);
}

// Show the initial image
showImage(currentIndex);

// Start automatic image rotation
setInterval(nextImage, intervalTime);




function toggleAdditionalInfo() {
  var additionalInfo = document.getElementById("additionalInfo");
  if (additionalInfo.style.display === "none") {
    additionalInfo.style.display = "block";
  } else {
    additionalInfo.style.display = "none";
  }
}


function toggleAdditionalInfo() {
  var additionalInfo = document.getElementById("additionalInfo");
  if (additionalInfo.style.display === "none") {
    additionalInfo.style.display = "block";
  } else {
    additionalInfo.style.display = "none";
  }
}

var toggleButton = document.getElementById("toggleButton");
toggleButton.addEventListener("click", toggleAdditionalInfo); 


// Get the form element
const orderForm = document.getElementById('order-form');

// Add event listener to the form's submit event
orderForm.addEventListener('submit', function(event) {
  // Prevent the form from submitting
  event.preventDefault();

  // Validate the form fields
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('email');
  const phoneInput = document.getElementById('phone');
  const addressInput = document.getElementById('address');
  const candyInput = document.getElementById('candy');
  const quantityInput = document.getElementById('quantity');

  // Validate name field
  if (nameInput.value.trim() === '') {
    alert('Please enter your name.');
    nameInput.focus();
    return;
  }

  // Validate email field
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailInput.value.trim() === '' || !emailPattern.test(emailInput.value.trim())) {
    alert('Please enter a valid email address.');
    emailInput.focus();
    return;
  }

  // Validate phone field
  const phonePattern = /^\d{10}$/;
  if (phoneInput.value.trim() === '' || !phonePattern.test(phoneInput.value.trim())) {
    alert('Please enter a valid 10-digit phone number.');
    phoneInput.focus();
    return;
  }

  // Validate address field
  if (addressInput.value.trim() === '') {
    alert('Please enter your delivery address.');
    addressInput.focus();
    return;
  }

  // Validate candy selection field
  if (candyInput.value === '') {
    alert('Please select a candy.');
    candyInput.focus();
    return;
  }

  // Validate quantity field
  if (quantityInput.value.trim() === '' || quantityInput.value <= 0) {
    alert('Please enter a valid quantity.');
    quantityInput.focus();
    return;
  }

  // If all fields are valid, submit the form
  alert('Form submitted successfully!');
  orderForm.reset();
});






const sidebarToggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');

sidebarToggle.addEventListener('click', function() {
  sidebar.classList.toggle('active');
});



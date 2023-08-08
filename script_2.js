const seeMoreButton = document.getElementById("see-more");
const processTimeParagraph = document.getElementById("process-time");
const deliveryFeesParagraph = document.getElementById("delivery-fees");

     
seeMoreButton.addEventListener("click", ()=>{

    processTimeParagraph.classList.toggle("hidden");
    deliveryFeesParagraph.classList.toggle("hidden");


    if (processTimeParagraph.classList.contains("hidden")) {
        seeMoreButton.textContent = "See More";
    } else {
        seeMoreButton.textContent = "See Less";
    }
});

addToCartButtons = document.querySelectorAll(".add-to-cart");

const cartItems = [];

      
addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCart);
});

      
function addToCart(event) {
    
    const button = event.target;

    const name = button.dataset.name;
    const price = parseFloat(button.dataset.price);

    const newItem = { name, price };
    cartItems.push(newItem);

    updateCart();
}

      
function updateCart() {
    const cartList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('total-amount');
    
    cartList.innerHTML = '';

    let total = 0;

    
    cartItems.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
        cartList.appendChild(li);

        total += item.price;
    });
    
    cartTotal.textContent = `$${total.toFixed(2)}`;
}

      
const clearCartButton = document.getElementById('clear-cart');
clearCartButton.addEventListener('click', clearCart);

function clearCart() {
    cartItems.length = 0;
    updateCart();
}

      
const checkoutButton = document.getElementById('checkout');
checkoutButton.addEventListener('click', checkout);

function checkout() {

    alert('Checkout functionality is not implemented in this demo.');
    clearCart();
}




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


const imageUrls = [];


const intervalTime = 3000;


const imageSlider = document.getElementById("image-slider");


imageUrls.forEach((imageUrl) => {
  const image = document.createElement("img");
  image.src = imageUrl;
  image.style.display = "none"; 
  imageSlider.appendChild(image);
});


const images = imageSlider.getElementsByTagName("img");

let currentIndex = 0;


function showImage(index) {

  for (let i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  

  images[index].style.display = "block";
}

function nextImage() {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  showImage(currentIndex);
}

showImage(currentIndex);


setInterval(nextImage, intervalTime);





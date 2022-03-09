window.addEventListener('resize', () => {
    const imageContainer = document.getElementById('main-image');
    const images = document.querySelector('.images');

    const totalWidth = images.clientWidth;
    const containerDims = totalWidth - 60;

    imageContainer.style.maxWidth = `${containerDims}px`;
    imageContainer.style.maxHeight = `${containerDims}px`;
});

setDefualtImage();
setStockColor();

// Calls the resize event once when the page is loaded.
window.dispatchEvent(new Event('resize'));

// Sets default active image
function setDefualtImage() {
    const firstImage = document.getElementsByClassName('small-image')[0];
    const activeImage = document.getElementById('active-image');

    activeImage.setAttribute('src', firstImage.src);
}

// Changes the active image to the element passed into the function
function setActiveImage(smallImage) {
    const smallImages = document.getElementsByClassName('small-image');

    for(let image of smallImages) {
        image.style.borderColor = 'black'
    }

    smallImage.style.borderColor = 'red';
    const activeImage = document.getElementById('active-image');

    activeImage.setAttribute('src', smallImage.src);
}

function displayModal(src) {
    // Create a modal and give it the class modal
    const modal = document.createElement('div');
    modal.setAttribute('class', 'modal');

    // Add modal to the DOM
    document.body.append(modal);

    const modalImage = document.createElement('img');
    modalImage.src = src;

    // Add modal image to the DOM
    modal.append(modalImage);

    const closeIcon = document.createElement('img');
    closeIcon.src = "/images/close-white.svg";
    closeIcon.setAttribute('class', 'close-icon');

    modal.append(closeIcon);

    modal.addEventListener('click', (e) => {
        let isClickOnImage = modalImage.contains(e.target)
        if(isClickOnImage) return;
        modal.remove();
    });
}

// Function that sets the size of the main image to be the size of the images container
// minus the size of the images sidebar.
function setImageContainerSize() {
    const imageContainer = document.getElementById('main-image');
    const images = document.querySelector('.images');

    const totalWidth = images.clientWidth;
    const containerDims = totalWidth - 60;

    imageContainer.style.maxWidth = `${containerDims}px`;
    imageContainer.style.maxHeight = `${containerDims}px`;
    console.log('resize');
}

function setStockColor() {
    const stockMessage = document.getElementById('stock-counter');
    const nItemsInStock = parseInt(document.getElementById('stock-number').innerText);

    if(nItemsInStock >= 6) return;

    let fullColor = {
        red: 50,
        green: 200,
        blue: 0
    }
    let emptyColor = {
        red: 255,
        green: 0,
        blue: 0
    }

    calculateColor = (firstValue, secondValue, firstSimilarity, maxSimilarity) => {
        // A ratio of how similar 2 colors are with 1 being the first color and 0 being the second
        const simRatio = firstSimilarity / maxSimilarity;

        const newFirst = firstValue * simRatio;
        const newSecond = secondValue * (1 - simRatio);

        return parseInt(newFirst + newSecond);
    }

    const combinedRed = calculateColor(fullColor.red, emptyColor.red, nItemsInStock, 6);
    const combinedGreen = calculateColor(fullColor.green, emptyColor.green, nItemsInStock, 6);
    const combinedBlue = calculateColor(fullColor.blue, emptyColor.blue, nItemsInStock, 6);

    stockMessage.style.color = `rgb(${combinedRed}, ${combinedGreen}, ${combinedBlue})`    
}

function addToCart(toAdd) {
    const cartButton = document.getElementById('cart');
    let incrementors = document.getElementsByClassName('cart-incrementor');

    let nItemsInCart = parseInt(cartButton.innerText);
    console.log(nItemsInCart);

    if(Number.isNaN(nItemsInCart)) {
        nItemsInCart = 0;

        incrementors[0].setAttribute('class', 'cart-incrementor rounded-left');
        incrementors[1].setAttribute('class', 'cart-incrementor rounded-right')

        cartButton.style.borderRadius = 0;
    }

    nItemsInCart += toAdd;

    if(nItemsInCart < 1) {
        nItemsInCart = "Add to cart";

        for(button of incrementors) {
            button.setAttribute('class', 'cart-incrementor hidden');
        }

        cartButton.style.borderRadius = '2em';
    }

    cartButton.innerText = nItemsInCart;
    
}
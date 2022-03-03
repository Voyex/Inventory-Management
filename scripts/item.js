window.addEventListener('resize', () => {
    const imageContainer = document.getElementById('main-image');
    const images = document.querySelector('.images');

    const totalWidth = images.clientWidth;
    const containerDims = totalWidth - 60;

    imageContainer.style.maxWidth = `${containerDims}px`;
    imageContainer.style.maxHeight = `${containerDims}px`;
});

// Calls the resize event once when the page is loaded.
window.dispatchEvent(new Event('resize'));

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

function setImageContainerSize() {
    const imageContainer = document.getElementById('main-image');
    const images = document.querySelector('.images');

    const totalWidth = images.clientWidth;
    const containerDims = totalWidth - 60;

    imageContainer.style.maxWidth = `${containerDims}px`;
    imageContainer.style.maxHeight = `${containerDims}px`;
    console.log('resize');
}
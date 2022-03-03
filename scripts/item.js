function setActiveImage(smallImage) {
    const smallImages = document.getElementsByClassName("small-image");

    for(let image of smallImages) {
        image.style.borderColor = 'black'
    }

    smallImage.style.borderColor = 'red';
    const activeImage = document.getElementById('active-image');

    activeImage.setAttribute('src', smallImage.src);
}
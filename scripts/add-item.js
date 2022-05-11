let numImages = 1;

function addImageInput(button) {
    // Create div for the inpu
    let container = document.createElement('div');

    // Create label for the input
    let inputLabel = document.createElement('label');
    inputLabel.for = 'product_image';
    inputLabel.innerText = `Image ${++numImages}: `

    // Create input an dset fields
    let imageInput = document.createElement('input');
    imageInput.type = 'file';
    imageInput.name = 'product_image';
    imageInput.accept = 'image/*';

    // Create is primary checkbox
    let primaryCheck = document.createElement('input');
    primaryCheck.type = 'radio';
    primaryCheck.name = 'isPrimary';
    primaryCheck.required = true;

    // Create label for checkbox
    let checkLabel = document.createElement('label');
    checkLabel.for = 'isPrimary';
    checkLabel.innerText = 'Main Image';

    // Add label and input to container
    container.appendChild(inputLabel);
    container.appendChild(imageInput);
    container.appendChild(primaryCheck);
    container.appendChild(checkLabel);

    // Parent node
    let parent = button.parentNode;

    parent.insertBefore(container, button);
}
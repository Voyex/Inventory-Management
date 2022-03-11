function resizeContainer() {
    const containers = document.getElementsByClassName('main-image');

    for(let container of containers) {
        container.style.width = `${container.clientHeight}px`;
        console.log("This");
    }
}

function toggleFilterDropdown(checkbox) {
    const filterContent = document.querySelector('.filter-content');
    const buttonLabel = document.getElementById('dropdown-label');

    if(checkbox.checked) {
        filterContent.style.display = 'block';
        buttonLabel.innerHTML = 'Filter &#45;';
    } else {
        filterContent.style.display = 'none';
        buttonLabel.innerHTML = 'Filter &#43;';
    } 

    
}

window.addEventListener('resize', () => {
    resizeContainer();
});
resizeContainer();
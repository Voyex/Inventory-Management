function resizeContainer() {
    const containers = document.getElementsByClassName('main-image');

    for(let container of containers) {
        container.style.width = `${container.clientHeight}px`;
        container.style.backgroundColor = 'red';
    }
}

window.addEventListener('resize', () => {
    resizeContainer();
});
resizeContainer();
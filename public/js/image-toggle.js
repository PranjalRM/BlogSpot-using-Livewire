document.addEventListener('DOMContentLoaded', () => {
    const image = document.getElementById('post-image');
    if (image) {
        image.addEventListener('click', (event) => {
            event.stopPropagation();
            if (image.classList.contains('w-1/2')) {
                image.classList.remove('w-1/2');
                image.classList.add('w-full');
            } else {
                image.classList.remove('w-full');
                image.classList.add('w-1/2');
            }
        });

        document.addEventListener('click', (event) => {
            if (image.classList.contains('w-full') && !image.contains(event.target)) {
                image.classList.remove('w-full');
                image.classList.add('w-1/2');
            }
        });
    }
});

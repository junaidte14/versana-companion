document.addEventListener('DOMContentLoaded', () => {

  const images = document.querySelectorAll('.versana-lazy-pro');

  images.forEach(img => {

    // If already cached
    if (img.complete) {
      img.classList.add('is-loaded');
      return;
    }

    // When image loads
    img.addEventListener('load', () => {
      img.classList.add('is-loaded');
    });

    // Safety timeout (edge cases)
    setTimeout(() => {
      img.classList.add('is-loaded');
    }, 3000);

  });

});

document.addEventListener('DOMContentLoaded', () => {
  const ratingStars = document.querySelectorAll('.rating span');
  const ratingValueInput = document.getElementById('rating-value');

  ratingStars.forEach(star => {
      star.addEventListener('click', () => {
          const value = star.getAttribute('data-value');

          // Set the hidden input value
          ratingValueInput.value = value;

          // Update the visual selection
          ratingStars.forEach(s => s.classList.remove('selected'));
          star.classList.add('selected');
          let previousSibling = star.previousElementSibling;
          while (previousSibling) {
              previousSibling.classList.add('selected');
              previousSibling = previousSibling.previousElementSibling;
          }
      });
  });
});

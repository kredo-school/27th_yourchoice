function changeColor(input) {
  const value = parseInt(input.value);
  if (isNaN(value)) {
      input.style.color = 'black'; // Default for null or empty
  } else if (value > 100) {
      input.style.color = 'red'; // Red for values greater than 100
  } else if (value < 100) {
      input.style.color = 'blue'; // Blue for values less than 100
  } else {
      input.style.color = 'black'; // Black for exactly 100
  }
}

// Initialize colors for all inputs on page load
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.dynamic-color').forEach(input => {
      changeColor(input); // Apply color logic to each input
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const reservationModalLabel = document.getElementById('reservationModalLabel');
  const notificationDropdown = document.querySelector('.notification-dropdown');

  reservationModalLabel.addEventListener('click', function (e) {
      e.preventDefault();
      const isVisible = notificationDropdown.style.display === 'block';
      notificationDropdown.style.display = isVisible ? 'none' : 'block';
  });

  // メニュー外をクリックしたときに閉じる
  document.addEventListener('click', function (e) {
      if (!notificationDropdown.contains(e.target) && !reservationModalLabel.contains(e.target)) {
          notificationDropdown.style.display = 'none';
      }
  });
});
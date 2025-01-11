function previewImage(event, previewId, iconId) {
  const input = event.target;
  const file = input.files[0];

  if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
          // プレビュー画像を表示
          const preview = document.getElementById(previewId);
          preview.src = e.target.result;
          preview.classList.remove('d-none');

          // アイコンを非表示
          const icon = document.getElementById(iconId);
          if (icon) {
              icon.classList.add('d-none');
          }
      };
      reader.readAsDataURL(file);
  }
}

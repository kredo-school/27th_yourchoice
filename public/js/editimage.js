function previewImage(event, previewId, iconId, labelId) {
  const input = event.target;
  const file = input.files[0];

  if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
          // プレビュー画像の更新
          const preview = document.getElementById(previewId);
          preview.src = e.target.result;
          preview.classList.remove('d-none');

          // アイコンを非表示
          const icon = document.getElementById(iconId);
          if (icon) {
              icon.classList.add('d-none');
          }

          // ファイル名をラベルに表示
          const label = document.getElementById(labelId);
          if (label) {
              label.textContent = file.name;
          }
      };
      reader.readAsDataURL(file);
  }
}

function removeImage(previewId, iconId, labelId) {
  // プレビュー画像をリセット
  const preview = document.getElementById(previewId);
  if (preview) {
      preview.src = '';
      preview.classList.add('d-none');
  }

  // アイコンを再表示
  const icon = document.getElementById(iconId);
  if (icon) {
      icon.classList.remove('d-none');
  }

  // ファイル名ラベルをリセット
  const label = document.getElementById(labelId);
  if (label) {
      label.textContent = '';
  }

  // ファイル入力をリセット
  const input = document.querySelector('.image-input');
  if (input) {
      input.value = '';
  }
}

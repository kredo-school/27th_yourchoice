function previewImage(event, previewId, iconId, labelId) {
  const input = event.target;
  const file = input.files[0];

  if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
          const preview = document.getElementById(previewId);
          const icon = document.getElementById(iconId);
          const label = document.getElementById(labelId);

          // プレビュー画像を表示
          preview.src = e.target.result;
          preview.classList.remove('d-none');

          // アイコンを非表示
          icon.classList.add('d-none');

          // ファイル名をラベルに表示
          if (label) {
              label.textContent = file.name;
          }
      };
      reader.readAsDataURL(file);
  }
}

function removeImage(previewId, iconId, labelId) {
  const preview = document.getElementById(previewId);
  const icon = document.getElementById(iconId);
  const label = document.getElementById(labelId);

  // プレビュー画像をリセット
  preview.src = '';
  preview.classList.add('d-none');

  // アイコンを表示
  icon.classList.remove('d-none');

  // ファイル名ラベルをリセット
  if (label) {
      label.textContent = '';
  }

  // ファイル入力をリセット
  const input = document.querySelector('.image-input');
  input.value = '';
}

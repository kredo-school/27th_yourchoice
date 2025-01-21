(function () {
  if (!('speechSynthesis' in window)) {
    console.warn('This browser does not support text-to-speech.');
    return;
  }

  // 音声読み上げの状態を管理
  let isSpeechEnabled = localStorage.getItem('speechEnabled') === 'true';

  // サウンドアイコン要素
  const soundToggle = document.getElementById('soundToggle');
  const soundIcon = document.getElementById('soundIcon');

  /**
   * 音声読み上げの状態に応じてアイコンを更新
   */
  const updateSoundIcon = () => {
    if (isSpeechEnabled) {
      soundIcon.classList.remove('fa-volume-mute');
      soundIcon.classList.add('fa-volume-up');
    } else {
      soundIcon.classList.remove('fa-volume-up');
      soundIcon.classList.add('fa-volume-mute');
    }
  };

  /**
   * 音声読み上げ処理を実行
   */
  const speakText = (text) => {
    if (!text || !isSpeechEnabled) return;

    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'en-US'; // 必要に応じて 'ja-JP' に変更
    utterance.volume = 0.1;
    utterance.rate = 1;
    utterance.pitch = 1;

    speechSynthesis.cancel();
    speechSynthesis.speak(utterance);
  };

  /**
   * ページ概要を読み上げ
   */
  const readPageDescription = () => {
    const pageDescription = document.body.getAttribute('data-page-description');
    if (pageDescription) {
      speakText(pageDescription);
    }
  };

  /**
   * ホバー処理の初期化
   */
  const initializeHoverDescriptions = () => {
    const hoverElements = document.querySelectorAll('[data-description]');
    hoverElements.forEach((element) => {
      element.addEventListener('mouseover', (event) => {
        const description = event.currentTarget.getAttribute('data-description');
        speakText(description);
      });
    });
  };

  /**
   * 音声読み上げのON/OFF切り替え
   */
  const toggleSpeech = () => {
    isSpeechEnabled = !isSpeechEnabled;
    localStorage.setItem('speechEnabled', isSpeechEnabled);
    updateSoundIcon();
  };

  // サウンドアイコンのクリックイベントを設定
  if (soundToggle) {
    soundToggle.addEventListener('click', toggleSpeech);
  }

  /**
   * ページロード時の初期化
   */
  const initializeSpeechSynthesis = () => {
    updateSoundIcon(); // ON/OFF状態をアイコンに反映
    readPageDescription(); // ページ概要を読み上げ
    initializeHoverDescriptions(); // ホバー時の読み上げを設定
  };

  // 初期化を実行
  document.addEventListener('DOMContentLoaded', initializeSpeechSynthesis);
})();

function postDataContent(category) {
  const form = document.createElement('form');
  form.classList.add('off');
  form.action = './content.php';
  form.method = 'POST';

  const input = document.createElement('input');
  input.name = 'category';
  input.value = category;

  form.appendChild(input);
  document.body.appendChild(form);
  form.submit();
}

function goBack() {
  window.history.back();
}
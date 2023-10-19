function postDataContent(category) {
  const form = document.createElement('form');
  form.classList.add('off');
  form.action = './how.php';
  form.method = 'POST';

  const input = document.createElement('input');
  input.name = 'category';
  input.value = category;

  form.appendChild(input);
  document.body.appendChild(form);
  form.submit();
}
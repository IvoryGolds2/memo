function postDataContentA(category) {

  const formA = document.createElement('form');
  formA.classList.add('off');
  formA.action = './atoz.php';
  formA.method = 'POST';

  const inputA = document.createElement('input');
  inputA.name = 'category';
  inputA.value = category;

  formA.appendChild(inputA);
  document.body.appendChild(formA);
  formA.submit();
}

function postDataContentB(category) {
  
  const formB = document.createElement('form');
  formB.classList.add('off');
  formB.action = './dictionary.php';
  formB.method = 'POST';
  
  const inputB = document.createElement('input');
  inputB.name = 'category';
  inputB.value = category;
  
  formB.appendChild(inputB);
  document.body.appendChild(formB);
  formB.submit();
}

function postDataContentC(category,categorycode) {
  
  const formC = document.createElement('form');
  formC.classList.add('off');
  formC.action = './tip.php';
  formC.method = 'POST';
  
  const input1 = document.createElement('input');
  input1.name = 'category';
  input1.value = category;

  const input2 = document.createElement('input');
  input2.name = 'categorycode';
  input2.value = categorycode;  
  
  formC.appendChild(input1);
  formC.appendChild(input2);
  document.body.appendChild(formC);
  formC.submit();
}

function postDataContentD(category) {
  
  const formD = document.createElement('form');
  formD.classList.add('off');
  formD.action = './changed.php';
  formD.method = 'POST';
  
  const inputD = document.createElement('input');
  inputD.name = 'category';
  inputD.value = category;
  
  formD.appendChild(inputD);
  document.body.appendChild(formD);
  formD.submit();
}

function postNews(code) {
  const form = document.createElement('form');
  form.classList.add('off');
  form.action = './newssub.php';
  form.method = 'POST';

  const input = document.createElement('input');
  input.name = 'code';
  input.value = code;

  form.appendChild(input);
  document.body.appendChild(form);
  form.submit();
}
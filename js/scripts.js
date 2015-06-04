function postRefreshPage () {
  var theForm, newInput1, newInput2;
  // Start by creating a <form>
  theForm = document.createElement('form');
  theForm.action = 'delete.php';
  theForm.method = 'post';
  
  document.getElementById('hidden_form_container').appendChild(theForm);
  // ...and submit it
  theForm.submit();
}
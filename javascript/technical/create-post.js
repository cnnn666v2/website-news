const form = document.getElementById('create-user-post-form');

form.addEventListener('submit', async event => {
  event.preventDefault();

  const data = new FormData(form);
  console.log(Array.from(data));

  fetch('/api/v1/users/add-post.php', {
      method: 'POST',
      body: data,
  })
  .then(function(response) {
      window.location.reload()
      return response.text();
  })
  .then(function(body) {
    console.log(body);
  })
});
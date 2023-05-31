/* let firstName = 'Chris'

console.log('COUCOU :)', firstName)
//alert('COUCOU :)')
document.write('TEST') */

function confirmRemove (articleId) {
  if (confirm("Êtes-vous sûr.e de vouloir supprimer l'article ?")) {
    window.location.href = 'remove.php?id=' + articleId
  }
}

function deployArticle (articleContent, i) {
  let seeMoreButton = document.querySelector('.link-primary')
  let articleContents = document.querySelectorAll('.card-text')
  if (seeMoreButton.innerHTML === 'Voir plus') {
    seeMoreButton.innerHTML = 'Voir moins'
    articleContents[i].innerHTML = articleContent
  } else {
    seeMoreButton.innerHTML = 'Voir plus'
    articleContents[i].innerHTML = articleContent.substring(0, 150) + '...'
  }
}

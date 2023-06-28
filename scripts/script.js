/* let firstName = 'Chris'

console.log('COUCOU :)', firstName)
//alert('COUCOU :)')
document.write('TEST') */

function confirmRemove (articleId) {
  if (confirm("Êtes-vous sûr.e de vouloir supprimer l'article ?")) {
    window.location.href = 'remove.php?id=' + articleId // Redirection sur le script PHP de suppression de l'article par son id
  }
}

function deployArticle (articleContent, i) {
  let seeMoreButton = document.querySelector('.link-primary')
  let articleContents = document.querySelectorAll('.card-text')
  if (seeMoreButton.innerHTML === 'Voir plus') { // Si le bouton est cliqué, affiche "Voir plus", affiche maintenant "Voir moins"
    seeMoreButton.innerHTML = 'Voir moins'
    articleContents[i].innerHTML = articleContent // Insère le contenu de l'article dans la 'card-text'
  } else { // Inversement 
    seeMoreButton.innerHTML = 'Voir plus'
    articleContents[i].innerHTML = articleContent.substring(0, 150) + '...' // Insère les 150 premiers caractères de l'article dans la 'card-text'
  }
}

// Function that passed an ID displays the description of the article with that ID.
function readMore (id) {
    const btnText = document.querySelector(`#${id}`)
    const dots = document.querySelector(`#dots-${btnText.dataset.id}`)
    const moreText = document.querySelector(`#more-${btnText.dataset.id}`)
  
    if (dots.style.display === 'none') {
      dots.style.display = 'inline'
      btnText.innerHTML = 'Read more'
      moreText.style.display = 'none'
    } else {
      dots.style.display = 'none'
      btnText.innerHTML = 'Read less'
      moreText.style.display = 'inline'
    }
  }
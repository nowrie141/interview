function readMore (id) {
  const btnText = document.querySelector(`#${id}`)
  const dots = document.querySelector(`#dots-${btnText.dataset.id}`)
  const moreText = document.querySelector(`#more-${btnText.dataset.id}`)

  if (dots.style.display === 'none') {
    dots.style.display = 'inline'
    btnText.innerHTML = 'Read more'
    moreText.style.display = 'none'
    setTimeout(function () {
      moreText.style.opacity = '0'
    }, 1)
  } else {
    dots.style.display = 'none'
    btnText.innerHTML = 'Read less'
    moreText.style.display = 'inline'
    setTimeout(function () {
      moreText.style.opacity = '1'
    }, 1)
  }
}

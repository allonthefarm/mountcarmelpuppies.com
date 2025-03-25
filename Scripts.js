const amb_lightbox = document.createElement('div')
amb_lightbox.id = 'amb_lightbox'
document.body.appendChild(amb_lightbox)

const images = document.querySelectorAll('.amb_puppy_photos_tm_item img')
images.forEach(image => {
  image.addEventListener('click', e => {
    amb_lightbox.classList.add('active')
    const img = document.createElement('img')
    img.src = image.src
    while (amb_lightbox.firstChild) {
      amb_lightbox.removeChild(amb_lightbox.firstChild)
    }
    amb_lightbox.appendChild(img)
  })
})

amb_lightbox.addEventListener('click', e => {
  if (e.target !== e.currentTarget) return
  amb_lightbox.classList.remove('active')
})


const amb_lightbox = document.createElement('div');
amb_lightbox.id = 'amb_lightbox';
document.body.appendChild(amb_lightbox);

const images = document.querySelectorAll(".amb_puppy_photos_tm_item img");
images.forEach(image => {
  image.addEventListener('click', e => {
    amb_lightbox.classList.add('active');
  });
});
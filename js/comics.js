
const nextButton = document.querySelectorAll("#CommicView .nav .next");
nextButton.forEach(button => {
    button.addEventListener('click', next);
});

/**
 * 
 * @param {PointerEvent} event 
 */
function next(event){
    event.preventDefault();
    console.log("Next");
    const currentPage = document.querySelector("#CommicView .comicPage.active");
    const nextPage = currentPage.nextElementSibling;

    console.log(nextPage.getAttribute('data-img-fr'));

    let image = nextPage.querySelector("img");
    if(image == null){
        image = document.createElement('img');
        image.src = nextPage.getAttribute('data-img-fr');
        image.alt = nextPage.getAttribute('data-title-fr');

        nextPage.appendChild(image);
    }

    currentPage.classList.add('slide-out');
    nextPage.classList.add('slide-in');
    
}
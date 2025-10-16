let language = "en";
const nextButton = document.querySelectorAll("#CommicView .nav .next");
nextButton.forEach(button => {
    button.addEventListener('click', next);
});
const prevButton = document.querySelectorAll("#CommicView .nav .prev");
prevButton.forEach(button => {
    button.addEventListener('click', prev);
});
const firstButton = document.querySelectorAll("#CommicView .nav .first");
firstButton.forEach(button => {
    button.addEventListener('click', first);
});
const lastButton = document.querySelectorAll("#CommicView .nav .last");
lastButton.forEach(button => {
    button.addEventListener('click', last);
});
const languageButtons = document.querySelectorAll("#CommicView .nav .languageBt");
languageButtons.forEach(button => {
    button.addEventListener('click', setLanguage);
});

addEventListener("hashchange", readHash);
readHash();

/**
 * 
 * @param {PointerEvent} event 
 */
function next(event) {
    event.preventDefault();
    console.log("Next");
    const currentPage = document.querySelector("#CommicView .comicPage.active");
    const nextPage = currentPage.nextElementSibling;
    showPage(nextPage)
}
/**
 * 
 * @param {PointerEvent} event 
 */
function prev(event) {
    event.preventDefault();
    console.log("Previous");
    const currentPage = document.querySelector("#CommicView .comicPage.active");
    const prevPage = currentPage.previousElementSibling;
    showPage(prevPage)
}
/**
 * 
 * @param {PointerEvent} event 
 */
function first(event) {
    event.preventDefault();
    console.log("Previous");
    const currentPage = document.querySelector("#CommicView .comicPage.active");
    const firstPage = currentPage.parentElement.firstElementChild;
    showPage(firstPage)
}
/**
 * 
 * @param {PointerEvent} event 
 */
function last(event) {
    event.preventDefault();
    console.log("Previous");
    const currentPage = document.querySelector("#CommicView .comicPage.active");
    const lastPage = currentPage.parentElement.lastElementChild;
    showPage(lastPage)
}
/**
 * 
 * @param {PointerEvent} event 
 */
function setLanguage(event) {
    event.preventDefault();
    const lang = event.target.getAttribute('data-language');
    // console.log("setLanguage",lang);
    language = lang;
    const currentPage = document.querySelector("#CommicView .comicPage.active");
    loadPageAndAdjacents(currentPage);
    updateTitle(currentPage);
    updateHash(currentPage);
}

function readHash() {
    const hash = window.location.hash;
    if (hash == null || hash == "") return;
    const parse = hash.match(/page(\d+)-(en|fr)/);
    if (!parse) return;
    // console.log(parse);
    var seq = parse[1];
    var lang = parse[2];
    const page = document.querySelector(`#CommicView .comicPage[data-seq="${seq}"]`);
    if (page == null) return;
    language = lang;
    showPage(page);
}
/**
 * 
 * @param {Element} page 
 */
function showPage(page) {
    if (page == null) return;

    document.querySelector('#CommicView').scrollIntoView({
        behavior: 'smooth'
    });

    const currentPage = document.querySelector("#CommicView .comicPage.active");

    loadPageAndAdjacents(page);

    if (page == currentPage) return;

    updateHash(page);
    updateTitle(page);
    updateButtons(page);

    const seq = parseInt(page.getAttribute('data-seq'))
    const transitionForward = seq > parseInt(currentPage.getAttribute('data-seq'));
    // console.log("transitionForward", transitionForward);
    const transitionSuffix = transitionForward ? "" : "-right"

    currentPage.classList.add('slide-out' + transitionSuffix);
    page.classList.add('slide-in' + transitionSuffix);

    currentPage.classList.remove('active');
    page.classList.add('active');

    currentPage.addEventListener('animationend', () => {
        currentPage.classList.remove('slide-out' + transitionSuffix);
        page.classList.remove('slide-in' + transitionSuffix);
    }, { once: true });
}

/**
 * 
 * @param {Element} page 
 */
function updateHash(page) {
    const seq = parseInt(page.getAttribute('data-seq'))
    window.location.hash = `page${seq}-${language}`;
}

/**
 * 
 * @param {Element} page 
 */
function updateTitle(page) {
    document.querySelectorAll("#CommicView .comicPageTitle").forEach(title => {
        title.textContent = page.getAttribute('data-title-' + language);
    });
}
/**
 * 
 * @param {Element} page 
 */
function updateButtons(page) {
    const prevPage = page.previousElementSibling;
    const nextPage = page.nextElementSibling;
    document.querySelectorAll("#CommicView .nav .prev").forEach(button => {
        if (prevPage == null) {
            button.classList.add('inactive');
        } else {
            button.classList.remove('inactive');
        }
    });
    document.querySelectorAll("#CommicView .nav .next").forEach(button => {
        if (nextPage == null) {
            button.classList.add('inactive');
        } else {
            button.classList.remove('inactive');
        }
    });
}

/**
 * 
 * @param {Element} page 
 */
function loadPageAndAdjacents(page) {
    loadPage(page);
    const nextPage = page.nextElementSibling;
    loadPage(nextPage);
    const prevPage = page.previousElementSibling;
    loadPage(prevPage);
}
/**
 * 
 * @param {Element} page 
 */
function loadPage(page) {
    if (page == null) return;
    let image = page.querySelector("img");
    const src = page.getAttribute('data-img-' + language);
    if (image == null) {
        image = document.createElement('img');
        image.src = src;
        image.alt = page.getAttribute('data-title-' + language);

        page.appendChild(image);
    } else if (image.src != src) {
        image.src = src;
        image.alt = page.getAttribute('data-title-' + language);
    }
}
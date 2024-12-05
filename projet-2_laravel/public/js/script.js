function openDetails(id){
    let cards = document.getElementsByClassName("book-card");

    for (let i = 0; i < cards.length; i++) {
        let card = cards[i];
        card.style.display = "none";
    }

    let detail = document.getElementById("book-card-detail-"+id);
    detail.style.display = "flex";
}

function closeDetails(id){
    let cards = document.getElementsByClassName("book-card");

    for (let i = 0; i < cards.length; i++) {
        let card = cards[i];
        card.style.display = "";
    }

    let detail = document.getElementById("book-card-detail-"+id);
    detail.style.display = "none";
}

function openNavbar(){
    let aElement = document.getElementById("open_navbar");
    let menuLogo = document.getElementById("menu-logo");
    let closeLogo = document.getElementById("close-logo");

    if(aElement.style.display == "none" || aElement.style.display == "" ){
        aElement.style.display = "flex";
        menuLogo.style.display = "none";
        closeLogo.style.display = "block";
    }else{
        aElement.style.display = "none";
        menuLogo.style.display = "block";
        closeLogo.style.display = "none";
    }
}
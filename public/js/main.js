let card = document.querySelector(".card");
let cadastroButton = document.querySelector(".cadastroButton");
let loginButton = document.querySelector(".loginButton");


loginButton.onclick = () => {

     card.classList.remove("cadastroactive");

    card.classList.add("loginactive");


}


cadastroButton.onclick = () => {

    card.classList.remove("loginactive");

    card.classList.add("cadastroactive");


}
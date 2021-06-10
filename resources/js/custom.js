const { filter } = require("lodash");

$(function() {
    $("li").on("click", function() {
        $(this).addClass("active");
        // .siblings()
        // .removeClass("active");
    });
});

// search event

const cardList = document.querySelector(".cards");
const search = document.querySelector(".search input");

const filterCards = typedChar => {
    Array.from(cardList.children)
        .filter(
            card =>
                !card.children[1].children[0].textContent
                    .toLowerCase()
                    .includes(typedChar)
        )
        .forEach(card => card.classList.add("filtered"));

    Array.from(cardList.children)
        .filter(card =>
            card.children[1].children[0].textContent
                .toLowerCase()
                .includes(typedChar)
        )
        .forEach(card => card.classList.remove("filtered"));
};

search.addEventListener("keyup", e => {
    const typedChar = search.value.trim().toLowerCase();
    if (e.key === "Escape") {
        search.value = "";
        filterCards(typedChar);
    }
    filterCards(typedChar);
});

document.addEventListener("keyup", e => {
    if (e.key === "Escape") {
        search.value = "";
        filterCards("");
    }
});

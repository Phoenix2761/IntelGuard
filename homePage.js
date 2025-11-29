// import { hamburgerMenuToggle as hamburgerMenuTwoToggle } from "../classes.js";
function hamburgerMenuToggle() {
    if ((document.querySelector("div.heroSection nav button.hamburgerMenu span.hamburgerMenuBarOne").classList.contains("hamburgerMenuBarOneShow") === false)
    || (document.querySelector("div.heroSection nav button.hamburgerMenu span.hamburgerMenuBarTwo").classList.contains("hamburgerMenuBarTwoShow") === false)) {
        document.querySelector("div.heroSection nav button.hamburgerMenu span.hamburgerMenuBarOne").classList.add("hamburgerMenuBarOneShow");
        document.querySelector("div.heroSection nav button.hamburgerMenu span.hamburgerMenuBarTwo").classList.add("hamburgerMenuBarTwoShow");
        document.querySelector("div.heroSection nav ul.navUl").classList.add("navUlShow");
    }
    else {
        document.querySelector("div.heroSection nav button.hamburgerMenu span.hamburgerMenuBarOne").classList.remove("hamburgerMenuBarOneShow");
        document.querySelector("div.heroSection nav button.hamburgerMenu span.hamburgerMenuBarTwo").classList.remove("hamburgerMenuBarTwoShow");
        document.querySelector("div.heroSection nav ul.navUl").classList.remove("navUlShow");
    }
}
document.querySelector("button.hamburgerMenu").addEventListener("click", hamburgerMenuToggle);
document.querySelector("li#loginLi").addEventListener("click", function () {
    alert("We are launching soon");
});
document.querySelector("a.getStartedLink").addEventListener("click", function () {
    alert("We are launching soon");
});
document.querySelector("a.categoryOne").addEventListener("click", function () {
    alert("We are launching soon");
});
document.querySelector("a.categoryTwo").addEventListener("click", function () {
    alert("We are launching soon");
});

class hamburgerMenuToggle {
    constructor() {
        // No execution
    }

    static hamburgerMenuToggle(elementSelector) {
        document.querySelector(elementSelector).addEventListener("click", function () {
            if ((document.querySelector("div#sideMenu").classList.contains("sideMenuHide") === false)) {
                document.querySelector("div#sideMenu").classList.remove("sideMenuHidden");
                document.querySelector("div#sideMenu").classList.add("sideMenuShow");
                document.querySelector("div#sideMenu div#sideMenuCloseBarsContainer").addEventListener("click", function () {
                    document.querySelector("div#sideMenu").classList.add("sideMenuHidden");
                    document.querySelector("div#sideMenu").classList.remove("sideMenuShow");
                });
            }
            else {
                /*document.querySelector("span.hamburgerMenuBarOne").classList.remove("hamburgerMenuBarOneShow");
                document.querySelector("span.hamburgerMenuBarTwo").classList.remove("hamburgerMenuBarTwoShow"); */
                // document.querySelector("nav.navigationBar div.menuSubContainer").classList.remove("menuSubContainerShow");
                document.querySelector("div#sideMenu").classList.remove("sideMenuShow");
            }
        });
    }
} 

class Search {
    #pathOfSearchFile;
    constructor(pathOfSearchFile) {
        this.#pathOfSearchFile = pathOfSearchFile;
    }

    search(searchParameter) {
        const xmlHttpRequestObject = new XMLHttpRequest();
        xmlHttpRequestObject.responseType = "text";
        xmlHttpRequestObject.open("GET", `./searchPersonnelUserNames.php?searchTerm=${searchParameter}`);
        xmlHttpRequestObject.send();
        xmlHttpRequestObject.addEventListener("readystatechange", () => {
            if ((this.readyState === 4) && (this.status === 200)) {
                return this.responseText;
            }
        });
    }
}

export {hamburgerMenuToggle, Search}
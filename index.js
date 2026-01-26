import { hamburgerMenuToggle, Search } from "../classes.js";
function setCurrent(item) {
    document.querySelector(item).classList.add("active");
}

function currentRemoveAll () {
    document.querySelector("div#sideMenu ul li a").classList.remove("active");
}

var navbarLogoContainer = document.querySelector("nav.navigationBar span.homeNavbarLogoContainer h2");
var title = document.querySelector("title");
// export {navbarLogoContainer};
function setCurrentState() {
    if (title.textContent.trim() === "Profile") {
        currentRemoveAll();
        setCurrent("a.itemOne");
    }
    else if ((navbarLogoContainer.textContent.trim() === "Jobs") && (document.querySelector("title").textContent.trim() === "JOBS")) {
        currentRemoveAll();
        setCurrent("a.itemTwo");
    }
}
if (document.querySelector("title").textContent.trim() !== "Sign Up") {
    hamburgerMenuToggle.hamburgerMenuToggle("button.hamburgerMenuTwo");
    
    if (window.innerWidth <= 768) {
    document.querySelector("#sideMenuCloseBarsContainer").addEventListener("click", function () {
        this.parentElement.classList.add("sideMenuHidden");
    });
} 
}
else {
    // No execution
}

function buttonClickEffect() {
    const buttons = document.querySelectorAll(".btn");
    for (let index=0; index < (buttons.length); index++) {
        buttons[index].addEventListener("click", (eObject) =>  {
            eObject.target.classList.add("clicked");
            window.setTimeout(() => {
                eObject.target.classList.remove("clicked");
            }, 500);
        });
    }
}

if (document.querySelector("title").textContent.trim() === "Sign Up") {
    var registerButtons = document.querySelectorAll("body#signUpBody div#registerContainer div.registerToggleContainer button")
    for (var i=0; i<(registerButtons.length); i++) {
        registerButtons[i].addEventListener("click", function () {
            console.log(this.textContent);
            if ((this.textContent.trim()) === "Sign Up") {
                document.querySelector("body#signUpBody div#registerContainer div#loginDiv").classList.add("hiddenSection");
                document.querySelector("body#signUpBody div#registerContainer div.registerToggleContainer button#signUpSectionButton").classList.remove("hiddenSectionButton");
                document.querySelector("body#signUpBody div#registerContainer div.registerToggleContainer button#loginSectionButton").classList.add("hiddenSectionButton");
                document.querySelector("body#signUpBody div#registerContainer div#signUpDiv").classList.remove("hiddenSection");
                console.log("Sign Up Button clicked");
            }
            else if ((this.textContent.trim()) === "Sign In") {
                document.querySelector("body#signUpBody div#registerContainer div#loginDiv").classList.remove("hiddenSection");
                document.querySelector("body#signUpBody div#registerContainer div.registerToggleContainer button#loginSectionButton").classList.remove("hiddenSectionButton");
                document.querySelector("body#signUpBody div#registerContainer div.registerToggleContainer button#signUpSectionButton").classList.add("hiddenSectionButton");
                document.querySelector("body#signUpBody div#registerContainer div#signUpDiv").classList.add("hiddenSection");
                console.log("Sign In Button clicked");
            }
        });
    }

    const userNameInput = document.querySelector("input#userName");
    const userNameUsedSpan = document.querySelector("span.userNameUsed");
    userNameInput.addEventListener("keyup", function (eventObject) {
        var userNameInputValue = userNameInput.value;
        const xmlHttpRequestObj = new XMLHttpRequest();
        xmlHttpRequestObj.responseType = "text";
        xmlHttpRequestObj.open("GET", "./searchPersonnelUserNames.php?userName="+userNameInputValue);
        xmlHttpRequestObj.send();
        xmlHttpRequestObj.onreadystatechange = function () {
            if ((xmlHttpRequestObj.readyState == 4) && (xmlHttpRequestObj.status == 200)) {
                console.log(this.responseText);
                userNameUsedSpan.textContent = this.responseText;
            }
            else {
                
            }
        }
    });

    const profileImageInput = document.querySelector("input#profileImage");
    const profileImageButton = document.querySelector("button#profileImageButton");
    const alternativeImageInput = document.querySelector("input#alternativeImage");
    const alternativeImageButton = document.querySelector("button#alternativeImageButton");
    const alternativeImageTwoInput = document.querySelector("input#alternativeImageTwo");
    const alternativeImageTwoButton = document.querySelector("button#alternativeImageTwoButton");
    const meansOfIdImageInput = document.querySelector("input#meansOfIdImage");
    const meansOfIdImageButton = document.querySelector("button#meansOfIdImageButton");
    const guarantorImageInput = document.querySelector("input#guarantorImage");
    const guarantorImageButton = document.querySelector("button#guarantorImageButton");

    profileImageInput.addEventListener("change", function () {
        profileImageButton.classList.add("fileUploaded");
    })
    profileImageButton.addEventListener("click", function () {
        if (profileImageInput) {
            profileImageInput.click();
        }
        else {

        }
    });
    alternativeImageInput.addEventListener("change", function () {
        alternativeImageButton.classList.add("fileUploaded");
    });
    alternativeImageButton.addEventListener("click", function () {
        if (alternativeImageInput) {
            alternativeImageInput.click();
        }
        else {
            
        }
    });
    alternativeImageTwoInput.addEventListener("change", function () {
        alternativeImageTwoButton.classList.add("fileUploaded");
    });
    alternativeImageTwoButton.addEventListener("click", function () {
        if (alternativeImageTwoInput) {
            alternativeImageTwoInput.click();
        }
        else {
            
        }
    });
    meansOfIdImageInput.addEventListener("change", function () {
        meansOfIdImageButton.classList.add("fileUploaded");
    });
    meansOfIdImageButton.addEventListener("click", function () {
        if (meansOfIdImageInput) {
            meansOfIdImageInput.click();
        }
        else {
            
        }
    });
    guarantorImageInput.addEventListener("change", function () {
        guarantorImageButton.classList.add("fileUploaded");
    });
    guarantorImageButton.addEventListener("click", function () {
        if (guarantorImageInput) {
            guarantorImageInput.click();
        }
        else {
            
        }
    });
}
else if (title.textContent.trim() === "Personnel Feed") {
    currentRemoveAll();
    setCurrent("a.itemOne");
    document.querySelector("input#searchBarInput").addEventListener("keyup", function () {
        console.log(`this.value-${this.value}`);
        const newSearchObject = new Search("./searchPersonnelUserNames.php");
        newSearchObject.search(this.value);
    });
}
else if (title.textContent.trim() === "Posts") {
    currentRemoveAll();
    setCurrent("a.itemTwo");
    function setMaxDimension() {
        const postElements = document.querySelectorAll("div.post");
        postElements.forEach((postElement) => {
            var combinedHeightOfPostContents = 0;
            var postElementContent = [...postElement.children[1].children[1].children];
            postElementContent.forEach((element) => {
                combinedHeightOfPostContents += element.offsetHeight;
            });
            if (combinedHeightOfPostContents > 120) {
                postElement.children[2].children[1].classList.add("show");
                postElement.children[2].children[1].addEventListener("click", function () {
                    postElement.children[1].children[1].classList.add("postDescriptionShowContent");
                    postElement.children[2].children[1].classList.remove("show");
                    postElement.children[2].children[2].classList.add("show");
                    postElement.children[2].children[2].addEventListener("click", function () {
                        postElement.children[1].children[1].classList.remove("postDescriptionShowContent");
                        postElement.children[2].children[2].classList.remove("seeLessButtonShow");
                        postElement.children[2].children[1].classList.add("show");
                    });
                });
            }
            else {
                
            }
        })
    }

    function changeSlide(carouselSlideIndicators, carouselMedia, indicator, indexToChangeTo) {
        let activeMediaElementIndex = 0;
        for (let j=0; j < (carouselMedia.children.length); j++) {
            if (carouselMedia.children[j].classList.contains("activePostMedia") === false) {
                continue;
            }
            else if (carouselMedia.children[j].classList.contains("activePostMedia") === true) {
                activeMediaElementIndex = j;
            }
            else {}
        }
        if ((activeMediaElementIndex === (carouselMedia.children.length - 1)) && (indicator === 1)) {
            for (let k=0; k < (carouselMedia.children.length); k++) {
                carouselMedia.children[k].classList.remove("activePostMedia");
            }
            for (let l=0; l < (carouselSlideIndicators.length); l++) {
                carouselSlideIndicators[l].classList.remove("slideIndicatorActive");
            }
            carouselMedia.children[0].classList.add("activePostMedia");
            carouselSlideIndicators[0].classList.add("slideIndicatorActive");
        }
        else if ((activeMediaElementIndex === 0) && (indicator === -1)) {
            for (let m=0; m < (carouselMedia.children.length); m++) {
                carouselMedia.children[m].classList.remove("activePostMedia");
            }
            for (let n=0; n < (carouselSlideIndicators.length); n++) {
                carouselSlideIndicators[n].classList.remove("slideIndicatorActive");
            }
            carouselMedia.children[(carouselMedia.children.length - 1)].classList.add("activePostMedia");
            carouselSlideIndicators[(carouselSlideIndicators.length) - 1].classList.add("slideIndicatorActive");
        }
        else if (indicator === -1) {
            for (let o=0; o < (carouselMedia.children.length); o++) {
                carouselMedia.children[o].classList.remove("activePostMedia");
            }
            for (let p=0; p < (carouselSlideIndicators.length); p++) {
                carouselSlideIndicators[p].classList.remove("slideIndicatorActive");
            }
            carouselMedia.children[activeMediaElementIndex - 1].classList.add("activePostMedia");
            carouselSlideIndicators[activeMediaElementIndex - 1].classList.add("slideIndicatorActive");
        }
        else if (indicator === 1){
            for (let o=0; o < (carouselMedia.children.length); o++) {
                carouselMedia.children[o].classList.remove("activePostMedia");
            }
            for (let p=0; p < (carouselSlideIndicators.length); p++) {
                carouselSlideIndicators[p].classList.remove("slideIndicatorActive");
            }
            carouselMedia.children[activeMediaElementIndex + 1].classList.add("activePostMedia");
            carouselSlideIndicators[activeMediaElementIndex + 1].classList.add("slideIndicatorActive");
        }
        else if ((indicator === 0) && (typeof(indexToChangeTo) === "number") && (indexToChangeTo < (carouselSlideIndicators.length))) {
            for (let q=0; q < (carouselMedia.children.length); q++) {
                carouselMedia.children[q].classList.remove("activePostMedia");
            }
            for (let r=0; r < (carouselSlideIndicators.length); r++) {
                carouselSlideIndicators[r].classList.remove("slideIndicatorActive");
            }
            carouselMedia.children[indexToChangeTo].classList.add("activePostMedia");
            carouselSlideIndicators[indexToChangeTo].classList.add("slideIndicatorActive");
        }
        else {

        }

        /* dialog modal for previewing post media
        const dialogModalContainer = document.createElement("dialog");
        const closeButton = document.createElement("p");
        const modalVideoElement = document.createElement("video");
        modalVideoElement.controls;
        const videoSource = document.createElement("source");
        modalVideoElement.appendChild(videoSource);
        const modalImageElement = document.createElement("image");
        dialogModalContainer.appendChild(closeButton);
        var carouselMediaArray = Array.from(carouselMedia);
        var activeMediaElement;
        document.querySelector("body#postsBody").appendChild(); */
    }
        
    function changeImage() {
        let postItem = document.querySelectorAll("div.post");
        for (let i=0; i < (postItem.length); i++) {
            let carouselMedia = postItem[i].children[1].children[1].children[1].children[0];
            let carouselSlideIndicators = postItem[i].children[1].children[1].children[1].children[3].children;
            let carouselPreviousButton = postItem[i].children[1].children[1].children[1].children[1];
            let carouselNextButton = postItem[i].children[1].children[1].children[1].children[2];
            let indexOfActiveMediaElement = 0;       
            carouselPreviousButton.addEventListener("click", function () {
                changeSlide(carouselSlideIndicators, carouselMedia, -1, null);
            });
            carouselNextButton.addEventListener("click", function () {
                changeSlide(carouselSlideIndicators, carouselMedia, 1, null);
            });
            for (let s=0; s < (carouselSlideIndicators.length); s++) {
                carouselSlideIndicators[s].addEventListener("click", () => {
                    changeSlide(carouselSlideIndicators, carouselMedia, 0, Array.from(carouselSlideIndicators).indexOf(carouselSlideIndicators[s]));
                });
            }
        }
    }

    function likeButtonFunction () {
        var likeButton = document.querySelectorAll("button.likeButton");
        console.log(`likeButtonElementsArray.length: ${[...likeButton].length}`);
        likeButton.forEach(function(likeButtonElement) {
            likeButtonElement.addEventListener("click", function () {
                console.log(`Like button element clicked`);
                if (likeButtonElement.children[0].classList.contains("hide") === true) {
                    likeButtonElement.children[1].classList.add("hide");
                    likeButtonElement.children[0].classList.remove("hide");
                }
                else if (likeButtonElement.children[0].classList.contains("hide") === false) {
                    likeButtonElement.children[0].classList.add("hide");
                    likeButtonElement.children[1].classList.remove("hide");
                }
            });
        });
    }
    var xmlHttpRequestObject = new XMLHttpRequest();
    try {
        xmlHttpRequestObject.open("GET", "./feedItem.php?n=" + 4);
        xmlHttpRequestObject.responseType = "document";
        xmlHttpRequestObject.send();
        xmlHttpRequestObject.readystatechange = function () {
            if ((this.readyState === 4) && (this.status === 200)) {
                var itemsArray = this.responseXML.body.innerHTML.split("<hr>");
                var feedItemsContainer = document.querySelector("body#postsBody div#contentMenuContainer div.contentContainer");
                for (var j=0; j<itemsArray.length; j++) {
                    feedItemsContainer.innerHTML += itemsArray[j];
                }
                setMaxDimension();
                changeImage();
                likeButtonFunction();
                // console.log(`buttons.length: ${buttons.length}`);
                buttonClickEffect();
                const commentButtons = document.querySelectorAll(".buttonsContainer");
                const commentsContainers = document.querySelectorAll(".commentsContainer");


                commentsContainers.forEach(function (currentElement) {
                    currentElement.parentElement.children[2].children[0].children[0].addEventListener("click", () => {
                        currentElement.classList.toggle("show");
                    });
                });
                document.querySelector("button#postButton").addEventListener("click", function () {
                document.querySelector("dialog#postDialog").showModal();
                })
                document.querySelector("dialog#postDialog").classList.add("postDialogShow");
                document.querySelector("dialog#postDialog button#removePostModal").addEventListener("click", function () {
                    document.querySelector("dialog#postDialog").close();
                    // document.querySelector("dialog#postDialog").classList.remove("postDialogShow");
                });
                document.querySelector("dialog#postDialog span#fileUploadButton").addEventListener("click", function () {
                    const mediaPreviewContainer = document.querySelector("dialog#postDialog section.inputUploadPreviewContainer");
                    const newInputElement = document.createElement("input");
                    newInputElement.type = "file";
                    newInputElement.multiple;
                    newInputElement.click();
                    newInputElement.addEventListener("change", function () {
                        if (newInputElement.files[0].type.startsWith("image/")) {
                            const newImageElement = document.createElement("img");
                            newInputElement.name = mediaPreviewContainer.children.length;
                            const fileReaderObject = new FileReader();
                            fileReaderObject.readAsDataURL(newInputElement.files[0]);
                            fileReaderObject.addEventListener("load", (eventObject) => {
                                newImageElement.src = eventObject.target.result;
                                mediaPreviewContainer.innerHTML += `
                                <figure>
                                    <img src="${newImageElement.src}" alt="IMAGE"/>
                                    <span>${newInputElement.files[0].name}</span> 
                                    <span class="removeMediaItem">&#215;</span>
                                    <input type="file" name="fileUploadInput${mediaPreviewContainer.children.length}" class="fileUInput"
                                    id="fileUploadInput${mediaPreviewContainer.children.length}" value="${eventObject.target.result}" />
                                </figure>`;
                                const cancelButtonElements = document.querySelectorAll("span.removeMediaItem");
                                for (let w=0; w < (cancelButtonElements.length); w++) {
                                    cancelButtonElements[w].addEventListener("click", () => {
                                        cancelButtonElements[w].parentElement.remove();
                                    });
                                }
                            });
                        }
                    });
                });


                function loadMore() {
                    var sentItemsContainers = document.querySelectorAll("body#postsBody div#contentMenuContainer div.contentContainer div.contentSubContainer");
                    var sentItems = document.querySelectorAll("body#postsBody div#contentMenuContainer div.contentContainer div.post");
                    console.log(sentItems.length);
                    xmlHttpRequestObject.open("GET", "./feedItem.php?loadMoreItems=" + 4 + "&numOfSentItems=" + sentItems.length);
                    xmlHttpRequestObject.responseType = "document";
                    xmlHttpRequestObject.send();
                    if (xmlHttpRequestObject.readyState===XMLHttpRequest.DONE && xmlHttpRequestObject.status===200) {
                        var responseArray = this.responseXML.body.innerHTML.split("<hr>");
                        var index = responseArray.length - 1;
                        for (var i=index; i>=0; i++) {
                            document.querySelector("body#postsBody div#contentMenuContainer").innerHTML += responseArray[i];
                            setMaxDimension();
                            changeImage();
                            likeButtonFunction();
                        }
                    }
                }
                document.querySelector("body#postsBody div#contentMenuContainer button#loadMoreButton").classList.add("show");
                document.querySelector("body#postsBody div#contentMenuContainer button#loadMoreButton").addEventListener("click", loadMore);
            }
            else {
                
            }
        }
    }
    catch (error) {
        console.log(`error`);
        feedItemsContainer.textContent = "Posts are coming soon!";
    }
    
    /* document.querySelector("body#postsBody button#postButton").addEventListener("click", function () {
        window.location.assign("./userPost.php");
    });*/
}
else if (title.textContent.trim() === "POST") {
    currentRemoveAll();
    setCurrent("a.itemOne");
}
else if (title.textContent.trim() === "Chat") {
    currentRemoveAll();
    setCurrent("a.itemThree");
    if (window.innerWidth >= 768) {
        const sideMenu = document.querySelector("#sideMenu");
        const sideMenuLogoImg = document.querySelector("#sideMenuLogo img");
        const sideMenuLogoSpan = document.querySelector("#sideMenuLogo span");
        const sideMenuTextArray = document.querySelectorAll(".sideMenuText");
        const sideMenuLinksArray = document.querySelectorAll("#sideMenu a");
        const sideMenuSVGArray = document.querySelectorAll("#sideMenu svg");
        sideMenu.classList.add("sideMenuHidden");
        sideMenuLogoImg.classList.add("sMenuLogo");
        sideMenuLogoSpan.classList.add("sMenuHeaderText");
        for (let num=0; num<document.querySelectorAll(".sideMenuText").length; num++) {
            sideMenuTextArray[num].classList.add("sideMenuTextHide");
            sideMenuLinksArray[num].classList.add("sMenuLink");
            sideMenuSVGArray[num].classList.add("sMenuSVG");
        }

        sideMenu.addEventListener("mouseover", function () {
            sideMenu.classList.remove("sideMenuHidden");
            sideMenuLogoImg.classList.remove("sMenuLogo");
            sideMenuLogoSpan.classList.remove("sMenuHeaderText");
            for (let num=0; num<document.querySelectorAll(".sideMenuText").length; num++) {
                sideMenuTextArray[num].classList.remove("sideMenuTextHide");
                sideMenuLinksArray[num].classList.remove("sMenuLink");
                sideMenuSVGArray[num].classList.remove("sMenuSVG");
            }
        });

        sideMenu.addEventListener("mouseout", function () {
            sideMenu.classList.add("sideMenuHidden");
            sideMenuLogoImg.classList.add("sMenuLogo");
            sideMenuLogoSpan.classList.add("sMenuHeaderText");
            for (let num=0; num<document.querySelectorAll(".sideMenuText").length; num++) {
                sideMenuTextArray[num].classList.add("sideMenuTextHide");
                sideMenuLinksArray[num].classList.add("sMenuLink");
                sideMenuSVGArray[num].classList.add("sMenuSVG");
            }
        });
    }
    else {

    }
    var messageItemsArray = document.querySelectorAll("body#chatBody div#contentMenuContainer div.messagesDiv div.messageItem");
    
    for (var index=0; index<messageItemsArray.length; index++) {
        indexCopy = index;
        messageItemsArray[indexCopy].addEventListener("click", function() {
            console.log(messageItemsArray[indexCopy]);    
            var id = messageItemsArray[indexCopy].classList[(messageItemsArray[indexCopy].classList.length) - 1];
            window.location.assign("./mailPreview.php?id="+id);
        });
    }

    document.querySelector(".moreInfoContainer svg").addEventListener("click", () => {
        document.querySelector(".moreInfo").classList.toggle("show");
        buttonClickEffect();
    });

    const chatItems = document.querySelectorAll(".chatItem");
    for (let i=0; i<(chatItems.length); i++) {
        chatItems[i].addEventListener("click", function () {
            const chatContainer = document.querySelector(".chatContainer");
            chatItems[i].parentElement.classList.remove("chatSideMenuShow");
            chatContainer.classList.add("chatContainerShow");
            document.querySelector(".userInfoContainer svg").addEventListener("click", () => {
                chatContainer.classList.remove("chatContainerShow");
                chatItems[i].parentElement.classList.add("chatSideMenuShow");
            });
        });
    }
}
else if (title.textContent.trim() === "Rides") {
    currentRemoveAll();
    setCurrent("a.itemFour");
}
else if (title.textContent.trim() === "Account") {
    currentRemoveAll();
    setCurrent("a.itemFive");
    console.log(title.textContent.trim());
}
else if (title.textContent.trim() === "Client Profile") {
    currentRemoveAll();
    setCurrent("a.itemOne");
}
else {
    // No execution
}
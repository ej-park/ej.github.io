//SCROLL EFFECTS CALL: NAV LOGO, PROJECT SLIDE
document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener("scroll", function() {
        navLogo();
        slideProjects();
    });
});

//SCROLL: NAV LOGO
function navLogo() {
    const navLogo = document.getElementById("nav-logo");
    const scrollPos = document.documentElement.scrollTop;
    const welcomeHeight = document.getElementById("welcome").offsetHeight;
    
    if(scrollPos < welcomeHeight) {
        navLogo.innerHTML = "Grace Park";
    } else {
        navLogo.innerHTML = "To Top";
    }
}

//SCROLL: PROJECT SLIDE
function slideProjects() {
    const projectLeft = document.querySelectorAll(".project-col:first-child");
    const projectRight = document.querySelectorAll(".project-col:last-child");
    const scrollPos = document.documentElement.scrollTop;
    const projectHeight = document.getElementById("projects").offsetTop + document.getElementById("projects").offsetHeight;
    
    if(scrollPos <= 10) {
        for(i = 0; i < projectLeft.length; i++) {
            projectLeft[i].classList.remove("slideLeft");
            projectLeft[i].classList.add("project-col-left-scroll");
            projectRight[i].classList.remove("slideRight");
            projectRight[i].classList.add("project-col-right-scroll");
        }
    } else if(scrollPos > 10 && scrollPos <= projectHeight) {
        for(i = 0; i < projectLeft.length; i++) {
            projectLeft[i].classList.add("slideLeft");
            projectLeft[i].classList.remove("project-col-left-scroll");
            projectRight[i].classList.add("slideRight");
            projectRight[i].classList.remove("project-col-right-scroll");
        }
    } else {
        for(i = 0; i < projectLeft.length; i++) {
            projectLeft[i].classList.remove("slideLeft");
            projectLeft[i].classList.add("project-col-left-scroll");
            projectRight[i].classList.remove("slideRight");
            projectRight[i].classList.add("project-col-right-scroll");
        }
    }
}



//PROJECT SORT
const projectsBtn = document.getElementById("projects-btn");
const newSort = projectsBtn.firstElementChild;
const oldSort = projectsBtn.lastElementChild;
const projectsSort = document.getElementById("projects-sort");

projectsBtn.style.visibility = "visible"; //only visible for browsers with JS support

newSort.addEventListener("click", () => {
    projectsSort.classList.remove("old-sort");
    projectsSort.classList.add("transition-effect");
    newSort.classList.toggle("projects-btn-selected");
    oldSort.classList.remove("projects-btn-selected");
    
    setTimeout(function() {
        projectsSort.classList.remove("transition-effect");
        projectsSort.classList.toggle("new-sort");
    }, 300);
    
    if(newSort.innerHTML == "Newest First") {
        oldSort.innerHTML = "Oldest First";
    } else {
        newSort.innerHTML = "Newest First";
    }
});
oldSort.addEventListener("click", () => {
    projectsSort.classList.remove("new-sort");
    projectsSort.classList.add("transition-effect");
    oldSort.classList.toggle("projects-btn-selected");
    newSort.classList.remove("projects-btn-selected");
    
    setTimeout(function() {
        projectsSort.classList.remove("transition-effect");
        projectsSort.classList.toggle("old-sort");
    }, 300);
    
    if(oldSort.innerHTML == "Oldest First") {
        newSort.innerHTML = "Newest First";
    } else {
        oldSort.innerHTML = "Oldest First";
    }
});


//MOBILE NAVBAR
const screenWidth = window.innerWidth;
const mobileLink = document.getElementById("nav-links-mobile");
const desktopLinks = document.getElementById("nav-links-desktop");

checkMenu();

function checkMenu() {
    const screenWidth = window.innerWidth;
    desktopLinks.classList.remove("hide-effect");
    
    if(screenWidth <= 799) {
        mobileLink.classList.add("show-effect");
        mobileLink.addEventListener("click", () => { 
            desktopLinks.classList.toggle("hide-effect");
        });
    } else {
        desktopLinks.classList.remove("hide-effect");
        mobileLink.classList.remove("show-effect");
    }
}

window.addEventListener("resize", checkMenu);


//FOOTER SOCIAL LINKS
const contactLinks = document.querySelectorAll(".contact-links a");
const contactInfo = document.getElementById("contact-info");
const contactLinksInfo = ["Email", "Github", "LinkedIn", "CodePen", "FreeCodeCamp"];

contactLinksInfo.forEach(contactMouseover);

function contactMouseover(info, index) {
    contactLinks[index].addEventListener("mouseenter", () => {
        contactInfo.classList.add("transition-effect");
        setTimeout(function() {
            contactInfo.classList.remove("transition-effect");
            contactInfo.innerHTML = info;
        }, 100);
    });
    contactLinks[index].addEventListener("mouseleave", () => {
        contactInfo.classList.add("transition-effect");
        setTimeout(function() {
            contactInfo.classList.remove("transition-effect");
            contactInfo.innerHTML = "Contact Me";
        }, 100);
    });
}
const menuButton = document.getElementById("menu-button");
const navBar = document.getElementById("nav-bar");
const icon = document.querySelector(".fa-solid")
const toggledItems = document.querySelectorAll("toggeled-item");
var errors = document.querySelectorAll(".error-message");
var inputs = document.querySelectorAll("input");
// function toggleNavbar(){
//  console.log("toggeled");
//  navBar.classList.toggle("active");
//  if(navBar.classList.contains("active")){
//     menuButton.classList.remove("left-[190px]")
//     icon.classList.remove("fa-xmark");
//     icon.classList.add("fa-bars");
    
//  }
//  else {
//     menuButton.classList.add("left-[190px]")
//     icon.classList.remove("fa-bars");
//     icon.classList.add("fa-xmark");
//  }
// }

// menuButton.addEventListener("click",toggleNavbar);


toggledItems.forEach(item=>{
    
})


function hideErrorMesssage(){
    inputs.forEach(input=>{
        input.addEventListener("input",()=>{
            errors.forEach(error => {
                error.innerText = "";
            });
        })
    })
}

hideErrorMesssage();
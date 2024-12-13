const menuButton = document.getElementById("menu-button");
const navBar = document.getElementById("nav-bar");
const icon = document.querySelector(".fa-solid")
const toggledItems = document.querySelectorAll(".toggeled-item");
const sections = document.querySelectorAll("section");
const globalSections = document.querySelector("body")

var errors = document.querySelectorAll(".error-message");
var inputs = document.querySelectorAll("input");
const modal = document.querySelector(".modal");
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


// function hideErrorMesssage(){
//     inputs.forEach(input=>{
//         input.addEventListener("input",()=>{
//             errors.forEach(error => {
//                 error.innerText = "";
//             });
//         })
//     })
// }

// hideErrorMesssage();

function displayModal(){
   modal.classList.remove("hidden");
}
function hideModal(){
   modal.classList.add("hidden");
}




function sectionSwitch(){
    for(let i = 0; i < toggledItems.length; i++){
        toggledItems[i].addEventListener("click", function (){
            let curentSection = document.querySelectorAll(".active-btn");
            curentSection[0].classList.remove("active-btn")
            this.className += " active-btn";
        })
    }
 
    globalSections.addEventListener('click',(e)=>{
     
      const id = e.target.dataset.id;
       if(id){
         
         toggledItems.forEach(item=>{
            item.classList.remove("active");
         })

         sections.forEach(section=>{
            section.classList.remove("active");
         })
         // e.target.classList.add("active");

         let element = document.getElementById(id);
         element.classList.add("active");
         console.log(element);

         
       }
    })
  

}
sectionSwitch();

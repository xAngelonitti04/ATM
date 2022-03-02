let transition=document.getElementById("transition");
window.addEventListener("load",function(){
    transition.classList.add("enabled");
})

window.onbeforeunload=function(){

setTimeout(function(){
    transition.classList.remove("enabled");
},1000)

}
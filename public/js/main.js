const open = document.getElementById("open");
const concluded = document.getElementById("concluded");
const all = document.getElementById("all");
const stateselect = document.getElementById("stateselect");
const identify = document.getElementById("identify");
const identifyarea = document.getElementById("identifyarea");

if(concluded){
    concluded.style.display = "none";
    all.style.display = "none";
    
    stateselect.addEventListener("change", () => {
        if (stateselect.value == "open") {
            open.style.display = "block";
            concluded.style.display = "none";
            all.style.display = "none";
        }
        if (stateselect.value == "concluded") {
            open.style.display = "none";
            concluded.style.display = "block";
            all.style.display = "none";
        }
        if (stateselect.value == "all") {
            open.style.display = "none";
            concluded.style.display = "none";
            all.style.display = "block";
        }
    })
}

if(identify){
    identifyarea.style.display = "none";

    identify.addEventListener("change", () => {
        if(identify.checked){
            identifyarea.style.display = "block";
        }else{
            identifyarea.style.display = "none";
        }
    })
}





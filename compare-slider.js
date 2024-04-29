document.querySelectorAll(".container-compare").forEach((element)=>{
    element.querySelector(".slider-compare").addEventListener("input", (e) => {
        element.style.setProperty("--position", `${e.target.value}%`);
    });
})
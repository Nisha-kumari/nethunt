window.onload = loaded;

function loaded() {
    var play_button = document.querySelector(".play-button"),
        material_overlay = document.querySelector("#material-overlay");

    var play_button_offset = play_button.getBoundingClientRect(),
        top = play_button_offset.top
        //+ play_button.offsetHeight / 2 
        + "px",
        left = play_button_offset.left
        //+ play_button.offsetWidth / 2 
        + "px"

    hide_overlay();

    play_button.onclick = function () {
        show_overlay();
        setTimeout(function () {
            //hide_overlay();
            document.getElementById("submit_form").submit();
        }, 1500);
    };

    function show_overlay() {
        //material_overlay.style.top = "-50%";
        //material_overlay.style.left = "-50%";
        //material_overlay.style.width = material_overlay.style.height = "200vmax";
        material_overlay.classList.add("show");
    }

    function hide_overlay() {
        material_overlay.style.top = top;
        material_overlay.style.left = left;
        //material_overlay.style.width = material_overlay.style.height = "70px";
        material_overlay.classList.remove("show");
    }
}

loaded();
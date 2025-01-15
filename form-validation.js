function validateForm() {
    let title = document.getElementById("video-title").value;
    let views = document.getElementById("video-views").value;
    let comments = document.getElementById("video-comments").value;

    if (!title || isNaN(views) || isNaN(comments)) {
        alert("Preencha corretamente os campos!");
        return false;
    }

    return true;
}

document.getElementById("save-video-form").onsubmit = function(event) {
    if (!validateForm()) {
        event.preventDefault(); // Impede o envio do formulário
    }
};
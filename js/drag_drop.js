const dropArea = document.getElementById("drop-area");
const fileInput = document.getElementById("filePicker");
const textInput = document.getElementById("img");

// clicking the area -> open file dialog
dropArea.addEventListener("click", () => fileInput.click());

// if file chosen via picker
fileInput.addEventListener("change", () => {
    if (fileInput.files.length > 0) {
        textInput.value = fileInput.files[0].name; // only file name
        // or use full path if browser gives it (modern browsers usually don’t)
    }
});

// drag & drop
dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.style.background = "#f0f0f0";
});
dropArea.addEventListener("dragleave", () => {
    dropArea.style.background = "";
});
dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dropArea.style.background = "";
    if (e.dataTransfer.files.length > 0) {
        textInput.value = e.dataTransfer.files[0].name;
    }
});
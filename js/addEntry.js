document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("blogForm");
    const titleInput = document.getElementById("title");
    const bodyInput = document.getElementById("body");
    const clearBtn = document.getElementById("clearBtn");

    // Clear button
    clearBtn.addEventListener("click", function () {
        const confirmClear = confirm("Are you sure you want to clear all inputs?");
        if (confirmClear) {
            titleInput.value = "";
            bodyInput.value = "";
            titleInput.classList.remove("input-error");
            bodyInput.classList.remove("input-error");
        }
    });

    // Form validation 
    form.addEventListener("submit", function (event) {
        let valid = true;

        if (titleInput.value.trim() === "") {
            titleInput.classList.add("input-error");
            valid = false;
        } else {
            titleInput.classList.remove("input-error");
        }

        if (bodyInput.value.trim() === "") {
            bodyInput.classList.add("input-error");
            valid = false;
        } else {
            bodyInput.classList.remove("input-error");
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
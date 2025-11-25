document.addEventListener("DOMContentLoaded", function () {
    const button = document.createElement("button");
    button.id = "scroll-bottom-btn";
    button.textContent = "Bottom";

    document.body.appendChild(button);

    // Show the button immediately
    button.classList.add("show");

    button.addEventListener("click", () => {
        window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
    });
});

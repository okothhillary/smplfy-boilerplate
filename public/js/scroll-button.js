document.addEventListener("DOMContentLoaded", function() {
    const button = document.createElement("button");
    button.id = "scroll-bottom-btn";
    button.textContent = "Bottom";

    document.body.appendChild(button);

    // Show button after scrolling 200px down
    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            button.classList.add("show");
        } else {
            button.classList.remove("show");
        }
    });

    // Scroll to bottom on click
    button.addEventListener("click", () => {
        window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
    });
});

const form = document.querySelector("#contactForm");
const submitButton = document.querySelector("#contact button");

form.addEventListener("submit", async event => {
    event.preventDefault();

    submitButton.disabled = true;
    submitButton.textContent = "Sending…";

    const formData = new FormData(form);

    try {
        const response = await fetch("php/process.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        alert(result.message);

        if (result.status === "success") {
            form.reset();
        }

    } catch (error) {
        alert("Something went wrong. Please try again.");
    } finally {
        submitButton.disabled = false;
        submitButton.textContent = "Send";
    }
});

const form = document.querySelector("#contact form");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const messageInput = document.querySelector("#message");
const submitButton = document.querySelector("#contact button");

form.addEventListener("submit", event => {
    event.preventDefault();

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const message = messageInput.value.trim();

    if (!name || !email || !message) {
        alert("Please fill in all required fields.");
        return;
    }

    if (!email.includes("@") || !email.includes(".")) {
        alert ("Please enter a valid email address.");
        return;
    }

    //disable button to prevent multiple submits
    submitButton.disabled = true;
    submitButton.textContent = "Sending…";

    //simulate sending (like an API call)
    setTimeout(() => {
    console.log(`Message from ${name} (${email}): ${message}`);
    alert("Message sent successfully! I will be back to you soon!");

    form.reset();
    submitButton.disabled = false;
    submitButton.textContent = "Send";
    }, 1500);

});
const form = document.querySelector("#contact form");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const messageInput = document.querySelector("#message");

form.addEventListener("submit", event => {
    event.preventDefault();

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const message = messageInput.value.trim();

    if (!name || !email || !message) {
        alert("Please fill in all required fields.");
        return;
    }

    console.log(`Message from ${name} (${email}): ${message}`);
    alert("Message sent successfully!");
    
    form.reset();

});
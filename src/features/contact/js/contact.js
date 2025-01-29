document.getElementById("contactForm").addEventListener("submit", function (event) {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const subject = document.getElementById("subject").value.trim();
    const message = document.getElementById("message").value.trim();

    if (!name || !email || !subject || !message) {
        alert("All fields are required.");
        event.preventDefault();
    } else if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("success") === "true") {
    alert("Message sent successfully!");
} else if (urlParams.get("error")) {
    alert(`Error: ${urlParams.get("error")}`);
}

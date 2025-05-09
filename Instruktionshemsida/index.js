function openModal(type){
    document.getElementById(type + "Modal").style.display = "block";
}

function closeModal(type){
    document.getElementById(type + "Modal").style.display = "none";
}

Window.onclick = function(e) {
   ["login", "signup"].forEach(type => {
    const modal = document.getElementById(type + "Modal");
    if (e.target === modal) closeModal(type);
   });
};

document.getElementById("loginForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    const res = await fetch("login.php", {
        method: "POST",
        body: formData,
    });
    const txt = await res.text();
    document.getElementById("result").textContent = txt;

    if (txt.includes("Success")) setTimeout(() => closeModal("login"), 1000);
});

document.getElementById("signupForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    const res = await fetch("signup.php", {
        method: "POST",
        body: formData,
    });
    const txt = await res.text();
    document.getElementById("result").textContent = txt;

    if (txt.includes("Success")) setTimeout(() => closeModal("signup"), 1000);
});

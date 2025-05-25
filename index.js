function showForm(formId) { //toggle functionen  för att visa och dölja de olika formulär som inehåller instruktionerna
document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));

const targetForm = document.getElementById(formId);
if (targetForm) {
    targetForm.classList.add("active");
} else {
    console.error(`Form with ID ${formId} not found.`); 
}}

function createEmailLink(recipient, subject, body) {
  const emailLink = document.getElementById("emailLink");//hämtar rätt 
  const mailto = `mailto:${encodeURIComponent(recipient)}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`; //Comprierar recipient subject och body 
  emailLink.href = mailto; //länken till emailen hämtad från W3schools med lite javascript framför för att deklarera länken/göra den till en länk
  emailLink.style.display = "inline"; // lite css för att få länken prydlig
  emailLink.textContent = `Arvid.Borgeson@me.com`;//valde att bara passa på att skriv ainehållet här borta
}
window.addEventListener('DOMContentLoaded', () => {
  const recipient = "Arvid.Borgeson@me.com"; //säger till variabeln recipient vilket email som används altså min
  const subject = ""; //ifall jag någonsin vill se till att mailet autofylls
  const body = ""; //används för samam fuctionalitet
  createEmailLink(recipient, subject, body); //kallar på den funtionen precis innan
});
//han inte implimentara dett fullständigt
//const toggleBtn = document.getElementById('menu-toggle'); //skapar en constant som hämtar elementet med id menu-toggle
//  const navMenu = document.getElementById('nav-menu');//hämtar elementet med id nav-menu
//
//  toggleBtn.addEventListener('click', () => { //lägger till en event listener som lyssnar på click events på toggleBtn
//    navMenu.classList.toggle('active');// när knappen klickas så togglar den klassen active på navMenu
//  });
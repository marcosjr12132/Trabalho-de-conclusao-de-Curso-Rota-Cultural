
window.addEventListener('scroll', function() {
    var element = document.querySelector('.about-section');
    var position = element.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;
    if (position < windowHeight) {
        element.classList.add('appear');
    }
});

// Adiciona outro evento de rolagem à janela do navegador
window.addEventListener('scroll', function() {
    // Seleciona o elemento com a classe "footer" no documento HTML
    var footer = document.querySelector('.footer');
    // Calcula a posição atual do final da janela em relação ao documento
    var position = window.innerHeight + window.scrollY;
    // Obtém a altura total do documento HTML
    var documentHeight = document.body.offsetHeight;

    // Verifica se a posição é maior ou igual à altura do documento, indicando que o usuário rolou até o final
    if (position >= documentHeight) {
        // Adiciona a classe "show" ao elemento "footer"
        footer.classList.add('show');
    } else {
        // Remove a classe "show" do elemento "footer" se não estiver no final
        footer.classList.remove('show');
    }
});

// Adiciona um evento quando o DOM (Documento Object Model) estiver completamente carregado
window.addEventListener('DOMContentLoaded', function() {
    // Seleciona o elemento com a classe "footer" no documento HTML
    var footer = document.querySelector('.footer');
    // Obtém a altura total do documento HTML
    var documentHeight = document.body.offsetHeight;
    // Obtém a altura da janela do navegador
    var windowHeight = window.innerHeight;

    // Verifica se a altura do documento é menor ou igual à altura da janela, indicando que o conteúdo é curto
    if (documentHeight <= windowHeight) {
        // Adiciona a classe "show" ao elemento "footer" para exibi-lo imediatamente
        footer.classList.add('show');
    }
});

// todo esse script vai nos permitir mudar o tema do site
document.addEventListener("DOMContentLoaded", function () {
const themeToggle = document.getElementById("theme-toggle");
const body = document.body;
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
    body.classList.add(savedTheme);
}
themeToggle.addEventListener("click", function () {
    if (body.classList.contains("light-theme")) {
        body.classList.remove("light-theme");
        body.classList.add("dark-theme");
        localStorage.setItem("theme", "dark-theme");
    } else {
        body.classList.remove("dark-theme");
        body.classList.add("light-theme");
        localStorage.setItem("theme", "light-theme");
    }});}); // fim do script que vai nos permitir trocar o tema

function openPopup() { // botao do ? que vai exibir o que é o site
    document.getElementById("popup").style.display = "block";
}
function closePopup() {
    document.getElementById("popup").style.display = "none";
}

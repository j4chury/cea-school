const new_messages = document.getElementById("new_msgs");
const circular = document.getElementById("circular");

new_messages.addEventListener('click' ,() => {window.location = '../mensajes/'});
circular.addEventListener('click', () => {window.location = '../circulares/index.html'});
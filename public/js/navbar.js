const sidebar = document.querySelector(".sidebar");
const sidebarToggleBtn = document.querySelectorAll(".sidebar-toggle");

sidebarToggleBtn.forEach(btn => {
    btn.addEventListener("click", () => {
        sidebar.classList.toggle('collapsed');
    });
})

if (window.innerWidth > 768) {
    sidebar.classList.remove('collapsed');
}
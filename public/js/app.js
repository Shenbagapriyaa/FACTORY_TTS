document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('.alert').forEach((alert) => {
		setTimeout(() => {
			alert.style.transition = 'opacity .3s';
			alert.style.opacity = '0';
			setTimeout(() => alert.remove(), 300);
		}, 5000);
	});

	const sidebar = document.querySelector('.sidebar');
	const sidebarToggle = document.querySelector('.sidebar-toggle');

	if (!sidebar || !sidebarToggle) return;

	sidebarToggle.addEventListener('click', () => {
		const isOpen = sidebar.classList.toggle('menu-open');
		sidebarToggle.setAttribute('aria-expanded', String(isOpen));
	});
});

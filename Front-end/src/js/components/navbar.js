/* script du composant navbar */
window.addEventListener("load", () => {
	document.querySelectorAll(".navbar_toggle_button").forEach((elem) => {
		//console.log(elem);
		const span = document.createElement("span");
		elem.append(span);
		elem.onclick = () => {
			const targetName = elem.getAttribute("data-target");
			const target = document.querySelector(targetName);
			target.classList.toggle("toggled");
			elem.classList.toggle("toggled");
			if (target.classList.contains("toggled")) {
				target.style.maxHeight = target.scrollHeight + "px";
			} else {
				target.style.maxHeight = 0;
			}
		};
	});
});

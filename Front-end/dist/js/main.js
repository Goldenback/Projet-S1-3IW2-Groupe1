window.addEventListener("load", () => {
  document.querySelectorAll(".navbar_toggle_button").forEach((e) => {
    const a = document.createElement("span");
    e.append(a), e.onclick = () => {
      const o = e.getAttribute("data-target"), t = document.querySelector(o);
      t.classList.toggle("toggled"), e.classList.toggle("toggled"), t.classList.contains("toggled") ? t.style.maxHeight = t.scrollHeight + "px" : t.style.maxHeight = 0;
    };
  });
});

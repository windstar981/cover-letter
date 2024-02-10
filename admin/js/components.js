function Modal() {
  this.modal = document.querySelector(".modal");

  if (!this.modal) {
    return;
  }

  this.toggle = document.querySelectorAll("[data-modal]");
  this.closeTrigger = document.querySelectorAll('[data-dismiss="modal"]');

  this.events();
}

Modal.prototype.events = function () {
  this.toggle.forEach((el) => {
    el.addEventListener("click", (event) => Modal.show(event));
  });

  this.closeTrigger.forEach((el) => {
    el.addEventListener("click", (event) => Modal.close(event));
  });
};

Modal.toggleClass = (modal) => {
  modal.classList.add("is-active");
  modal.classList.add("is-animate");
};

Modal.show = (event) => {
  const target = event.currentTarget.getAttribute("data-modal");
  const modal = document.querySelector(target);

  event.preventDefault();

  if (event.target.closest(".modal")) {
    setTimeout(() => {
      Modal.toggleClass(modal);
    }, 300);
  } else {
    Modal.toggleClass(modal);
  }
};

Modal.close = (event) => {
  const modal = event.target.closest(".modal");

  modal.classList.remove("is-animate");

  setTimeout(() => {
    modal.classList.remove("is-active");
  }, 310);
};
function Sidebar() {
  this.button = document.querySelector(".header__toggle-menu");
  this.sidebar = document.querySelector(".sidebar");
  this.backdrop = document.querySelector(".sidebar__backdrop");
  this.backdropDesktop = document.querySelector(".sidebar-backdrop");
  this.body = document.querySelector("body");

  if (!this.button) {
    return;
  }

  this.button.addEventListener("click", (event) => this.toggle(event));
  this.backdrop.addEventListener("click", (event) => this.close(event));
  this.backdropDesktop.addEventListener("click", (event) =>
    this.close(event, true)
  );
}

Sidebar.prototype.toggle = function (event) {
  const button = event.currentTarget;
  let interval;

  event.preventDefault();
  button.classList.toggle("active");
  this.body.classList.toggle("sidebar-show");
  this.body.classList.toggle("sidebar-collapse");
  this.sidebar.classList.toggle("sidebar--show");
  this.sidebar.classList.toggle("sidebar--translate");

  interval = setInterval(() => {
    timeline.resize();
  }, 1);

  setTimeout(() => {
    clearInterval(interval);
  }, 310);

  if (this.body.classList.contains("sidebar-active")) {
    setTimeout(() => {
      this.body.classList.remove("sidebar-active");
    }, 300);
  } else {
    this.body.classList.add("sidebar-active");
  }
};

Sidebar.prototype.close = function (event, desktop) {
  event.preventDefault();

  this.body.classList.remove("sidebar-show");
  this.body.classList.remove("sidebar-collapse");
  this.button.classList.remove("active");
  this.sidebar.classList.remove("sidebar--translate");

  setTimeout(() => {
    this.body.classList.remove("sidebar-active");
  }, 300);

  if (desktop) {
    this.sidebar.classList.remove("sidebar--show");
  } else {
    setTimeout(() => {
      this.sidebar.classList.remove("sidebar--show");
    }, 300);
  }
};
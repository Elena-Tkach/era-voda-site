"use strict";
let scroll = 0;
const defaultOffset = 200;
const header = document.querySelector(`.js-header`);

export const onShowMenu = (contain, btnClose) => {
  contain.classList.add("js-active");

  setTimeout(() => {
    btnClose.focus();
  }, 100);
};
export const onHideMenu = (contain) => {
  if (document.body.classList.contains("no-scroll")) {
    document.body.classList.remove("no-scroll");
  }

  contain.classList.remove("js-active");
};

// const scrollheader = () => {
//   const scrollPosition = () => window.pageXOffset || document.documentElement.scrollTop;
//   const containHide = () => header.classList.contains(`hide`);

//   if (scrollPosition() >
//     scroll && !containHide() &&
//     scrollPosition() > defaultOffset) {
//     header.classList.add(`hide`);

//   }

//   if (scrollPosition() < scroll && containHide) {
//     header.classList.remove(`hide`);
//     header.classList.add('light-header');
//   }
//   scroll = scrollPosition();
// }

// window.addEventListener(`scroll`, function () {
//   let posTop =
//     window.pageYOffset !== undefined
//       ? window.pageYOffset
//       : (document.documentElement || document.body.parentNode || document.body)
//           .scrollTop;
//   scrollheader();

//   if (posTop < 100) {
//     header.classList.remove("light-header");
//   }
// });

let previousActiveElement;
const overlayEl = document.querySelector(".js-overlay");
const btnClose = document.querySelector(".js-btn-close-nav");
const navContainer = document.querySelector(".js-navMenuContainer");
const windowInnerWidth = document.documentElement.clientWidth;
const pageWidth = document.documentElement.scrollWidth;

const onShowContainer = (container) => {
  container.classList.add("js-visible");
  overlayEl.classList.add("js-visible");
  document.body.classList.add("no-scroll");

  previousActiveElement = document.activeElement;

  setTimeout(() => {
    btnClose.focus();
  }, 100);
};

if (windowInnerWidth >= 977) {
  navContainer.classList.remove("wrap-nav");
}

const onHideContainer = (container) => {
  container.classList.remove("js-visible");
  overlayEl.classList.remove("js-visible");
  document.body.classList.remove("no-scroll");
  previousActiveElement.focus();
};

document.body.addEventListener("click", (event) => {
  const target = event.target;
  if (target.closest(".js-btn-close-nav")) {
    onHideContainer(navContainer);
  }

  if (target.closest(".js-openNavMenu")) {
    onShowContainer(navContainer);
  }

  if (target.closest(".js-overlay")) {
    onHideContainer(navContainer);
  }
});

const containerCheck = document.querySelector(".js-checkbox-pos");
const checkInputs = document.querySelectorAll(".js-input-consum");
const checkTexts = document.querySelectorAll(".js-check-text");

const btnShowForm = document.querySelector(".js-btn-show-form");
const formContainer = document.querySelector(".js-form-container");
const selector = document.querySelectorAll(`input[type="tel"]`);
const im = new Inputmask(`+7 (999) 999-99-99`);
im.mask(selector);

const year = new Date().getFullYear();
document.querySelector(".js-year").textContent = year;

const toggleForm = () => {
  formContainer.classList.toggle("js-visible-form");
};

const addTextBtn = () => {
  btnShowForm.querySelector(".btn-text-visible").classList.toggle("js-hide");
  btnShowForm
    .querySelector(".btn-text-hide")
    .classList.toggle("js-visible-form");
};

if (btnShowForm) {
  btnShowForm.addEventListener("click", () => {
    toggleForm();
    addTextBtn();
  });
}

if (containerCheck) {
  containerCheck.addEventListener("change", function () {
    if (containerCheck.checked) {
      checkInputs.forEach((item) => {
        item.removeAttribute("disabled");
      });

      checkTexts.forEach((item) => {
        item.classList.remove("checked-text");
      });
    } else {
      checkInputs.forEach((item) => {
        item.setAttribute("disabled", "");
        item.value = "";
      });

      checkTexts.forEach((item) => {
        item.classList.add("checked-text");
      });
    }
  });
}
const popupEl = document.querySelector(`.js-popup`);
const popupModalEl = document.querySelector(`.js-popup-modal`);

window.addEventListener("click", (event) => {
  if (event.target === popupEl) {
    hidePoupClick(popupEl);
  }

  if (event.target === popupModalEl) {
    hidePoupClick(popupModalEl);
  }

  if (event.target.classList.contains("js_btn-closePopup")) {
    if (popupModalEl) hidePoupClick(popupModalEl);
    if (popupEl) hidePoupClick(popupEl);
  }
});

function hideModal() {
  const modal = document.querySelectorAll(".show");
  modal.forEach((item) => {
    item.style.display = "none";
    item.classList.remove("show");
  });

  document.body.classList.remove("modal-open");
}

function successSentForm(popup) {
  popup.classList.add("popup__visible");
  document.body.style.cssText = "overflow: hidden;";
  hideModal();
  document.addEventListener("keydown", onPressEscKeydown);
}

function hidePoupClick(popup) {
  document.body.style.cssText =
    "overflow-x: hidden; overflow-y: auto;  padding-right: 0;";
  popup.classList.remove("popup__visible");
  document.removeEventListener("keydown", onPressEscKeydown);
}

function onPressEscKeydown(el) {
  if (el.code === `Escape`) {
    if (popupEl) hidePoupClick(popupEl);
    if (popupModalEl) hidePoupClick(popupModalEl);
  }
}

document.querySelectorAll(".js-table").forEach((form) => {
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const name = form.querySelector(".js-name").value.trim();
    const phone = form.querySelector(".js-phone").value.trim();
    const email = form.querySelector(".js-email").value.trim();
    const message = form.querySelector(".js-message");

    const formData = new FormData();
    formData.append("name", name);
    formData.append("phone", phone);

    if (email) {
      formData.append("email", email);
    }
    if (message) {
      formData.append("message", message.value.trim());
    }

    fetch(
      "https://script.google.com/macros/s/AKfycbz9AEgWAnqVNS84YVF364aA1KWxzJZkfFp4AHzoJWAMO1qxF2Ok5T1Op0PKlAW1u6O_Tw/exec",
      {
        method: "POST",
        body: formData,
      }
    )
      .then((response) => response.json())
      .then((data) => {
        console.log("ok");
      })
      .catch((error) => {
        console.log("Error");
      });
  });
});

const formLight = document.querySelectorAll(".js-form-light");
const formModal = document.querySelectorAll(".js-form-modal");
const formEquipment = document.querySelector(".js-form-eq");
const formProd = document.querySelector(".js-form-prod");
const formSalle = document.querySelectorAll(".js-form-salle");

const linkSendLightForm = "./inc/send_form_light.php";
const linkSendEquipmentForm = "./inc/send_form_equipment.php";
const linkSendProdForm = "./inc/send_form_prod.php";
const linkSendFormSalle = "./inc/form_salle.php";

formLight.forEach((formItem) => {
  formItem.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formdata = new FormData(formItem);
    const option = {
      method: "POST",
      body: formdata,
    };
    const result = await fetch(linkSendLightForm, option);
    successSentForm(popupEl);
    formItem.reset();

    if (result) {
      console.log("yes");
    } else {
      console.log("no");
    }
  });
});

formSalle.forEach((formItem) => {
  formItem.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formdata = new FormData(formItem);
    const option = {
      method: "POST",
      body: formdata,
    };
    const result = await fetch(linkSendFormSalle, option);
    successSentForm(popupEl);
    formItem.reset();

    if (result) {
      console.log("yes");
    } else {
      console.log("no");
    }
  });
});

formModal.forEach((formItem) => {
  formItem.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formdata = new FormData(formItem);
    const option = {
      method: "POST",
      body: formdata,
    };
    const result = await fetch(linkSendLightForm, option);
    setTimeout(() => {
      successSentForm(popupEl);
      formModal.reset();
    }, 0);
    if (result) {
      console.log("yes");
    } else {
      console.log("no");
    }
  });
});

if (formEquipment) {
  formEquipment.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formdata = new FormData(formEquipment);
    const option = {
      method: "POST",
      body: formdata,
    };

    const result = await fetch(linkSendEquipmentForm, option);
    setTimeout(() => {
      successSentForm(popupEl);
      formEquipment.reset();
    }, 0);

    if (result) {
      console.log("yes");
    } else {
      console.log("no");
    }
  });
}

if (formProd) {
  formProd.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formdata = new FormData(formProd);
    const option = {
      method: "POST",
      body: formdata,
    };

    const result = await fetch(linkSendProdForm, option);
    setTimeout(() => {
      successSentForm(popupEl);
      formProd.reset();
    }, 0);
    if (result) {
      console.log("yes");
    } else {
      console.log("no");
    }
  });
}

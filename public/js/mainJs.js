// for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  var forms = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// only type number
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === "paste") {
    key = event.clipboardData.getData("text/plain");
  } else {
    // Handle key press
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if (!regex.test(key)) {
    theEvent.returnValue = false;
    if (theEvent.preventDefault) theEvent.preventDefault();
  }
}

// function increase Count quantity
function increaseCount(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

// function decrease Count quantity
function decreaseCount(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}

// function gallery model
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("gallery-item")) {
    const src = e.target.getAttribute("src");
    document.querySelector(".mdoal-img").src = src;
    const myModal = new bootstrap.Modal(
      document.getElementById("gallery-modal")
    );
    myModal.show();
  }
});

// document.addEventListener("click", function (e) {
//   if (e.target.classList.contains("gallery-item") && e.target.classList.contains("modal-footer")) {
//     const src = e.target.getAttribute("src");
//     const p = e.target.getAttribute("class");
//     document.querySelector(".mdoal-img").src = src;
//     document.querySelector(".modal-desc").innerHTML = p;
//     const myModal = new bootstrap.Modal(
//       document.getElementById("gallery-modal")
//     );
//     myModal.show();
//   }
// });

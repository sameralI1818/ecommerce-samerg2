"use strict";

/* ==========================================================
  Deshabilitar envío si hay campos inválidos (Bootstrap)
========================================================== */
(function () {
 window.addEventListener("load", function () {
   const forms = document.getElementsByClassName("needs-validation");

   Array.prototype.forEach.call(forms, function (form) {
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
 });
})();

/* ==========================================================
  Expresiones Regulares
========================================================== */
const EMAIL_REGEX =
 /^(?=.{1,254}$)(?=.{1,64}@)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$/;
const TEXTO_REGEX = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$/;
const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

/* ==========================================================
  Validar formularios manualmente (por tipo)
========================================================== */
/**
* Validación dinámica con mensajes personalizados
* @param {Event} event - evento input, change, blur
* @param {string} tipoValidacion - tipo de validación ('texto'|'email'|'password')
*/
function validarJs(event, tipoValidacion) {
 const input = event.target;
 const valor = (input.value || "").trim();

 // Localiza el contenedor padre y el bloque de feedback
 const contenedor =
   input.closest(".form-group, .mb-3, .form-floating, div") ||
   input.parentElement;
 const feedback = contenedor
   ? contenedor.querySelector(".invalid-feedback")
   : null;

 let valido = false;
 let mensaje = "";

 switch (tipoValidacion) {
   case "texto":
     valido = TEXTO_REGEX.test(valor);
     mensaje = valido
       ? "Válido"
       : "Solo letras y espacios (mínimo 2 caracteres).";
     break;

   case "email":
     valido = EMAIL_REGEX.test(valor);
     mensaje = valido
       ? "Válido"
       : "Escribe un correo válido (ej. nombre@dominio.com)";
     break;

   case "password":
     valido = PASSWORD_REGEX.test(valor);
     mensaje = valido
       ? "Contraseña válida"
       : "Debe tener al menos 8 caracteres, una mayúscula, un número y un símbolo.";
     break;
 }

 // Aplica el mensaje y estado de validez
 input.setCustomValidity(valido ? "" : mensaje);
 if (feedback) feedback.textContent = mensaje;

 // Pinta estados de Bootstrap
 if (input.form) input.form.classList.add("was-validated");
}

/* ==========================================================
  Recordar email en el login (solo si existe el campo)
========================================================== */
function recordarEmail(event) {
 const emailInput = document.querySelector('[name="emailAdmin"]');
 const rememberCheckbox = event?.target;
 if (!emailInput || !rememberCheckbox) return;

 const email = (emailInput.value || "").trim();

 if (rememberCheckbox.checked) {
   // Solo guardamos si es válido
   if (EMAIL_REGEX.test(email)) {
     localStorage.setItem("emailAdmin", email);
     localStorage.setItem("checked", "true");
   } else {
     rememberCheckbox.checked = false;
     localStorage.removeItem("emailAdmin");
     localStorage.removeItem("checked");
     emailInput.setCustomValidity("Correo inválido");
     if (emailInput.form) emailInput.form.classList.add("was-validated");
   }
 } else {
   localStorage.removeItem("emailAdmin");
   localStorage.removeItem("checked");
 }
}

/* ==========================================================
  Recuperar email en el login (solo si hay login)
========================================================== */
function getEmail() {
 const emailInput = document.querySelector('[name="emailAdmin"]');
 const rememberCheckbox = document.querySelector("#remember");
 if (!emailInput || !rememberCheckbox) return; // no es el login

 const emailStored = localStorage.getItem("emailAdmin");
 const rememberState = localStorage.getItem("checked") === "true";

 if (emailStored) emailInput.value = emailStored;
 rememberCheckbox.checked = rememberState;

 // Validación dinámica del campo email
 emailInput.addEventListener("input", (e) => validarJs(e, "email"));
 emailInput.addEventListener("blur", (e) => validarJs(e, "email"));

 // Sincronizar storage solo si el correo es válido y "recordar" está activo
 emailInput.addEventListener("input", () => {
   const v = (emailInput.value || "").trim();
   if (rememberCheckbox.checked && EMAIL_REGEX.test(v)) {
     localStorage.setItem("emailAdmin", v);
   }
 });

 // Vincular evento del checkbox
 rememberCheckbox.addEventListener("change", recordarEmail);
}

/* ==========================================================
  Ejecutar al cargar DOM
========================================================== */
document.addEventListener("DOMContentLoaded", getEmail);
 
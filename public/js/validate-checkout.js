document.addEventListener('DOMContentLoaded', () => {
  const street = document.getElementById('street');
  const paymentRadios = document.querySelectorAll('input[name="payment"]');
  const orderBtn = document.getElementById('orderBtn');
  const loggedIn = document.body.dataset.loggedIn === '1';
  function validate() {
    let valid = loggedIn;
    if (street.value.trim() === '') {
      street.style.border = '2px solid red';
      valid = false;
    } else {
      street.style.border = '2px solid green';
    }
    let paymentSelected = false;
    paymentRadios.forEach(r => { if (r.checked) paymentSelected = true; });
    const container = document.getElementById('paymentContainer');
    if (!paymentSelected) {
      container.style.border = '2px solid red';
      valid = false;
    } else {
      container.style.border = 'none';
    }
    orderBtn.disabled = !valid;
  }
  street.addEventListener('input', validate);
  paymentRadios.forEach(r => r.addEventListener('change', validate));
  validate();
});

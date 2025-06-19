<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/global.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/logreg.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/navbar_transparent.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/cookieBanner.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/footer.css">
  <script src="<?= BASE_URL ?>/js/navbar.js" defer></script>
  <script src="<?= BASE_URL ?>/js/cookieBanner.js" defer></script>
  <script src="<?= BASE_URL ?>/js/validate-checkout.js" defer></script>
</head>
<body data-logged-in="<?= !empty($_SESSION['user_id']) ? '1' : '0' ?>">
<?php include __DIR__ . '/../layouts/navbar.php'; ?>
<main style="padding-top:40px">
  <div class="form-wrapper" id="checkout-container">
    <h1>Checkout</h1>
    <form id="checkoutForm" action="#" method="post">
      <div class="form-field">
        <label for="street">Straße:</label>
        <input type="text" id="street" name="street" value="<?= isset($address['street']) ? htmlspecialchars($address['street']) : '' ?>" required>
      </div>
      <div class="form-field" id="paymentContainer" style="margin-top:1rem;">
        <span>Zahlungsart:</span><br>
        <label><input type="radio" name="payment" value="paypal"> PayPal</label>
        <label><input type="radio" name="payment" value="card"> Kreditkarte</label>
      </div>
      <div class="form-field" style="margin-top:1rem;">
        <input type="text" id="checkoutPromo" placeholder="Gutscheincode" <?= empty($_SESSION['user_id']) ? 'disabled' : '' ?>>
        <button type="button" id="promoBtn" <?= empty($_SESSION['user_id']) ? 'disabled' : '' ?>>Anwenden</button>
        <?php if (empty($_SESSION['user_id'])): ?>
        <div id="promoMsg" style="color:red;margin-top:0.5rem;">Bitte logge dich um einen Rabattcode zu benutzen erst ein</div>
        <?php endif; ?>
      </div>
      <button type="submit" id="orderBtn" class="btn-esn" style="margin-top:1rem;">Jetzt bestellen</button>
    </form>
    <?php if (empty($_SESSION['user_id'])): ?>
    <div style="margin-top:2rem;">
      <h2>Login</h2>
      <form action="index.php?page=login" method="post">
        <label for="username">Dein Name</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Passwort</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" id="submit" class="btn-esn">Anmelden</button>
      </form>
    </div>
    <script src="<?= BASE_URL ?>/js/validate-login.js"></script>
    <?php endif; ?>
  </div>
  <?php include __DIR__ . '/../layouts/cookieBanner.php'; ?>
  <?php include __DIR__ . '/../layouts/footer.php'; ?>
</main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eterna Privacy & Policy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <?php require('inc/links.php') ?>
    <style>
        .container {
            background-color: #fff;
            padding: 40px;
            margin: 0 auto;
        }

        h1 {
            color: #c23737;
            font-size: 36px;
            margin-bottom: 30px;
            text-align: center;
        }

        .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-top: 25px;
            color: #c23737;
            text-transform: uppercase;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .popup-btn {
            background-color: #c23737;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            display: block;
            margin-top: 30px;
            width: 100%;
        }

        .popup-btn:hover {
            background-color: #a32f32;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .popup {
            background-color: #fff;
            color: #333;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .popup-close {
            background-color: #c23737;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .popup-close:hover {
            background-color: #a32f32;
        }

        footer {
            margin-top: 50px;
            font-size: 14px;
            color: #555;
        }

        .footer-links a {
            color: #c23737;
            text-decoration: none;
            margin-left: 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php require('inc/header.php') ?>

    <div class="container">
        <h1>Privacy Policy <i class="bi bi-shield-lock"></i></h1>

        <p>Welcome to Eterna! Your privacy is of utmost importance to us. This Privacy Policy outlines how we collect, use, and protect your personal information when you interact with our services.</p>

        <div class="section-title">
            <i class="bi bi-person-fill-lock"></i> 1. Information We Collect
        </div>
        <p>We collect personal data such as your name, email, contact number, payment information, and other details you provide when interacting with our services. We may also collect non-personal information like usage data and device information to improve our services.</p>

        <div class="section-title">
            <i class="bi bi-eye"></i> 2. How We Use Your Information
        </div>
        <p>Your personal information is used to provide and enhance our products and services, communicate with you about updates, promotions, and for billing purposes.</p>

        <div class="section-title">
            <i class="bi bi-shield-lock"></i> 3. Data Security
        </div>
        <p>We implement stringent security measures to protect your personal data from unauthorized access, alteration, and destruction. However, no system is completely secure, and we cannot guarantee 100% security.</p>

        <div class="section-title">
            <i class="bi bi-cookie"></i> 4. Cookies
        </div>
        <p>Our website uses cookies to personalize your browsing experience. Cookies are small files stored on your device that help us analyze site traffic and improve your experience on our website. You can control cookie preferences through your browser settings.</p>

        <div class="section-title">
            <i class="bi bi-arrow-repeat"></i> 5. Third-Party Services
        </div>
        <p>We may share your data with trusted third-party services to improve our products and services, such as payment processors and analytics providers. These parties are bound by confidentiality agreements to protect your data.</p>

        <div class="section-title">
            <i class="bi bi-person-check-fill"></i> 6. Your Rights
        </div>
        <p>You have the right to access, update, or delete your personal data at any time. To exercise these rights, please contact us via the information below.</p>

        <div class="section-title">
            <i class="bi bi-clipboard-check"></i> 7. Changes to Privacy Policy
        </div>
        <p>We may update this Privacy Policy periodically. Any changes will be posted on this page with an updated "Last Modified" date.</p>

        <div class="section-title">
            <i class="bi bi-envelope"></i> 8. Contact Us
        </div>
        <p>If you have any questions or concerns about our privacy policy, please contact us at <strong>support@eterna.com</strong>.</p>

        <button class="popup-btn" onclick="showPopup()">Agree to Terms</button>

        <div class="popup-container" id="popup">
            <div class="popup">
                <p>By clicking "Agree," you acknowledge that you have read and accepted our Privacy Policy and Terms of Service.</p>
                <button class="popup-close" onclick="closePopup()">Ok</button>
            </div>
        </div>

    </div>

    <?php require('inc/footer.php') ?>

    <script>
        function showPopup() {
            document.getElementById("popup").style.display = "flex";
            document.querySelector('.popup-btn').style.display = 'none';  // Remove the button once clicked
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

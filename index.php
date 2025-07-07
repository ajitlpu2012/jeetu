<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beauty Parlour - LAXAMI THREADING SALON</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" xintegrity="sha512-yH4zfzCFDc9n8P3SKXMKoZ+lNKs6NlCJ3Z4U1Zh1R/1IPgKUduUuD8rcKY0Jq4h0UlJpXN5wvOlQUrYxyA3h3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="header-container">
            <nav class="navbar">
                <div class="logo"><img src="images/logo.png" alt="LAXAMI THREADING SALON" style="height: 100px;"></div>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="index1.html">Upload</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#location">Location</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="slider">
        <?php
        // Define the directory where images are stored
        $dir = "uploads/";
        // Get all files matching the image extensions in the directory
        $images = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        // Sort images by modification time (newest first)
        // This ensures the most recently uploaded images appear first
        usort($images, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        $first = true; // Flag to mark the first image as 'active' for the slider
        foreach ($images as $image) {
            // Echo an <img> tag for each image
            // Add 'active' class only to the first image for slider functionality
            echo '<img src="' . htmlspecialchars($image) . '" class="slide' . ($first ? ' active' : '') . '">';
            $first = false; // After the first image, set flag to false
        }
        ?>
    </div>

    <section id="location" class="location-section">
        <h2>Visit Us</h2>
        <p><strong>Phone:</strong> +1 562-623-7244</p>
        <p><strong>Address:</strong> 625 S Euclid St, Anaheim, CA 92802-1233, California, USA</p>
        <div class="map-container">
            <!-- Google Maps iframe for location display -->
            <iframe src="https://maps.google.com/maps?q=625%20S%20Euclid%20St,%20Anaheim,%20CA%2092802&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
        </div>
    </section>

    <section id="services" class="services-section">
        <h2>Our Services</h2>
        <div class="services-grid">
            <div class="service-item">
                <i class="fas fa-magic"></i>
                <h3>Professional Makeup</h3>
                <p>Makeup can have a magical effect when performed by real masters.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-spray-can-sparkles"></i>
                <h3>Painless Depilation</h3>
                <p>Beauty sometimes requires pain, but depilation with us can be pain-free.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-cut"></i>
                <h3>Haircut and Styling</h3>
                <p>It is not just a job, it is art and pleasure to work with women’s hair.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-eye"></i>
                <h3>Eyelash Extensions</h3>
                <p>Nothing can grant a woman such charm as long curved eyelashes.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-person-dress"></i>
                <h3>Professional Stylists</h3>
                <p>It’s not always yourself who knows what fits you best. We do.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-hot-tub-person"></i>
                <h3>Spa Procedures</h3>
                <p>Relaxation and enjoyment make you a brand-new person.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-flask-vial"></i>
                <h3>Regenerating Treatments</h3>
                <p>Absolutely new technology, absolutely new skin experience.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-hand-sparkles"></i>
                <h3>Manicure & Pedicure</h3>
                <p>Hands and feet work for you a lot—let us treat them well.</p>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery-section">
        <h2>Our Services Gallery</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="images/gallery1.jpg" alt="Makeup">
                <div class="caption">Bridal Makeup</div>
            </div>
            <div class="gallery-item">
                <img src="images/gallery2.jpg" alt="Hair Styling">
                <div class="caption">Hair Styling</div>
            </div>
            <div class="gallery-item">
                <img src="images/gallery3.jpg" alt="Facial">
                <div class="caption">Facial Glow</div>
            </div>
            <div class="gallery-item">
                <img src="images/gallery4.jpg" alt="Nails">
                <div class="caption">Nail Art</div>
            </div>
            <!-- Add more gallery items as needed -->
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="booking-section">
        <h2>Book Your Visit</h2>
        <form action="book.php" method="POST" class="booking-form">
            <div class="form-group"><input type="text" name="name" placeholder="Your Name" required></div>
            <div class="form-group"><input type="email" name="email" placeholder="Email Address" required></div>
            <div class="form-group"><input type="tel" name="phone" placeholder="Phone Number" required></div>
            <div class="form-group"><input type="date" name="date" required></div>
            <div class="form-group"><textarea name="message" placeholder="Any specific requests?" rows="4"></textarea></div>
            <button type="submit" class="book-btn">Book Now</button>
        </form>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <h3>LAXAMI THREADING SALON</h3>
                <p>Your one-stop destination for beauty and relaxation. We offer a wide range of services to enhance your natural beauty.</p>
            </div>
           <!-- <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#location">Location</a></li>
                </ul>
            </div>-->
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-phone"></i> +1 562-623-7244</p>
                <p><i class="fas fa-map-marker-alt"></i> 625 S Euclid St, Anaheim, CA 92802-1233, California, USA</p>
                <p><i class="fas fa-envelope"></i>jay@gmail.com</p>
            </div>
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 LAXAMI THREADING SALON. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>

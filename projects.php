<?php
include 'database/db_connect.php';

$result = $conn->query("SELECT * FROM projects ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Exceptional Sol Tech — Web & App Development</title>
     <link rel="shortcut icon" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/f0fb58e769.js" crossorigin="anonymous"></script>
  <meta name="description" content="Exceptional Sol Tech creates modern websites and mobile apps that help businesses grow. We deliver custom solutions with speed, design, and scalability." />
  <meta name="keywords" content="web development, app development, software solutions, Exceptional Sol Tech, websites, mobile apps" />
  <style>
    /* ==== RESET ==== */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Segoe UI", sans-serif; }
    body { background: #0a0f1f; color: #eaeaea; line-height: 1.6; }

    a { text-decoration: none; color: inherit; }

    /* ==== NAVBAR ==== */
    nav {
      display: flex; justify-content: space-between; align-items: center;
      padding: 1rem 2rem; background: rgba(10, 15, 31, 0.95);
      border-bottom: 1px solid #1f2a48; position: sticky; top: 0; z-index: 1000;
    }

    nav h1 { font-size: 1.4rem; color: #ffffff; font-weight: 700; }

    nav ul { list-style: none; display: flex; gap: 1.5rem; }
    nav ul li a { transition: 0.3s; font-weight: 500; }
    nav ul li a:hover { color: #b22222; }

    .menu-toggle { display: none; flex-direction: column; cursor: pointer; }
    .menu-toggle span {
      height: 3px; width: 25px; background: #eaeaea;
      margin: 4px 0; border-radius: 2px; transition: 0.3s;
    }

    @media(max-width: 768px) {
      nav ul {
        display: none; flex-direction: column; background: #11182f;
        position: absolute; top: 60px; right: 0; width: 200px; padding: 1rem;
      }
      nav ul.active { display: flex; }
      .menu-toggle { display: flex; }
    }

    /* ==== HERO ==== */
    .hero {
      height: 40vh; 
     
      background-image: url('programming-background-with-person-working-with-codes-computer_23-2150010125.avif');
      background-repeat: no-repeat;background-position: center;background-size: cover;position: relative;
    }
    .underhero{
      background: linear-gradient(135deg, #0a0f1fb5, #141c3ac7);display: flex; flex-direction: column;
      justify-content: center; align-items: center;
position: absolute;top: 0;bottom: 0;left: 0;right: 0; text-align: center; padding: 0 2rem;
    }
    .hero h2 { font-size: 3rem; color: #ffffff; margin-bottom: 1rem; }
    .hero p { max-width: 600px; font-size: 1.2rem; margin-bottom: 2rem; }
    .cta-btn { padding: 0.8rem 1.5rem; margin: 0.5rem; border-radius: 30px; font-weight: bold; border: none; cursor: pointer; transition: 0.3s; }
    .cta-primary { background: #b22222; color: #fff; }
    .cta-primary:hover { background: #8b1a1a; }
    .cta-secondary { border: 2px solid #ffffff; background: transparent; color: #ffffff; }
    .cta-secondary:hover { background: #0b1c8c; color: #fff; }


    /* ==== SECTIONS ==== */
    section { padding: 4rem 2rem; max-width: 1100px; margin: auto; }
    section h3 { text-align: center; font-size: 2rem; margin-bottom: 2rem; color: #b22222; }
    section h4 { text-align: left; font-size: 1.5rem; color: #b22222; }

    .services { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; }
    .card { background: #11182f; padding: 2rem; border-radius: 12px; border: 1px solid #1f2a48; transition: 0.3s; }
    .card:hover { transform: translateY(-5px); border-color: #0b1c8c; }
.card img { width: 100%; height: 200px; border-radius: 10px; margin-bottom: 1rem; }
    /* ==== PORTFOLIO ==== */
    .portfolio-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; }
    .portfolio-item {
      background: #11182f; border-radius: 10px; overflow: hidden;
      border: 1px solid #1f2a48; transition: 0.3s;width: 300px;
    }
    .portfolio-item img { width: 100%; display: block; }
    .portfolio-item:hover { transform: scale(1.03); border-color: #b22222; }
    .portfolio-grid h2{
      text-align: left; font-size: 1.2rem; color: #ffffff; text-align: left;
    }
    .portfolio-grid p{color: #b22222;}
.portfolio-grid a{
  text-decoration: none;
padding: 0.8rem 1.2rem;border-radius: 30px; font-weight: bold; border: none; cursor: pointer; 
background-color: #b22222;
}
  .portfolio-item div{
    padding: 20px;
  }

    /* ==== TESTIMONIALS ==== */
    .testimonials { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; }
    .testimonial { background: #11182f; padding: 1.5rem; border-radius: 12px; border-left: 4px solid #0b1c8c; }
    .testimonial span { display: block; margin-top: 1rem; font-weight: bold; color: #b22222; }

    /* ==== CONTACT ==== */
    .contact-form { display: grid; gap: 1rem; max-width: 600px; margin: auto; }
    .contact-form input , .contact-form textarea ,.contact-form select{
      padding: 0.8rem; border: none; border-radius: 8px;
      background: #1b223d; color: #fff;
    }
    .contact-form button {
      background: #0b1c8c; color: #fff; border: none; padding: 0.8rem;
      border-radius: 8px; cursor: pointer; transition: 0.3s;
    }
    .contact-form button:hover { background: #b22222; }

    /* ==== FOOTER ==== */
    footer { background: #0a0f1f; text-align: center; padding: 2rem; margin-top: 2rem; }
    footer p { color: #888; font-size: 0.9rem; }

    /* ==== SCROLL ANIMATIONS ==== */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.8s ease-out;
      border-bottom:1px solid #515664;
    }
    .reveal.active {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>
  <!-- ==== NAVBAR ==== -->
  <nav>
    <img src="logo.png" alt="Exceptional Sol Tech Logo" style="width: 150px;border-radius: 20px;">
    <div class="menu-toggle" onclick="document.querySelector('nav ul').classList.toggle('active')">
      <span></span><span></span><span></span>
    </div>
    <ul>
        <li><a href="index.html">Home</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <!-- ==== HERO ==== -->
  <section class="hero reveal">
    <div class="underhero">
    <h2>Our Projects</h2>
  <div>
      <button class="cta-btn cta-secondary"><a href="#contact">📞 Contact Us</a></button>
    </div>
    </div>
  </section>

 

  <!-- ==== PORTFOLIO ==== -->

<section id="portfolio" class="reveal">
  <div class="portfolio-grid">
    <?php if ($result->num_rows > 0) { ?>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="portfolio-item">
          <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
          <div>
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <br>
            <a href="<?php echo htmlspecialchars($row['link']); ?>" target="_blank">Visit</a>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <p style="text-align:center; width:100%; font-size:18px; color:#666;">
        No projects have been added yet.
      </p>
    <?php } ?>
  </div>
</section>



  <!-- ==== CONTACT ==== -->
  <section id="contact" class="reveal">
    <div>
 <div style="text-align: center;">
      <h3>Let's Talk</h3>
    <p>Tell us about your project. We’ll reply with next steps and a ballpark estimate.</p><br>
    
        <form class="contact-form" id="contactForm">
  <input type="text" id="name" placeholder="Your Name" required>
  <input type="email" id="email" placeholder="Your Email" required>
  
  <select id="timeline" name="timeline" required>
    <option value="" disabled selected>How soon?</option>
    <option>ASAP</option>
    <option>2–4 weeks</option>
    <option>1–3 months</option>
    <option>Flexible</option>
  </select>
  
  <textarea id="details" rows="5" placeholder="Project Details" required></textarea>
  <button type="submit">Send Message</button>
</form>

<script>
  document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Get form values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const timeline = document.getElementById("timeline").value;
    const details = document.getElementById("details").value.trim();

    // Validation
    if (name === "") {
      alert("Please enter your name.");
      return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    if (timeline === "") {
      alert("Please select a timeline.");
      return;
    }

    if (details.length < 10) {
      alert("Please provide at least 10 characters in project details.");
      return;
    }

    // Build email
    const subject = `New Project Inquiry from ${name}`;
    const body = `Name: ${name}%0D%0AEmail: ${email}%0D%0ATimeline: ${timeline}%0D%0A%0D%0ADetails:%0D%0A${details}`;

    // Open mail app
    window.location.href = `mailto:solexceptional@gmail.com?subject=${encodeURIComponent(subject)}&body=${body}`;
  });
</script>
  </div>
  <br>
  <div style="text-align: center;">
     <h3>Or Contact Us</h3>
  <p><i class="fa fa-phone" style="font-size:15px;color:orangered;padding-right: 10px;"></i>Phone: +234 705 719 9111</p>
<p><i class="fa fa-envelope" style="font-size:15px;color:orangered;padding-right: 10px;"></i>solexceptional@gmail.com</p>
<p><i class="fa fa-map-marker" style=" font-size:20px;color:orangered;padding-right: 10px"></i>Adress: No 5 Unachukwu avenue, Rumuibekwe, Port Harcourt, Rivers State, Nigeria</p>

  </div>
    </div>
   

  </section>

  <!-- ==== FOOTER ==== -->
  <footer>
    <p>© 2025 Exceptional Sol Tech | All Rights Reserved</p>
  </footer>

  <script>
    // Scroll animation observer
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    reveals.forEach(reveal => observer.observe(reveal));
  </script>
</body>
</html>

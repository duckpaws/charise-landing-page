<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdonate";

// Membuat koneksi
$conn = mysqli_connect("localhost", "root", "", "dbdonate");

// Mengecek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, goal_name, target_amount, collected_amount FROM goals";
$result = $conn->query($sql);

$goals = [
    'Raise Hand To Help Papua',
    'Raise Hand To Help Palestine',
    'Raise Hand To Help Africa',
    'Raise Hand To Help Suriah'
];

$images = [
  'Raise Hand To Help Papua' => 'donate-1.jpg',
  'Raise Hand To Help Palestine' => 'donate-2.jpg',
  'Raise Hand To Help Africa' => 'donate-3.jpg',
  'Raise Hand To Help Suriah' => 'donate-4.jpeg'
];

$goalData = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if (in_array($row['goal_name'], $goals)) {
      $goalData[$row['goal_name']] = $row;
    }
  }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Charise - Give Love for Saving World</title>

  <!-- `
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/charise.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  >

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Oswald:wght@600&display=swap"
    rel="stylesheet">

</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">Charise</a>
      </h1>

      <select name="language" class="lang-switch">

        <option value="english">English</option>
        <option value="french">Indonesian</option>

      </select>

      <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="#" class="logo">Charise</a>

        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>
              <span>Home</span>

              <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>
              <span>About</span>

              <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#service" class="navbar-link" data-nav-link>
              <span>Service</span>

              <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#donate" class="navbar-link" data-nav-link>
              <span>Donate</span>

              <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

      <div class="header-action">

        <button class="search-btn" aria-label="Search">
          <ion-icon name="search-outline"></ion-icon>
        </button>

        <a href="#donate" class="btn btn-primary">
    <span>Donation</span>
    <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
  </a>

      </div>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <p class="section-subtitle">
            <img src="./assets/images/subtitle-img-white.png" width="32" height="7" alt="Wavy line">
            <span>Welcome to Charise</span>
          </p>

          <h2 class="h1 hero-title">
            Your Donation, <strong>Their Brighter Future.</strong>
          </h2>

          <p class="hero-text">
          Every contribution you make brings hope and new opportunities to those in need. Together, we can create a brighter future for everyone.
          </p>
          
          
            <a href="#donate" class="btn btn-primary" style="color: inherit; text-decoration: none;">
              Donation
              <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
            </a>
        

      
        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="section features">
        <div class="container">

          <ul class="features-list">

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="shield-checkmark-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Livability</h3>

                <p class="item-text">
                Enhancing livability to uplift and
                enrich lives worldwide.
                </p>
              </div>
            </li>

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="water-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Food Eligibility</h3>

                <p class="item-text">
                We are committed to providing essential 
                food supplies to those in need.
                </p>
              </div>
            </li>

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="medkit-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Healthcare</h3>

                <p class="item-text">
                Delivering crucial healthcare assistance 
                to underserved communities.
                </p>
              </div>
            </li>

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="school-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Education</h3>

                <p class="item-text">
                Ensuring emergency education support for 
                children and young people.
                </p>
              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about">
        <div class="container">

          <div class="about-banner">

            <h2 class="deco-title">About Us</h2>

            <img src="./assets/images/deco-img.png" width="58" height="261" alt="" class="deco-img">

            <div class="banner-row">

              <div class="banner-col">
                <img src="./assets/images/about-banner-1.jpg" width="315" height="380" loading="lazy" alt="Tiger"
                  class="about-img w-100">

                <img src="./assets/images/about-banner-2.jpg" width="386" height="250" loading="lazy" alt="Panda"
                  class="about-img about-img-2 w-100">
              </div>

              <div class="banner-col">
                <img src="./assets/images/about-banner-3.jpg" width="250" height="277" loading="lazy" alt="Elephant"
                  class="about-img about-img-3 w-100">

                <img src="./assets/images/about-banner-4.jpg" width="315" height="380" loading="lazy" alt="Deer"
                  class="about-img w-100">
              </div>

            </div>

          </div>

          <div class="about-content">

            <p class="section-subtitle">
              <img src="./assets/images/subtitle-img-green.png" width="32" height="7" alt="Wavy line">

              <span>Why Choose Us</span>
            </p>

            <h2 class="h2 section-title">
              Rise Your Hand to Give <strong>Worldwide Humanity</strong>
            </h2>

            <ul class="tab-nav">
              <li>
                <button class="tab-btn active" onclick="showContent('mission', this)">Our Mission</button>
              </li>
              <li>
                <button class="tab-btn" onclick="showContent('vision', this)">Our Vision</button>
              </li>
              <li>
                <button class="tab-btn" onclick="showContent('plan', this)">Next Plan</button>
              </li>
            </ul>

            <div class="tab-content">
              <p id="content-text" class="section-text">
              Our mission is to provide essential food supplies to communities in need, ensuring no one goes hungry. We aim to deliver emergency education support for children and young people, guaranteeing uninterrupted access to learning. We strive to ensure access to clean and safe water for underserved communities, enhancing their health and well-being. Additionally, we are committed to offering vital healthcare assistance to those in need, ensuring everyone has access to quality medical services.
              </p>
            </div>

              <ul class="tab-list">

                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>

                  <p class="tab-text">Charity For Foods</p>
                </li>

                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>

                  <p class="tab-text">Charity For Education</p>
                </li>

                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>

                  <p class="tab-text">Charity For Water</p>
                </li>

                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>

                  <p class="tab-text">Charity For Medical</p>
                </li>

              </ul>
          </div>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="section cta">
        <div class="container">

          <div class="cta-content">
            <h2 class="h2 section-title">324+ Trusted Global Partners</h2>

            <button class="btn btn-outline">
              <span>Become a Partner</span>

              <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
            </button>
          </div>

          <figure class="cta-banner">
            <img src="./assets/images/cta-banner.jpg" width="520" height="228" loading="lazy" alt="Fox"
              class="img-cover">
          </figure>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service" id="service" style="background-image: url('./assets/images/service-map.png')">
        <div class="container">

          <p class="section-subtitle">
            <img src="./assets/images/subtitle-img-green.png" width="32" height="7" alt="Wavy line">

            <span>What We Do</span>
          </p>

          <h2 class="h2 section-title">
            We Work Differently to <strong>keep The World Safe</strong>
          </h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="happy-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Save Children</h3>

                <p class="card-text">
                Giving children hope for life
                </p>

                <a href="#" class="btn-link">
                  <span>Read More</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="woman-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Save Woman</h3>

                <p class="card-text">
                Provide security and human rights justice for women.
                </p>

                <a href="#" class="btn-link">
                  <span>Read More</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="fast-food-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Food Supply</h3>

                <p class="card-text">
                Assist nutritional fulfillment in food distribution.
                </p>

                <a href="#" class="btn-link">
                  <span>Read More</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="medkit-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Health Center</h3>

                <p class="card-text">
                Provide emergency health care while providing medical professionals.
                </p>

                <a href="#" class="btn-link">
                  <span>Read More</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>

       <!-- CTA
        - #DONATE
      -->
      <section class="donation-section" id="donate">
      <div class="container">
      <h2 class="h2 section-title">
        Our Most Popular Causes For <strong>Building Fund</strong>
      </h2>
      <br>
      <br>
      <ul class="donate-list">
      <?php
      foreach ($goals as $index => $goalName) {
        $goal = isset($goalData[$goalName]) ? $goalData[$goalName] : null;
        if ($goal) {
          $id = $goal['id'];
          $target_amount = $goal['target_amount'];
          $collected_amount = $goal['collected_amount'];
          $to_go = $target_amount - $collected_amount;
          $percentage = ($target_amount > 0) ? ($collected_amount / $target_amount) * 100 : 0;
          $image = isset($images[$goalName]) ? $images[$goalName] : 'default.jpg';
          ?>
          <li>
  <div class="donate-card">
    <figure class="card-banner">
      <img src="./assets/images/<?php echo $image; ?>" width="520" height="325" loading="lazy" alt="<?php echo htmlspecialchars($goalName); ?>" class="img-cover">
    </figure>
    <div class="card-content">
      <div class="progress-wrapper">
        <p class="progress-text">
          <span>Raised</span>
          <data value="<?php echo $collected_amount; ?>">$<?php echo number_format($collected_amount); ?></data>
        </p>
        <data class="progress-value" value="<?php echo $percentage; ?>"><?php echo round($percentage); ?>%</data>
      </div>
      <div class="progress-box">
        <div class="progress" style="width: <?php echo $percentage; ?>%;"></div>
      </div>
      <h3 class="h3 card-title"><?php echo htmlspecialchars($goalName); ?></h3>
      <div class="card-wrapper">
        <p class="card-wrapper-text">
          <span>Goal</span>
          <data class="green" value="<?php echo $target_amount; ?>">$<?php echo number_format($target_amount); ?></data>
        </p>
        <p class="card-wrapper-text">
          <span>Raise</span>
          <data class="yellow" value="<?php echo $collected_amount; ?>">$<?php echo number_format($collected_amount); ?></data>
        </p>
        <p class="card-wrapper-text">
          <span>To Go</span>
          <data class="cyan" value="<?php echo $to_go; ?>">$<?php echo number_format($to_go); ?></data>
        </p>
      </div>
      <button class="btn btn-secondary" onclick="toggleForm('<?php echo $id; ?>')">
        <span>Donation</span>
        <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
      </button>
      <div id="donationForm_<?php echo $id; ?>" class="donation-form" style="display:none;">
        <br>
        <h3>Donate to <?php echo htmlspecialchars($goalName); ?></h3>
        <form id="donationForm-<?php echo $id; ?>" onsubmit="submitForm(event, '<?php echo $id; ?>')">
          <input type="hidden" name="goal_name" value="<?php echo htmlspecialchars($goalName); ?>">
          <input type="hidden" name="goal_id" value="<?php echo $id; ?>">
          <label for="amount_<?php echo $id; ?>">Amount:</label>
          <input type="number" id="amount_<?php echo $id; ?>" name="amount" placeholder="$ 00,00" required>
          <br><br>
          <button type="submit">Donate</button>
          <button class="btn-close" onclick="closeForm('<?php echo $id; ?>')">
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </form>
        <div id="success-message-<?php echo $id; ?>" style="display: none; color: green;">Donation processed successfully.</div>
        <div id="error-message-<?php echo $id; ?>" style="display: none; color: red;">Failed to process donation.</div>
      </div>
    </div>
  </div>
</li>


          <?php
        } else {
          // Menampilkan card default jika data tidak ditemukan
          ?>
          <li>
            <div class="donate-card">
              <figure class="card-banner">
                <img src="./assets/images/donate-<?php echo $index + 1; ?>.jpg" width="520" height="325" loading="lazy" alt="Default Image" class="img-cover">
              </figure>
              <div class="card-content">
                <div class="progress-wrapper">
                  <p class="progress-text">
                    <span>Raised</span>
                    <data value="0">$0</data>
                  </p>
                  <data class="progress-value" value="0">0%</data>
                </div>
                <div class="progress-box">
                  <div class="progress" style="width: 0%;"></div>
                </div>
                <h3 class="h3 card-title"><?php echo $goalName; ?></h3>
                <div class="card-wrapper">
                  <p class="card-wrapper-text">
                    <span>Goal</span>
                    <data class="green" value="0">$0</data>
                  </p>
                  <p class="card-wrapper-text">
                    <span>Raise</span>
                    <data class="yellow" value="0">$0</data>
                  </p>
                  <p class="card-wrapper-text">
                    <span>To Go</span>
                    <data class="cyan" value="0">$0</data>
                  </p>
                </div>
                <button class="btn btn-secondary" onclick="openPopup(<?php echo $goal_id; ?>)">
                  <span>Donation</span>
                  <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                </button>
              </div>
            </div>
          </li>
          <?php
        }
      }
      ?>
    </ul>
  </div>
</section>


      <!-- 
        - #PARTNER
      -->
      
      <section class="section partner">
        <div class="container">

          <a href="#" class="partner-logo">
            <img src="./assets/images/partner-1.png" width="157" height="55" loading="lazy" alt="Children Fund"
              class="gray">

            <img src="./assets/images/partner-1-active.png" width="157" height="55" loading="lazy" alt="Children Fund"
              class="color">
          </a>

          <a href="#" class="partner-logo">
            <img src="./assets/images/partner-2.png" width="163" height="55" loading="lazy" alt="Non Profit Agency"
              class="gray">

            <img src="./assets/images/partner-2-active.png" width="163" height="55" loading="lazy"
              alt="Non Profit Agency" class="color">
          </a>

          <a href="#" class="partner-logo">
            <img src="./assets/images/partner-3.png" width="149" height="55" loading="lazy" alt="Rise Hand Help Us"
              class="gray">

            <img src="./assets/images/partner-3-active.png" width="149" height="55" loading="lazy"
              alt="Rise Hand Help Us" class="color">
          </a>

          <a href="#" class="partner-logo">
            <img src="./assets/images/partner-4.png" width="169" height="58" loading="lazy" alt="Helping" class="gray">

            <img src="./assets/images/partner-4-active.png" width="169" height="58" loading="lazy" alt="Helping"
              class="color">
          </a>

          <a href="#" class="partner-logo">
            <img src="./assets/images/partner-5.png" width="211" height="55" loading="lazy" alt="Poor Fund Organization"
              class="gray">

            <img src="./assets/images/partner-5-active.png" width="211" height="55" loading="lazy"
              alt="Poor Fund Organization" class="color">
          </a>

        </div>
      </section>
    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <ul class="footer-list">

        <li>
          <a href="#" class="footer-link">Terms of use</a>
        </li>

        <li>
          <a href="#" class="footer-link">Privacy & Policy</a>
        </li>

      </ul>

      <p class="copyright">
        Copyright 2024 Z. S. Yasmin. All Rights Reserved.
      </p>

    </div>
  </footer>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
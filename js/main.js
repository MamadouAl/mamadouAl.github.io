/* ===================================================================
 * MamadouAl 1.0.0 - Main JS
 *
 * ------------------------------------------------------------------- */

(function (html) {
  "use strict";

  const cfg = {
    // MailChimp URL
    mailChimpURL:
      "https://facebook.us1.list-manage.com/subscribe/post?u=1abf75f6981256963a47d197a&amp;id=37c6d8f4d6",
  };

  /* preloader
   * -------------------------------------------------- */
  const ssPreloader = function () {
    const siteBody = document.querySelector("body");
    const preloader = document.querySelector("#preloader");
    if (!preloader) return;

    html.classList.add("ss-preload");

    window.addEventListener("load", function () {
      html.classList.remove("ss-preload");
      html.classList.add("ss-loaded");

      preloader.addEventListener("transitionend", function afterTransition(e) {
        if (e.target.matches("#preloader")) {
          siteBody.classList.add("ss-show");
          e.target.style.display = "none";
          preloader.removeEventListener(e.type, afterTransition);
        }
      });
    });
  }; // end ssPreloader

  /* mobile menu
   * ---------------------------------------------------- */
  const ssMobileMenu = function () {
    const toggleButton = document.querySelector(".s-header__menu-toggle");
    const mainNavWrap = document.querySelector(".s-header__nav");
    const siteBody = document.querySelector("body");

    if (!(toggleButton && mainNavWrap)) return;

    toggleButton.addEventListener("click", function (e) {
      e.preventDefault();
      toggleButton.classList.toggle("is-clicked");
      siteBody.classList.toggle("menu-is-open");
    });

    mainNavWrap.querySelectorAll(".s-header__nav a").forEach(function (link) {
      link.addEventListener("click", function (event) {
        // at 900px and below
        if (window.matchMedia("(max-width: 900px)").matches) {
          toggleButton.classList.toggle("is-clicked");
          siteBody.classList.toggle("menu-is-open");
        }
      });
    });

    window.addEventListener("resize", function () {
      // above 900px
      if (window.matchMedia("(min-width: 901px)").matches) {
        if (siteBody.classList.contains("menu-is-open"))
          siteBody.classList.remove("menu-is-open");
        if (toggleButton.classList.contains("is-clicked"))
          toggleButton.classList.remove("is-clicked");
      }
    });
  }; // end ssMobileMenu

  /* swiper
   * ------------------------------------------------------ */
  const ssSwiper = function () {
    const homeSliderSwiper = new Swiper(".home-slider", {
      slidesPerView: 1,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        // when window width is > 400px
        401: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        // when window width is > 800px
        801: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        // when window width is > 1330px
        1331: {
          slidesPerView: 3,
          spaceBetween: 48,
        },
        // when window width is > 1773px
        1774: {
          slidesPerView: 4,
          spaceBetween: 48,
        },
      },
    });

    const pageSliderSwiper = new Swiper(".page-slider", {
      slidesPerView: 1,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        // when window width is > 400px
        401: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        // when window width is > 800px
        801: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        // when window width is > 1240px
        1241: {
          slidesPerView: 3,
          spaceBetween: 48,
        },
      },
    });
  }; // end ssSwiper

  /* mailchimp form
   * ---------------------------------------------------- */
  const ssMailChimpForm = function () {
    const mcForm = document.querySelector("#mc-form");

    if (!mcForm) return;

    // Add novalidate attribute
    mcForm.setAttribute("novalidate", true);

    // Field validation
    function hasError(field) {
      // Don't validate submits, buttons, file and reset inputs, and disabled fields
      if (
        field.disabled ||
        field.type === "file" ||
        field.type === "reset" ||
        field.type === "submit" ||
        field.type === "button"
      )
        return;

      // Get validity
      let validity = field.validity;

      // If valid, return null
      if (validity.valid) return;

      // If field is required and empty
      if (validity.valueMissing) return "Please enter an email address.";

      // If not the right type
      if (validity.typeMismatch) {
        if (field.type === "email")
          return "Please enter a valid email address.";
      }

      // If pattern doesn't match
      if (validity.patternMismatch) {
        // If pattern info is included, return custom error
        if (field.hasAttribute("title")) return field.getAttribute("title");

        // Otherwise, generic error
        return "Please match the requested format.";
      }

      // If all else fails, return a generic catchall error
      return "The value you entered for this field is invalid.";
    }

    // Show error message
    function showError(field, error) {
      // Get field id or name
      let id = field.id || field.name;
      if (!id) return;

      let errorMessage = field.form.querySelector(".mc-status");

      // Update error message
      errorMessage.classList.remove("success-message");
      errorMessage.classList.add("error-message");
      errorMessage.innerHTML = error;
    }

    // Display form status (callback function for JSONP)
    window.displayMailChimpStatus = function (data) {
      // Make sure the data is in the right format and that there's a status container
      if (!data.result || !data.msg || !mcStatus) return;

      // Update our status message
      mcStatus.innerHTML = data.msg;

      // If error, add error class
      if (data.result === "error") {
        mcStatus.classList.remove("success-message");
        mcStatus.classList.add("error-message");
        return;
      }

      // Otherwise, add success class
      mcStatus.classList.remove("error-message");
      mcStatus.classList.add("success-message");
    };

    // Submit the form
    function submitMailChimpForm(form) {
      let url = cfg.mailChimpURL;
      let emailField = form.querySelector("#mce-EMAIL");
      let serialize =
        "&" +
        encodeURIComponent(emailField.name) +
        "=" +
        encodeURIComponent(emailField.value);

      if (url == "") return;

      url = url.replace("/post?u=", "/post-json?u=");
      url += serialize + "&c=displayMailChimpStatus";

      // Create script with url and callback (if specified)
      var ref = window.document.getElementsByTagName("script")[0];
      var script = window.document.createElement("script");
      script.src = url;

      // Create global variable for the status container
      window.mcStatus = form.querySelector(".mc-status");
      window.mcStatus.classList.remove("error-message", "success-message");
      window.mcStatus.innerText = "Submitting...";

      // Insert script tag into the DOM
      ref.parentNode.insertBefore(script, ref);

      // After the script is loaded (and executed), remove it
      script.onload = function () {
        this.remove();
      };
    }

    // Check email field on submit
    mcForm.addEventListener(
      "submit",
      function (event) {
        event.preventDefault();

        let emailField = event.target.querySelector("#mce-EMAIL");
        let error = hasError(emailField);

        if (error) {
          showError(emailField, error);
          emailField.focus();
          return;
        }

        submitMailChimpForm(this);
      },
      false
    );
  }; // end ssMailChimpForm

  /* alert boxes
   * ------------------------------------------------------ */
  const ssAlertBoxes = function () {
    const boxes = document.querySelectorAll(".alert-box");

    boxes.forEach(function (box) {
      box.addEventListener("click", function (e) {
        if (e.target.matches(".alert-box__close")) {
          e.stopPropagation();
          e.target.parentElement.classList.add("hideit");

          setTimeout(function () {
            box.style.display = "none";
          }, 500);
        }
      });
    });
  }; // end ssAlertBoxes

  /* Back to Top
   * ------------------------------------------------------ */
  const ssBackToTop = function () {
    const pxShow = 900;
    const goTopButton = document.querySelector(".ss-go-top");

    if (!goTopButton) return;

    // Show or hide the button
    if (window.scrollY >= pxShow) goTopButton.classList.add("link-is-visible");

    window.addEventListener("scroll", function () {
      if (window.scrollY >= pxShow) {
        if (!goTopButton.classList.contains("link-is-visible"))
          goTopButton.classList.add("link-is-visible");
      } else {
        goTopButton.classList.remove("link-is-visible");
      }
    });
  }; // end ssBackToTop

  /* smoothscroll
   * ------------------------------------------------------ */
  const ssMoveTo = function () {
    const easeFunctions = {
      easeInQuad: function (t, b, c, d) {
        t /= d;
        return c * t * t + b;
      },
      easeOutQuad: function (t, b, c, d) {
        t /= d;
        return -c * t * (t - 2) + b;
      },
      easeInOutQuad: function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
      },
      easeInOutCubic: function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t * t + b;
        t -= 2;
        return (c / 2) * (t * t * t + 2) + b;
      },
    };

    const triggers = document.querySelectorAll(".smoothscroll");

    const moveTo = new MoveTo(
      {
        tolerance: 0,
        duration: 1200,
        easing: "easeInOutCubic",
        container: window,
      },
      easeFunctions
    );

    triggers.forEach(function (trigger) {
      moveTo.registerTrigger(trigger);
    });
  }; // end ssMoveTo

  /* Animations au scroll modernes
   * ------------------------------------------------------ */
  const ssScrollAnimations = function () {
    // Observer pour les animations au scroll
    const observerOptions = {
      threshold: 0.1,
      rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, observerOptions);

    // Éléments à animer
    const elementsToAnimate = document.querySelectorAll(
      ".grid-list-items__item, .s-about, .s-expertise, .s-clients"
    );
    elementsToAnimate.forEach((el) => {
      el.classList.add("fadeInOnScroll");
      observer.observe(el);
    });

    // Effet parallax sur les images de fond
    const parallaxElements = document.querySelectorAll(
      ".s-about__content-imgbg"
    );

    const handleScroll = () => {
      const scrolled = window.pageYOffset;
      const rate = scrolled * -0.5;

      parallaxElements.forEach((el) => {
        el.style.transform = `translateY(${rate}px)`;
      });
    };

    window.addEventListener("scroll", handleScroll);
  };

  /* Effets de particules cyber révolutionnaires
   * ------------------------------------------------------ */
  const ssCyberParticles = function () {
    // Ajouter des particules à toutes les sections modernes
    const modernSections = document.querySelectorAll(".modern-section-bg");

    modernSections.forEach((section) => {
      // Créer le conteneur de particules
      const particlesContainer = document.createElement("div");
      particlesContainer.className = "cyber-particles-js";
      particlesContainer.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 1;
                overflow: hidden;
            `;
      section.appendChild(particlesContainer);

      // Créer des particules dynamiques
      for (let i = 0; i < 12; i++) {
        const particle = document.createElement("div");
        particle.className = "cyber-particle";
        const colors = [
          "rgba(16, 185, 129, 0.6)",
          "rgba(139, 92, 246, 0.6)",
          "rgba(234, 144, 16, 0.6)",
          "rgba(59, 130, 246, 0.6)",
        ];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];

        particle.style.cssText = `
                    position: absolute;
                    width: ${Math.random() * 6 + 2}px;
                    height: ${Math.random() * 6 + 2}px;
                    background: radial-gradient(circle, ${randomColor} 0%, transparent 70%);
                    border-radius: 50%;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                    animation: floatParticle ${
                      Math.random() * 8 + 6
                    }s ease-in-out infinite;
                    animation-delay: ${Math.random() * 4}s;
                    box-shadow: 0 0 20px ${randomColor};
                `;
        particlesContainer.appendChild(particle);
      }

      // Créer des lignes de connexion
      const connectionLines = document.createElement("div");
      connectionLines.className = "connection-grid";
      connectionLines.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: 
                    linear-gradient(rgba(16, 185, 129, 0.1) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(139, 92, 246, 0.1) 1px, transparent 1px);
                background-size: 80px 80px;
                animation: gridMove 20s linear infinite;
                pointer-events: none;
                opacity: 0.4;
            `;
      particlesContainer.appendChild(connectionLines);
    });

    // Ajouter les keyframes via une stylesheet
    const style = document.createElement("style");
    style.textContent = `
            @keyframes floatParticle {
                0%, 100% {
                    transform: translateY(0) rotate(0deg);
                    opacity: 0.3;
                }
                25% {
                    transform: translateY(-20px) rotate(90deg);
                    opacity: 0.7;
                }
                50% {
                    transform: translateY(-10px) rotate(180deg);
                    opacity: 1;
                }
                75% {
                    transform: translateY(-30px) rotate(270deg);
                    opacity: 0.5;
                }
            }
        `;
    document.head.appendChild(style);
  };

  /* Effets de typing pour le titre
   * ------------------------------------------------------ */
  const ssTypingEffect = function () {
    const titleElement = document.querySelector(".s-intro__content-title");
    if (!titleElement) return;

    const originalText = titleElement.innerHTML;
    titleElement.innerHTML = "";
    titleElement.style.opacity = "1";

    let index = 0;
    const typeText = () => {
      if (index < originalText.length) {
        if (originalText[index] === "<") {
          // Gérer les balises HTML
          const endTag = originalText.indexOf(">", index);
          titleElement.innerHTML += originalText.substring(index, endTag + 1);
          index = endTag + 1;
        } else {
          titleElement.innerHTML += originalText[index];
          index++;
        }
        setTimeout(typeText, 50);
      }
    };

    // Démarrer l'effet après un délai
    setTimeout(typeText, 1000);
  };

  /* Amélioration des hovers
   * ------------------------------------------------------ */
  const ssEnhancedHovers = function () {
    // Effet de suivi de souris sur les cartes
    const cards = document.querySelectorAll(".grid-list-items__item");

    cards.forEach((card) => {
      card.addEventListener("mousemove", (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        card.style.setProperty("--mouse-x", `${x}px`);
        card.style.setProperty("--mouse-y", `${y}px`);
      });
    });

    // Ajout du CSS pour l'effet de suivi
    const style = document.createElement("style");
    style.textContent = `
            .grid-list-items__item {
                position: relative;
            }
            .grid-list-items__item::after {
                content: '';
                position: absolute;
                top: var(--mouse-y, 50%);
                left: var(--mouse-x, 50%);
                width: 100px;
                height: 100px;
                background: radial-gradient(circle, rgba(234, 144, 16, 0.1) 0%, transparent 70%);
                border-radius: 50%;
                transform: translate(-50%, -50%);
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
                z-index: 1;
            }
            .grid-list-items__item:hover::after {
                opacity: 1;
            }
        `;
    document.head.appendChild(style);
  };

  /* Skills Animation
   * ------------------------------------------------------ */
  const ssSkillsAnimation = function () {
    const skillItems = document.querySelectorAll(".skill-item");

    // Set up Intersection Observer for skills animation
    const skillObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const skillItem = entry.target;
            const skillLevel = skillItem.querySelector(".skill-level");
            const level = skillLevel.dataset.level;

            // Add animation class and set CSS variable
            skillItem.classList.add("animate-level");
            skillItem.style.setProperty("--level-width", level + "%");

            // Unobserve after animation starts
            skillObserver.unobserve(skillItem);
          }
        });
      },
      {
        threshold: 0.5,
        rootMargin: "0px 0px -100px 0px",
      }
    );

    // Observe all skill items
    skillItems.forEach((item) => {
      skillObserver.observe(item);
    });

    // Add stagger animation to skills categories
    const skillsCategories = document.querySelectorAll(".skills-category");
    skillsCategories.forEach((category, index) => {
      category.style.animationDelay = `${index * 0.2}s`;
    });
  };

  /* Initialize
   * ------------------------------------------------------ */
  (function ssInit() {
    ssPreloader();
    ssMobileMenu();
    ssSwiper();
    ssMailChimpForm();
    ssAlertBoxes();
    ssMoveTo();

    // Nouvelles fonctions modernes
    ssScrollAnimations();
    ssCyberParticles();
    ssTypingEffect();
    ssEnhancedHovers();
    ssSkillsAnimation();
  })();
})(document.documentElement);

document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector(".carousel");
    const dotsContainer = document.querySelector(".carousel-dots");
    let currentIndex = 0;
    let isTransitioning = false;
  
    function updateCarousel() {
      const translateValue = -currentIndex * 100 + "%";
      carousel.style.transition = "transform 3.5s ease-in-out"; // Ajustado para 3,5 segundos
      carousel.style.transform = "translateX(" + translateValue + ")";
    }
  
    function createDots() {
      for (let i = 0; i < carousel.children.length; i++) {
        const dot = document.createElement("div");
        dot.classList.add("dot");
        dot.addEventListener("click", function() {
          currentIndex = i;
          updateCarousel();
          updateDots();
        });
        dotsContainer.appendChild(dot);
      }
      updateDots();
    }
  
    function updateDots() {
      const dots = document.querySelectorAll(".dot");
      dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === currentIndex);
      });
    }
  


    function startCarousel() {
      setInterval(() => {
        if (!isTransitioning) {
          currentIndex = (currentIndex + 1) % carousel.children.length;
          updateCarousel();
          updateDots();
        }
      }, 4500);
    }
  
    createDots();
  
    carousel.addEventListener("transitionstart", function() {
      isTransitioning = true;
    });
  
    carousel.addEventListener("transitionend", function() {
      isTransitioning = false;
      if (currentIndex === carousel.children.length - 1) {
        // Reinicia o carrossel para o primeiro slide sem passar pelos slides intermediários
        setTimeout(() => {
          currentIndex = 0;
          updateCarousel();
          updateDots();
        }, 0);
        setTimeout(() => {
          carousel.style.transition = "transform 1.5s ease-in-out"; // Adiciona a transição de volta
        }, 0);
      }
    });
  
    startCarousel();
  });
  
import './bootstrap';

// Menu Toggle
const hamburger = document.getElementById('hamburger');
const fullPageNav = document.getElementById('fullPageNav');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    fullPageNav.classList.toggle('active');
});

// Close menu when clicking on a link
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', () => {
    hamburger.classList.remove('active');
    fullPageNav.classList.remove('active');
    });
});

// Carousel Functionality
const slides = document.querySelectorAll('.carousel-slide');
const indicators = document.querySelectorAll('.indicator');
const prevBtn = document.querySelector('.carousel-prev');
const nextBtn = document.querySelector('.carousel-next');
let currentSlide = 0;
let autoplayInterval;

function showSlide(index) {
    // Remove active class from all slides and indicators
    slides.forEach(slide => slide.classList.remove('active'));
    indicators.forEach(indicator => indicator.classList.remove('active'));

    // Add active class to current slide and indicator
    slides[index].classList.add('active');
    indicators[index].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

// Navigation button events
nextBtn.addEventListener('click', () => {
    nextSlide();
    resetAutoplay();
});

prevBtn.addEventListener('click', () => {
    prevSlide();
    resetAutoplay();
});

// Indicator click events
indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
    currentSlide = index;
    showSlide(currentSlide);
    resetAutoplay();
    });
});

// Autoplay functionality
function startAutoplay() {
    autoplayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
}

function resetAutoplay() {
    clearInterval(autoplayInterval);
    startAutoplay();
}

// Start autoplay on page load
startAutoplay();

// Pause autoplay when menu is open
hamburger.addEventListener('click', () => {
    if (fullPageNav.classList.contains('active')) {
    clearInterval(autoplayInterval);
    } else {
    startAutoplay();
    }
});

// Testimonials Slider Functionality
const testimonialItems = document.querySelectorAll('.testimonial-item');
const testimonialIndicators = document.querySelectorAll('.testimonial-indicator');
const testimonialPrevBtn = document.querySelector('.testimonial-prev');
const testimonialNextBtn = document.querySelector('.testimonial-next');
let currentTestimonial = 0;
let testimonialAutoplayInterval;

function showTestimonial(index) {
    // Remove active class from all items and indicators
    testimonialItems.forEach(item => item.classList.remove('active'));
    testimonialIndicators.forEach(indicator => indicator.classList.remove('active'));

    // Add active class to current item and indicator
    testimonialItems[index].classList.add('active');
    testimonialIndicators[index].classList.add('active');
}

function nextTestimonial() {
    currentTestimonial = (currentTestimonial + 1) % testimonialItems.length;
    showTestimonial(currentTestimonial);
}

function prevTestimonial() {
    currentTestimonial = (currentTestimonial - 1 + testimonialItems.length) % testimonialItems.length;
    showTestimonial(currentTestimonial);
}

// Navigation button events for testimonials
testimonialNextBtn.addEventListener('click', () => {
    nextTestimonial();
    resetTestimonialAutoplay();
});

testimonialPrevBtn.addEventListener('click', () => {
    prevTestimonial();
    resetTestimonialAutoplay();
});

// Indicator click events for testimonials
testimonialIndicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        currentTestimonial = index;
        showTestimonial(currentTestimonial);
        resetTestimonialAutoplay();
    });
});

// Autoplay functionality for testimonials
function startTestimonialAutoplay() {
    testimonialAutoplayInterval = setInterval(nextTestimonial, 6000); // Change testimonial every 6 seconds
}

function resetTestimonialAutoplay() {
    clearInterval(testimonialAutoplayInterval);
    startTestimonialAutoplay();
}

// Start testimonial autoplay on page load
startTestimonialAutoplay();

// Pause testimonial autoplay when menu is open
hamburger.addEventListener('click', () => {
    if (fullPageNav.classList.contains('active')) {
        clearInterval(testimonialAutoplayInterval);
    } else {
        startTestimonialAutoplay();
    }
});

// Gallery Lightbox Functionality
const galleryItems = document.querySelectorAll('.gallery-item');
const galleryLightbox = document.getElementById('galleryLightbox');
const lightboxImage = document.querySelector('.lightbox-image');
const lightboxClose = document.querySelector('.lightbox-close');
const lightboxPrev = document.querySelector('.lightbox-prev');
const lightboxNext = document.querySelector('.lightbox-next');
const currentImageSpan = document.querySelector('.current-image');
const totalImagesSpan = document.querySelector('.total-images');
let currentGalleryIndex = 0;
const galleryImagesArray = Array.from(galleryItems).map(item => item.querySelector('img').src);

// Set total images count
totalImagesSpan.textContent = galleryImagesArray.length;

function showLightboxImage(index) {
    lightboxImage.src = galleryImagesArray[index];
    currentImageSpan.textContent = index + 1;
    currentGalleryIndex = index;
}

function openLightbox(index) {
    galleryLightbox.classList.add('active');
    showLightboxImage(index);
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    galleryLightbox.classList.remove('active');
    document.body.style.overflow = '';
}

function nextGalleryImage() {
    currentGalleryIndex = (currentGalleryIndex + 1) % galleryImagesArray.length;
    showLightboxImage(currentGalleryIndex);
}

function prevGalleryImage() {
    currentGalleryIndex = (currentGalleryIndex - 1 + galleryImagesArray.length) % galleryImagesArray.length;
    showLightboxImage(currentGalleryIndex);
}

// Gallery item click events
galleryItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        openLightbox(index);
    });
});

// Lightbox controls
lightboxClose.addEventListener('click', closeLightbox);
lightboxNext.addEventListener('click', nextGalleryImage);
lightboxPrev.addEventListener('click', prevGalleryImage);

// Close lightbox on background click
galleryLightbox.addEventListener('click', (e) => {
    if (e.target === galleryLightbox) {
        closeLightbox();
    }
});

// Close lightbox with Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && galleryLightbox.classList.contains('active')) {
        closeLightbox();
    }
    if (e.key === 'ArrowRight' && galleryLightbox.classList.contains('active')) {
        nextGalleryImage();
    }
    if (e.key === 'ArrowLeft' && galleryLightbox.classList.contains('active')) {
        prevGalleryImage();
    }
});

// Booking Form Submission
const bookingForm = document.getElementById('bookingForm');
if (bookingForm) {
    bookingForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(bookingForm);
        const data = Object.fromEntries(formData);
        
        // Here you would typically send this to your backend
        console.log('Booking Request:', data);
        
        // Show success message (you can customize this)
        alert('Thank you for your booking request! We will contact you within 24 hours.');
        
        // Reset form
        bookingForm.reset();
    });
}

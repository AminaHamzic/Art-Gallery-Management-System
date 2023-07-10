$(document).ready(function() {
    // Navigation links hover effect
    $('.nav-links > li').hover(
      function() {
        $(this).addClass('hovered');
      },
      function() {
        $(this).removeClass('hovered');
      }
    );
  
    // Dropdown links hover effect
    $('.dropdown-menu li').hover(
      function() {
        $(this).addClass('hovered');
      },
      function() {
        $(this).removeClass('hovered').addClass('default');
      }
    );
  
    // Reset dropdown menu after mouse leaves
    $('.dropdown-menu').mouseout(function() {
      $(this).find('li').removeClass('hovered default');
    });
  
    
    // Mobile menu toggle
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
          $('.nav-links').slideToggle();

        });
        
      });
      
    // Move between Login and Registration forms
    $('#signup-link').click(function() {
      $('.container-login').hide();
      $('.container-registration').show();
    });
  
    $('#login-link').click(function() {
      $('.container-registration').hide();
      $('.container-login').show();
    });
  
    // Login page form validation
    $('#login-form').on('submit', formValidation('login-email', 'login-password', 'Admin_dashboard.html'));
  
    // Registration page form validation
    $('#register-form').on('submit', formValidation('register-email', 'register-password'));
  
    // Admin dashboard page form validation
    // Profile form validation
    $('#profile-form').submit(function(event) {
      if (!event.target.checkValidity()) {
        event.preventDefault();
        alert('Please check your input.');
      }
    });
  
    // Clear form on submit
    $('#messageForm').on('submit', function() {
      this.reset();
    });
  
    // Inquire page form validation
    $('#inquireMesaage').submit(function(event) {
      event.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var message = $('#textarea').val();
  
      // Validate name field
      if (name === '') {
        alert('Please enter your name.');
        return;
      }
  
      // Validate email field
      if (email === '') {
        alert('Please enter your email address.');
        return;
      }
  
      if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return;
      }
  
      // Validate message field
      if (message === '') {
        alert('Please enter your message.');
        return;
      }
  
      // Submit the form if all fields are valid
      alert('Form submitted successfully!');
      $('#inquireMesaage')[0].reset();
    });
  
    // Email validation function
    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }
  
    // Form validation function
    function formValidation(emailId, passwordId, redirectUrl) {
      return function(e) {
        e.preventDefault(); // prevent form submission
  
        var email = $('#' + emailId).val();
        var password = $('#' + passwordId).val();
  
        // Validate email field
        if (email === '') {
          alert('Please enter your email address.');
          return;
        }
  
        if (!validateEmail(email)) {
          alert('Please enter a valid email address.');
          return;
        }
  
        // Validate password field
        if (password === '') {
          alert('Please enter your password.');
          return;
        }
  
        // All validation passed
        alert('Form submitted successfully!');
        this.reset();
  
        // Redirect to the dashboard if redirectUrl is provided
        if (redirectUrl) {
          window.location.href = redirectUrl;
        }
      };
    }
  });
  

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- FullCalendar CSS -->
  <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@6.1.10/main.min.css" />
  <!-- FullCalendar DayGrid plugin CSS -->
  <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@6.1.10/main.min.css" />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
  <link rel="stylesheet" href="../css/Welcome.css">
  <title>Mihanz Catering</title>
</head>

<body>
    
    <main class="w-100  d-flex align-items-center mb-5">
      <div class="w-100 d-flex justify-content-center"><img src="mihanzLogo.png" alt=""></div>
        <div class="d-flex w-75 justify-content-start">
          
          <!-- <div class="display-4 fw-semibold mb-5 ">Hello, userName</div> -->
        </div>
        <div class="d-flex flex-column align-items-center mb-5">
            <!-- <div class="display-6 mb-5 w-75">Thank you for Registering to <b>Mihanz Catering</b> Enjoy browsing our services</div>
            
        </div>
        <div class="d-flex justify-content-center"><a href="../Index.html" class="btn btn-lg btn-primary m-5">Continue</a></div> -->
        <div class="w-50 mb-5">
          Dear <b class="fw-semibold">{{ $userName }}</b>
        </div>
        <div class="w-50 mb-5" style="text-align: justify;">
            I hope this email finds you well. I am writing to inform you that your reservation request for catering services has been approved.        </div>
        <div class="w-50  d-flex mb-5 " style="text-align: justify;">
            We have carefully reviewed your requirements and availability within our catering system and are pleased to confirm that we can accommodate your event on the requested date and time. Our team is committed to providing you with exceptional service and ensuring that your catering needs are met to the highest standards.        </div>
        
        
        <div class="w-50 mb-5" style="text-align: justify;">
            Please find attached a confirmation of your reservation details, including the menu selections, number of guests, and any special instructions you provided. Kindly review the information to ensure its accuracy, and feel free to reach out to us if you have any questions or require further assistance.
        </div>

        
        <div class="w-50 mb-5" style="text-align: justify;">
            We look forward to serving you and your guests at your upcoming event. Thank you for choosing <b>Mihanz Catering</b>, and we appreciate the opportunity to be a part of your special occasion.
        </div>
        
        <!-- <div class="w-50 mb-5">
          We're committed to providing you with a seamless catering experience, and we're excited to support you in creating memorable events. Thank you for choosing <b>Mihanz Catering!</b>
        </div> -->
        <div class="w-50 fw-bold">
        <div class="mb-2">
          Best regards,
        </div>
        
       <!-- <div>
        [Your Name]
       </div> -->
        <!-- <div>
          [Your Position/Title]
        </div> -->
       
          <div class="mb-2">
            Mihanz Catering
          </div>
          <div class="mb-2">
            0926-563-1143 <br>
            0916-412-2250

          </div>
          <!-- <div class="d-flex justify-content-center"><a href="../Index.html" class="btn btn-lg btn-outline-primary m-5">Continue</a></div> -->
        </div>
      </div>
    </main>
  
</body>

</html>
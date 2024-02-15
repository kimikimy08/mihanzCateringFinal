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
        <div class="justify-content-start d-flex  align-items-center flex-column w-100">
            <div class="d-flex flex-column align-items-center mb-5">
              <div class="w-50 mb-5">
              Dear <b></b>,
               </div>
      
                <div class="w-50 mb-5" style="text-align: justify;">
                  We've received a request to reset the password for your account on Mihanz Catering. If you didn't make this request, you can safely ignore this email.
                </div>
                <div class="w-50 mb-5" style="text-align: justify;">
                  To reset your password and regain access to your account, please follow the instructions below:
                </div>
      
                <div class="w-50 mb-5" style="text-align: justify;">
                  <ul>
                    <li class="mb-2">Click on the following link to reset your password:<a href="{{ url('password/reset', $token) }}">Reset Password</a></li>
                    <li class="mb-2">Once you click the link, you'll be directed to a page where you can create a new password for your account.</li>
                    <li class="mb-2">Choose a strong and secure password that you'll remember easily, and enter it into the provided fields.              </li>
                    <li class="mb-2">After you've successfully reset your password, you can log in to your account using your new credentials.              </li>
                  </ul>
                </div>
      
                <div class="w-50 mb-5" style="text-align: justify;">
                  If you encounter any difficulties or need further assistance, please don't hesitate to reach out to our support team at <i class="link-primary">mihanzcatering@gmail.com</i>. We're here to help you every step of the way.
                  Thank you for choosing <b>Mihanz Catering</b>. We appreciate your trust in our platform and look forward to serving you in the future.
                </div>
      
      
      
      
                <div class="w-50 fw-bold">
                  <div class="mb-2">
                    Best regards,
                  </div>
                  

                 
                    <div class="mb-2">
                      Mihanz Catering
                    </div>
                    <div class="mb-2">
                      0926-563-1143 <br>
                      0916-412-2250
          
                    </div>
                    
                  </div>
            </div>

     
        </div>
       
        
    </main>
    
    
      <script src="https://unpkg.com/moment@2.29.1/moment.min.js"></script>
      <script src="https://unpkg.com/@fullcalendar/core@6.1.10/main.min.js"></script>
      <script src="https://unpkg.com/@fullcalendar/daygrid@6.1.10/main.min.js"></script>
</body>

</html>
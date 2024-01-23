<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mihanz Catering | Home</title>
    <link rel="stylesheet" href="{{ asset('css/Index.css') }}">
</head>
<nav>
    <h1>Mihanz Catering</h1>

    <ul>
        <li>
            <a href="./USER/PHP/Home.html" class="active"><FaHouseChimney/> Home</a>
        </li>
        <li>
            <a href="./USER/PHP/Menu.html"><FaBookOpen/> Menu</a>
        </li>
        <li>
            <a href="./USER/PHP/Services.html"><MdFoodBank/> Services</a>
        </li>
        <li>
            <a href="./USER/PHP/Themes.html"><FaBrush/> Theme</a>
        </li>
    </ul>


</nav>
<body>
    <div class="landing_Page">
        <h1>Mihanz Catering Service</h1>

        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                    <button><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></button>

                    @endauth
                </div>
            @endif

    </div>
    <div class="mihanz-info">
        <h1>
            Mihanz <br/> Catering 
            <p id="p1">Since 2015</p>
        
        </h1>
        <p id="p2">Mihanz Catering is a food service business that has been serving its clients for 8 years and continues, located at 181 Calderon St.Subic Baliwag ,Bulacan, San Rafael, Philippines, 3010. founded in 2015, the business started through Mr. Antonio Javier’s passion for cooking and his business partner Golando Masi saw it as an opportunity. He offered Antonio Javier, who happened to be his brother- in-law, to finance the business. Antonio agreed and the business started as a small canteen. As a fellow business minded, Mr. Antonio Javier already set his plans and aiming to make a catering which after years of hard work was finally achieved, the business was named after Mirai Javier “Mi” whom is Antonio’s daughter and Yohanz Masi who is the son of Golando both combined to form the now “Mihanz Catering”.</p>
    </div>

    <div class="reservation-Info">
        <h1>
            Ready to make your <br/>reservation? 
        </h1>
        <ul>
            <li>Amazing Deals</li>
            <li>Make your reservation within 7 days for preparations</li>
            <li>We can customize your package base on your budget</li>
            <li>Check out our menu below</li>
        </ul>
        <div><button type="button"> <a href="./USER/PHP/Menu.php">Check out our Menu</a> </button></div>

    </div>

    <div class="calendar-Date">

        <div>
            <h1>Mark your Dates</h1>
        <p>Here is our Available Event dates <br/>
        
          <b id="green">Green</b> means its Available</p>
        <p><b id="red">Red</b> means it's Occupied</p>
        </div>
        
        <div class="calendar">
        <Calendar/>
        </div>
        </div>      
    
</body>
<footer>
    <h1>
        Mihanz <br/> Catering
    </h1>

    <ul>
        <li>
            <label for="getInTouch">Get in touch</label>
            <br/><a href="https://www.facebook.com/profile.php?id=100066545202436" target="_blank" rel="noreferrer"><FaFacebook/>Facebook</a>
        </li>
        <li>
            <label for="Contact">Contact</label><br/>
            <a href="#"> <FaMobileScreen/>0926-563-1143 <br/>
               <FaMobileScreen/> 0916-412-2250</a>
         </li>
         <li>
            <label for="Location">Location</label> <br/>
            <a href="https://goo.gl/maps/eYMwkLUwLh3tVrsLA" target="_blank" rel="noreferrer"><FaMapLocationDot/> Calderon St. Subic
                Baliwag, Bulacan</a>
         </li>
            <a href="./ADMIN/Index.html"> Admin</a>
    </ul>
   
</footer>
</html>




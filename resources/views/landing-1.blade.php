<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/landing-page.css">
</head>
<body>
    <div class="container">
        <div class="side-view">
            <a href="#page1"><i class="fas fa-circle"></i></a>
            <a href="#page2"><i class="fas fa-circle"></i></a>
            <a href="#page3"><i class="fas fa-circle"></i></a>
        </div>
        <div class="header-container">
            <div class="title-container">
               <img src="/logo/rectangle.png" alt="" width="100">
            </div>
            <div class="login-link">
                <a href="/login"><button>Login</button></a>
            </div>
        </div>
        <div class="landing-page-1-container landing" id="page1">
            <div class="container-page1 view-image">
                <div class="image-container">
                    <img src="/images/school.png" alt="">
                </div>
            </div>
            <div class="container-page1 below">
                <div class="tilte-page1 tile">
                    <h2>{{ config('app.name') }}</h2>
                </div>
                <div class="content-page1">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam excepturi at delectus molestiae ab minima! Perferendis optio ipsum eaque suscipit earum, distinctio odio tenetur magni odit animi deserunt neque?</p>
                   <a href=""><button>Learn More</button></a>
                </div>
              
                <div class="feature-container">
                    <div class="feature-title">
                        <p>Features</p>
                    </div>
                    <div class="feature-container-content">
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur</li>
                            <li>Lorem ipsum dolor sit amet consectetur</li>
                            <li>Lorem ipsum dolor sit amet consectetur</li>
                            <li>LorLorem ipsum dolor sit amet consecteturem</li>
                        </ul>
                       <a href=""><button>View More</button></a>
                    </div>
                       <div class="socialmedia-title">
                           <p>Social Media</p>
                       </div>
                       <div class="social-media-cont">
                           <a href="#"><i class="fab fa-facebook"></i></a>
                           <a href="#"><i class="fab fa-twitter"></i></a>
                           <a href="#"><i class="fab fa-instagram"></i></a>
                       </div>
                </div>
            </div>
            <div class="container-page1 hide-image">
                <div class="image-container">
                    <img src="/images/school.png" alt="">
                </div>
            </div>
        </div>
        <div class="landing-page-2-container landing" id="page2">
            <div class="container-page2">
                <div class="tilte-page2 tile">
                    <h2>About "Title Name"</h2>
                </div>
                <div class="content-page2">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi aliquid, aliquam sunt dicta dignissimos ducimus aut, ab doloremque maxime laborum dolores ipsa possimus, ex fuga debitis omnis eius minus illum!</p>
                    <a href=""><button>View More</button></a>
                </div>
                <div class="history-container">
                    <div class="history-title">
                        <p>History of "school name"</p>
                    </div>
                    <div class="history-container-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo veritatis excepturi eos, officiis harum aliquid voluptate possimus optio magnam voluptatum, quae, non corrupti aspernatur iusto expedita illo. Dolorum, excepturi culpa.</p>
                        <a href=""><button>View More</button></a>
                    </div>
                </div>
                <div class="founder-container">
                    <div class="founder-title">
                        <p>Founder "name"</p>
                    </div>
                    <div class="founder-container-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus mollitia dolor doloremque impedit perferendis deserunt sint quis voluptates dolorem enim doloribus, aperiam veritatis repudiandae fuga consectetur? Tempore quod itaque tempora.</p>
                        <a href=""><button>View More</button></a>
                    </div>
                </div>
            </div>
            <div class="address-container">
                 <div class="address-title">
                        <p>Address</p>
                 </div>
                <div class="address-name">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe minima quisquam mollitia numquam, atque sit laborum fuga voluptatem! Il
                        lum tenetur sapiente quibusdam voluptates blanditiis natus esse architecto deserunt sint ipsum.</p>
                </div>
                 <div class="address-container-content-map">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="mapsss" width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=tarlaccity&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
                            </div>
                        </div>
                 </div>
            </div>
        </div>
        <div class="landing-page-3-container landing" id="page3">
            <div class="contact-form-container">
                <div class="container-page3">
                    <div class="image-container">
                        <img src="/images/contact.jpg" alt="">
                    </div>
                </div>
                <div class="contact-form-info">
                   <div class="contact-title">
                       <h2>Contact Us</h2>
                   </div>
                   <div class="contact-form-content">
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab harum nobis qui eius similique earum sint eveniet quidem? Explicabo itaque nulla numquam officia ea tenetur voluptas sit, repellendus obcaecati nostrum!</p>
                       <a href=""><button>Read More</button></a>
                    </div>
                   <div class="form-contact">
                        <form action="#">
                            <label for="">Email</label>
                            <input type="email"><br>
                            <div class="hold-input">
                               <div>
                                    <label for="">First Name</label>
                                    <input type="text"><br>
                               </div>
                               <div>
                                <label for="">Last Name</label>
                                <input type="text"><br>
                               </div>
                            </div>
                            <label for="">Message</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                            <button>Submit</button>
                        </form>
                   </div>
                </div>
            </div>
        </div>
       
        <footer>
            <div class="social-media-footer">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="credit">
                <p>&copy;<a href="https://www.facebook.com/System-Makers-106866041736990/">System Makers</a></p>
            </div>
        </footer>
    </div>
</body>
</html>
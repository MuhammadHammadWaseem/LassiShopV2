<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="main-logo.png">
    <title>Lassi Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        section.main-sec {
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        * {
            margin: 0;
            padding: 0;
        }

        section.main-sec .main-box .main-logo-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            row-gap: 30px;
            margin-bottom: 50px;
        }

        section.main-sec .main-box .main-logo-box a {
            color: #BF1E2E;
            font-size: 16px;
            font-weight: 600;
            transition: .3s;
        }

        section.main-sec .main-box .main-logo-box a:hover {
            color: black;
        }

        section.main-sec .main-links-box {
            max-width: 680px;
            display: block;
            margin: auto;
        }

        section.main-sec .main-links-box ul {
            display: flex;
            flex-direction: column;
            row-gap: 30px;
            list-style: none;
        }

        section.main-sec .main-links-box ul li {
            border: 1px solid #D82C3D;
            border-radius: 50px;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0px 5px;
            transition: .3s;
        }

        section.main-sec .main-links-box ul li:hover {
            background-color: #D82C3D;

        }

        section.main-sec .main-links-box ul li a {
            display: flex;
            align-items: center;
            width: 680px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
        }

        section.main-sec .main-links-box ul li:hover a p {
            color: white;
        }

        section.main-sec .main-links-box ul li a p {
            color: #D82C3D;
            text-align: center !important;
            width: 100%;
            transition: .3s;
        }

        section.main-sec .main-links-box ul li a img {
            border: 1px solid #D82C3D;
            width: 50px;
            height: 50px;
            object-fit: none;
            border-radius: 100%;
            transition: .3s;
        }

        section.main-sec .main-links-box ul li:hover a img {
            background-color: white;
        }

        section.main-sec .main-links-box ul li:nth-child(2) a img {
            width: 54.5px;
        }

        @media screen and (max-width: 1024px) {

            section.main-sec .main-box .main-logo-box {
                row-gap: 15px;
                margin-bottom: 30px;
            }

            section.main-sec .main-links-box {
                max-width: 600px;
            }

            section.main-sec .main-links-box ul {
                row-gap: 20px;
            }

        }

        @media screen and (max-width: 767px) {
            section.main-sec .main-links-box {
                max-width: 450px;
            }

            section.main-sec .main-links-box ul li a {
                font-size: 14px;
            }

            section.main-sec .main-links-box ul li a img {
                width: 40px;
                height: 40px;
            }

            section.main-sec .main-links-box ul li:nth-child(2) a img {
                width: 40px;
            }

            section.main-sec .main-links-box ul li {
                height: 50px;
            }

            section.main-sec .main-box .main-logo-box img {
                max-width: 80px;
            }

        }

        @media screen and (max-width: 575px) {

            section.main-sec .main-links-box {
                max-width: 250px;
            }

            section.main-sec .main-links-box ul li a img {
                width: 40px;
                height: 40px;
                transform: scale(0.8);
            }

            section.main-sec .main-links-box ul li a {
                font-size: 13px;
            }

            section.main-sec .main-box .main-logo-box {
                row-gap: 10px;
                margin-bottom: 15px;
            }

            section.main-sec .main-links-box ul {
                row-gap: 15px;
            }

            section.main-sec .main-links-box ul li {
                height: 40px;
            }

            section.main-sec .main-links-box ul li {
                padding: 0px 0px;
            }

            section.main-sec .main-links-box ul li:nth-child(2) a img {
                width: 44.5px !important;
            }

            section.main-sec .main-box .main-logo-box img {
                max-width: 65px;
            }

        }

        section.main-sec .main-links-box ul li:last-child a img {
            /* max-width: 50px !important; */
            /* height: 50px !important; */
            /* width: 60px; */
            object-fit: contain;
        }
    </style>
</head>

<body>

    <section class="main-sec" style="background-image: url({{ asset('images/OnlineSite/main-bg.png') }})">
        <div class="main-box">
            <div class="main-logo-box">
                <img src="{{ asset('images/OnlineSite/main-logo.png') }}" alt="">
                <a href="{{ route('guest.index') }}" target="_blank">@laasishop</a>
            </div>
            <div class="main-links-box">
                <ul>
                    <li><a href="{{ route('guest.index') }}" target="_blank"><img
                                src="{{ asset('images/OnlineSite/website-img.png') }}" alt="">
                            <p>Lassi Shop Website</p>
                        </a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100068905164734&mibextid=LQQJ4d" target="_blank"><img src="{{ asset('images/OnlineSite/facebook.png') }}"
                                alt="">
                            <p>Facebook</p>
                        </a></li>
                    <li><a href="https://www.instagram.com/lassishop_dxb?igsh=MXFjbjMwamRjdGNnZA==" target="_blank"><img src="{{ asset('images/OnlineSite/insta.png') }} "
                                alt="">
                            <p>Instagram</p>
                        </a></li>
                    <li><a href="#" target="_blank"><img src="{{ asset('images/OnlineSite/phone.png') }}"
                                alt="">
                            <p>Contact Us</p>
                        </a></li>
                    <li><a href="https://food.noon.com/outlet/LSSSHPKPGN/" target="_blank"><img
                                src="{{ asset('images/OnlineSite/noon.png') }}" alt="">
                            <p>Noon</p>
                        </a></li>
                    <li><a href="https://www.talabat.com/uae/lassi-shop" target="_blank"><img
                                src="{{ asset('images/talabat.png') }}" alt="">
                            <p>Talabat</p>
                        </a></li>

                </ul>

            </div>

        </div>
    </section>

</body>

</html>

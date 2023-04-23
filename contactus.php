<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="CSS/shared.css" />
    <link rel="stylesheet" href="CSS/contact.css" />
    <title>Netflix</title>
    <link
      rel="icon"
      href="https://1000logos.net/wp-content/uploads/2017/05/Netflix-Logo-2006.png"
      type="image/x-icon"
    />
  </head>

  <body>
    <header>
      <a href="index.html">
        <img
          src="images/Netflix-logo.png"
          alt="Netflix-logo"
          class="netflix_logo"
        />
      </a>
    </header>
    <main>
      <div class="contact_bg"></div>
      <div class="contact_card">
        <div class="contact_form">
          <h2>Contact us</h2>
          <form action="" method="post">
            <label for="fullname">Your Name</label>
            <br />
            <input type="text" placeholder="" name="name" required /><br />
            <br />
            <label for="useremail">Enter Email</label>
            <br />
            <input type="email" placeholder="" name="email" required /> <br />
            <br />
            <label for="useremail">Subject</label> <br />
            <input type="text" placeholder="" name="subject" required /> <br />
            <br />
            <label for="useremail">Your Message</label> <br />
            <textarea
              name="msg"
              id="Message"
              cols="41"
              rows="7"
              name="message"
              required
            ></textarea>
            <br /><br />
          
            <div class="icon">
              <a href="https://www.instagram.com/netflix_in/"
                ><i class="fa fa-instagram"></i
              ></a>
              <a href="https://www.facebook.com/netflix/"
                ><i class="fa fa-facebook"></i
              ></a>
              <a href="https://www.linkedin.com/company/netflix"
                ><i class="fa fa-linkedin"></i
              ></a>
            </div>
            <button class="registerbtn" type="submit">
              <b>Submit</b>
            </button>
            <br />
          </form>
        </div>
      </div>
    </main>
  </body>
</html>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>EasModel.com</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="icons/font-awesome_4-7-0_star_32_8_f15b58_none.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Nunito|Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="vegas/vegas.css">
    <link rel="stylesheet" href="fancybox-master/dist/jquery.fancybox.css">
</head>
<body>
<?php 
    include('includes/header.php');
    if(isset($_SESSION['message'])){
        echo "<div class='topBar'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?>
<style>
    .welcome{
    padding: 30px 40px 50px 40px !important;
    font-family: 'Nunito',sans-serif;
    width: 80%;
    border-radius: 5px !important;
}

.welcome_body{
    font-size: 18px;
    margin-bottom: 20px;
}

.welcome_title{
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
}

.welcome a{
    font-weight: bold;
}

.welcome_name{
    font-weight: bold;
}

.welcome_udemy{
    color: #17AA1C;
    outline: none;
}

.welcome_course{
    color: #f15b58;
}

.welcome_sub{
    font-size: 19px;
    margin-bottom: 20px;
    font-weight: bold;
}

.welcome_list{
    margin-bottom: 20px;
}

.me_img{
    border-radius: 50%;
}

.me{
    float: left;
    width: 12%;
}

.me_about{
    float:left;
    width: 78%;
    box-sizing: border-box;
    margin-left: 50px;
    text-align: justify;
    font-family: 'Nunito',sans-serif;
    font-size: 16px;
}

.random_row{
    width:10%;
    float: left;
}

.random_profile{
    width: 100px;
    height: 100px;
    background-position: 50% 25% !important;
    background-size: cover !important;
    background-color: transparent !important;
    background-repeat: no-repeat !important;
    cursor: pointer;
    border-radius: 50%;
    border: 5px solid #B3B3B3;
}

.random_name{
    font-family: 'Nunito',sans-serif;
    font-size: 14px;  
}

.burger_menu{
    display: none;
    position:fixed;
    width: 60px;
    height: 60px;
    top: 0;
    right: 0;
    background-image: url(../icons/burger.png);
    background-position: center center;
    background-size: 50px 50px;
    background-repeat: no-repeat;
}

.hidden_menu_cross{
    position: absolute;
    width: 60px;
    height: 60px;
    top: 0;
    right: 0;
    background-image: url(../icons/cross-white.png);
    background-position: center center;
    background-size: 30px 30px;
    background-repeat: no-repeat; 
}

.hidden_menu{
    background-color: rgba(54,54,54,.95);
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    right: -100%;
    z-index: 5;
    color: #c9c9c9;
    padding-top: 60px;
 }

 .hidden_signup, .hidden_login, .hidden_home, .hidden_all, .hidden_email{
     width: 80%;
     margin-left: auto;
     margin-right: auto;
     height: 50px;
     font-family: 'Nunito',sans-serif;
     text-align: center;
     display: flex;
     flex-direction: column;
     justify-content: center;
     font-size: 18px;
     margin-bottom: 30px;
     border: 1px solid #fff;
     background-position: 20% center;
     background-size: 25px 25px;
     background-repeat: no-repeat;
}

.hidden_menu_message{
    color: #fff;
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    height: 100px;
    font-family: 'Nunito',sans-serif;
    text-align: center;
    font-size: 15px;
    line-height: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.hidden_signup{
    background-image: url(../icons/signup.png);    
    background-color: #fff;
    color: #636363;
}

.hidden_login{
    background-image: url(../icons/login.png);        
    background-color: transparent;
    color: #fff;    
}

.hidden_home, .hidden_all{
    background-color: transparent;
    color: #fff;    
    border: none;
}

.hidden_home{
    background-image: url(../icons/home.png);  
    background-position: 25% center;          
}

.hidden_all{
    background-image: url(../icons/search-white.png);            
    background-size: 30px 30px;         
    background-position: 15% center;         
}

.hidden_email{
    border: none;
    color: white;
    font-size: 14px;
}

.green_all{
    display:none; 
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    height: 40px;
    padding: 0;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: bold;
    background-color: #27ae60;  
    text-align: center;
    margin-top: 10px;  
    font-weight: bold;
    color: #fff;
    font-family: 'Nunito', sans-serif;
    flex-direction: column;
    justify-content: center;
    border-radius: 3px;
}

@media (min-width:320px) and (max-width:480px){
    .header{
        height: 60px;
    } 
    .logo{
        width: 100%;
        background-color: #f15b58;
    } 
    .logo a, .logo-left{
        color: white;
    }
    .list, .sign, .footer, .feedback{
        display: none;
    }
    .vegas-timer-progress{
        background: white !important;
    }
    .content{
        height: 0;
        padding-bottom: 80%;
    }
    .search{
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 270px;
    }
    .search-inputs{
        flex-direction: column;
        height: 100%;
    }
    .search-text{
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
    }
    
    .input-text{
        height: 40px;
        font-size: 13px;  
        margin-top: 10px;
        margin-bottom: 20px;
        padding-left: 40px;
        border-bottom: 1px solid #ccc;
        background-position: 0px 10px;       
    }
    .search-city{
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        height: 40px;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
    }
    .search-city span{
        font-size: 13px;
        margin-left: 0;
        background-position: 0px 5px;
    }
    .search-submit{
        width: 100%;
        height: 40px;
        text-align: center;
    }
    .search-button{
        width: 90%;
        font-size: 14px;
        border-radius: 3px;
    }
    .burger_menu{
        display: block;
    }
    .all{
        display:none;
    }
    .green_all{
        display: flex;
    }
    .message{
        margin-top: 150px;
        font-size: 16px;
     }
     .search-city ul{
        top: 40px;
        width: 101%;
    }
}
</style>
<!--    ------3.bölüm burada başlıyor!-------->
    <div class="content">
        <div class="message">
            Hayallerini gerçekleştirmen çok kolay.
        </div>
        <div class="search">
            <form method="get" action="search.php">
            <div class="search-inputs">
                <div class="search-text">
                    <input type="text" class="input-text" name="search_text" placeholder="Örn: Figüran, tanıtım elemanı, model..." autofocus >
                </div>
                <div class="search-city">
                    <span>Şehir</span>
                    <ul>
                        <?php 
                            $query_cities = mysqli_query($link,"select * from cities order by is_major desc, name asc");
                            while($fetch_cities = mysqli_fetch_array($query_cities)):
                        ?>
                            <li><label><input type="checkbox" name="city[]" value="<?php echo $fetch_cities['name'] ?>" class="s-check"><?php echo $fetch_cities['name'] ?></label></li>
                        <li>

                        <?php endwhile;?>
                    </ul>
                </div>
                <div class="search-submit">
                    <input type="submit" class="search-button" value="MODEL ARA">
                </div>
            </div>
            </form>
        </div>
        <div class="all">
            <a href="all.php">Tüm Modeller</a>
        </div>
    </div>
    
    <div class="footer">
       <div>
           <a><i class="fa fa-facebook" aria-hidden="true"></i></a>
           <a><i class="fa fa-instagram" aria-hidden="true"></i></a>
           <a><i class="fa fa-twitter" aria-hidden="true"></i></a>
           <a><i class="fa fa-pinterest" aria-hidden="true"></i></a>
           <a><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </div>
    </div>
    
    <a data-fancybox data-src="#feedback_screen" class="feedback">Bize Yazın</a>
    
    <div class="feedback_screen" id="feedback_screen">
    <form id="contact" name="contact" action="#" method="post">
        <div class="give_feedback"><h3>Görüş Bildirin</h3></div>
        <div class="feedback_message">Sitemiz ve tasarımı ile ilgili görüşleriniz bizim için değerlidir.</div>
        <label for="feedback_name" class="feedback_label">Ad Soyad</label>
        <input type="text" id="feedback_name" name="feedback_name" class="txt"  autocomplete="off" value=""/><br />
        <label for="feedback_email" class="feedback_label">E-Posta Adresiniz</label>
        <input type="email" name="feedback_email" id="feedback_email" class="txt" autocomplete="off" value=""/>
        <label for="feedback_text" class="feedback_label">Görüşleriniz</label>
        <textarea name="feedback_text" id="feedback_text" cols="45" rows="8" class="txtarea"></textarea>
        <input class="feedback_send" id="feedback_send" type="submit" value="Gönder">
    </form>
</div> 
      



    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="vegas/vegas.min.js"></script>
  <script src="fancybox-master/dist/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> 
  <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script> 
  <script src="js/jquery.maskedinput.min.js"></script>
  <script src="js/jquery.ui.datepicker-tr.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <script src="http://localhost:8000/socket.io/socket.io.js"></script>
  <script>
        var id = <?php echo $_SESSION['login']; ?>;
        var socket = io.connect('http://localhost:8000');
        socket.on('message',function(data){
          var messagesList = [];
          $.each(data.messages,function(index,message){
            if(message.user_id == id && $.inArray(message.id,messagesList) == -1)
            { messagesList.push(message.id);
            }
          });  
          var counter = messagesList.length;
          var title = " EasModel.com";
          var bubble = $('.bubble');
          if(counter >0){
              bubble.css('visibility','visible');
              if(counter > bubble.html()){
                bubble.slideUp(300,function(){
                    bubble.html(counter);
                    bubble.slideDown(300);
                });
                document.title = "(" + counter + ")" + title;
              }
              if(counter < bubble.html()){
                bubble.html(counter); }
                document.title = "(" + counter + ")" + title;
              }
          else{
            bubble.css('visibility','hidden');
            document.title = title;
          }

        });
  </script> 

</body>
</html>















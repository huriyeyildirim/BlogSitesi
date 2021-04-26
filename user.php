<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<?php 
    require_once('database/config.php');
    $owner_id = $_GET['user'];
    if(empty($owner_id)){
        $_SESSION['message'] = "dsads";
        header("Location: index.php");
        }
    else{
        $owner_user = mysqli_query($link,"select * from users where id = '$owner_id' ");
        if(mysqli_num_rows($owner_user) < 1){
            header("Location: index.php");
        }
        
        else{
            $owner_fetch_user = mysqli_fetch_array($owner_user);
            $owner_info = mysqli_query($link,"select * from infos where user_id = '$owner_id' ");
            $owner_photo = mysqli_query($link,"select * from photos where user_id = '$owner_id' ");
            $owner_profile = mysqli_query($link,"select * from photos where user_id = '$owner_id' and is_profile = 1 ");
            
            $owner_fetch_info = mysqli_fetch_array($owner_info);
            $owner_fetch_photo = mysqli_fetch_array($owner_photo);
            $owner_fetch_profile = mysqli_fetch_array($owner_profile);              
        }
        
    }
 ?>

<title><?php echo $owner_fetch_user['name'] ?> | EasModel.com</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="icons/font-awesome_4-7-0_star_32_8_f15b58_none.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Nunito|Open+Sans|Roboto|Raleway|Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="fancybox-master/dist/jquery.fancybox.css">
    <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="css/dropzone.css" rel="stylesheet">
</head>
<body>
<?php 
    include('includes/header.php');

    if(isset($_SESSION['message'])){
        if(isset($_SESSION['message_type'])){
            $color = $_SESSION['message_type'];
            echo "<div class='topBar $color'>".$_SESSION['message']."</div>";
            unset($_SESSION['message_type']);
        }
       else{
           echo "<div class='topBar'>".$_SESSION['message']."</div>";
       }
        unset($_SESSION['message']);
    }
?>
	<div class="profile_photo">
		<div class="profile_square">
        	<div class="circle_wrapper">
            	<a class="fancy_update" data-fancybox data-src="<?php checkPhoto($owner_fetch_profile['path'],$owner_fetch_info['gender']) ?>">
                	<div class="profile_circle" style="background-image:url(<?php checkPhoto($owner_fetch_profile['path'],$owner_fetch_info['gender']) ?>)">
                		<div class="circle_footer"><i class="fa fa-camera" aria-hidden="true"></i>Güncelle</div>
            		</div>
                </a>
            </div>
        </div>
    </div>
    <div class="profile_name">
        <?php echo $owner_fetch_user['name']; ?>    
    </div>
    <div class="profile_city">
    	<i class="fa fa-map-marker" aria-hidden="true"></i><?php checkInfo($owner_fetch_info['location']); ?>
    </div>
    
    <div class="send_wrapper">
        <a class="send_link" data-fancybox data-src="#send">İstek Gönder</a>
    </div>
<style>
    .send_wrapper{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    height: 50px;
    margin-bottom: 10px;
}

.send_link{
    width: 200px;
    height: 50px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background-color: #ee3c39;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    font-family: 'Raleway',sans-serif;
    font-size: 15px;
    color: white;
    cursor: pointer;
}

.send_link:hover{
    background-color: #c0392b;
}

.send{
    display: none;
    padding-top: 30px !important;
    padding-bottom: 20px !important;
    width: 480px;
    letter-spacing: 1.2px;
}

.send_header{
    height: 50px;
}

.send_circle{
    width: 40px;
    height: 40px;
    display: inline-block;
    float: left;
    margin-right: 10px;
    background-position: 50% 25% !important;
    background-size: cover !important;
    background-color: transparent !important;
    background-repeat: no-repeat !important;
    border-radius: 50%;
    cursor: pointer;
}

.send_name{
    height: 40px;
    box-sizing: border-box;
    display: inline-block;
    float: left;
    padding: 10px 20px 10px 20px;
    background-color: #dfdfdf;
    border: none;
    outline: none;
    font-family: 'Raleway',sans-serif;
    font-size:15px;
    letter-spacing: normal;
    border-radius: 10px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.send_name:hover{
    background-color: #bdbdbd;    
}
.name_circle{
    width: 20px;
    height: 20px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
    margin-left: 15px;
    text-align: center;
    position: relative;
    cursor: pointer;
}

.name_line{
    width: 50%;
    height: 3px;
    background-color: red;
    position: absolute;
    left: 25%;
    top: 46%;
}

.send_area{
    resize: vertical;
    width: 400px;
    height: 150px;
    border: 1px solid #dfdfdf;
    margin-top: 10px;
    outline: none;
    min-height: 100px;
    max-height: 400px;
    font-size: 14px;
    padding-left: 10px;
    padding-top: 5px;
    font-family: 'Raleway', sans-serif;

}

.send_area:focus, .send_firm:focus, .send_phone:focus{
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
}

.send_firm{
    width: 400px;
    height: 30px;
    margin-top: 20px;
    outline: none;
    border: 1px solid #dfdfdf;
    padding-left: 10px;
    font-size: 14px;
    font-family: 'Raleway', sans-serif;
}

.send_phone{
    width: 400px;
    height: 30px;
    margin-top: 3px;
    outline: none;
    border: 1px solid #dfdfdf;
    padding-left: 10px;
    font-size: 14px;
    font-family: 'Nunito', sans-serif;
}

.send_phone::-webkit-input-placeholder { 
  font-family: 'Raleway',sans-serif;
}
.send_phone::-moz-placeholder { 
  font-family: 'Raleway',sans-serif;
}
.send_phone:-ms-input-placeholder {
  font-family: 'Raleway',sans-serif;
}
.send_phone:-moz-placeholder {
  font-family: 'Raleway',sans-serif;
}

.send_button{
    font-family: 'Raleway',sans-serif;
    width: 150px;
    background-color: #27ae60;
    padding: 10px 0;
    outline: none;
    border: none;
    text-align: center;
    color: #fff;
    letter-spacing: 1.2px;
    margin-top: 20px;
    margin-right: 20px;
    float: right;
    cursor: pointer;
}

.send_button:hover{
    background-color: #219251;
}

.send_phone_info{
    font-family: 'Raleway',sans-serif;
    color: red;
    font-size: 10px;
    margin-top: 10px;
    letter-spacing: 1px;
}


</style>
    <div class="about_me">
       <blockquote>
            <?php checkAboutUser($owner_fetch_info['about']); ?>
        </blockquote>
    </div>
    
    
    <div class="action_bar">
    	<div class="action_middle">
        	<div class="action_left action_active">Hakkında</div>
            <div class="action_right">Fotoğraflar</div>
            <div class="clearboth"></div>
        </div>
    
    <div class="about display_active">
    	<div class="col1">
        	<ul>
            	<li><i class="fa fa-user-o" aria-hidden="true"></i><?php echo $owner_fetch_user['name'];?></li>
                <li><i class="fa <?php checkGenderIcon($owner_fetch_info['gender']); ?>" aria-hidden="true"></i><?php checkGender($owner_fetch_info['gender'])?></li>
                <li><i class="fa fa-birthday-cake" aria-hidden="true"></i><?php checkBirth($owner_fetch_info['birth_date'])?></li>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php checkInfo($owner_fetch_info['location'])?></li>
            </ul>
        </div>
        <div class="col2">
        	<ul>
            	<li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $owner_fetch_user['email'];?></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i><?php checkInfo($owner_fetch_info['phone_number'])?></li>
                <li><i class="fa fa-facebook" aria-hidden="true"></i><?php checkFacebook($owner_fetch_info['facebook_link'])?></li>
                <li><i class="fa fa-instagram" aria-hidden="true"></i><?php checkInstagram($owner_fetch_info['instagram_link'])?></li>
            </ul>
        </div>
        <div class="col3">
        	<ul>
                <li><i class="fa fa-arrows-v" aria-hidden="true"></i><?php checkInfo($owner_fetch_info['height'])?></li>
                <li><i class="fa fa-arrows-h" aria-hidden="true"></i><?php checkInfo($owner_fetch_info['weight'])?></li>
                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><?php checkInfo($owner_fetch_info['education'])?></li>
                <li><i class="fa fa-bullseye" aria-hidden="true"></i><?php checkViews(1)?></li>
        	</ul>
        </div>
    </div>

    
    <div class="photos">
        <?php  
            if(mysqli_num_rows($owner_photo)>0):         ?>
        <div class="slider-wrapper">
            <div class="slider">
                <?php 
                    $owner_fetch_photo = mysqli_fetch_array($owner_photo);
                    while($owner_fetch_photo = mysqli_fetch_array($owner_photo)):
                ?>
            <a data-fancybox="photos_gallery" data-src="<?php echo $owner_fetch_photo['path'] ?>" class="fancy_photo">
              <div class="slide">
                  <div class="slider_item" style="background:url(<?php echo $owner_fetch_photo['path'] ?>)">
                      <div class="black_screen"></div>
                  </div>
              </div>
            </a>
        <?php
                endwhile;
            else: 
        ?>
        
        <div class='noPhotoFound noPhotoCarousel'>Henüz fotoğraf yok.</div>
        
        <?php 
            endif;
        ?>
            </div> 
        </div> 

    </div>

     </div>

     <div id="send" class="send">
    <form name="form_send" id="form_send" action="controls/send-message.php" method="post">
       <div class="send_header">
            <div class="send_circle" style="background:url(<?php echo $owner_fetch_profile['path'] ?>)"></div>
            <a href="#" class="send_name"><?php echo $owner_fetch_user['name']; ?><div class="name_circle" title="İptal et"><div class="name_line"></div></div></a>
        </div>
        
        <div class="input_firm">
            <input type="text" name="send_firm" id="send_firm" placeholder="Firma Adı" spellcheck="false" class="send_firm" value="Local Ajans">   
        </div>
        <div class="input_text_wrapper">
            <textarea name="send_text" id="send_text" placeholder="Bir şeyler yaz." spellcheck="false" class="send_area">Merhaba, İzmir'de Local Ajans adıyla faaliyet göstermekteyiz. Profiliniz insan kaynakları yetkililerimizce incelenmiş olup, firmamızın sizinle çalışmak istediğini bildiririz. Bıraktığımız iletişim numarası üzerinden yetkili personelle görüşebilirsiniz. Esenlikler..</textarea>   
        </div>
        <div class="send_phone_info">Bu bilgi üyemiz tarafından görülecektir.</div>
        <div class="input_phone">
            <input type="text" name="send_phone" id="send_phone" placeholder="Telefon Numarası" spellcheck="false" class="send_phone" value="2321234567">   
        </div>
        <input type="hidden" name="user_id" value="<?php echo $owner_id ?>"> 
        <input type="submit" value="Gönder" class="send_button">
    </form>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="vegas/vegas.min.js"></script>
    <script src="fancybox-master/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/jquery.ui.datepicker-tr.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="js/dropzone.js"></script>


</body>
</html>
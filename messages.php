<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Mesajlarım | EasModel.com</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="icons/font-awesome_4-7-0_star_32_8_f15b58_none.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Nunito|Open+Sans|Roboto|Raleway|Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="fancybox-master/dist/jquery.fancybox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
</head>

<body style="background-color: #e9ebee;">

<?php 
    include('includes/header.php');
    $user_id = $_SESSION['login'];
    $messages_query = mysqli_query($link, "select * from messages where user_id = '$user_id' order by is_read asc, date desc");
?>  
<style>
    .user_row_wrapper{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    background-color: #fff;
    margin-top: 10px;
}

.user_row{
    height: 120px;
    border-bottom: 1px solid #ccc;
    padding: 15px 20px;
    font-family: 'Raleway',sans-serif;
    padding-bottom: 10px;
}

.user_row a{
    color: #fff;
}
.all_profile{
    display: inline-block;
    float: left;
    width: 100px;
    height: 100px;
    background-position: 50% 25% !important;
    background-size: cover !important;
    background-color: transparent !important;
    background-repeat: no-repeat !important;
    cursor: pointer;
/*    border-radius: 50%;*/
}

.all_name_and_location{
    display: inline-block;
    float: left;
    height: 100px;
    margin-left: 20px;
}

.all_look{
    float:right;
    font-family: 'Raleway',sans-serif;
    width: 150px;
    height: 20px;
    background-color: #27ae60;
    padding: 7px 0;
    margin-top: 10px;
    outline: none;
    border: none;
    text-align: center;
    letter-spacing: 1.2px;
    margin-right: 20px;
    float: right;
    cursor: pointer;
    font-size: 15px;
}

.all_look:hover{
    background-color: #219251;
}

.all_name{
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
    height: 40px;
    color: black;
    font-size: 18px;
    font-family: 'Nunito',sans-serif;
}

.all_name:hover{
    text-decoration: underline;
}

.all_location{
    color: #f15b58;
    font-size: 16px;
    font-weight: bold;
}

.parameters{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
    background: #fff;
    padding: 10px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.parameter{
    display: inline-block;
    background: #eee;
    position: relative;
    color: #666;
    font-size: 12px;
    margin: 0 0 4px 4px;
    padding: 7px 35px 7px 10px;
    border-radius: 3px;
    font-family: 'Arimo',sans-serif;
    height: 29px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    cursor: pointer;
}

.parameter_close{
    position: absolute;
    top: 35%;
    right: 6px;
    margin-top: -5.5px;
    background: #f15b58;
    padding: 2px 4px;
    border-radius: 4px;
    color: #fff;
    width: 10px;
    height: 15px;
    text-align: center;
    float: right;
    font-size: 10px;
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
}

.no_results_search{
    padding: 20px;
    text-align: center;
    margin-top: 50px;
    font-size: 18px;
    font-family: 'Nunito',sans-serif;
    color: #959595;
    -webkit-box-shadow: 2px 2px 4px 0 #dfdfdf;
    box-shadow: 2px 2px 4px 0 #dfdfdf;
    letter-spacing: normal;
}

.ajax_load{
    display: none;
    position: absolute;
    bottom: 10px;
    left: 50%;
    width: 50px;
    height: 50px;
    background-image: url('../icons/loading.gif') !important;
    background-size: 45px 45px;
    background-position: center;
    background-repeat: no-repeat;
}

.no_more_results{
    padding: 15px;
    text-align: center;
    font-size: 15px;
    font-family: 'Nunito',sans-serif;
    color: #959595;
    -webkit-box-shadow: 2px 2px 4px 0 #dfdfdf;
    box-shadow: 2px 2px 4px 0 #dfdfdf;
    letter-spacing: normal;   
}

.display_none{
    display: none;
}

.unread{
    background-color: #fa3e3e;
    float: right;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    position: absolute;    
    right: 15px;
    top: 33px;
}

.message_row{
    position: relative;
    height: 100px;
    background-color: #fff;
    margin-top: 10px;
}

.message_body{
    font-size: 15px;
    width: 42%;
    float: left;
    text-align: justify;
}

.messages_left{
    width:30%;
}

.message_look{
    width: 15%;
}

.message_row_wrapper{
    background-color: #e9ebee;
}

.no_results_message{
    background-color: #fff;
}

.fancy_message{
    padding: 35px !important;
    width: 50%;
    font-family: 'Raleway',sans-serif;
}

.fancy_message_row{
    height: 30px;
    margin-bottom: 10px;
}


.fancy_message_row:nth-child(1) .fmr-right{
    font-weight: bold;
}

.fancy_message_row:nth-child(3){
    height: auto;
}

.fmr-left{
    float: left;
    width: 20%;
    color: #f15b58;
}

.fmr-right{ 
    float: right;    
    width: 80%;
}

.clear_both{
    clear:both;
}
</style>
<div class="all_middle">

<div class="user_row_wrapper message_row_wrapper">
<?php 
    if(mysqli_num_rows($messages_query) < 1):     
?>
<div class="no_results_search no_results_message">Henüz mesajınız yok.</div>
    <?php 
        else:
        while($messages_fetch = mysqli_fetch_array($messages_query)): 
    ?>
    <div class="user_row message_row">
        <div class="all_name_and_location messages_left">
            <a href="#"><div class="all_name"><?php echo $messages_fetch['firm_name'] ?></div></a>
            <div class="all_location"><?php echo date("d.m.Y - h.m.s", strtotime($messages_fetch['date']))?></div>
        </div>
        <div class="message_body"><?php echo str_replace('"', "'",substr($messages_fetch['message'],0,150) )."..."; ?></div>
        <?php if($messages_fetch['is_read'] == 0):?>
            <div class="unread" title="Yeni"></div>
        <?php endif;?>
        <a data-fancybox data-src="#message<?php echo $messages_fetch['id']?>"><div class="all_look message_look" id="<?php echo $messages_fetch['id'] ?>">Mesajı Gör</div></a>
    </div>
    <div id="message<?php echo $messages_fetch['id'] ?>" class="fancy_message display_none">
        <div class="fancy_message_row">
            <div class="fmr-left">Firma Adı:</div>
            <div class="fmr-right"><?php echo $messages_fetch['firm_name']; ?></div>
            <div class="clear_both"></div>
        </div>
        <div class="fancy_message_row">
            <div class="fmr-left">Firma İletişim:</div>
            <div class="fmr-right"><?php echo $messages_fetch['firm_phone']; ?></div>
            <div class="clear_both"></div>
        </div>
        <div class="fancy_message_row">
            <div class="fmr-left">Mesaj:</div>
            <div class="fmr-right"><?php echo str_replace('"', "'", $messages_fetch['message']); ?></div>
            <div class="clear_both"></div>
        </div>
        <div class="fancy_message_row">
            <div class="fmr-left">Tarih:</div>
            <div class="fmr-right"><?php echo  date("d.m.Y - h.m.s", strtotime($messages_fetch['date'])) ?></div>
            <div class="clear_both"></div>
        </div>
    </div>
        <?php endwhile;?>
<?php 
    endif;
?>

</div>   
    
</div>




                           
        <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="vegas/vegas.min.js"></script>
    <script src="fancybox-master/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="http://localhost:8000/socket.io/socket.io.js"></script>
    <script>
        var id = <?php echo $_SESSION['login']; ?>;
        var socket = io.connect('http://localhost:8000');
        socket.on('message',function(data){
          var messagesList = [];
          $.each(data.messages,function(index,message){
            if(message.user_id == id && $.inArray(message.id,messagesList) == -1) 
            {messagesList.push(message.id);}
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
                bubble.html(counter);}
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
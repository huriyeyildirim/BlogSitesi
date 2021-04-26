<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Arama Sonuçları | EasModel.com</title>
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
    $all_users_query = mysqli_query($link, "select * from users order by id asc limit 0,8");
?>

<div class="all_middle">

<div class="user_row_wrapper">
<?php 
    while($all_users_fetch = mysqli_fetch_array($all_users_query)):
?>
    <?php $all_user_id = $all_users_fetch['id']; ?>       
    <div class="user_row" id="<?php echo $all_user_id ?>">
    <?php
        $all_profile_query = mysqli_query($link, "select * from photos where user_id = '$all_user_id' and is_profile = 1 ");
        $all_info_query = mysqli_query($link, "select * from infos where user_id = '$all_user_id'");
        $all_profile_fetch = mysqli_fetch_array($all_profile_query);
        $all_info_fetch = mysqli_fetch_array($all_info_query);
        ?>
        <a href="user.php?user=<?php echo $all_user_id ?>"><div class="all_profile" style="background-image:url(    <?php echo checkPhoto($all_profile_fetch['path'],$all_info_fetch['gender']) ?>)"></div></a>
        <div class="all_name_and_location">
            <a href="user.php?user=<?php echo $all_user_id ?>"><div class="all_name"><?php echo $all_users_fetch['name'] ?></div></a>
            <div class="all_location"><?php echo $all_info_fetch['location'] ?></div>
        </div>
        <a href="user.php?user=<?php echo $all_user_id ?>"><div class="all_look">Profili Gör</div></a>
    </div>
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




    </style>
<?php 
    endwhile;
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
    <script type="text/javascript">
       
        var is_loading = false;
        $(window).scroll(function() {        
            if($(window).scrollTop() + $(window).height() + 1 >= $(document).height()) {
                var last_id = $(".user_row:last").attr("id");
                if(is_loading == false) {
                    is_loading = true;
                    loadMoreData(last_id);
                }
            }      
        });

        function loadMoreData(last_id){
            $.ajax(
                {
                    url: 'controls/load-more-data.php?last_id=' + last_id,
                    type: "get"
                })
                .done(function(data)
                {
                    html = $(data);
                    html.appendTo(".user_row_wrapper").hide().fadeIn(1500);
                    is_loading = false;
                })
        }
    </script>
   
</body>
</html>
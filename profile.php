<?php 
    session_start();
?>
 <?php
        if  ($_SESSION['id'] == "") {
         echo "the page is unavailable";
        }else {
   
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/img/fav_ico.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<link rel="stylesheet" href="https://use.typekit.net/hph2pnz.css">
    <title>Профиль</title>
</head>
<style>
    .content__item {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    counter-increment: itemcounter;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
}

.content__item::before {
    color: var(--color-number);
    position: absolute;
    top: 0;
    left: 0;
    content: counters(itemcounter, ".", decimal-leading-zero);
}
</style>
<body style="background:#F2F2F2 "
     <canvas id="canvas" style="position: absolute; z-index: -1 !important" ></canvas>
    <header class="header">
		<div class="container3 header-container">
			<a class="logo">
				<img src="img/logo.png"  style="max-width: 65px; transform: rotate(90deg); " alt="Inso logo">
			</a>
			<div style="" class="link-head-box">
			    <div style="margin-top:25px;font-weight: 400">
			        <a href="posts.php" class="link-head" style="margin-left: 30px">Искусство</a>
				    <a href="posts.php" class="link-head" style="margin-left: 30px">Финансы</a>
					<a href="posts.php" class="link-head" style="margin-left: 30px">Одежда</a>
					<a href="posts.php" class="link-head" style="margin-left: 30px">Технологии</a>
					<a href="posts.php" class="link-head" style="margin-left: 30px">Музыка</a>
					<a href="posts.php" class="link-head" style="margin-left: 30px">Игры</a>
					<a href="posts.php" class="link-head" style="margin-left: 30px">Прочее</a>
					</div>
			</div>
			
			<div class="menu-dek" style="margin-top: 0px;">
            <?php if ($_SESSION['id'] != "") {
                                  
            $connect = mysqli_connect("j41406569.myjino.ru","j41406569","nikitka20041616","j41406569");
        $text_query = "SELECT * FROM users WHERE id = '{$_SESSION['id']}'";
        $text_query2 = "SELECT * FROM posts WHERE userid =  '{$_SESSION['id']}'";  
         $text_query3 = "SELECT * FROM suggests WHERE userid =  '{$_SESSION['id']}'";
         $text_query4 = "SELECT * FROM goals WHERE userid =  '{$_SESSION['id']}'";
        $query = mysqli_query($connect, $text_query);
        $con = mysqli_query($connect, $text_query2);  
         $con2 = mysqli_query($connect, $text_query2); 
         $con3 = mysqli_query($connect, $text_query3);  
         $con4 = mysqli_query($connect, $text_query4);  
            $user = $query->fetch_assoc();
            $result = $con->fetch_assoc();
            $userproj =  $con2->fetch_assoc(); 
            $suggestproj =  $con3->fetch_assoc(); 
            $goals = $con4->fetch_assoc();
            };
            ?>
                                   
				<div class="menu-dek" style="margin-top: 0px;">
				 <?php
                            if  ($_SESSION['id'] = $user["id"]) {
                            
                ?>  
				
				
				<a href="#" class="link-profile">Профиль</a>
				
				<a href="php/exit.php"><button class="header-btn header-btn-ex">Выйти</button></a>
				<?php
                      }else {
                       
                ?>
                	
				<a href="#" class="link-profile">Профиль</a>
				<a href="php/exit.php"><button class="header-btn header-btn-ex">Выйти</button></a>
				<?php }; ?>
				</div>
			</div>
		</div>
	</header>
	<main>
	  <section class="profile">
    <div class="profile-container" id="events" style="display: block; background-color: ;">
      
      <div style="background-color: white; -webkit-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
      -moz-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
      box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); max-width: 1748px;  padding-bottom: 40px; border-radius: 15px">

        <div style="" class="profile-boxx" >
          <div style="background-color: ;  width: 350px; ">
       
            
                    
                     
              <li class="profile-card">
                
                <div style="background-image: url('<?php echo $user["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 240px; "> 
              
                            </div>
                            <div style="height: 30px; width: 30px;"></div>
                <p class="profile-name">
                   <?php echo $user["name"]; echo " ";  echo $user["surname"]?>
                
                </p>
                <p class="profile-descr" >
                    2,7 млн подписчиков
                 
                </p>
                <p class="profile-descr" >
                  Зарегистрирован с 17.03.2015
               
              </p>
            </li>   
            
            
  
          
          </div>
          <div  class="about" style="margin-top: 54px;">

            <li class="profile-card">
                
              
              <p class="profile-name" style="margin-top: 10px;">
                О себе: 
            
              </p>
              <?php
               if ($user["work"] == '' and $user["description"] == '' and $user["skills"] == ''){
                   
               ?>   
               <p class="profile-descr" style="margin-top: 40px;" >
              Добавьте информацию о себе в настройках
           
            </p>
               
              <?php };  ?> 
              
              
           
              <?php
              
              if ($user["work"] != ''){
                  
              ?>
              <p class="profile-descr" style="margin-top: 40px;" >
              Место работы: <?php echo $user["work"]?>
           
            </p>
              <?php }; ?>
              <?php
               if ($user["description"] != ''){
                  
              ?>
              <p class="profile-descr" style="margin-top: 40px;" >
              Описание: <?php echo $user["description"]?>
           
            </p>
              <?php }; ?>
             <?php
               if ($user["skills"] != ''){
                  
              ?>
              <p class="profile-descr" style="margin-top: 40px;" >
              Навыки:  <?php echo $user["skills"]?>
           
            </p>
              <?php }; ?>
              
            
          <p class="profile-descr" style="margin-top: 40px;" >
             Теги: #музыка #игры
         
        </p>
        <a href="login/updater.php" class="menu-link link"><p class="profile-name-set" style="margin-top: 10px;">
                 Настройки профиля
               
              </p></a>
              <a href="php/exit.php"><button class="header-btn ex-2" style="border: solid red; color: red;height: 54px;">Выйти</button></a>
          </li> 
          </div>
          <div class="settings-profile"  style="margin-top: 54px;">
            <li class="profile-card">
                
             
              <p class="profile-name" style="margin-top: 10px;">
                Настройки
              
              </p>
               <p class="profile-descr" style="margin-top: 40px; color: #FF4040" >
                Подтверждение аккаунта
           
                </p>
              <a href="login/updater.php" class="menu-link link"><p class="profile-descr" style="margin-top: 10px;">
                 Настройки профиля
               
              </p></a>
              <p class="profile-descr" style="margin-top: 10px;" >
                Кошельки
             
            </p>
            
          
          </li> </div>
        </div>
        
      
      </div>
      <div style="  margin-top: 40px; height: 770px; max-width: 100%; padding-top:15px; ">
          <?php 
            if ($userproj["userid"] != ""){
            
          ?>
        <h3 class="service-subtitle" style="font-size: 24px; ">
            Проект
          </h3>
<li class="service-item" style="-webkit-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
        box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); background-color: white;
border-radius:15px;">
          <h2 class="service-subtitle" style="font-size: 24px; ">
            <?php echo $userproj["name"]; ?>
          </h2>
          <p class="service-descr" style="font-size: 18px;">
            Автор: <?php echo $userproj["author"]; ?>
         
        </p>
        <div style="max-width: 1400px;">
          <div style="background-color: ; height: 300px; max-width: 1300px; display: grid;
          gap: 30px;
          grid-template-columns: repeat(3, 1fr);">
          
            <div style="background-image: url('<?php echo $userproj["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 100%; "> 
        
            </div>
            <div style="background-image: url('<?php echo $userproj["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 100% ; "> 
        
            </div>
            <div style="background-image: url('<?php echo $userproj["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 100% ; "> 
        
            </div>
          
          </div>
        </div>
          
          <div style="height: 30px; width: 30px;"></div>
          <p class="service-place">
              Описание: <?php echo $userproj["description"]; ?>
         
          </p>
           <p class="service-place" style="margin-top:30px">
               
              Собрано: <?php  echo $userproj["collected"];?> из <?php  echo $userproj["target"];?>
             </p>
              <div class="" style="border-radius: 30px">
                       
                      <?php
                         $per = $userproj["collected"]/($userproj["target"]/100);
                         
                      ?>
                              <div id="myBar" class="w3-container w3" style="height:24px;width:<?php echo $per; ?>%; background-color: 
                              <?php
                              
                              if ($per == 0){
                                  
                               ?> 
                                
                               <?php
                              } else {
                              ?>
                              #FF4040
                              
                              
                              
                              <?php
                              
                              };
                              
                              ?>
                              ; border-radius: 30px" ></div>
                              <p class="service-descr" style="font-size: 15px">
                         
         
                        </p>
                          
                        
         
          <p class="service-descr" >
            Теги: #музыка #игры
         
        </p>
         

                 
                  
        </li>
    
    <?php
            if($goals["id"] != ''){
              
                
            ?>
            
            
            
            
            
             <h4 class="service-subtitle" style="color: #1f1f1f; margin-bottom: 35px; padding-top: 40px; font-size: 24px;">
	       	Цели
        	</h4>
            <li class="service-item" style="-webkit-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
        box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); background-color: white;
border-radius:15px;">
          <h2 class="service-subtitle" style="font-size: 24px; ">
            <?php echo $goals["name"]; ?>
          </h2>
          <p class="service-descr" style="font-size: 18px;">
            Автор: <?php echo $goals["author"]; ?>
         
        </p>
        <div style="max-width: 1400px;">
          <div style="background-color: ; height: 300px; max-width: 1300px; display: grid;
          gap: 30px;
          grid-template-columns: repeat(3, 1fr);">
          
            <div style="background-image: url('<?php echo $goals["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 100%; "> 
        
            </div>
            <div style="background-image: url('<?php echo $goals["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 100% ; "> 
        
            </div>
            <div style="background-image: url('<?php echo $goals["img"]; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 240px; width: 100% ; "> 
        
            </div>
          
          </div>
        </div>
          
          <div style="height: 30px; width: 30px;"></div>
          <p class="service-place">
              Описание: <?php echo $goals["description"]; ?>
         
          </p>
           <p class="service-place" style="margin-top:30px">
               
              Собрано: <?php  echo $goals["collected"];?> из <?php  echo $goals["target"];?>
             </p>
              <div class="" style="border-radius: 30px">
                       
                      <?php
                         $per = $goals["collected"]/($goals["target"]/100);
                         
                      ?>
                              <div id="myBar" class="w3-container w3" style="height:12px;width:<?php echo $per; ?>%; background-color: 
                              <?php
                              
                              if ($per == 0){
                                  
                               ?> 
                                
                               <?php
                              } else {
                              ?>
                              #FF4040
                              
                              
                              
                              <?php
                              
                              };
                              
                              ?>
                              ; border-radius: 30px" ></div>
                              <p class="service-descr" style="font-size: 15px">
                         
         
                        </p>
                          
                        
         
          <p class="service-descr" >
            Теги: #музыка #игры
         
        </p>
         

                 
                  <form method="POST">
                      <?php  
            
                if($_SESSION['id'] != $goals["userid"]){
                    
               
            ?>
                      
            
          <?php };  ?> 
          
          </form>
        </li>
            <?php } else{
                
            
            
            ?>
            <h3 class="service-subtitle" style="font-size: 24px;padding-top: 50px ">
            Цели
          </h3>
             <div style='background-color: white; -webkit-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
                -moz-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); 
            box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);padding-bottom: 50px; max-width: 100%; padding-left: 20px;padding-right: 10px; padding-top: 20px;  border-radius: 15px'>
            <h4 class="service-title" style="color: #1f1f1f; margin-bottom: 35px;">
	       	Пока нет целей
        	</h4>
        	<p class="service-place"> Добавьте цели, чтобы выложить ваш проект на доску</p>
        	<p class="service-place">Это нужно для того, чтобы инвесторы видели то, куда уйдут собранные средства</p>
        	<p class="service-place">Сумма сбора будет прибавляться к общей сумме</p>
            <a href="login/addgoal.php"><button class="header-btn header-btn-ex" style="margin-top: 20px">Добавить цель</button></a>
            </div>
            <?php
            };
            ?>
    
  
    
    <?php 
    }else{
            if ($suggestproj['userid'] != ''){
                
    ?>
         <div style='background-color: white; -webkit-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
      -moz-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); 
      box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); height: ; max-width: 100%; padding-left: 20px;padding-right: 10px; padding-top: 20px;  border-radius: 15px'>
    <div style="display: flex">
    <h4 class="service-title" style="color: #1f1f1f; margin-bottom: 40px">
		Ваш Проект  находится на рассмотрении
	</h4>
	
	
    </div>
    </div>
    
    
    
    <?php }else { ?>   
    <div style='background-color: white; -webkit-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2);
      -moz-box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); 
      box-shadow: 1px 1px 4px 0px rgba(34, 60, 80, 0.2); height: 200px; max-width: 100%; padding-left: 20px;padding-right: 10px; padding-top: 20px;  border-radius: 15px'>
    <h4 class="service-title" style="color: #1f1f1f;">
		Пока ничего нет
	</h4>
    <a href="login/addproject.php"><button class="header-btn header-btn-ex">Начать проект</button></a>
    </div>
    <?php
    };
    };
    
    ?>
    </div>
     
    </div>
  </section>  
	    
		
		
	
	</main>
</body>
<script>



</script>
</html>
<?php }; ?>
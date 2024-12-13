<?php

  include "../../database-manipulation/database-connection.php";
  include "./updated.php";
//   include "../../pages/index.php";

//----check the request method
  if ($_SERVER["REQUEST_METHOD"] === "GET"){
    $id = $_GET["id"];

  //get the selcted activity id from the data base
    $res = $pdo->prepare("SELECT * FROM members  WHERE id_member = :id ");
    $res->bindParam(':id',$id,PDO::PARAM_STR);
    $res->execute();
   
  }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <title>Systeme de gesttion de salle de sport</title>
</head>
<body class="relative">
    
<header class="h-[20%] bg-gray-600 py-2">
    <div class="flex items-center justify-center py-2">
        <h4 class="text-blue-500 font-extrabold text-[1.2rem]">GYM<span class="text-white">/PRO</span>
        </h4>
    </div>
</header>

<section class="hero w-full h-[80vh] flex flex-col justify-center items-center text-white gap-2">
    <h3 class="text-md uppercase">
        YOUR FREINDLLY GYM SOLUTION
    </h3>
    <h1 class="text-5xl uppercase font-bold">
        Welcome to GYM/PRO
    </h1>

</section>



<section class="modal w-full h-[88.8vh] p-[50px] fixed z-10 top-10">
  <div class="relative bg-gray-600 w-[450px] rounded-md text-white mx-auto flex flex-col justify-center items-center py-4 shadow-md shadow-gray-400">
  <h2 class="text-center text-lg font-bold uppercase border-b pb-2 pt-5">Enter your informations</h2>
  <?php foreach($res as $member){?>
  <form action="updated.php?id=<?php echo $member["id_member"]; ?>" method="POST" class="flex flex-col gap-1 px-5 my-5">
   
    <div class="flex w-full gap-2">
        
       <div  class="flex flex-col flex-1">
        <label for="firstname" class=" text-md">first name</label>
        <input value="<?php echo $member["nom"] ;?>" type="text" name="firstname" class="bg-gray-500 px-2 rounded-md h-[30px]">
       </div>

       <div class="flex flex-col flex-1">
         <label for="lastname" class=" text-md">last name</label>
         <input value="<?php echo $member["prenom"] ;?>" type="text" name="lastname" class="bg-gray-500 px-2 rounded-md h-[30px]">
       </div>
    </div>
    
    <label for="email" class=" text-md">email</label>
    <input value="<?php echo $member["email"] ;?>" type="text" name="email" class="bg-gray-500 px-2 rounded-md h-[30px]">
    
    <label for="phone" class=" text-md">phone number</label>
    <input value="<?php echo $member["telephone"];?>" type="text" name="phone" class="bg-gray-500 px-2 rounded-md h-[30px]">

    <button type="submit" id="subbutton" class="bg-green-500 rounded-md mt-5 text-white py-1 px-4 mx-auto" >Update</button>
</form>
<?php } ?> 
</section>




<script src="../assets/js/script.js"></script>
</body>
</html>
<?php
  include "../assets/php/fetchdb.php";
  include "../database-manipulation/database-connection.php";

  if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $delete = $pdo->prepare("DELETE FROM members WHERE id_member = :id_member");
        $delete->bindParam(":id_member",$id,PDO::PARAM_INT);
        $delete->execute();
        
        echo "
        <script>
         alert('member deleted');
        </script>";
      }
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
<body class="flex">
    
<!-- <button id="menu-button" type="button" class="text-gray-100 z-20 bg-gray-600 px-1 rounded absolute top-2 left-3 hover:text-blue-500"><i class="fa-solid fa-bars text-xl"></i></button> -->
<section id="nav-bar" class="px-3 text-white h-[100vh] w-[250px] bg-gray-600">
            <div class="flex items-center justify-center py-2 border-b-[1px] border-gray-300">
                <h4 class="text-blue-500 font-extrabold text-[1.2rem] mt-5">GYM<span class="text-white">/PRO</span>
                </h4>
            </div>
            
            <div class="py-5 dach">
                <ul class="pl-2 flex flex-col gap-y-6">
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-blue-500 flex gap-3 items-center active-btn" ><i class="fa-solid fa-gauge"></i><a data-id ="dashboard" href="#">Dashboard</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-blue-500 flex gap-3 items-center" ><i class="fa-solid fa-users-gear"></i><a data-id ="members" href="#">Members List</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-blue-500 flex gap-3 items-center" ><i class="fa-solid fa-list"></i><a data-id ="activities" href="#">Activities List</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-blue-500 flex gap-3 items-center" ><i class="fa-solid fa-list-check"></i><a data-id ="reservations" href="#">Reservations</a></li>
                </ul>
            </div>
            
</section>
    
<main class="w-full main-section">

<!-- dashboard -->
    <section class="w-full section sec1 dashboard active" id="dashboard">
        <div class="w-full flex gap-5 justify-center pt-20">
        <div class="w-[30%] py-2 bg-green-500 rounded-md shadow-md shadow-gray-300 text-white text-center">
            <h3 class="text-[3rem] font-semibold">Members</h3>
            <p class="text-[4rem] font-bold"><?php echo $nbmembers ?></p>
        </div>
        <div class="w-[30%] py-2 bg-green-500 rounded-md shadow-md shadow-gray-300 text-white text-center">
            <h3 class="text-[3rem] font-semibold">Activities</h3>
            <p class="text-[4rem] font-bold"><?php echo $nbactivities ?></p>
        </div>
        <div class="w-[30%] py-2 bg-green-500 rounded-md shadow-md shadow-gray-300 text-white text-center">
            <h3 class="text-[3rem] font-semibold">Reservations</h3>
            <p class="text-[4rem] font-bold"><?php echo $nbreservations ?></p>
        </div>
        </div>
    </section>

<!-- Members section -->
    <section class="w-full section sec2 members" id="members">
        <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of existing members</h1>
        <div class="w-[300px] h-[2px] bg-gray-400 mx-auto mb-10"></div>
    <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>Membre ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Télephone</th>
            <th>Edit Member</th>
            <th>Delete Member</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            foreach($result as $user){ ?>
            <tr>
              <td>
                  <?php echo $user["id_member"]; ?>
              </td>
              <td>
                  <?php echo $user["nom"]; ?>
              </td>
              <td>
                  <?php echo $user["prenom"]; ?>
              </td>
              <td>
                  <?php echo $user["email"]; ?>
              </td>
              <td>
                  <?php echo $user["telephone"]; ?>
              </td>
              <td><a href="../assets/php/update.php?id=<?php echo $user["id_member"];?>"><i class="fa-solid fa-edit text-yellow-400"></i></a></td>
              <td><a href="dashboard.php?id=<?php echo $user["id_member"];?>"><i class="fa-solid fa-trash text-red-600"></i></a></td>
            </tr>
            <?php } ?>
           
         </tbody>
      </table>
    </section>

<!-- activities -->
    <section class="w-full section sec3 activities" id="activities">
    <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of activities</h1>
        <div class="w-[300px] h-[2px] bg-gray-400 mx-auto mb-10"></div>
    <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>nom activité</th>
            <th>Description</th>
            <th>date debut</th>
            <th>date fin</th>
            <th>capacité</th>
            <th>disponibility</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            foreach($activities as $activity){ ?>
            <tr>
              <td>
                  <?php echo $activity["nom_activity"]; ?>
              </td>
              <td>
                  <?php echo $activity["description"]; ?>
              </td>
              <td>
                  <?php echo $activity["capacite"]; ?>
              </td>
              <td>
                  <?php echo $activity["date_debut"]; ?>
              </td>
              <td>
                  <?php echo $activity["date_fin"]; ?>
              </td>
              <td>
                  <?php echo $activity["disponibilite"]; ?>
              </td>
            </tr>
            <?php } ?>
           
         </tbody>
      </table>
    
    </section>

<!-- reservations -->
    <section class="w-full section sec4 reservations" id="reservations">
        <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of reservations</h1>
        <div class="w-[300px] h-[2px] bg-gray-400 mx-auto mb-10"></div>
    <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>id reservation</th>
            <th>id de l'activity reserver</th>
            <th>id de membre qui a reserver</th>
            <th>date de reservation</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            foreach($reservations as $reservation){ ?>
            <tr>
              <td>
                  <?php echo $reservation["id_reservtaion"]; ?>
              </td>
              <td>
                  <?php echo $reservation["id_Activity"]; ?>
              </td>
              <td>
                  <?php echo $reservation["id_member"]; ?>
              </td>
              <td>
                  <?php echo $reservation["date_reservation"]; ?>
              </td>
           </tr>
            <?php } ?>
           
         </tbody>
      </table>
    </section>
    

    <section class="w-full">
    
    </section>

  </main>






<script src="../assets/js/script.js?v=<?php echo time(); ?>">

</script>

    
</body>
</html>
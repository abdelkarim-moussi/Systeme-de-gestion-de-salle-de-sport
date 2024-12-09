<?php
  require_once "./assets/php/fetchdb.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Systeme de gesttion de salle de sport</title>
</head>
<body>
    
  <main class="flex">
    <div>
        <!-- <button id="menu-button" type="button" class="text-gray-100 z-20 bg-gray-600 px-1 rounded absolute top-2 left-3 hover:text-blue-500"><i class="fa-solid fa-bars text-xl"></i></button> -->
        <section id="nav-bar" class="active relative px-3 text-white h-[100vh] w-[220px] bg-gray-600">
            <div class="flex items-center justify-center py-2 border-b-[1px] border-gray-300">
                <h4 class="text-blue-500 font-extrabold text-[1.2rem] mt-5">GYM<span class="text-white">/PRO</span>
                </h4>
            </div>
            
            <div class="py-5">
                <ul class="pl-2 flex flex-col gap-2">
                    <li class="toggeled-item text-[1rem] font-semibold text-gray-200 hover:text-blue-500 flex gap-3 items-center tracking-wider"><i class="fa-solid fa-gauge"></i><a href="#">Dashboard</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold text-gray-200 hover:text-blue-500 flex gap-3 items-center tracking-wider"><i class="fa-solid fa-users-gear"></i><a href="#">Members List</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold text-gray-200 hover:text-blue-500 flex gap-3 items-center tracking-wider"><i class="fa-solid fa-gears"></i><a href="#">Manage Members</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold text-gray-200 hover:text-blue-500 flex gap-3 items-center tracking-wider"><i class="fa-solid fa-list"></i><a href="#">Activities List</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold text-gray-200 hover:text-blue-500 flex gap-3 items-center tracking-wider"><i class="fa-solid fa-gears"></i><a href="#">Manage Activities</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold text-gray-200 hover:text-blue-500 flex gap-3 items-center tracking-wider"><i class="fa-solid fa-list-check"></i><a href="#">Reservations</a></li>
                </ul>
            </div>
            
        </section>

    </div>
    
    <section class="hidden bg-gray-200 w-full" id="dashboard">
    </section>

    <section class="w-full">
    <table class="w-full">
         <thead>
            <tr class="bg-gray-100 border-b-2 border-gray-600">
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
            <tr class="border-b-2">
              <td>
                  <?php echo $user["id_Member"]; ?>
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
              <td><a href="#"><i class="fa-solid fa-edit text-yellow-400"></i></a></td>
              <td><a href="#"><i class="fa-solid fa-trash text-red-600"></i></a></td>
            </tr>
            <?php } ?>
           
         </tbody>
      </table>
    </section>
  </main>











    <script src="./assets/js/script.js"></script>
</body>
</html>
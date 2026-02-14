   <!-- NAvigation -->
   <div class="container-fuild" style="background-color: #F4CC4C; display: flex; justify-content: space-around;">
       <h3 class="p-3">Judge Dashboard</h3>
       <div class="p-3">
           <a href="j_logout.php" class="btn btn-outline-danger" style="float: right;"><i
                   class="bi bi-box-arrow-right"></i>
               Logout</a>
       </div>
   </div>
   <div class="container mt-2">
       <ul class="nav nav-pills nav-fill">
           <li class="nav-item">
               <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>"
                   aria-current="page" href="dashboard.php"><i class="bi bi-window-stack"></i> Dashboard</a>
           </li>
           <li class="nav-item">
               <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'judgement.php' ? 'active' : ''; ?>"
                   aria-current="page" href="judgement.php"><i class="bi bi-file-earmark-arrow-up"></i> Judgement
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'cases.php' ? 'active' : ''; ?>"
                   aria-current="page" name="cases" href="cases.php"><i class="bi bi-file-earmark-text"></i> My
                   Cases</a>
           </li>
           <li class="nav-item">
               <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>"
                   aria-current="page" href="profile.php"><i class="bi bi-person-lines-fill"></i> Profile</a>
           </li>
       </ul>
   </div>
   <!-- NAvigation -->
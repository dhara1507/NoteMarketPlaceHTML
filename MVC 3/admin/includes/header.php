<?php
session_start();
include "includes/db.php";
$id1=$_SESSION['id'];

?>
<?php
$img="";
$query="SELECT * FROM userprofile WHERE UserID='{$id1}'";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $img=$row['ProfilePicture'];
                    }


?>
<!--Header-->
    <div class="header header-note">
        <div class="navbar-header">
            <!-- LOGO-->
            <a href="dashboard.php">
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user" class="addadmin-logo">
            </a>
            <!--Mobile Menu Open Button-->
            <span id="mobile-nav-open-btn" class="mobile-nav-open-btn">&#9776;</span>
        </div>
        <div class="header-right">
            <ul class="nav nav2 navbar-nav pull-right">
               <li><a href="dashboard.php" class="font">Dashboard</a></li>
                <li>
                    <div class="dropdown">
                        <a href="" class="dashboard font">Notes</a>
                        <div class="dropdown-content dash-admin-content dash-dashboard-content">
                            <a href="notesunderreview.php">Notes Under Review</a>
                            <a href="publishednote.php">Published Notes</a>
                            <a href="downloaded.php">Download Notes</a>
                            <a href="rejectednote.php">Rejected Notes</a>
                        </div>
                    </div>
                </li>
                <li><a href="member.php" class="font">Members</a></li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="dashboard font">Reports</a>
                        <div
                            class="dropdown-content dash-admin-content dash-dashboard-content dash-dashboard-content-report">
                            <a href="spamreport.php">Spam Reports</a>
                        </div>
                    </div>
                </li> 
                <li>
                <div class="dropdown">
                        <a href="dashboard.php" class="dashboard font">Settings</a>
                            
                           <?php
                            $role='';
                            $query="SELECT * FROM users WHERE ID='{$id1}'";
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                $role=$row['RoleID'];
                            }
                            if($role=='3'){
                                echo "<div class='dropdown-content dash-admin-content dash-dashboard-content' style='height:230px;'>";
                                echo "<a href='managesystem.php'>Manage System Configuration</a>
                            <a href='managead.php'>Manage Administrator</a>
                            <a href='managecatogary.php'>Manage Category</a>
                            <a href='managetype.php'>Manage Type</a>
                            <a href='managecountry.php''>Manage Countries</a>";
                            }
                            if($role=='2'){
                                echo "<div class='dropdown-content dash-admin-content dash-dashboard-content' style='height:130px;'>";
                                echo "<a href='managecatogary.php'>Manage Category</a>
                            <a href='managetype.php'>Manage Type</a>
                            <a href='managecountry.php'>Manage Countries</a>";
                            }
                            ?>
                            
                            
                        </div>
                    </div>
                
                <li>
                    <div class="dropdown">
                       <?php if($img){ ?>
                        <a href="#"><img src="<?php echo $img; ?>" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php }else{ ?>
                        <a href='#'><img src="images/team/default.jpg" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php } ?>

                        <div class="dropdown-content dash-admin-content dash-admin-content-user">
                            <a href="myprofile.php">Update Profile</a>
                            <a href="../user(back_end)/cp.php">Change Password</a>
                            <?php
                            echo "<a <a onclick=\" javascript:return confirm('Are You Sure You Want To Logout')\" href='login.php' class='logout'>LOGOUT</a>";
                            ?>
                        </div>
                    </div>
                </li>
                <li>
                    
                    <?php
                     echo "<a onclick=\" javascript:return confirm('Are You Sure You Want To Logout')\" href='login.php'<form action='Login.php'><input type='submit' class='btn2 btn2-user' value='Logout' style='margin-top:-10px;'></form>";
                     ?>
                </li>
            </ul>
        </div>
        <!-- Mobile Menu-->
        <div id="mobile-nav">
            <!--Mobile Menu Close Button-->
            <span id="mobile-nav-close-btn">&times;</span>
            <div id="mobile-nav-content">
                <ul class="nav">
                    <li>
                        <div class="dropdown">
                            <a href="#" class="dashboard font">Dashboard</a>
                            <div class="dropdown-content dash-admin-content dash-dashboard-content
                            dash-content dropdown-container">
                                <a href="#">Notes Under Review</a>
                                <a href="#">Published Notes</a>
                                <a href="#">Download Notes</a>
                                <a href="#">Rejected Notes</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#" class="font">Notes</a></li>
                    <li><a href="#" class="font">Members</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="dashboard font">Reports</a>
                            <div
                                class="dropdown-content dash-admin-content dash-dashboard-content 
                                dash-dashboard-content-report dash-content dropdown-container-a">
                                <a href="#">Spam Reports</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#" class="font">Settings</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="#"><img src="images/Add-notes/user-img.png"
                                    class="img-responsive img-circle img-user img-user-dash"></a>
                            <div class="dropdown-content dash-admin-content dash-admin-content-user
                            dash-content dropdown-container">
                                <a href="#">Update Profile</a>
                                <a href="#">Change Password</a>
                                <a href="#" class="logout">LOGOUT</a>
                            </div>
                        </div>
                    </li>
                    <li>
<!--
                      <li>
                        <form action="Logout.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Logout"></form>
                    </li>
-->
                       <form action='logout.php'>
                        <input type="submit" class="btn2 btn2-user btn-addadmin-1" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div> 
    </div>
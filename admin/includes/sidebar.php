<?php
// Obtém o nome do arquivo atual, por exemplo, "index.php"
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <div class="logo-details">
        <img class="bx bxl-c-plus-plus icon logo" src="../assets/img/spartask_logo_semfundo.png" alt="Logo SparTask">
        <div class="logo_name">SparTask</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li class="<?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">
            <a href="index.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li class="<?php echo $currentPage == 'users.php' ? 'active' : ''; ?>">
            <a href="users.php">
                <i class='bx bx-user'></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        <li class="<?php echo $currentPage == 'settings.php' ? 'active' : ''; ?>">
            <a href="settings.php">
                <i class='bx bx-cog'></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="profile.jpg" alt="profileImg">
                <div class="name_job">
                    <div class="name"><?= htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="job">Administrador</div>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out"></i>
        </li>
    </ul>
</div>

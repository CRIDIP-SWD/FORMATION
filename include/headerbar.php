<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="../assets/layouts/layout4/img/logo-light.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                <?php if($info_user['type'] == 0){ ?>
                                    <?= $info_user['nom_user']; ?> <?= $info_user['prenom_user']; ?><br>
                                    <h6><i>CLH Formation</i></h6>
                                <?php }else{ ?>
                                    <?php
                                    $client_info = $user->client($info_user['idcontact']);
                                    ?>
                                    <?= $info_user['nom_user']; ?> <?= $info_user['prenom_user']; ?><br>
                                    <h6><i><?= $client_info['nom_societe']; ?></i></h6>
                                <?php } ?>
                            </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                        </a>
                        <?php if($info_user['type'] == 0){ ?>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="index.php?view=info">
                                        <i class="icon-user"></i> Mon Profil </a>
                                </li>
                                <li>
                                    <a href="<?= ROOT,CONTROL; ?>utilisateur.php?action=deconnect">
                                        <i class="icon-key"></i> Déconnexion
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                        <?php if($info_user['type'] == 1){ ?>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="index.php?view=info">
                                        <i class="icon-user"></i> Mes Informations </a>
                                </li>
                                <li>
                                    <a href="index.php?view=formation">
                                        <i class="icon-calendar"></i> Mes Formations </a>
                                </li>
                                <li>
                                    <a href="<?= ROOT,CONTROL; ?>utilisateur.php?action=deconnect">
                                        <i class="icon-key"></i> Déconnexion </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
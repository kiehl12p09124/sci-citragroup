 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">

   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
   </ul>
   <!-- <ul class="navbar-nav ml-auto mr-2">
      <li class="nav-item">
        <a class="nav-link nav-li" href="<?= BASEURL . '/Login/SignOut'; ?>"><i class="fas fa-power-off"></i></a>
      </li>
    </ul> -->
   <div class="ml-auto mr-4">
     <?php if (isset($_SESSION['admin'])) { ?>
       <span class="mr-3">
         <i class="fas fa-user mr-1"></i>
         <?= $_SESSION['admin']; ?>
       </span>
     <?php } ?>
     <a href="<?= BASEURL . '/Login/SignOut'; ?>">
       <button class="btn btn-danger" title="Log Out">
         <i class="fas fa-power-off"></i>
       </button>
     </a>
   </div>
 </nav>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-secondary elevation-4">
   <!-- <a href="<?= BASEURL; ?>/Dashboard" class="brand-link">
      <img class="bg-white" src="<?= BASEURL; ?>/img/20210714_131017.png" alt="Logo Yayasan" style="width:50px; margin-left: 10%;">
      <span class="brand-text font-weight-light">Asshidqie</span>
    </a> -->
   <!-- <a href="index3.html" class="brand-link">
      <img src="<?= PUBLICC; ?>/img/sci/SCI_logo.png" alt="AdminLTE Logo" class="elevation-3 bg-white ml-1 mr-2" style="width: 55px; margin-top: -8px;">
      <span class="brand-text font-weight-normal">Citra Group</span>
    </a> -->
   <!-- Sidebar -->
   <div class="sidebar">



     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


         <!-- <li class="nav-item">
                <a href="<?= BASEURL; ?>/Dashboard" class="nav-link">
                    <i class="fas fa-tachometer-alt nav-icon"></i>
                    <p>Dashboard</p>
                </a>
            </li> -->

         <!-- CITRA INTERIOR -->
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="far fa-building mr-1"></i>
             <p>
               Citra Interior Indonesia
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CII" class="nav-link">
                 <i class="fas fa-envelope-open-text nav-icon"></i>
                 <p>Surat Bulan Ini</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CII/surat" class="nav-link">
                 <i class="far fa-envelope nav-icon"></i>
                 <p>Daftar Surat</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CII/addSurat" class="nav-link" target="_blank">
                 <i class="fas fa-plus-circle nav-icon"></i>
                 <p>Tambah Surat</p>
               </a>
             </li>
           </ul>
         </li>
         <!-- Citra Furniture -->
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="far fa-building mr-1"></i>
             <p>
               Citra Furniture Indonesia
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CF" class="nav-link">
                 <i class="fas fa-envelope-open-text nav-icon"></i>
                 <p>Surat Bulan Ini</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CF/surat" class="nav-link">
                 <i class="far fa-envelope nav-icon"></i>
                 <p>Daftar Surat</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CF/addSurat" class="nav-link" target="_blank">
                 <i class="fas fa-plus-circle nav-icon"></i>
                 <p>Tambah Surat</p>
               </a>
             </li>
           </ul>
         </li>
         <!-- Sentral Citra Indonesia -->
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="far fa-building mr-1"></i>
             <p>
               Sentral Citra Indonesia
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/SCI" class="nav-link">
                 <i class="fas fa-envelope-open-text nav-icon"></i>
                 <p>Surat Bulan Ini</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/SCI/surat" class="nav-link">
                 <i class="far fa-envelope nav-icon"></i>
                 <p>Daftar Surat</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/SCI/addSurat" class="nav-link" target="_blank">
                 <i class="fas fa-plus-circle nav-icon"></i>
                 <p>Tambah Surat</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fas fa-trash-restore mr-1"></i>
             <p>
               Surat Terhapus
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CII/deleted" class="nav-link">
                 <i class="fas fa-trash nav-icon"></i>
                 <p>CII</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/CF/deleted" class="nav-link">
                 <i class="fas fa-trash nav-icon"></i>
                 <p>CF</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/SCI/deleted" class="nav-link" target="_blank">
                 <i class="fas fa-trash nav-icon"></i>
                 <p>SCI</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fas fa-file-alt mr-1"></i>
             <p>
               Memo
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/Memo/" class="nav-link">
                 <i class="fas fa-file nav-icon"></i>
                 <p>Daftar Memo</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= BASEURL; ?>/Memo/addMemo" class="nav-link">
                 <i class="fas fa-plus-circle nav-icon"></i>
                 <p>Tambah Memo</p>
               </a>
             </li>
           </ul>
         </li>


       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">

     <div class="container-fluid">
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->



   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <?php Flasher::flash(); ?>
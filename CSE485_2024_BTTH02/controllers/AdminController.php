<?php
include ('services/AdminService.php');

class AdminController {

    public function index(){
        $adminService = new AdminService();
        $admin = $adminService->getAll();

        include ("views/admin/index.php");
    }
}
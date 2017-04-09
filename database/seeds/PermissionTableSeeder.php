<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
//            [
//                'name' => 'role-list',
//                'display_name' => 'Display Role Listing',
//                'description' => 'See only Listing Of Role'
//            ],
//            [
//                'name' => 'role-create',
//                'display_name' => 'Create Role',
//                'description' => 'Create New Role'
//            ],
//            [
//                'name' => 'role-edit',
//                'display_name' => 'Edit Role',
//                'description' => 'Edit Role'
//            ],
//            [
//                'name' => 'role-delete',
//                'display_name' => 'Delete Role',
//                'description' => 'Delete Role'
//            ]
//,
//            [
//                'name' => 'user-list',
//                'display_name' => 'Display User Listing',
//                'description' => 'See only Listing Of User'
//            ],
//            [
//                'name' => 'user-create',
//                'display_name' => 'Create User',
//                'description' => 'Create New User'
//            ],
//            [
//                'name' => 'user-edit',
//                'display_name' => 'Edit User',
//                'description' => 'Edit User'
//            ],
//            [
//                'name' => 'user-delete',
//                'display_name' => 'Delete User',
//                'description' => 'Delete User'
//            ],
//            [
//                'name' => 'danhmuc-list',
//                'display_name' => 'Display Danh Muc Listing',
//                'description' => 'See only Danh Muc Of Role'
//            ],
//            [
//                'name' => 'danhmuc-create',
//                'display_name' => 'Create Danh Muc',
//                'description' => 'Create New Danh Muc'
//            ],
//            [
//                'name' => 'danhmuc-edit',
//                'display_name' => 'Edit Danh Muc',
//                'description' => 'Edit Danh Muc'
//            ],
//            [
//                'name' => 'danhmuc-delete',
//                'display_name' => 'Delete Danh Muc',
//                'description' => 'Delete Danh Muc'
//            ]
//            [
//                'name' => 'sanpham-list',
//                'display_name' => 'Display Sản Phẩm Listing',
//                'description' => 'See only Sản Phẩm Of Role'
//            ],
//            [
//                'name' => 'sanpham-create',
//                'display_name' => 'Create Sản Phẩm',
//                'description' => 'Create New Sản Phẩm'
//            ],
//            [
//                'name' => 'sanpham-edit',
//                'display_name' => 'Edit Sản Phẩm',
//                'description' => 'Edit Sản Phẩm'
//            ],
//            [
//                'name' => 'sanpham-delete',
//                'display_name' => 'Delete Sản Phẩm',
//                'description' => 'Delete Sản Phẩm'
//            ]
//            [
//                'name' => 'slider-list',
//                'display_name' => 'Display Slider Listing',
//                'description' => 'See only Slider Of Role'
//            ],
//            [
//                'name' => 'slider-create',
//                'display_name' => 'Create Slider',
//                'description' => 'Create New Slider'
//            ],
//            [
//                'name' => 'slider-edit',
//                'display_name' => 'Edit Slider',
//                'description' => 'Edit Slider'
//            ],
//            [
//                'name' => 'slider-delete',
//                'display_name' => 'Delete Slider',
//                'description' => 'Delete SSlider'
//            ]
            [
                'name' => 'trang-list',
                'display_name' => 'Display Trang Listing',
                'description' => 'See only Trang Of Role'
            ],
            [
                'name' => 'trang-create',
                'display_name' => 'Create Trang',
                'description' => 'Create New Trang'
            ],
            [
                'name' => 'trang-edit',
                'display_name' => 'Edit Trang',
                'description' => 'Edit Trang'
            ],
            [
                'name' => 'trang-delete',
                'display_name' => 'Delete Trang',
                'description' => 'Delete Trang'
            ]


        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}

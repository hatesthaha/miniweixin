<?php
return [
    'adminNav' => [
        ['name' => '权限模块', 'action' => 'backend/roleactive', 'show' => true, 'params' => '', 'id' => 10, 'pId' => ''],


        ['name' => '部门管理列表', 'action' => 'group/index', 'show' => true, 'params' => '', 'id' => 1000001, 'pId' => 10],
        ['name' => '新增部门', 'action' => 'group/create', 'show' => true, 'params' => '', 'id' => 10000011, 'pId' => 1000001],
        ['name' => '修改部门', 'action' => 'group/update', 'show' => true, 'params' => '', 'id' => 10000012, 'pId' => 1000001],
        ['name' => '查看部门', 'action' => 'group/view', 'show' => true, 'params' => '', 'id' => 10000013, 'pId' => 1000001],
        ['name' => '删除部门', 'action' => 'group/delete', 'show' => true, 'params' => '', 'id' => 10000014, 'pId' => 1000001],
        ['name' => '批量删除部门', 'action' => 'group/alldelete', 'show' => true, 'params' => '', 'id' => 10000015, 'pId' => 1000001],
        ['name' => '启用部门', 'action' => 'group/start', 'show' => true, 'params' => '', 'id' => 10000016, 'pId' => 1000001],
        ['name' => '停用部门', 'action' => 'group/stop', 'show' => true, 'params' => '', 'id' => 10000017, 'pId' => 1000001],

        ['name' => '角色管理列表', 'action' => 'role/index', 'show' => true, 'params' => '', 'id' => 1000002, 'pId' => 10],
        ['name' => '新增角色', 'action' => 'role/create', 'show' => true, 'params' => '', 'id' => 10000021, 'pId' => 1000002],
        ['name' => '修改角色', 'action' => 'role/update', 'show' => true, 'params' => '', 'id' => 10000022, 'pId' => 1000002],
        ['name' => '查看角色', 'action' => 'role/view', 'show' => true, 'params' => '', 'id' => 10000023, 'pId' => 1000002],
        ['name' => '删除角色', 'action' => 'role/delete', 'show' => true, 'params' => '', 'id' => 10000024, 'pId' => 1000002],
        ['name' => '批量删除角色', 'action' => 'role/alldelete', 'show' => true, 'params' => '', 'id' => 10000025, 'pId' => 1000002],
        ['name' => '启用角色', 'action' => 'role/start', 'show' => true, 'params' => '', 'id' => 10000026, 'pId' => 1000002],
        ['name' => '停用角色', 'action' => 'role/stop', 'show' => true, 'params' => '', 'id' => 10000027, 'pId' => 1000002],

        ['name' => '用户管理列表', 'action' => 'users/index', 'show' => true, 'params' => '', 'id' => 1000003, 'pId' => 10],
        ['name' => '新增用户', 'action' => 'users/create', 'show' => true, 'params' => '', 'id' => 10000031, 'pId' => 1000003],
        ['name' => '修改用户', 'action' => 'users/update', 'show' => true, 'params' => '', 'id' => 10000032, 'pId' => 1000003],
        ['name' => '查看用户', 'action' => 'users/view', 'show' => true, 'params' => '', 'id' => 10000033, 'pId' => 1000003],
        ['name' => '删除用户', 'action' => 'users/delete', 'show' => true, 'params' => '', 'id' => 10000034, 'pId' => 1000003],
        ['name' => '批量删除用户', 'action' => 'users/alldelete', 'show' => true, 'params' => '', 'id' => 10000035, 'pId' => 1000003],
        ['name' => '启用用户', 'action' => 'users/start', 'show' => true, 'params' => '', 'id' => 10000036, 'pId' => 1000003],
        ['name' => '停用用户', 'action' => 'users/stop', 'show' => true, 'params' => '', 'id' => 10000037, 'pId' => 1000003],

        ['name' => '项目管理', 'action' => 'backend/project', 'show' => true, 'params' => '', 'id' => 20, 'pId' => ''],

    ]
];

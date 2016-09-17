<?php
$adminRole = Role::create([
		    'name' => 'franchisor',
		    'slug' => 'franchisor',
		    'level' => 1, // optional, set to 1 by default
		]);

		$moderatorRole = Role::create([
		    'name' => 'franchisee',
		    'slug' => 'franchisee',
		    'level' =>2
		]);

		$user = User::find(1);
		$user->attachRole(1);
		$user = User::find(2);
		$user->attachRole(2);


		//Permission

		$createUsersPermission = Permission::create([
		    'name' => 'Create users',
		    'slug' => 'create.users',
		    'description' => '', // optional
		]);

		$deleteUsersPermission = Permission::create([
		    'name' => 'Delete users',
		    'slug' => 'delete.users',
		]);



		 //    echo $id= Auth::user()->id;
 //    $user = User::find($id);

	// $user->attachRole(2); // you can pass whole object, or just an id

	// if ($user->is('forum.moderator')) { // you can pass an id or slug
 //    // or alternatively $user->hasRole('admin')
	// 	echo 'Day chinh la forum.moderator';
	// }
	// else
	// {
	// 	echo 'khong phai forum.moderator';
	// }
 //    	return view('test',compact('user'));
  //   	$createCatePermision = Permission::create([
		//     'name' => 'Create Cate',
		//     'slug' => 'admin.cates.add',
		//     'description' => '', // optional
		//     'model' => 'Cate',
		// ]);
		
?>
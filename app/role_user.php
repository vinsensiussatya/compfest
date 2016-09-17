<?php


namespace Bican\Roles\Models;

use Bican\Roles\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Traits\RoleHasRelations;
use Bican\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;

class role_user extends Model implements RoleHasRelationsContract
{

	use Slugable, RoleHasRelations;
	protected $table = 'role_user';
     protected $fillable = ['role_id', 'user_id'];


     public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}

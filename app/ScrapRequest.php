<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrapRequest extends Model
{
    //
    protected $table = 'scrap_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'approval_status', 'stsrc', 'finalized'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    // Nếu tên bảng trong cơ sở dữ liệu không phải là "posts", bạn có thể khai báo nó
    protected $table = 'posts';
}

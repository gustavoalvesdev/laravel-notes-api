<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @OA\Schema(
 *     schema="Note",
 *     type="object",
 *     title="Note",
 *     required={"title", "body"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Título da nota"),
 *     @OA\Property(property="body", type="string", example="Corpo da nota") 
 * )
 */
class Note extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body'];
    public $timestamps = false;
}

<?PHP
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable 
{
    use Notifiable;

    protected $guard = 'employee'; 

    protected $fillable = [
        'name', 'email', 'password', 'department_id', 'phone', 'salary', 'image', 'joining_date'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

   
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
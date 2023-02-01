<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];


    /**
     * Check if the user is a student or learner
     */
    public function isLearner()
    {
        return $this->role == 'student';
    }

    /**
     * Check if the user is an instructor or teacher
     */
    public function isTeacher()
    {
        return $this->role == 'instructor';
    }

    /**
     * Check if the user is an admin
     */
    public function isAdmin()
    {
        return $this->role == 'admin';
    }


    /**
     * get the user fullname
     */
    public function fullname()
    {
        if ($this->isLearner())
            return $this->getStudent('fname') . ' ' . $this->getStudent('lname');


        else if ($this->isTeacher())
            return $this->getInstructor('fname') . ' ' . $this->getStudent('lname');


        else if ($this->isAdmin())
            return $this->getAdmin('fname') . ' ' . $this->getStudent('lname');
    }


    // getting the preferences based on the user type this is for views not for controllers or models
    /**
     * this returns the user preferences (eloquent) relationship based on the user type.
     */
    public function preferences()
    {
        if ($this->isLearner()) {
            return $this->getStudent()->learningPreference();
        }

        if ($this->isTeacher()) {
            return $this->getInstructor()->teachingPreference();
        }

        if ($this->isAdmin()) {
            return $this->getAdmin()->adminPreference();
        }
    }

    //    normal relationships


    // manual relationships

    /**
     * Get the student associated with this user
     */
    public function getStudent(string $attr = null)
    {
        $student = Student::where('user_id', $this->id)->first();
        $student_attr = $student[$attr];
        // if attribute is requested, then get the required attr, else get the whole student object data
        return $attr ?  $student_attr : $student;
    }


    /**
     * Get the instructor associated with this user
     */
    public function getInstructor(string $attr = null)
    {
        $instructor = Instructor::where('user_id', $this->id)->first();
        $instructor_attr = $instructor[$attr];
        // if attribute is requested, then get the required attr, else get the whole instructor object data
        return $attr ?  $instructor_attr : $instructor;
    }



    /**
     * Get the Admin associated with this user
     */
    public function getAdmin(string $attr = null)
    {
        $admin = Admin::where('user_id', $this->id)->first();
        $admin_attr = $admin[$attr];
        // if attribute is requested, then get the required attr, else get the whole admin object data
        return $attr ?  $admin_attr : $admin;
    }


























































    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

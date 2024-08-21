<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public static $PER_PAGE = 5;
    public $search = "";
    public $sortField = "id";
    public $sortAsc = true;

    

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    public function render()
    {
        $prevUserCount = 0;

        $query = User::query();

        if (strlen($this->search) >= 1) {
            $query->where(function($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('nickname', 'like', '%' . $this->search . '%');
            });
        }

        
        $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

        $users = $query->where('role', 'Applicant')->paginate(self::$PER_PAGE);

        $currentUserCount = $users->total(); // count current users fetched

        if ($currentUserCount !== $prevUserCount) {
            $this->resetPage(); // reset the pagination if number of users changed
        }

        $prevUserCount = $currentUserCount; // update value

        return view('livewire.user-table', ['users' => $users]);
    }
}

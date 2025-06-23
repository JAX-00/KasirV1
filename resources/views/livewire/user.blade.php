<div>

    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="choseMenu('see')"
                    class="btn {{ $ChoseMenu == 'see' ? 'btn-primary' : 'btn-outline-primary' }}">
                    All Users
                </button>
                <button wire:click="choseMenu('add')"
                    class="btn {{ $ChoseMenu == 'add' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Add Users
                </button>
                <button wire:loading class="btn btn-info">
                    Loading..
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($ChoseMenu == 'see')
                    <div class="card border-primary">
                        <div class="card-header">
                            All Users
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Data</th>
                                </thead>
                                <tbody>
                                    @foreach ($allusers as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <button wire:click="choseMenu('edit')"
                                                    class="btn {{ $ChoseMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Edit Users
                                                </button>
                                                <button wire:click="choseMenu('delete')"
                                                    class="btn {{ $ChoseMenu == 'delete' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    delete Users
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($ChoseMenu == 'add')
                    <div class="card border-primary">
                        <div class="card-header">
                            Add User
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                @elseif ($ChoseMenu == 'edit')
                    <div class="card border-primary">
                        <div class="card-header">
                            Edit User
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                @elseif ($ChoseMenu == 'delete')
                    <div class="card border-primary">
                        <div class="card-header">
                            Delete User
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

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
                                                <button wire:click="chooseEdit({{ $user->id }})"
                                                    class="btn {{ $ChoseMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Edit Users
                                                </button>
                                                <button wire:click="chooseDelete({{ $user->id }})"
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
                            <form action="" wire:submit='save'>
                                <label for="">Name</label>
                                <input type="text" class="form-control" wire:model='name' />
                                @error('name')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />

                                <label for="">Email</label>
                                <input type="email" class="form-control" wire:model='email' />
                                @error('email')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />

                                <label for="">Password</label>
                                <input type="password" class="form-control" wire:model='password' />
                                @error('password')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />

                                <label for="">Role</label>
                                <select name="" id="" class="form-control" wire:model="role">
                                    <option value="">--Choose your role</option>
                                    <option value="admin">Admin</option>
                                    <option value="cashier"> Casher</option>
                                </select>
                                @error('role')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />
                                <button type="submit" class="btn btn-primary mt-4">Save</button>
                            </form>
                        </div>
                    </div>
                @elseif ($ChoseMenu == 'edit')
                    <div class="card border-primary">
                        <div class="card-header">
                            Edit User
                        </div>
                        <div class="card-body">
                            <form action="" wire:submit='update'>
                                <label for="">Name</label>
                                <input type="text" class="form-control" wire:model='name' />
                                @error('name')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />

                                <label for="">Email</label>
                                <input type="email" class="form-control" wire:model='email' />
                                @error('email')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />

                                <label for="">Password</label>
                                <input type="password" class="form-control" wire:model='password' />
                                @error('password')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />

                                <label for="">Role</label>
                                <select name="" id="" class="form-control" wire:model="role">
                                    <option value="">--Choose your role</option>
                                    <option value="admin">Admin</option>
                                    <option value="cashier"> Casher</option>
                                </select>
                                @error('role')
                                    <Span class="text-danger">{{ $message }}</Span>
                                @enderror
                                <br />
                                <button type="submit" class="btn btn-primary mt-4">Save</button>
                                <button type="button" class="btn btn-secondary mt-4"
                                    wire:click='cancel'>Cancel</button>
                            </form>
                        </div>
                    </div>
                @elseif ($ChoseMenu == 'delete')
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            Delete User
                        </div>
                        <div class="card-body">
                            Do you sure to delete this user ?
                            <p>Name: {{ $choosedUser->name }}</p>

                            <button class="btn btn-danger" wire:click='delete'>Delete</button>
                            <button class="btn btn-secondary" wire:click='cancel'>Cancel</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

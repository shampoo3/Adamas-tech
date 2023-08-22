<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            ADMIN ROLES
            <br>
            <div>
                <a href="{{route('admin.users.index')}}">Users Index Page</a> 
                <br>
                <br>
                <br>
            </div>
            
        </div>
        <div>
        @foreach($users as $user)
            <div>
                <div>{{$user->name}}</div>
                <div>{{$user->email}}</div>
            </div> 
                <h2>Roles</h2>
                <div >
                    @if($user->roles)
                        @foreach($user->roles as $user_role)
                        <form method= "POST" action="{{route('admin.users.roles.remove', [$user->id, $user_role->id])}}" onsubmit = "return confirm('sure?');">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit">{{$user_role->name}}</button>
                                    </form>
                        @endforeach
                    @endif
                </div>
                <div>
                    <form method="POST" action="{{route('admin.users.roles', $user->id)}}">
                    @csrf
                        <div>
                            <label for="role">Role:</label><br>
                            <select id="role" name="role" autocomplete="role-name">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role') 
                            <span>{{$message}}</span>
                        @enderror
                        <div>
                            <button type="submit">Assign</button>
                        </div>
                    </form>
                </div>
                <div>
                    <h2>Permissions</h2>
                    <div >
                        @if($user->permissions)
                            @foreach($user->permissions as $user_permission)
                            <form method= "POST" action="{{route('admin.roles.permissions.revoke', [$user->id, $user_permission->id])}}" onsubmit = "return confirm('sure?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit">{{$user_permission->name}}</button>
                                        </form>
                            @endforeach
                        @endif
                    </div>
                <div>
                    <form method="POST" action="{{route('admin.users.permissions', $user->id)}}">
                    @csrf
                    <div>
                        <label for="permission">Permission:</label><br>
                        <select id="permission" name="permission" autocomplete="permission-name">
                            @foreach($permissions as $permission)
                                <option value="{{$permission->name}}">{{$permission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        @error('name') 
                            <span>{{$message}}</span>
                        @enderror
                        <div>
                            <button type="submit">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-admin-layout>

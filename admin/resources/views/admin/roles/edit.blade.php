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
                <a href="{{route('admin.roles.index')}}">Roles Index Page</a> 
                <br>
                <br>
                <br>
            </div>
            <form method="POST" action="{{route('admin.roles.update', $role->id)}}">
            @csrf
            @method('PUT')
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="{{$role->name}}"><br><br>
                @error('name') <span>{{$message}}</span>@enderror
                <br>
                <button type="submit">Update</button>
            </form>
            <div>
                <h2>Role Permissions</h2>
                <div >
                    @if($role->permissions)
                        @foreach($role->permissions as $role_permission)
                        <form method= "POST" action="{{route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])}}" onsubmit = "return confirm('sure?');">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit">{{$role_permission->name}}</button>
                                    </form>
                        @endforeach
                    @endif
                </div>
                <div>
                    <form method="POST" action="{{route('admin.roles.permissions', $role->id)}}">
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
    </div>
</x-admin-layout>

<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            ADMIN PERMISSIONS
            <br>
            <div>
                <a href="{{route('admin.permissions.index')}}">Permissions Index Page</a> 
                <br>
                <br>
                <br>
            </div>
            <form method="POST" action="{{route('admin.permissions.update', $permission)}}">
            @csrf
            @method('PUT')
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="{{$permission->name}}"><br><br>
                @error('name') <span>{{$message}}</span>@enderror
                <br>
                <button type="submit">Update</button>
            </form> 
        </div>
        <div>
                <h2>Roles</h2>
                <div >
                    @if($permission->roles)
                        @foreach($permission->roles as $permission_role)
                        <form method= "POST" action="{{route('admin.permissions.roles.remove', [$permission->id, $permission_role->id])}}" onsubmit = "return confirm('sure?');">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit">{{$permission_role->name}}</button>
                                    </form>
                        @endforeach
                    @endif
                </div>
                <div>
                <form method="POST" action="{{route('admin.permissions.roles', $permission->id)}}">
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
            </div>
        </div>
</x-admin-layout>

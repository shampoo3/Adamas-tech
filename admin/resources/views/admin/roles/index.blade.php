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
                <a href="{{route('admin.roles.create')}}">Create Role</a> 
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role -> name}}
                            </td>
                            <td>
                                <div class="flex">
                                    <a href="{{route('admin.roles.edit', $role->id)}}">Edit</a>
                                    <form method= "POST" action="{{route('admin.roles.destroy', $role->id)}}" onsubmit = "return confirm('sure?');">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>

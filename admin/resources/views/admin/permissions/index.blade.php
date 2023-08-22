<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>     
            ADMIN PERMISSIONS
            <div>
                <a href="{{route('admin.permissions.create')}}">Create Permission</a> 
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission -> name}}
                            </td>
                            <td>
                                <div class="flex">
                                    <a href="{{route('admin.permissions.edit', $permission->id)}}">Edit</a>
                                    <form method= "POST" action="{{route('admin.permissions.destroy', $permission->id)}}" onsubmit = "return confirm('sure?');">
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

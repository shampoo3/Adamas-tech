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
                <a href="{{route('admin.permissions.index')}}">Permission Index Page</a> 
                <br>
                <br>
                <br>
            </div>
            <form method="POST" action="{{route('admin.permissions.store')}}">
            @csrf
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name"><br><br>
                @error('name') <span>{{$message}}</span>@enderror
                <br>
                <button type="submit">Submit</button>
            </form> 
        </div>
    </div>
</x-admin-layout>

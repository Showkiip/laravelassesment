<x-app-layout>

    <div class="container py-12">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" class="form-control" name="name" id="userName" name="name" value="{{ $user->name }}"
                            placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="email" id="Email"
                            name="email" value="{{ $user->email }}" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
</x-app-layout>

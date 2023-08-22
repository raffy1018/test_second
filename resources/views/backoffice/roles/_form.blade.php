<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control round-pill" id="name" name="name" value="{{ $role->name ? $role->name : '' }}" placeholder="Enter Role Name">
</div>
<div class="form-group">
    <label for="router">Router</label>
    <input type="text" class="form-control round-pill" id="router" name="router" value="{{ $role->router_id ? $role->router->name : $router->name }}" readonly="">
    <input type="hidden" name="router_id" value="{{ $role->router_id ? $role->router->id : $router->id }}">
</div>
<table class="table table-bordered my-5">
    <thead>
        <tr>
            <th style="width:30%">Module</th>
            <th>Permissions</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Helper::getSystemPermissions() as $group => $systemPermissions)
            <tr>
                <th>{{ ucfirst($group) }}</th>
                <td>

                    @foreach($systemPermissions as $permission)
                        <input type="checkbox" id="permission-{{ $permission['id'] }}" name="permissions[{{ $permission['id'] }}]" {{ $permissions->contains($permission['id']) ? 'checked' : '' }}>
                        <label for="permission-{{ $permission['id'] }}"> {{ ucfirst($permission['name']) }}</label><br>
                    @endforeach

                </td>
            </tr>
        @endforeach
    </tbody>
</table>